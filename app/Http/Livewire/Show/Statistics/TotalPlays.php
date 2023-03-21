<?php

namespace App\Http\Livewire\Show\Statistics;

use App\Models\PlaysCounter;
use Livewire\Component;

class TotalPlays extends Component
{
    public $podcast, $totalPlays, $from_website, $from_third_parties;

    public function mount()
    {
        $this->totalPlays = PlaysCounter::where('podcast_id', $this->podcast)->sum('plays');
        $this->from_website = PlaysCounter::where('podcast_id', $this->podcast)->whereIn('webplayer', ['rss', 'web'])->sum('plays');
        $this->from_third_parties = $this->totalPlays - $this->from_website;
    }
    public function render()
    {
        return view('livewire.show.statistics.total-plays');
    }
}
