<?php

namespace App\Http\Middleware;

use App\Models\PlaysCounter;
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
        // Check if on Trial or Subscribed (also check if there's an incomplete payment)
        $user = $request->user();
        if (!$user->stripe_id) {
            return $next($request);
        }

        if(!$user->onTrial() && !$user->subscribed('voicebits'))
        {
            return redirect()->route('signup');
        }

        if ($user->subscribed('voicebits')) {
            if ($user->subscription('voicebits')->hasIncompletePayment()) {
                return redirect()->route('cashier.payment', $user->subscription('voicebits')->latestPayment()->id);
            }
        }

        // Check monthly downloads

        // Check private podcast subscribers

        return $next($request);
    }
}
