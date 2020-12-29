<?php

namespace App\Listeners;

use App\Events\TutorApprovedEvent;
use App\Mail\TutorApproved;
use App\Mail\TutorCreated;
use App\Models\VerificationToken;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendTutorApprovedEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TutorApprovedEvent  $event
     * @return void
     */
    public function handle(TutorApprovedEvent $event)
    {
        self::sendApprovedEmail($event->user);
    }

    public static function sendApprovedEmail($user)
    {
        Mail::to($user->user->email)
            ->send(new TutorApproved($user->firstname));
    }
}
