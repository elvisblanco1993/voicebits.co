<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EpisodeController extends Controller
{
    public function preview($episode)
    {
        $episode = Episode::where('guid', $episode)->first();
        return response(Storage::disk(config('filesystems.default'))->get($episode->track_url), 200)
            ->header('Content-Type', 'audio/mpeg')
            ->header('Content-Disposition', 'inline');
    }

    /**
     * Plays an episode
     *
     * Do not remove the unused $url variable.
     * Subdomain routing won't work without it.
     */
    public function play($url, $episode, $webplayer)
    {
        $episode = Episode::where('guid', $episode)->first();
        // Only count plays here when playing from Third Party player.
        if ($webplayer == 0) {
            (new PlaysCounterController)->playCounter($episode->id, $episode->podcast_id, $webplayer);
        }

        return response(Storage::disk(config('filesystems.default'))->get($episode->track_url), 200)
            ->header('Content-Type', 'audio/mpeg')
            ->header('Content-Disposition', 'inline');
    }

    /**
     * Embed an episode on a third party website.
     */
    public function embed($guid)
    {
        $episode = Episode::where('guid', $guid)->firstOrFail();
        $cover = Storage::disk(config('filesystems.default'))->url($episode->cover ?? $episode->podcast->cover);
        $track = route('episode.play', ['url' => $episode->podcast->url, 'episode' => $guid, 'webplayer' => 1]);
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
            'embed_url' => route('episode.embed', ['guid' => $guid]),
        ]);
    }
}
