<?php

namespace App\Livewire\Analytics;

use App\Models\Podcast;
use Livewire\Component;
use App\Models\PlaysCounter;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TotalPlays extends Component
{
    public $podcast, $first7, $first14, $first30, $first60;

    public function mount()
    {
        $this->podcast = Podcast::findorfail(session('podcast'));

        foreach ($this->podcast->episodes as $episode) {
            $this->first7 += PlaysCounter::where('podcast_id', session('podcast'))
                                       ->where('episode_id', $episode->id)
                                       ->whereBetween('created_at', [$episode->created_at, Carbon::parse($episode->created_at)->addDays(7)])
                                       ->count();
            $this->first14 += PlaysCounter::where('podcast_id', session('podcast'))
                                       ->where('episode_id', $episode->id)
                                       ->whereBetween('created_at', [$episode->created_at, Carbon::parse($episode->created_at)->addDays(14)])
                                       ->count();
            $this->first30 += PlaysCounter::where('podcast_id', session('podcast'))
                                       ->where('episode_id', $episode->id)
                                       ->whereBetween('created_at', [$episode->created_at, Carbon::parse($episode->created_at)->addDays(30)])
                                       ->count();
            $this->first60 += PlaysCounter::where('podcast_id', session('podcast'))
                                       ->where('episode_id', $episode->id)
                                       ->whereBetween('created_at', [$episode->created_at, Carbon::parse($episode->created_at)->addDays(60)])
                                       ->count();
        }

        // $this->first7 = PlaysCounter::where('podcast_id', session('podcast'))->whereBetween('created_at', [$this->podcast->created_at, Carbon::parse($this->podcast->created_at)->addDays(7)])->count();
        // $this->first14 = PlaysCounter::where('podcast_id', session('podcast'))->whereBetween('created_at', [$this->podcast->created_at, Carbon::parse($this->podcast->created_at)->addDays(14)])->count();
        // $this->first30 = PlaysCounter::where('podcast_id', session('podcast'))->whereBetween('created_at', [$this->podcast->created_at, Carbon::parse($this->podcast->created_at)->addDays(30)])->count();
        // $this->first60 = PlaysCounter::where('podcast_id', session('podcast'))->whereBetween('created_at', [$this->podcast->created_at, Carbon::parse($this->podcast->created_at)->addDays(60)])->count();
    }

    public function render()
    {
        return view('livewire.analytics.total-plays');
    }
}
