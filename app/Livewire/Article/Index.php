<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.article.index', [
            'articles' => Article::where('title', 'like', '%' . $this->search . '%')
                ->paginate(10),
        ]);
    }
}
