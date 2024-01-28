<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Podcast;
use App\Models\Website;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ImportPodcast implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $uniqueFor = 2;
    public $temp_podcast;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($podcast_id)
    {
        $this->temp_podcast = DB::table('temporary_podcasts')->find($podcast_id);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $feed = new \SimplePie\SimplePie();
        $feed->set_feed_url($this->temp_podcast->feed_url);
        $feed->cache_location = storage_path('simplepie');
        $feed->init();
        $feed->handle_content_type();

        // Feed Namespaces
        $itunes = \SimplePie\SimplePie::NAMESPACE_ITUNES;

        // Create Podcast
        try {
            $podcast = Podcast::create([
                'guid' => str()->uuid(),
                'name' => $this->temp_podcast->name,
                'url' => str(Str::random(16))->slug(),
                'description' => $feed->get_description(),
                'category' => $feed->get_categories() ?? $feed->get_channel_tags($itunes, 'category')[0]['attribs']['']['text'],
                'language' => $feed->get_language(),
                'type' => $feed->get_channel_tags($itunes, 'type')[0]['data'],
                'author' => $this->temp_podcast->owner_name,
                'timezone' => "-05:00", // defaults to US Eastern Time
            ]);

            // Create podcast website in database
            Website::create([
                'podcast_id' => $podcast->id,
            ]);

            // Make root directory for podcast
            Storage::disk(config('filesystems.default'))
                ->makeDirectory('podcasts/'.$podcast->id);

            $user = User::findOrFail($this->temp_podcast->user_id);
            $user->podcasts()->attach($podcast->id, [
                'role' => 'owner',
                'permissions' => json_encode(config('auth.podcast_permissions')),
            ]);

            // Upload the podcast cover to storage
            $cover = $feed->get_image_url();
            $cover_data = file_get_contents($cover);
            $cover_name = pathinfo($cover)['basename'];

            Storage::disk(config('filesystems.default'))->put('podcasts/' . $podcast->id . '/covers/' . $cover_name, $cover_data, 'public');

            $podcast->update([
                'cover' => 'podcasts/' . $podcast->id . '/covers/' . $cover_name,
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }

        // Add episodes metadata to temporary table
        try {
            foreach ($feed->get_items() as $episode) {
                Log::error($episode->get_item_tags($itunes, 'number')[0]['data'] ?? null);
                $data = [
                    'guid' => $episode->get_id(),
                    'temp_podcast_id' => $this->temp_podcast->id,
                    'podcast_id' => $podcast->id,
                    'title' => $episode->get_title(),
                    'description' => $episode->get_description(),
                    'created_at' => Carbon::createFromTimestamp(strtotime($episode->get_date()))->toDateTimeString(),
                    'updated_at' => Carbon::createFromTimestamp(strtotime($episode->get_date()))->toDateTimeString(),
                    'published_at' => Carbon::createFromTimestamp(strtotime($episode->get_date()))->toDateTimeString(),
                    'season' => $episode->get_item_tags($itunes, 'season')[0]['data'] ?? null,
                    'number' => $episode->get_item_tags($itunes, 'number')[0]['data'] ?? null,
                    'type' => $episode->get_item_tags($itunes, 'episodeType')[0]['data'],
                    'explicit' => ($episode->get_item_tags($itunes, 'explicit')[0]['data'] == 'true') ? 1 : 0,
                    'cover' => $episode->get_thumbnail() ?? null,
                    'track_url' => $episode->get_enclosure()->link,
                    'track_size' => $episode->get_enclosure()->length,
                    'track_length' => $episode->get_enclosure()->duration,
                ];

                DB::table('temporary_episodes')->insert($data);
            }

        } catch (\Throwable $th) {
            Log::error($th);
        }

        // Start importing episodes to the podcast
        $this->importEpisodes();
    }

    /**
     * Queue episodes for importing
     */
    public function importEpisodes()
    {
        $episodes = DB::table('temporary_episodes')->where('temp_podcast_id', $this->temp_podcast->id)->get();
        $batch = Bus::batch([])->onQueue('import-episodes')->name($this->temp_podcast->name . " episodes")->dispatch();
        // Import all episodes
        try {
            foreach ($episodes as $episode) {
                $batch->add(
                    new ImportEpisodes($episode->id)
                );
            }
        } catch (\Throwable $th) {
            Log::error($th);
        }
        return $batch;
    }
}
