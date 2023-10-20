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
        if (!session()->has('podcast')) {
            return redirect()->route('podcast.catalog');
        }

        $user = $request->user();
        // Check if the currently logged in user owns the podcast.
        $is_owner = $user->podcasts->find(session('podcast'))->pivot->role == "owner";

        // Check if on Trial or Subscribed
        if($user->stripe_id && !$user->onTrial() && !$user->subscribed('voicebits') && $is_owner)
        {
            return redirect()->route('signup');
        }

        // Check for incomplete subscription payment
        if ($user->subscribed('voicebits')) {
            if ($user->subscription('voicebits')->hasIncompletePayment()) {
                return redirect()->route('cashier.payment', $user->subscription('voicebits')->latestPayment()->id);
            }
        }

        return $next($request);
    }
}
