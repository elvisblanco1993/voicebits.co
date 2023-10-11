<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public $subscriber, $passkey;
    public $podcast;

    public function show($subscriber, Request $request)
    {
        // Get the subscriber or fail
        $this->subscriber = Subscriber::where('token', $subscriber)->firstOrFail();
        if (!$this->subscriber) {
            abort(404, 'Subscription not found.');
        }

        // Get the podcast or fail
        $this->podcast = $this->subscriber->podcast;

        // Get the password from the URL
        if ($request->passkey && (base64_decode($request->passkey) !== $this->passkey)) {
            abort(404, 'Subscription not found.');
        }

        // Displays the subscriber's private web page
        return view('podcast.private.show', [
            'subscriber' => $this->subscriber
        ]);
    }

    public function feed(Subscriber $subscriber, Request $request)
    {
        $this->verifySubscription($subscriber, $request);
        // This is the subscriber's private feed
    }
}
