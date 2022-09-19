<?php

namespace App\Http\Livewire\Show\User;

use App\Models\Podcast;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $show, $podcast, $search = '';
    public function mount()
    {
        $this->podcast = Podcast::find($this->show);
    }
    public function render()
    {
        return view('livewire.show.user.index', [
            'users' => $this->podcast->users()->where('name', 'like', '%' . $this->search . '%')->paginate(10)
        ]);
    }
}
