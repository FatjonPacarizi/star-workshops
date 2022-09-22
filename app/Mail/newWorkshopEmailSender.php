<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newWorkshopEmailSender extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $workshop_id;
    public $workshop_name;
    public function __construct($workshop_id,$workshop_name)
    {
        $this->workshop_id =  $workshop_id;
        $this->workshop_name =  $workshop_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.onNewWorkshopEmail',['workshop_id'=>$this->workshop_id,'workshop_name'=>$this->workshop_name]);
    }
}
