<?php

namespace App\Livewire\Analytics;

use Livewire\Component;

class DatePicker extends Component
{
    protected $listeners = [
        'updateDates'
    ];

    public function mount()
    {
        if (!session()->exists('range_start')) {
            session()->put('range_start', today()->subDays(7)->startOfDay()->format('m\/d\/Y'));
            session()->put('range_end', today()->endOfDay()->format('m\/d\/Y'));
        }
    }

    public function render()
    {
        return view('livewire.analytics.date-picker');
    }

    public function updateDates($range_start, $range_end)
    {
        session()->put('range_start', $range_start);
        session()->put('range_end', $range_end);
        return redirect()->route('podcast.dashboard');
    }
}
