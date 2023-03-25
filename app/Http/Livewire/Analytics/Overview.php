<?php

namespace App\Http\Livewire\Analytics;

use App\Models\Podcast;
use Livewire\Component;
use App\Models\PlaysCounter;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Overview extends Component
{
    public $podcast;

    public function mount()
    {
        $this->podcast = Podcast::findorfail(session('podcast'));
    }

    public function render()
    {
        return view('livewire.analytics.overview', [
            'dbdata' => $this->fetch(),
        ]);
    }

    public function fetch()
    {
        $data = PlaysCounter::where('podcast_id', $this->podcast->id)
            ->select(DB::raw('DATE_FORMAT(created_at, "%b %D") as dateformatted, count(token) as downloads'))
            ->whereBetween('created_at', [Carbon::parse(session('range_start'))->startOfDay() ?? now()->subDays(7), Carbon::parse(session('range_end'))->endOfDay() ?? now()])
            ->groupBy('dateformatted')->orderBy('dateformatted')->get();
        return $data->toArray();
    }
}
