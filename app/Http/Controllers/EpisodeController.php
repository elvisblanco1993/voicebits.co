<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EpisodeController extends Controller
{
    public function preview($episode)
    {
        $episode = Episode::where('guid', $episode)->first();
        $path = Storage::disk(config('filesystems.default'))->get($episode->track_url);
        $filesize = (int) $episode->track_size / 1024;
        $response = Response::make($path, 200);
        $response->header('Content-Type', 'audio/mpeg');
        $response->header('Content-Length', $filesize);
        $response->header('Accept-Ranges', 'bytes');
        $response->header('Content-Range', 'bytes 0-'.$filesize.'/'.$filesize);
        return $response;
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

        $path = Storage::disk(config('filesystems.default'))->get($episode->track_url);
        $filesize = (int) $episode->track_size / 1024;
        // return response($path, 200)
        //     ->header('Content-Type', 'audio/mpeg')
        //     ->header('Content-Disposition', 'inline')
        //     ->header('Accept-Ranges', 'bytes')
        //     ->header('Content-Range', 'bytes 0-' . $filesize . '/' . $filesize);

        $response = Response::make($path, 200);
        $response->header('Content-Type', 'audio/mpeg');
        $response->header('Content-Length', $filesize);
        $response->header('Accept-Ranges', 'bytes');
        $response->header('Content-Range', 'bytes 0-'.$filesize.'/'.$filesize);
        return $response;
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
