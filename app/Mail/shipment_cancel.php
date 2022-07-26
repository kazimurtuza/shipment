<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class shipment_cancel extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $details;
    public function __construct($data)
    {
        $this->details=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $invoice_path="uploads/Inv-No-".$this->details['invoice_no']."/invoice.pdf";
        $subject="Invoice".$this->details->invoice_no."- Load# (".$this->details->load.")";
//        $email = $this->view('Mail.customermail')->subject($subject);
        $email = $this->view('Mail.shipment_cancel')->subject($subject);

        $email->attach(public_path('../../'.$invoice_path));
        return $email;
    }
}
