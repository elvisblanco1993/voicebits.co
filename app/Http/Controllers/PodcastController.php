<?php

namespace App\Http\Controllers;

use App\Models\Contributor;
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
                'base_url' => preg_replace(['#^https?://#', '#:8000$#'], '', config('app.url')),
                'podcast' => Podcast::where('url', $url)->firstOrFail(),
                'player' => $player,
            ])
            ->header('Content-Type', 'application/xml');
    }

    public function show($url)
    {
        $podcast = Podcast::where('url', $url)->firstOrFail();

        $episodesOrder = ($podcast->type == 'episodic') ? 'DESC' : 'ASC';

        return view('podcast.templates.' . $podcast->website->template . '/index', [
            'podcast' => $podcast,
            'episodes' => $podcast->episodes()->where('published_at', '<', now())->orderBy('published_at', $episodesOrder)->take(10)->simplePaginate(12)
        ]);
    }

    public function episodes($url, Request $request)
    {
        $query = $request->has('search') ? $request->search : '';

        $podcast = Podcast::where('url', $url)->with('episodes')->firstOrFail();
        return view('podcast.templates.' . $podcast->website->template . '/episodes', [
            'podcast' => $podcast,
            'episodes' => $podcast->episodes()->published()->where('title', 'like', '%' . $query . '%')->paginate(12),
        ]);
    }

    public function episode($url, $episode)
    {
        $episode = Episode::where('guid', $episode)->whereNotNull('published_at')->firstOrFail();
        return view('podcast.templates.' . $episode->podcast->website->template . '/episode', [
            'episode' => $episode,
            'podcast' => $episode->podcast,
        ]);
    }

    public function people($url)
    {
        $podcast = Podcast::where('url', $url)->with('contributors')->firstOrFail();
        return view('podcast.templates.' . $podcast->website->template . '/people', [
            'podcast' => $podcast,
            'people' => $podcast->contributors,
        ]);
    }

    public function person($url, $person)
    {
        $person = Contributor::where('slug', $person)->firstOrFail();
    }

    public function subscribe($url)
    {
        $podcast = Podcast::where('url', $url)->firstOrFail();
        return view('podcast.templates.' . $podcast->website->template . '/subscribe', [
            'podcast' => $podcast,
        ]);
    }

    public function cover($url, Request $request)
    {
        $podcast = Podcast::where('url', $url)->firstOrFail();
        $mime = Storage::mimeType($podcast->cover);
        $content = Storage::get($podcast->cover);

        // Check if the client already has the latest image
        $etag = md5($content);
        if ($request->hasHeader('If-None-Match') && $request->header('If-None-Match') === $etag) {
            // Return a 304 Not Modified response without content if the ETag matches
            return Response::make('', 304);
        }

        // Create the response with the image content
        $response = Response::make($content, 200);
        $response->header("Content-Type", $mime);

        // Set cache headers
        $response->header("Cache-Control", "public, max-age=28800"); // 8 hours
        $response->header("ETag", $etag);

        return $response;
    }

    public function transcript($url, $episode)
    {
        $episode = Episode::where('guid', $episode)->firstOrFail();
        $content = Storage::get($episode->transcript);
        $mime = Storage::mimeType($content);
        $response = Response::make($content, 200);
        $response->header("Content-Type", $mime);
        return $response;
    }
}
