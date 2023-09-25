<?php

namespace App\Livewire\Show\User;

use App\Models\User;
use App\Models\Podcast;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Edit extends Component
{
    public $modal, $podcast, $user, $podcast_permissions, $permissions = [];

    public function mount(Podcast $podcast, User $user)
    {
        $this->podcast = $podcast;
        $this->user = $user;
        $this->permissions = json_decode($this->podcast->users()->findOrFail($this->user->id)->pivot->permissions);
        $this->podcast_permissions = config('auth.podcast_permissions');
    }

    public function render()
    {
        return view('livewire.show.user.edit');
    }

    public function save()
    {
        $this->validate([
            'permissions' => 'required',
        ]);

        try {
            $this->user->podcasts()->updateExistingPivot($this->podcast->id, [
                'permissions' => json_encode($this->permissions)
            ]);
            session()->flash('flash.banner', 'Permissions updated!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            session()->flash('flash.banner', 'Oops! Something happened on our end, and we could not update the user\'s permissions. Please try again later.');
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('podcast.team');
    }
}
