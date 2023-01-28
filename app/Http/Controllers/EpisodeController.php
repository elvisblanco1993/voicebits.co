<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
        // Only count plays here when playing from Third Party player.
        if ($player != 'web') {
            (new PlaysCounterController)->playCounter($episode->id, $episode->podcast_id, $player);
        }

        $file = Storage::disk(config('filesystems.default'))->get($episode->track_url);
        $size = Storage::disk(config('filesystems.default'))->size($episode->track_url);

        if (request()->header('Range')) {
            Log::info(
                request()->header('Range')
            );
        }

        return response($file, 206)
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
                'Content-Range' => 'bytes 0-'.$size - 1 .'/'.$size,
                'X-Pad' => 'avoid browser bug',
                'Etag' => $episode->track_url,
            ]);

        // return response($file, 200)
        //     ->header('Content-Type', 'audio/mpeg')
        //     ->header('Content-Disposition', 'inline');
    }

    /**
     * Embed an episode on a third party website.
     */
    public function embed($guid, $player)
    {
        $episode = Episode::where('guid', $guid)->firstorfail();
        $cover = Storage::disk(config('filesystems.default'))->url($episode->cover ?? $episode->podcast->cover);
        $track = route('episode.play', ['url' => $episode->podcast->url, 'episode' => $guid, 'player' => $player]);
        return view('web.partials.embed', [
            'track' => $track,
            'cover' => $cover,
            'title' => $episode->title,
            'duration' => $episode->track_length,
            'show_name' => $episode->podcast->name,
            'show_description' => $episode->podcast->description,
            'show_author' => $episode->podcast->author,
            'show_url' => route('podcast.website', ['url' => $episode->podcast->url]),
            'episode_url' => route('podcast.episode', ['url' => $episode->podcast->url, 'episode' => $guid]),
            'embed_url' => route('episode.embed', ['guid' => $guid, 'player' => $player]),
        ]);
    }
}
