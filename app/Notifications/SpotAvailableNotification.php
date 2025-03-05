<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SpotAvailableNotification extends Notification
{
    use Queueable;

    /*** Get the notification's delivery channels.
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /*** Get the mail representation of the notification.
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->subject('Wolne miejsce dostępne')
                ->line('Mamy dla Ciebie wolne miejsce.')
                ->line('Wypełnij jeszcze jeden formularz i dokonaj wpłaty.')
                ->line('Witamy w grupie!');
    }
}
