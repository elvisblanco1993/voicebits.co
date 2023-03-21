<?php

namespace App\Http\Livewire\Show\User;

use App\Models\Podcast;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitePodcastTeamMember;
use Illuminate\Support\Facades\Log;

class Invite extends Component
{
    public $modal, $email, $podcast_permissions, $permissions = [];

    public function mount(Podcast $podcast)
    {
        $this->podcast = $podcast;
        $this->podcast_permissions = config('auth.podcast_permissions');
    }

    public function render()
    {
        return view('livewire.show.user.invite');
    }

    public function invite()
    {
        $this->validate([
            'email' => 'required|email|unique:podcast_invitations,email',
            'permissions' => 'required'
        ]);

        try {
            DB::table('podcast_invitations')->insert([
                'podcast_id' => $this->podcast->id,
                'email' => $this->email,
                'permissions' => json_encode($this->permissions),
            ]);
            Mail::to($this->email)->send(new InvitePodcastTeamMember($this->podcast->name));
            session()->flash('flash.banner', 'An invitation has been sent to ' . $this->email . '.');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            session()->flash('flash.banner', 'Oops! Something happened on our end, and we could not send your invitation to ' .$this->email . '. Please try again later.');
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('podcast.team');
    }
}
