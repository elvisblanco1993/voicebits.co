<?php

namespace App\Http\Livewire\Show\Statistics;

use App\Models\PlaysCounter;
use Livewire\Component;

class TotalPlays extends Component
{
    public $podcast;
    public function render()
    {
        return view('livewire.show.statistics.total-plays', [
            'totalPlays' => PlaysCounter::where('podcast_id', $this->podcast)->sum('plays')
        ]);
    }
}
