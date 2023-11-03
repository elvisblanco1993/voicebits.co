<?php

namespace App\Jobs;

use App\Models\Episode;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ReleaseScheduledEpisodes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $episodes = Episode::whereNull('published_at')->whereNotNull('scheduled_for')->get();

        foreach ($episodes as $episode) {
            if ($episode->scheduled_for <= now()) {
                $episode->published_at = $episode->scheduled_for;
                $episode->scheduled_for = null;
                $episode->save();

                // Send update to PodPing
                NotifyPodPing::dispatch($episode->podcast);
                Log::info("Hit PodPing");
            }
        }
    }
}
