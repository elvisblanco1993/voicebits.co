<?php

namespace App\Livewire\Subscriber\Actions;

use Livewire\Component;
use App\Models\Subscriber;

class Analytics extends Component
{
    public $modal;
    public Subscriber $subscriber;

    public function render()
    {
        return view('livewire.subscriber.actions.analytics');
    }
}
