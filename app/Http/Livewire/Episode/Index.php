<?php

namespace App\Http\Livewire\Episode;

use App\Models\Podcast;
use Livewire\Component;

class Index extends Component
{
    public $show, $episodes, $podcast;

    public function mount()
    {
        $this->podcast = Podcast::find($this->show);
        $this->episodes = $this->podcast->episodes()->orderBy('published_at', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.episode.index');
    }
}
