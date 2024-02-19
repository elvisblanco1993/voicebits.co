<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class BlockSpamIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->isIpBlocked( $request->ip() )) {
            abort(404, 'This website does not exist.');
        }
        return $next($request);
    }

    /**
     * Check if an IP address is blocked.
     *
     * @param string $ip
     * @return bool
     */
    protected function isIpBlocked($client_ip)
    {
        foreach (DB::table('blacklist')->get('ip_address') as $blob) {
            if ($client_ip == $blob->ip_address) {
                return true;
            }
        }
        return false;
    }
}
