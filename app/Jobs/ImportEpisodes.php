<?php

namespace App\Jobs;

use App\Models\Episode;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ImportEpisodes implements ShouldQueue, ShouldBeUnique
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $episode_id;
    public $episodes;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($episode_id)
    {
        $this->episode_id = $episode_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $episode = DB::table('temporary_episodes')->where('id', $this->episode_id)->first();

        try {
            // Get episode cover (if any)
            if ($episode->cover) {
                $cover_data = file_get_contents($episode->cover);
                $cover_name = uniqid() . '.' . pathinfo($episode->cover)['extension'];
                Storage::disk(config('filesystems.default'))->put('podcasts/' . $episode->podcast->uuid . '/covers/' . $cover_name, $cover_data, 'public');
            }

            // Get episode track
            if ($episode->track_url) {
                $track_data = file_get_contents($episode->track_url);
                $track_name = uniqid() . '.mp3'; // Strictly use mp3 for now.
                Storage::disk(config('filesystems.default'))->put('podcasts/' . $episode->podcast->uuid . '/episodes/' . $track_name, $track_data);
            }

            // Submit to podcast episodes
            Episode::create([
                'guid' => $episode->guid,
                'podcast_id' => $episode->podcast_id,
                'title' => $episode->title,
                'description' => $episode->description,
                'published_at' => $episode->published_at,
                'season' => $episode->season,
                'number' => $episode->number,
                'type' => $episode->type,
                'explicit' => $episode->explicit,
                'cover' => ($episode->cover) ? 'podcasts/' . $episode->podcast->uuid . '/covers/' . $cover_name : null,
                'track_url' => 'podcasts/' . $episode->podcast->uuid . '/episodes/' . $track_name,
                'track_size' => $episode->track_size,
                'track_length' => $episode->track_length,
            ]);

            // Deletes temporary episode record.
            DB::table('temporary_episodes')->where('id', $this->episode_id)->delete();
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }
}
