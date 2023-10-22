<?php

namespace App\Livewire\Episode;

use App\Models\Podcast;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{
    use WithPagination;

    public $podcast, $search = '';

    public function mount()
    {
        $this->podcast = Podcast::findorfail(session('podcast'));
        if (!Gate::allows('view_episodes') || $this->podcast->is_completed) {
            abort(401);
        }
    }

    public function render()
    {
        return view('livewire.episode.index', [
            'episodes' => $this->podcast->episodes()->where('title', 'like', '%'.$this->search.'%')->orderBy('published_at', 'DESC')->paginate(10)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
