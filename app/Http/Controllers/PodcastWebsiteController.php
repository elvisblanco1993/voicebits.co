<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Podcast;

class PodcastWebsiteController extends Controller
{
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
