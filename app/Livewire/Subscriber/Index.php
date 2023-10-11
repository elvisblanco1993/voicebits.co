<?php

namespace App\Livewire\Subscriber;

use App\Models\Podcast;
use Livewire\Component;

class Index extends Component
{
    public $podcast;

    public function mount()
    {
        $this->podcast = Podcast::findorfail(session('podcast'));
    }

    public function render()
    {
        return view('livewire.subscriber.index');
    }
}
