<?php

namespace App\Livewire\Subscription;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class StartTrial extends Component
{
    public function render()
    {
        return view('livewire.subscription.start-trial');
    }

    public function startTrial()
    {
        $user = request()->user();

        try {
            $user->createAsStripeCustomer([
                'name' => $user->name,
                'email' => $user->email,
            ]);
            $user->update([
                'trial_ends_at' => now()->addDays(14),
            ]);
            session()->flash('flash.banner', 'Your account has been successfully upgraded. Create your first podcast to get started.');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', 'Oops. We ran into an issue and could not upgrade your account. Please contact us for assistance.');
            session()->flash('flash.bannerStyle', 'danger');
        }

        return redirect()->route('podcast.catalog');
    }
}
