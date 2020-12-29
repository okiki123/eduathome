<?php

namespace App\Listeners;

use App\Events\TutorCreatedEvent;
use App\Mail\TutorCreated;
use App\Models\VerificationToken;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendTutorCreatedEmail
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
     * @param  TutorCreatedEvent  $event
     * @return void
     */
    public function handle(TutorCreatedEvent $event)
    {
        self::sendVerifyEmail($event->user);
    }

    public static function sendVerifyEmail($user)
    {
        $now = Carbon::now()->toDateTimeString();

        $expiresAt = Carbon::now()->addHour()->toDateTimeString(); // Expires in an hour

        $token = md5($expiresAt);

        VerificationToken::create(['user_id' => $user->id, 'token' => $token, 'expires_at' => $expiresAt, 'created_at' => $now]);

        $verificationLink = route('verification.verify', ['id' => $user->id, 'hash' => $token]);

        Mail::to($user->email)
            ->send(new TutorCreated($user->firstname, $verificationLink));
    }
}
