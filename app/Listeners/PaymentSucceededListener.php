<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class PaymentSucceededListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Remove trial end period once the user is subscribed.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(WebhookReceived $event)
    {
        if ($event->payload['type'] === 'invoice.payment_succeeded') {
            $user = User::where('email', $event->payload['data']['object']['customer_email'])->where('stripe_id', $event->payload['data']['object']['customer'])->firstOrFail();
            $user->update([
                'trial_ends_at' => null,
            ]);
        }
    }
}
