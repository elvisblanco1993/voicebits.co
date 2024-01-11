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
        $feed = simplexml_load_file($this->temp_podcast->feed_url);

        // Create Podcast
        try {
            $podcast = Podcast::create([
                'name' => $this->temp_podcast->name,
                'url' => str(Str::random(16))->slug(),
                'description' => $feed->channel->description->__toString(),
                'category' => $feed->xpath("//itunes:category")[0]['text']->__toString(),
                'language' => $feed->channel->language[0]->__toString(),
                'type' => $feed->xpath("//itunes:type")[0]->__toString(),
                'author' => $this->temp_podcast->owner_name,
                'timezone' => "-05:00", // defaults to US Eastern Time
            ]);

            Website::create([
                'podcast_id' => $podcast->id,
            ]);

            $user = User::findOrFail($this->temp_podcast->user_id);
            $user->podcasts()->attach($podcast->id, [
                'role' => 'owner',
                'permissions' => json_encode(config('auth.podcast_permissions')),
            ]);

            // Upload the podcast cover to storage
            $cover = ( !empty($feed->channel->image->url) ) ? $feed->channel->image->url->__toString() : $feed->xpath("//itunes:image")[0]['href']->__toString();
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
            foreach ($feed->channel->item as $episode) {
                DB::table('temporary_episodes')
                    ->insert([
                        'guid' => $episode->guid,
                        'temp_podcast_id' => $this->temp_podcast->id,
                        'podcast_id' => $podcast->id,
                        'title' => $episode->title,
                        'description' => $episode->description,
                        'created_at' => Carbon::createFromTimestamp(strtotime($episode->pubDate))->toDateTimeString(),
                        'updated_at' => Carbon::createFromTimestamp(strtotime($episode->pubDate))->toDateTimeString(),
                        'published_at' => Carbon::createFromTimestamp(strtotime($episode->pubDate))->toDateTimeString(),
                        'season' => ( !empty($feed->channel->item->xpath("//itunes:season")) && !empty( $episode->xpath("./itunes:season")[0] ) ) ? $episode->xpath("./itunes:season")[0] : null,
                        'number' => ( !empty($feed->channel->item->xpath("//itunes:episode")) && !empty( $episode->xpath("./itunes:episode")[0] ) ) ? $episode->xpath("./itunes:episode")[0] : null,
                        'type' => $episode->xpath("//itunes:episodeType")[0] ?? $episode->episodeType,
                        'explicit' => ( !empty($feed->channel->item->xpath("//itunes:explicit")) && !empty( $episode->xpath("./itunes:explicit")[0] ) )
                            ? ( ($episode->xpath("./itunes:explicit")[0] == 'yes' || $episode->xpath("./itunes:explicit")[0] == 1) ? 1 : 0 )
                            : 0,
                        'cover' => $episode->xpath("//itunes:image")[0]['href']->__toString(),
                        'track_url' => $episode->enclosure['url'],
                        'track_size' => $episode->enclosure['length'],
                        'track_length' => ( !empty($feed->channel->item->xpath("//itunes:duration")) && !empty( $episode->xpath("./itunes:duration")[0] ) ) ? $episode->xpath("./itunes:duration")[0] : 0,
                    ]);
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
