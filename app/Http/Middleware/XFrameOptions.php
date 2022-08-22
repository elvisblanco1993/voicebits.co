<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class XFrameOptions
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
        $response = $next($request);
        $origin = $request->server('HTTP_ORIGIN') ? $request->server('HTTP_ORIGIN') : '';
        $allow_origin = [
            'https://voicebits.co',
            'https://*.voicebits.co'
        ];
        if (in_array($origin, $allow_origin)) {
            // $response->header('Access-Control-Allow-Origin', $origin);
            // $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, X-CSRF-TOKEN, Accept, Authorization, X-XSRF-TOKEN');
            // $response->header('Access-Control-Expose-Headers', 'Authorization, authenticated');
            // $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
            // $response->header('Access-Control-Allow-Credentials', 'true');
            $response->header('X-Frame-Options: SAMEORIGIN');
        }
        return $response;
    }
}
