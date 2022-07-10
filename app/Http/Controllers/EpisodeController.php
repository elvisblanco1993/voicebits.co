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
    public function play($url, $episode)
    {
        $episode = Episode::where('guid', $episode)->first();
        (new PlaysCounterController)->playCounter($episode->id, $episode->podcast_id);
        return response(Storage::disk(config('filesystems.default'))->get($episode->track_url), 200)
            ->header('Content-Type', 'audio/mpeg')
            ->header('Content-Disposition', 'inline');
    }
}
