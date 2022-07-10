<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class PlaysCounterController extends Controller
{
    public function playCounter($episode_id, $podcast_id) : void
    {
        if ($position = Location::get()) {
            // Check if episode played by same person already
            $counter = \App\Models\PlaysCounter::where( 'token', session()->get('_token') )->first();
            if ( $counter ) {
                $counter->plays ++;
                $counter->save();
            } else {
                \App\Models\PlaysCounter::create([
                    'podcast_id' => $podcast_id,
                    'episode_id' => $episode_id,
                    'token' => session()->get('_token'),
                    'region' => $position->regionName,
                    'country' => $position->countryName,
                    'plays' => 1,
                ]);
            }
        } else {
            // Failed retrieving position.
        }
    }
}
