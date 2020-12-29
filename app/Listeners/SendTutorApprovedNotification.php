<?php

namespace App\Listeners;

use App\Events\TutorApprovedEvent;
use App\Models\Notification;
use App\Models\NotificationType;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTutorApprovedNotification
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
        $this->createApprovedTutorNotification($event->admin, $event->user);
    }

    public function createApprovedTutorNotification($admin, $user)
    {
        $data = [
            'message' => 'Congratulations your has account has been approved',
            'url' => route('dashboard.profile', ['id' => $user->id]),
            'category' => 'success'
        ];


        Notification::create([
            'type' => NotificationType::TUTOR_APPROVED,
            'data' => json_encode($data),
            'user_id' => $user->user->id,
            'fired_by_admin' => $admin->id,
            'created_at' => Carbon::now()
        ]);
    }
}
