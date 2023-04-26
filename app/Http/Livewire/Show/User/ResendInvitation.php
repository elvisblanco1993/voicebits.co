<?php

namespace App\Http\Livewire\Show\User;

use App\Models\Podcast;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitePodcastTeamMember;

class ResendInvitation extends Component
{
    public $podcast_id, $email;

    public function render()
    {
        return view('livewire.show.user.resend-invitation');
    }

    public function resend()
    {
        try {
            Mail::to($this->email)->send(new InvitePodcastTeamMember(
                    Podcast::findOrFail($this->podcast_id)->name
                )
            );
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
