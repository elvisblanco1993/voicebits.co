<?php

namespace App\Http\Controllers;

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
}
