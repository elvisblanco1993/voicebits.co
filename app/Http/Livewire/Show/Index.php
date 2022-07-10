<?php

namespace App\Http\Livewire\Show;

use App\Models\Podcast;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.show.index', [
            'podcasts' => Podcast::search($this->search)->where('team_id', Auth::user()->currentTeam->id)->get()
        ]);
    }
}
