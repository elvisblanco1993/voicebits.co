<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Stevebauman\Location\Facades\Location;

class EpisodeController extends Controller
{
    public function preview($episode)
    {
        $episode = Episode::where('guid', $episode)->first();
        $path = Storage::disk(config('filesystems.default'))->get($episode->track_url);

        return response($path, 200)
            ->header('Content-Type', 'audio/mpeg')
            ->header('Content-Disposition', 'inline');
    }

    /**
     * Plays an episode
     *
     * Do not remove the unused $url variable.
     * Subdomain routing won't work without it.
     */
    public function play($url, $episode, $player)
    {
        $episode = Episode::where('guid', $episode)->first();
        // Only count plays here when playing from Third Party player or when not requesting from Apple Servers.
        // if (request()->status() == 200 || request()->status() == 206) {
        //     if ($player != 'apple.mp3') {
        //         (new PlaysCounterController)->playCounter($episode->id, $episode->podcast_id, $player);
        //     }
        // }
        Log::info(request());

        $file = Storage::disk(config('filesystems.default'))->get($episode->track_url);
        $size = Storage::disk(config('filesystems.default'))->size($episode->track_url);

        $responseCode = 200;
        $range = '0-'.$size;

        if (request()->header('Range')) {
            $responseCode = 206;
            $range = request()->header('Range');
        }

        return response($file, $responseCode)
            ->withHeaders([
                'Accept-Ranges' => "bytes",
                'Accept-Encoding' => "gzip, deflate",
                'Pragma' => 'public',
                'Expires' => '0',
                'Cache-Control' => 'must-revalidate',
                'Content-Transfer-Encoding' => 'binary',
                'Content-Disposition' => ' inline; filename='.$episode->track_url,
                'Content-Length' => $size,
                'Content-Type' => "audio/mpeg",
                'Connection' => "Keep-Alive",
                'Content-Range' => $range.'/'.$size,
                'X-Pad' => 'avoid browser bug',
                'Etag' => $episode->track_url,
            ]);
    }

    /**
     * Embed an episode on a third party website.
     */
    public function embed($guid, $player)
    {
        $episode = Episode::where('guid', $guid)->firstorfail();
        $cover = Storage::disk(config('filesystems.default'))->url($episode->cover ?? $episode->podcast->cover);
        $track = route('public.episode.play', ['url' => $episode->podcast->url, 'episode' => $guid, 'player' => $player]);
        return view('web.partials.embed', [
            'track' => $track,
            'cover' => $cover,
            'title' => $episode->title,
            'duration' => $episode->track_length,
            'show_name' => $episode->podcast->name,
            'show_description' => $episode->podcast->description,
            'show_author' => $episode->podcast->author,
            'show_url' => route('public.podcast.website', ['url' => $episode->podcast->url]),
            'episode_url' => route('public.podcast.episode', ['url' => $episode->podcast->url, 'episode' => $guid]),
            'embed_url' => route('public.episode.embed', ['guid' => $guid, 'player' => $player]),
        ]);
    }
}
