<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyNewPlan extends Mailable
{
    use Queueable, SerializesModels;
    
    public $plan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct($plan)
    {
        $this->plan = $plan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'tuananh09031997@gmail.com';
        $subject = 'New plan!';
        $name    = 'HR team';
        
        return $this->view('email.index')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->subject($subject)
                    ->with(['plans' => $this->plan]);
   }
}
