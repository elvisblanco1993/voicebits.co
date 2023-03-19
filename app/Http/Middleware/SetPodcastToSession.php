<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetPodcastToSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('podcast')) {
            if ($request->user()->podcasts->count() > 0) {
                session()->put('podcast', $request->user()->podcasts->first()->id);
            }
        }
        return $next($request);
    }
}
