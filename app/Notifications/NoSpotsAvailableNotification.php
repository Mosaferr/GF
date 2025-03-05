<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NoSpotsAvailableNotification extends Notification
{
    use Queueable;
    /*** Get the notification's delivery channels.
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /*** Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                ->subject('Brak wolnych miejsc')
                ->line('Niestety, nie ma już wolnych miejsc na wybraną wyprawę.')
                ->line('Dziękujemy za zainteresowanie i zapraszamy do skorzystania z innych ofert.');
    }
}
