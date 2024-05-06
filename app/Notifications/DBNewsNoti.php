<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DBNewsNoti extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $news;
    public function __construct($news)
    {
        $this->news = $news;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)->line($this->news['name']);
            // ->from('admin@gmail.com', 'Chuyển đổi số doanh nghiệp An Giang')
            // ->greeting($this->news['greeting'])
            // ->line($this->news['body'])
            // ->action($this->news['actionText'], url($this->message['actionUrl']))
            // ->line($this->news['lastline']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'name' => $this->news
        ];
    }
}
