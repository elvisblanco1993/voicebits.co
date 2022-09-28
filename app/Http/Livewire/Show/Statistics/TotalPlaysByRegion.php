<?php

namespace App\Http\Livewire\Show\Statistics;

use App\Models\PlaysCounter;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TotalPlaysByRegion extends Component
{
    public $podcast, $mostPopularByRegion;
    public function mount()
    {
        $this->mostPopularByRegion = PlaysCounter::where('podcast_id', $this->podcast)
            ->whereNotNull('country')
            ->select('country', 'region', DB::raw('COUNT(*) as total'))
            ->groupBy('region', 'country')
            ->orderBy('total', 'DESC')
            ->limit(5)
            ->get();
    }
    public function render()
    {
        return view('livewire.show.statistics.total-plays-by-region');
    }
}
