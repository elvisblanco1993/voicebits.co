<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastController extends Controller
{

    /**
     * Generates the rss feed for the podcast
     */
    public function feed($url) {
        return response()
            ->view('web.feed', [
                'podcast' => Podcast::where('url', $url)->first(),
            ])
            ->header('Content-Type', 'application/xml');
    }

    public function show($url)
    {
        $podcast = Podcast::where('url', $url)->with('episodes')->first();
        return view('web.templates.' . $podcast->website->template . '/layout', [
            'podcast' => $podcast,
        ]);
    }

    public function episode($url, $episode)
    {
        $episode = Episode::where('guid', $episode)->whereNotNull('published_at')->first();
        return view('web.templates.' . $episode->podcast->website->template . '/episode', [
            'episode' => $episode,
            'podcast' => $episode->podcast,
        ]);
    }
}
