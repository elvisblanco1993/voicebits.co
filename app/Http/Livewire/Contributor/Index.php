<?php

namespace App\Http\Livewire\Contributor;

use App\Models\Podcast;
use Livewire\Component;

class Index extends Component
{
    public $podcast, $contributors;

    public function mount()
    {
        $this->podcast = Podcast::findorfail( (int) session('podcast') );
        $this->contributors = $this->podcast->contributors;
    }

    public function render()
    {
        return view('livewire.contributor.index');
    }
}
