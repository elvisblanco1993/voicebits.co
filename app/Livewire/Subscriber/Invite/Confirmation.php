<?php
/**
 * Confirms or declines a private podcast subscription when
 * subscriptions are added using the "bulk" import method.
 */
namespace App\Livewire\Subscriber\Invite;

use Livewire\Component;
use App\Models\Subscriber;
use App\Jobs\SubscriberConfirmationJob;

class Confirmation extends Component
{
    public $subscriber;
    public $modal;

    public function mount($url)
    {
        $allowedStatuses = ['ACTIVE', 'OPT-OUT'];
        $this->subscriber = Subscriber::where('token', $url)->firstOrFail();

        // Redirects to podcast page early if subscription is already verified.
        if (in_array($this->subscriber->status, $allowedStatuses)) {
            return redirect()->route('private.podcast.website', ['url' => $this->subscriber->token]);
        }
    }

    public function render()
    {
        return view('livewire.subscriber.invite.confirmation', [
            'subscriber' => $this->subscriber
        ])->layout('layouts.guest');
    }

    public function accept()
    {
        $this->subscriber->update([
            'status' => 'ACTIVE',
        ]);
        SubscriberConfirmationJob::dispatch($this->subscriber);
        return redirect()->route('private.podcast.website', ['url' => $this->subscriber->token]);
    }

    public function decline()
    {
        $this->subscriber->delete();
        return redirect()->to('/');
    }
}
