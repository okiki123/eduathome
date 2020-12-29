<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TutorCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $firstName;
    public $verificationLink;

    /**
     * Create a new message instance.
     *
     * @param $firstName
     * @param $verificationLink
     */
    public function __construct($firstName, $verificationLink)
    {
        $this->firstName = $firstName;
        $this->verificationLink = $verificationLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.verify')->subject('Welcome to Edu@Home');
    }
}
