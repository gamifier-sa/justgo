<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyUpdatedEmailMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $username;
    public function __construct($user,$username)
    {
        $this->user = $user;
        $this->username = $username;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $image = env('APP_URL')."website/assets/img/logo-white.png";->with(['image' => $image])
        return $this->subject(trans('admin.verifyAccounts'))
        ->view('Emails.VerifyUpdatedEmail')
        ->from('info@theMap.com');
    }
}
