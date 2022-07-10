<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyShowOwnership extends Mailable
{
    use Queueable, SerializesModels;
    public $podcast, $uniqid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($podcast_id, $uniqid)
    {
        $this->podcast = DB::table('temporary_podcasts')->find($podcast_id);
        $this->uniqid = $uniqid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.verify-show-ownership')
            ->subject("Verify ownership of your show Voicebits.");
    }
}
