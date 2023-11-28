<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Predis\Command\Redis\DUMP;
use Symfony\Component\HttpFoundation\Response;

class AuthenticatePrivatePodcast
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $subscriber = Subscriber::where('token', $request->token)
                                ->whereIn('status', ['ACTIVE', 'OPT-OUT'])
                                ->firstOrFail();
        $podcast = $subscriber->podcast;

        if (!$podcast->passkey) {
            return $next($request);
        }

        if (!$request->has('pwd') || $request->get('pwd') != $podcast->passkey) {
            return redirect()->route('private.podcast.login', ['url' => $podcast->url, 'token' => $subscriber->token]);
        }

        return $next($request);
    }
}
