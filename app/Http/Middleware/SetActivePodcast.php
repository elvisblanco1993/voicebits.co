<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetActivePodcast
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('podcast')) {
            if ($request->user()->podcasts->count() > 0) {
                session()->put('podcast', $request->user()->podcasts->first()->id);
            } else {
                return redirect()->route('podcast.create');
            }
        }
        return $next($request);
    }
}
