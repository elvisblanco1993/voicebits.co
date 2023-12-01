<?php

namespace App\Livewire\Subscriber\Actions;

use Livewire\Component;
use App\Models\Statistics;
use App\Models\Subscriber;
use App\Models\PlaysCounter;
use Illuminate\Support\Facades\DB;

class Analytics extends Component
{
    public $modal;
    public Subscriber $subscriber;

    public function render()
    {
        return view('livewire.subscriber.actions.analytics', [
            'episodes' => $this->getStats(),
        ]);
    }

    public function getStats()
    {
        $subscriberId = $this->subscriber->id;

        return $this->subscriber->podcast->episodes()
            ->select('title')
            ->withCount(['statistics as total' => function($query) use ($subscriberId) {
                $query->where('subscriber_id', $subscriberId);
            }])
            ->orderBy('total', 'DESC')
            ->take(10)
            ->get();
    }
}
