<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitePodcastTeamMember extends Mailable
{
    use Queueable, SerializesModels;
    public $podcast_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($podcast_name)
    {
        $this->podcast_name = $podcast_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.invite-podcast-team-member')->subject($this->podcast_name);
    }
}
