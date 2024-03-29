<?php

namespace App\Jobs;

use App\Models\Podcast;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use App\Notifications\PodPingFailAlert;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class NotifyPodPing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Podcast $podcast;
    /**
     * Create a new job instance.
     */
    public function __construct($podcast)
    {
        $this->podcast = $podcast;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Prepare the feed url
            $podcastFeedUrl = route('public.podcast.feed', ['url' => $this->podcast->url, 'player' => 'podcastindex']);

            // Send feed update to PodPing
            Http::withHeaders([
                    'Authorization' => config('podping.token'),
                    'User-Agent' => 'Voicebits',
                ])
                ->get('https://podping.cloud', [
                'url' => $podcastFeedUrl,
                'reason' => 'updated',
                'medium' => 'podcast'
            ]);
        } catch (\Throwable $th) {
            // Log Failure & Send Slack alert
            Log::error($th);
            new PodPingFailAlert();
        }
    }
}
