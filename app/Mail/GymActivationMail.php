<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GymActivationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $gymOwnerName;
    public $gymName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($gymOwnerName, $gymName)
    {
        $this->gymOwnerName = $gymOwnerName;
        $this->gymName = $gymName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Gym Activation Notification')
            ->view('dashboard.mails.gymActivation'); // Create a corresponding Blade view in the 'resources/views/emails' directory
    }
}
