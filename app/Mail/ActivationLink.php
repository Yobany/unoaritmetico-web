<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivationLink extends Mailable
{
    use Queueable, SerializesModels;

    public $activationLink;
    public $username;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($activationLink, $name)
    {
       $this->activationLink = $activationLink;
       $this->username = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.activation-link');
    }
}
