<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class shipmentConfirm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $shipment_id;

    public function __construct($shipment_id)
    {
        $this->shipment_id=$shipment_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->subject('Your shipment is confirmed and assigned to a driver!')->view('Mail.shipmentconfirm');
    }
}
