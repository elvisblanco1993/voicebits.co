<?php

namespace App\Http\Livewire;

use App\Models\Podcast;
use Livewire\Component;

class Sidenav extends Component
{
    public $podcast;

    public function mount()
    {
        $this->podcast = Podcast::findorfail( (int) session('podcast') );
    }

    public function render()
    {
        return view('livewire.sidenav');
    }
}
