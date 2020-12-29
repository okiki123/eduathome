<?php

namespace App\Events;

use App\Models\Admin;
use App\Models\Caregiver;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TutorApprovedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $admin;
    public $user;

    /**
     * Create a new event instance.
     *
     * @param Admin $admin
     * @param Caregiver $user
     */
    public function __construct(Admin $admin, Caregiver $user)
    {
        $this->admin = $admin;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
