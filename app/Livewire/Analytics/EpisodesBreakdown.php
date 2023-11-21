<?php

namespace App\Livewire\Analytics;

use App\Models\Podcast;
use Livewire\Component;
use Livewire\WithPagination;

class EpisodesBreakdown extends Component
{
    use WithPagination;

    public $podcast;

    public function mount()
    {
        $this->podcast = Podcast::findorfail(session('podcast'));
    }

    public function render()
    {
        $episodes = $this->podcast->episodes()->withCount('plays')->orderBy('plays_count', 'DESC')->simplePaginate(5);

        return view('livewire.analytics.episodes-breakdown', [
            'episodes' => $episodes,
        ]);
    }
}
