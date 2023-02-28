<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stevebauman\Location\Facades\Location;

class PlaysCounterController extends Controller
{
    public function playCounter($episode_id, $podcast_id, $player) : void
    {
        if ($position = Location::get()) {
            Log::info($position->ip);
            // Check if episode played by same person already
            $counter = \App\Models\PlaysCounter::where( 'token', session()->get('_token') )->first();
            if ( $counter ) {
                $counter->plays = $counter->plays + 1;
                $counter->save();
            } else {
                \App\Models\PlaysCounter::create([
                    'podcast_id' => $podcast_id,
                    'episode_id' => $episode_id,
                    'token' => session()->get('_token'),
                    'region' => $position->regionName,
                    'country' => $position->countryName,
                    'plays' => 1,
                    'webplayer' => $player,
                ]);
            }
        } else {
            // Failed retrieving position.
        }
    }
}
