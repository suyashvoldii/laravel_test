<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailResetRequest extends Mailable
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
        
        
        $mail = $this;
     
      
        if (!is_null($this->details['link'])) {
            $mail->view('emails.resetrequestmail', ['name' => 'Suyash', 'link'=> $this->details['link']])
            ->subject('reset link');
        } else{
            $mail->view('emails.resetMail', ['name' => 'Suyash'])
            ->subject('password reset alert ');
        }
        return $mail;
    
    
   }

}
