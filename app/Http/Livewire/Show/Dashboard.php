<?php

namespace App\Http\Livewire\Show;

use App\Models\Podcast;
use Livewire\Component;

class Dashboard extends Component
{
    public $podcast;

    public function mount()
    {
        $this->podcast = Podcast::find( (int) session('podcast') );
    }

    public function render()
    {
        return view('livewire.show.dashboard');
    }
}
