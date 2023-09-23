<?php

namespace App\Livewire\Show\User;

use App\Models\Podcast;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    use WithPagination;
    public $show, $podcast, $search = '';
    public function mount()
    {
        $this->podcast = Podcast::find(session('podcast'));
    }
    public function render()
    {
        return view('livewire.show.user.index', [
            'invitations' => DB::table('podcast_invitations')->where('podcast_id', $this->podcast->id)->where('email', 'like', '%' . $this->search . '%')->get(),
            'users' => $this->podcast->users()->where('name', 'like', '%' . $this->search . '%')->paginate(10)
        ]);
    }
}
