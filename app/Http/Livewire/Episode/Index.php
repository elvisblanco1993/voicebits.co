<?php

namespace App\Http\Livewire\Episode;

use App\Models\Podcast;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $show, $podcast, $search = '';

    public function mount()
    {
        $this->podcast = Podcast::findorfail( (int) session('podcast') );
    }

    public function render()
    {
        return view('livewire.episode.index', [
            'episodes' => $this->podcast->episodes()->where('title', 'like', '%'.$this->search.'%')->orderBy('published_at', 'DESC')->paginate(10)
        ])->layout('layouts.app',['podcast' => $this->podcast]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
