<?php

namespace App\Http\Livewire\Show\User;

use Livewire\Component;

class Invite extends Component
{
    public $modal, $email, $permissions = [];

    public function render()
    {
        return view('livewire.show.user.invite');
    }
}
