<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class drivershipmentConfirm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $shipment_id;
    public $notes;

    public function __construct($shipment_id,$notes)
    {
        $this->shipment_id=$shipment_id;
        $this->notes=$notes;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your next shipment is confirmed!')->view('Mail.drivershipmentconfirm');

    }
}
