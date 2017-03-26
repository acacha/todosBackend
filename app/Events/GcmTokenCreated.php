<?php

namespace Acacha\TodosBackend\Events;

use Acacha\TodosBackend\GcmToken;
use Acacha\TodosBackend\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * Class GcmTokenCreated.
 *
 * @package Acacha\TodosBackend\Events
 */
class GcmTokenCreated extends Notification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public $token;

    /**
     * GcmTokenCreated constructor.
     *
     * @param $user
     * @param $token
     */
    public function __construct(User $user, GcmToken $token)
    {
        $this->user = $user;
        $this->message = $token;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chat');
    }

}
