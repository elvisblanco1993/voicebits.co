<?php

namespace App\Http\Livewire\Show;

use App\Models\Podcast;
use Livewire\Component;

class Dashboard extends Component
{
    public $show, $podcast;

    public function mount()
    {
        $this->podcast = Podcast::findorfail($this->show);
    }

    public function render()
    {
        return view('livewire.show.dashboard');
    }
}
