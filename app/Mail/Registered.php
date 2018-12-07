<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Registered extends Mailable
{
    use Queueable, SerializesModels;
    public $event;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event, $user)
    {
        $this->event = $event;
        $this->user = $user;

    }
    /**
     * Build the message.
     *and uses the markdown template emails.registered
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.registered')->subject('Deelname aan evenement');
    }
}
