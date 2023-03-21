<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Stevebauman\Location\Facades\Location;

class PlaysCounterController extends Controller
{
    public function playCounter($episode_id, $podcast_id, $player)
    {
        if ($position = Location::get()) {
            // Check if episode played by same person already
            $counter = \App\Models\PlaysCounter::where( 'token', session()->get('_token') )->first();

            if ( $counter ) {
                $counter->plays = $counter->plays + 1;
                $counter->save();
            } else {
                \App\Models\PlaysCounter::create([
                    'podcast_id' => $podcast_id,
                    'episode_id' => $episode_id,
                    'token' => $position->ip,
                    'region' => $position->regionName,
                    'country' => $position->countryName,
                    'plays' => 1,
                    'webplayer' => $player,
                ]);
            }
        }
    }
}
