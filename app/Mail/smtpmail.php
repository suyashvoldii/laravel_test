<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class smtpmail extends Mailable
{
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        
        $mail = $this
        ->subject('Thank you for subscribing to our newsletter ')
        ->view('emails.testMail', ['name' => 'Suyash']);
        if (!is_null($this->details['file'])) {
            $mail->attach($this->details['file']->getRealPath(),[
                'as' => $this->details['file']->getClientOriginalName()
            ]);
        }   
        return $mail;
    
    
   }

}
