<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Stevebauman\Location\Facades\Location;

class PlaysCounterController extends Controller
{
    public function playCounter($episode_id, $podcast_id, $player)
    {
        if ($position = Location::get()) {
            // Check if episode played by same person already
            $token = Hash::make($position->ip . $position->postalCode);
            $counter = \App\Models\PlaysCounter::where( 'token', $token)->first();

            if ( $counter ) {
                $counter->update([
                    'plays' => $counter->plays + 1,
                ]);
            } else {
                \App\Models\PlaysCounter::create([
                    'podcast_id' => $podcast_id,
                    'episode_id' => $episode_id,
                    'token' => $token,
                    'region' => $position->regionName,
                    'country' => $position->countryName,
                    'plays' => 1,
                    'webplayer' => $player,
                ]);
            }
        }
    }
}
