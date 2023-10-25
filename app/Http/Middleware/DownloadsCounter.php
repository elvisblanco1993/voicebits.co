<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Episode;
use App\Models\Podcast;
use App\Models\PlaysCounter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Stevebauman\Location\Facades\Location;
use Symfony\Component\HttpFoundation\Response;

class DownloadsCounter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // url, episode, player

        if ($location = Location::get()) {
            $podcast = Podcast::where('url', $request['url'])->firstorfail();
            $episode = Episode::where('guid', $request['episode'])->firstorfail();

            $token = hash('sha512', $request['player'] . $location->ip . $episode->id . $podcast->id);

            if ( ( PlaysCounter::where('token', $token)->count() == 0 ) || ( PlaysCounter::where('token', $token)->where('updated_at', '<', Carbon::now()->subMinutes(30))->count() > 0) ) {
                if ($request['player'] !== 'apple') {
                    PlaysCounter::create([
                        'podcast_id' => $podcast->id,
                        'episode_id' => $episode->id,
                        'token' => $token,
                        'country' => $location->countryName,
                        'region' => $location->regionName,
                        'city' => $location->cityName,
                        'player' => $request['player'],
                    ]);
                }
            }
        }
        return $next($request);
    }
}
