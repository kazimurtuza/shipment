<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class driverMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public function __construct($details)
    {
     $this->details=$details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

//        return $this->subject('test mail from Retina soft')->view(email.driverMail);
        return $this->subject('test mail from Retina soft')->view('Mail.driverMail');
//        return $this->subject('test mail from Retina soft')->view('Mail.driverMail')->attach(public_path('../../'.'uploads/1645042816.pdf'));
    }
}
