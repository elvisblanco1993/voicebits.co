<?php

namespace App\Http\Livewire\Analytics;

use App\Models\PlaysCounter;
use App\Models\Podcast;
use Livewire\Component;

class TotalPlays extends Component
{
    public $podcast, $lastThirty, $lastSixty, $lastNinety, $lastYear;

    public function mount()
    {
        // $this->podcast = Podcast::findorfail(session('podcast'));

        $this->lastThirty = PlaysCounter::where('podcast_id', session('podcast'))->whereBetween('created_at', [now()->subDays(30)->startOfDay(), now()])->count();
        $this->lastSixty = PlaysCounter::where('podcast_id', session('podcast'))->whereBetween('created_at', [now()->subDays(60)->startOfDay(), now()])->count();
        $this->lastNinety = PlaysCounter::where('podcast_id', session('podcast'))->whereBetween('created_at', [now()->subDays(90)->startOfDay(), now()])->count();
        $this->lastYear = PlaysCounter::where('podcast_id', session('podcast'))->whereBetween('created_at', [now()->subDays(365)->startOfDay(), now()])->count();
    }

    public function render()
    {
        return view('livewire.analytics.total-plays');
    }
}
