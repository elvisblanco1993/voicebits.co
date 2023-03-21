<?php

namespace App\Http\Livewire\Show\Import;

use App\Mail\VerifyShowOwnership;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class VerifyEmail extends Component
{
    public $temporary_podcast;

    public function mount()
    {
        if (!$this->temporary_podcast || DB::table('temporary_podcasts')->doesntExist()) {
            return redirect()->route('show.import.start');
        }
    }

    public function save()
    {
        $uniqid = uniqid();

        $podcast = DB::table('temporary_podcasts')->find($this->temporary_podcast);
        DB::table('temporary_podcasts')->where('id', $this->temporary_podcast)->update([
            'magic_code' => $uniqid
        ]);

        Mail::to($podcast->owner_email)->send(new VerifyShowOwnership($podcast->id, $uniqid));

        return redirect()
            ->route('podcast.import.verify', ['temporary_podcast' => $podcast->id])
            ->with('message', 'Please check your email to continue.');
    }

    public function render()
    {
        return view('livewire.show.import.verify-email', [
            'podcast' => DB::table('temporary_podcasts')->find($this->temporary_podcast)
        ]);
    }
}
