<?php

namespace App\Providers;

use App\Events\TutorApprovedEvent;
use App\Events\TutorCreatedEvent;
use App\Listeners\SendTutorApprovedEmail;
use App\Listeners\SendTutorApprovedNotification;
use App\Listeners\SendTutorCreatedEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        TutorCreatedEvent::class => [
            SendTutorCreatedEmail::class,
        ],
        TutorApprovedEvent::class => [
            SendTutorApprovedNotification::class,
            SendTutorApprovedEmail::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
