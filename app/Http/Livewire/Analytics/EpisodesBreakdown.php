<?php

namespace App\Http\Livewire\Analytics;

use App\Models\Podcast;
use Livewire\Component;

class EpisodesBreakdown extends Component
{
    public $podcast;

    public function mount()
    {
        $this->podcast = Podcast::findorfail(session('podcast'));
    }

    public function render()
    {
        $episodes = $this->podcast->episodes()->withCount('plays')->get();
        return view('livewire.analytics.episodes-breakdown', [
            'episodes' => $episodes,
        ]);
    }
}
