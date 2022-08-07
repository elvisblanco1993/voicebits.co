<?php

namespace App\Http\Livewire\Show\Statistics;

use App\Models\PlaysCounter;
use App\Models\Podcast;
use Carbon\Carbon;
use Livewire\Component;

class PlaysAtShowLaunch extends Component
{
    public function mount(Podcast $podcast)
    {
        $this->thirty_days = PlaysCounter::whereBetween('created_at', [$podcast->created_at, Carbon::parse($podcast->created_at)->addDays(30)])->sum('plays');
        $this->sixty_days = PlaysCounter::whereBetween('created_at', [$podcast->created_at, Carbon::parse($podcast->created_at)->addDays(60)])->sum('plays');
        $this->ninety_days = PlaysCounter::whereBetween('created_at', [$podcast->created_at, Carbon::parse($podcast->created_at)->addDays(90)])->sum('plays');
        $this->hundred_twenty_days = PlaysCounter::whereBetween('created_at', [$podcast->created_at, Carbon::parse($podcast->created_at)->addDays(120)])->sum('plays');
    }

    public function render()
    {
        return view('livewire.show.statistics.plays-at-show-launch');
    }
}
