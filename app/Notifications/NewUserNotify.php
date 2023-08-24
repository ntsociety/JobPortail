<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserNotify extends Notification implements ShouldQueue
{
    use Queueable;
    private $user;
    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->user= $user;
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
                    ->line('Salut ' . $this->user->name. ' ! nous vous remercions pour votre confiance en nous. Le moyen le plus simple d\'obtenir l\'emploi de vos rêves !')
                    ->action('Cliquer ici', url('/'))
                    ->line('Merci de nous avoir choisi!');
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
