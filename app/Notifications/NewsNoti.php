<?php

namespace App\Notifications;

use Faker\Provider\ar_EG\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Faker;

class NewsNoti extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    private $message;
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->from('admin@gmail.com', 'Chuyển đổi số doanh nghiệp An Giang')
            ->greeting($this->message['greeting'])
            ->line($this->message['body'])
            ->action($this->message['actionText'], url($this->message['actionUrl']))
            ->line($this->message['lastline']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
