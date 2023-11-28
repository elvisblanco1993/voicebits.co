<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\Subscriber;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public $subscriber;
    public $podcast;

    /**
     * Returns the private podcast website. Checks podcast password if exists
     * and provides deep links for adding the feed to several players.
     */
    public function show($token)
    {
        // Get the subscriber or fail
        dd($token);
        $this->subscriber = Subscriber::where('token', $token)
                                ->whereIn('status', ['ACTIVE', 'OPT-OUT'])
                                ->firstOrFail();

        // Get the podcast or fail
        $this->podcast = $this->subscriber->podcast;

        $password = ($this->podcast->passkey) ? 'pwd=' . $this->podcast->passkey : '';

        // Displays the subscriber's private web page
        return view('podcast.private.show', [
            'subscriber' => $this->subscriber,
            'deepFeedUrl' => Str::replace(['http://', 'https://'], '', route('private.podcast.feed', ['token' => $this->subscriber->token, $password]))
        ]);
    }

    public function feed($token)
    {
        // This is the subscriber's private feedS
        // 1. Check the subscriber exists
        $this->subscriber = Subscriber::where('token', $token)
                                ->whereIn('status', ['ACTIVE', 'OPT-OUT'])
                                ->firstOrFail();

        return response()
            ->view('podcast.feed', [
                'podcast' => $this->subscriber->podcast,
                'player' => 'prvt', // Private Player. Not really needed
            ])->header('Content-Type', 'application/xml');
    }

    public function authenticate($token)
    {
        $subscriber = Subscriber::where('token', $token)
                                ->whereIn('status', ['ACTIVE', 'OPT-OUT'])
                                ->firstOrFail();
        $podcast = $subscriber->podcast;
    }
}
