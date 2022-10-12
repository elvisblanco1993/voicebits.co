<?php

namespace App\Http\Livewire\Show\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Delete extends Component
{
    public $podcast, $user;
    public function render()
    {
        return view('livewire.show.user.delete');
    }

    public function removeTeamMember()
    {
        try {
            User::findOrFail($this->user)->podcasts()->detach($this->podcast);
            session()->flash('flash.banner', User::findOrFail($this->user)->name . ' access has been revoked.');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('show.users', ['show' => $this->podcast]);
    }
}
