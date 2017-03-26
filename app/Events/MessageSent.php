<?php

namespace Acacha\TodosBackend\Events;

use Acacha\TodosBackend\Message;
use Acacha\TodosBackend\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use NotificationChannels\Gcm\GcmChannel;
use NotificationChannels\Gcm\GcmMessage;

/**
 * Class MessageSent.
 *
 * @package Acacha\TodosBackend\Events
 */
class MessageSent extends Notification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public $message;

    /**
     * MessageSent constructor.
     *
     * @param $user
     * @param $message
     */
    public function __construct(User $user, Message $message)
    {
        $this->user = $user;
        $this->message = $message;
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

    /**
     * @param $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [GcmChannel::class];
    }

    /**
     * @param $notifiable
     * @return mixed
     */
    public function toGcm($notifiable)
    {
        return GcmMessage::create()
            ->badge(1)
            ->title($this->user->name)
            ->message($this->message->message)
            ->priority(GcmMessage::PRIORITY_HIGH);
    }
}
