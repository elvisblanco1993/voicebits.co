<?php

namespace App\Http\Livewire\Show;

use Livewire\Component;

class Selector extends Component
{
    public $podcasts;

    public function mount()
    {
        $this->podcasts = auth()->user()->podcasts;
    }

    public function render()
    {
        return view('livewire.show.selector');
    }
}
