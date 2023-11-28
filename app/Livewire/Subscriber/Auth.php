<?php

namespace App\Livewire\Subscriber;

use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class Auth extends Component
{
    public $subscriber;
    public $podcast;
    public $password;

    public function mount($token)
    {
        $this->subscriber = Subscriber::where('token', $token)
                ->whereIn('status', ['ACTIVE', 'OPT-OUT'])
                ->firstOrFail();
        $this->podcast = $this->subscriber->podcast;
    }

    public function render()
    {
        return view('livewire.subscriber.auth')->layout('layouts.guest');
    }

    public function authenticate()
    {
        $this->validate([
            'password' => 'required',
        ]);

        // Validates the password entered and redirect if it matches with DB
        if (base64_encode($this->password) != $this->podcast->passkey) {
            $this->addError('password', "Invalid password. Try again.");
        } else {
            $url = route('private.podcast.website', [
                'url' => $this->podcast->url,
                'token' => $this->subscriber->token
            ]);
            $redirectUrl = $url . '?pwd=' . base64_encode($this->password);
            return redirect($redirectUrl);
        }
    }
}
