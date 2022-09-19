<?php

namespace App\Http\Livewire\Show\User;

use Livewire\Component;

class Invite extends Component
{
    public $modal, $email, $podcast_permissions, $permissions = [];

    public function mount()
    {
        $this->podcast_permissions = config('auth.podcast_permissions');
    }

    public function render()
    {
        return view('livewire.show.user.invite');
    }
}
