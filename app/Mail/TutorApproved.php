<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TutorApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $firstName;

    /**
     * Create a new message instance.
     * @param $firstName
     */
    public function __construct($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.account-approved')->subject('Your Account has been Approved');
    }
}
