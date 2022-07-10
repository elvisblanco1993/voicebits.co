<?php

namespace App\Http\Livewire\Show\Statistics;

use Livewire\Component;
use App\Models\PlaysCounter;
use App\Models\Podcast;

class EstimatedAudienceSize extends Component
{
    public $podcast;
    public function mount()
    {
        $this->average_size = 0;
        $podcast = Podcast::find($this->podcast);
        foreach ($podcast->episodes as $episode) {
            $this->average_size += PlaysCounter::where('episode_id', $episode->id)->where('created_at', '<=', $episode->created_at->addDays(30))->count();
        }
    }

    public function render()
    {
        return view('livewire.show.statistics.estimated-audience-size', [
            'average_size' => $this->average_size
        ]);
    }
}
