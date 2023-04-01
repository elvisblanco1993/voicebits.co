<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class PodcastController extends Controller
{

    /**
     * Generates the rss feed for the podcast
     */
    public function feed($url, $player) {
        return response()
            ->view('podcast.feed', [
                'podcast' => Podcast::where('url', $url)->first(),
                'player' => $player,
            ])
            ->header('Content-Type', 'application/xml');
    }

    public function show($url)
    {
        $podcast = Podcast::where('url', $url)->first();

        return view('podcast.templates.' . $podcast->website->template . '/index', [
            'podcast' => $podcast,
            'episodes' => $podcast->episodes()->where('published_at', '<', now())->orderBy('published_at', 'desc')->paginate(12)
        ]);
    }

    public function episode($url, $episode)
    {
        $episode = Episode::where('guid', $episode)->whereNotNull('published_at')->first();
        return view('podcast.templates.' . $episode->podcast->website->template . '/episode', [
            'episode' => $episode,
            'podcast' => $episode->podcast,
        ]);
    }

    public function cover($url)
    {
        $podcast = Podcast::findOrFail($url);
        $mime = Storage::mimeType($podcast->cover);
        $content = Storage::get($podcast->cover);

        $response = Response::make($content, 200);
        $response->header("Content-Type", $mime);

        return $response;
    }
}
