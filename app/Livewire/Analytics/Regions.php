<?php

namespace App\Livewire\Analytics;

use App\Models\Podcast;
use Livewire\Component;
use App\Models\PlaysCounter;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Regions extends Component
{
    public $podcast;

    public function mount()
    {
        $this->podcast = Podcast::findorfail(session('podcast'));
    }

    public function render()
    {
        return view('livewire.analytics.regions', [
            'dbdata' => $this->fetchData()
        ]);
    }

    public function fetchData()
    {
        $data = PlaysCounter::where('podcast_id', $this->podcast->id)
            ->select(DB::raw("country, region, city, COUNT('token') as total"))
            ->whereBetween('created_at', [
                Carbon::parse(session('range_start'))->startOfDay() ?? now()->subDays(7),
                Carbon::parse(session('range_end'))->endOfDay() ?? now()
            ])
            ->groupBy('country')->groupBy('region')->groupBy('city')->orderBy('total', 'DESC')->get();
        return $data->toArray();
    }
}
