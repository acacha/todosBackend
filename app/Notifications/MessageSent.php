<?php

namespace Acacha\TodosBackend\Notifications;

use Acacha\TodosBackend\Message;
use Acacha\TodosBackend\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Gcm\GcmChannel;
use NotificationChannels\Gcm\GcmMessage;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

/**
 * Class MessageSent
 *
 * @package Acacha\TodosBackend\Notifications
 */
class MessageSent extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;

    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Message $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [GcmChannel::class , TelegramChannel::class ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //TODO
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            $this->user,
            $this->message
        ];
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
            ->data('message',$this->message )
            ->data('user',$this->user);
    }

    /**
     * @param $notifiable
     * @return mixed
     */
    public function toOneSignal($notifiable)
    {
        return OneSignalMessage::create()
            ->subject($this->user)
            ->body($this->message);
    }

    /**
     * To telegram.
     *
     * @param $notifiable
     * @return mixed
     */
    public function toTelegram($notifiable)
    {
        $url = url('/messages/' . $this->message->id);

        return TelegramMessage::create()
            ->to('@2dam1617')
            ->content($this->message->message) // Markdown supported.
            ->button('View message', $url); // Inline Button
    }
}
