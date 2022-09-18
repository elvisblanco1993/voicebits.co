<?php

namespace App\Http\Livewire\Subscription;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Signup extends Component
{
    public $plan;

    public function mount()
    {
        if (auth()->user()->subscribed('voicebits')) {
            return redirect()->route('shows');
        }
    }

    public function save($plan)
    {
        switch ($plan) {
            case '1':
                $price = config('plans.starter');
                break;
            case '2':
                $price = config('plans.professional');
                break;
            case '3':
                $price = config('plans.business');
                break;
            default:
                return redirect()->route('signup');
                break;
        }

        return auth()->user()->newSubscription('voicebits', $price)
            ->allowPromotionCodes()
            ->checkout([
            'success_url' => route('shows'),
            'cancel_url' => route('signup'),
        ]);
    }

    public function render()
    {
        return view('livewire.subscription.signup');
    }
}
