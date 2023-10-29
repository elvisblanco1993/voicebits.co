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

        // Check if episode exists
        if (!$episode) {
            return response()->json(['message' => 'Episode not found'], 404);
        }

        if (!Storage::disk(config('filesystems.default'))->exists($episode->track_url)) {
            return response()->json(['message' => 'Audio file not found'], 404);
        }

        $file = Storage::disk(config('filesystems.default'))->get($episode->track_url);
        $size = Storage::disk(config('filesystems.default'))->size($episode->track_url);

        $responseCode = 200;
        $headers = [
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
            'X-Pad' => 'avoid browser bug',
            'Etag' => md5($episode->track_url)
        ];

        // Check and handle Range header
        if ($rangeHeader = request()->header('Range')) {
            $responseCode = 206;
            list($start, $end) = explode('-', substr($rangeHeader, 6));
            $start = (int) $start;
            $end = $end ? (int) $end : $size - 1;
            $headers['Content-Length'] = ($end - $start) + 1;
            $headers['Content-Range'] = "bytes {$start}-{$end}/{$size}";
            $file = substr($file, $start, $headers['Content-Length']);
        }

        return response($file, $responseCode)->withHeaders($headers);
    }

    /**
     * Embed an episode on a third party website.
     */
    public function embed($guid, $player)
    {
        $episode = Episode::where('guid', $guid)->firstorfail();
        $cover = Storage::disk(config('filesystems.default'))->url($episode->cover ?? $episode->podcast->cover);
        $track = route('public.episode.play', ['url' => $episode->podcast->url, 'episode' => $guid, 'player' => $player]);
        return view('podcast.embed', [
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
