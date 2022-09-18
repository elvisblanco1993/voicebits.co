<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSubscriptionStatus
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
        $user = $request->user();
        if (!$user->onTrial()) {
            if ($user->subscribed('voicebits')) {
                if ($user->subscription('voicebits')->hasIncompletePayment()) {
                    return redirect()->route('cashier.payment', $user->subscription('voicebits')->latestPayment()->id);
                } else {
                    return $next($request);
                }
            } else {
                return redirect()->route('signup');
            }
        }
        return $next($request);
    }
}
