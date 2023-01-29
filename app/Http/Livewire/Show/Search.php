<?php

namespace App\Http\Livewire\Show;

use App\Models\Podcast;
use Livewire\Component;

class Search extends Component
{
    public $term = '', $results;

    public function render()
    {
        return view('livewire.show.search');
    }

    public function search()
    {
        $this->results = auth()->user()->podcasts()->where('name', 'like', '%'.$this->term.'%')->get();
    }
}
