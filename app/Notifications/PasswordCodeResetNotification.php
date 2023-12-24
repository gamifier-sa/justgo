<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class PasswordCodeResetNotification extends Notification
{
    use Queueable;
    public $token;
//    public $routeAfterReset;

    /**
     * Create a new notification instance.
     *
     * @param $token
     * @param $routeAfterReset
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
//        $this->routeAfterReset = $routeAfterReset;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }


    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('elmarsid@gamifiersa.com')
            ->subject(trans('Confirmation Code Notification'))
            ->line(trans('You are receiving this email because we received a confirmation code request for your account.'))
            ->line(trans('admin.your_activation_code',['code' => $this->token]))

            ->line(trans('This confirmation  code will expire in :count minutes.',
                ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]));

    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
