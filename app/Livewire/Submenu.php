<?php

namespace App\Livewire;

use App\Models\Podcast;
use Livewire\Component;

class Submenu extends Component
{
    public $podcast;

    public function mount()
    {
        $this->podcast = Podcast::findorfail(session('podcast'));
    }

    public function render()
    {
        return view('livewire.submenu');
    }
}
