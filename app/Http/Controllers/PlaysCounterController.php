<?php

namespace App\Http\Controllers;

use App\Models\PlaysCounter;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Stevebauman\Location\Facades\Location;

class PlaysCounterController extends Controller
{
    public function playCounter($episode_id, $podcast_id, $player)
    {
        if ($position = Location::get()) {
            // Check if episode played by same person already
            $token = hash('sha512', $player . $position->ip);

            PlaysCounter::updateOrCreate(
                [
                    'podcast_id' => $podcast_id,
                    'token' => $token,
                    'region' => $position->regionName,
                    'country' => $position->countryName,
                    'webplayer' => $player,
                ], [
                    'episode_id' => $episode_id,
            ])->increment('plays');
        }
    }
}
