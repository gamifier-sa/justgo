<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailSubscriptionExpiration extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
   /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//log()->info('Teting');
//Log::info('Testing From Mail');
        $image = env('APP_URL')."/admin/dist/img/logo-white.png";
//log()->info($image);        
return $this->view('Subscription_Expiration')->with(['image'=>$image])->subject('Subscription Expiration in weekly Courses')
        ->from('mapthe80@gmail.com');
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
