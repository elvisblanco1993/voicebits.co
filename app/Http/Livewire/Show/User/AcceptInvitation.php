<?php

namespace App\Http\Livewire\Show\User;

use App\Models\User;
use App\Models\Podcast;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AcceptInvitation extends Component
{
    public $podcast_id;
    public $user_email;

    public function mount($podcast, $user)
    {
        $this->podcast_id = $podcast;
        $this->user_email = $user;
    }

    public function render()
    {
        return view('livewire.show.user.accept-invitation');
    }

    public function acceptInvitation()
    {
        try {
            $invitation = DB::table('podcast_invitations')->where('podcast_id', $this->podcast_id)->where('email', $this->user_email);
            if ($invitation->exists()) {
                auth()->user()->podcasts()->attach($this->podcast_id, [
                    'permissions' => $invitation->first()->permissions
                ]);
                $invitation->delete();
            }
            session()->flash('flash.banner', "You have joined " . Podcast::findOrFail($this->podcast_id)->name . "'s team.");
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            session()->flash('flash.banner', 'Oops! Something happened on our end, and we could not process your request. Please try again later.');
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('shows');
    }
}
