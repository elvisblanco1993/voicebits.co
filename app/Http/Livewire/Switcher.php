<?php

namespace App\Http\Livewire;

use App\Models\Podcast;
use Livewire\Component;

class Switcher extends Component
{
    public $activePodcast;
    public $podcasts;

    public function mount()
    {
        $this->activePodcast = Podcast::find(session('podcast'));
        $this->podcasts = auth()->user()->podcasts;
    }

    public function render()
    {
        return view('livewire.switcher');
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
