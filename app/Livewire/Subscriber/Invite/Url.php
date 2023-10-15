<?php

namespace App\Livewire\Subscriber\Invite;

use App\Models\Podcast;
use Livewire\Component;
use App\Models\Subscriber;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Log;
use App\Jobs\SubscriberConfirmationJob;

class Url extends Component
{
    public $podcast;
    public $status;

    #[Rule('required', message: 'Please enter a valid email.')]
    #[Rule('email:dns', message: 'Please enter a valid email.')]
    #[Rule('unique:subscribers,email', message: 'This email is already subscribed.')]
    public $email;

    public function mount($url)
    {
        $this->podcast = Podcast::where('url', $url)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.subscriber.invite.url')->layout('layouts.guest');
    }

    public function save()
    {
        $this->validate();

        try {
            $subscriber = Subscriber::create([
                'podcast_id' => $this->podcast->id,
                'token' => md5(now() . $this->email), // Generate unique subscriber id
                'email' => $this->email,
            ]);

            // Send email notification to subscriber
            SubscriberConfirmationJob::dispatch($subscriber);

            $this->status = 'success';
        } catch (\Throwable $th) {
            Log::error($th);
            $this->status = 'failed';
        }
    }
}
