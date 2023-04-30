<?php

namespace App\Http\Livewire\Show;

use Livewire\Component;

class Index extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.show.index', [
            'podcasts' => auth()->user()->podcasts
        ]);
    }

    public function goto($podcastId)
    {
        if (!auth()->user()->podcasts()->findorfail($podcastId)->exists()) {
            return redirect()->route('podcast.catalog');
        }
        session()->put('podcast', $podcastId);
        return redirect()->route('podcast.dashboard');
    }
}
