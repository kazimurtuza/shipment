<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use File;
use ZipArchive;

class customermail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $details;
    public $forpick;
    public $fordelivery;
    public $inv;

    public function __construct($data,$forpick,$fordelivery,$inv)
    {
        $this->details=$data;
        $this->forpick=$forpick;
        $this->fordelivery=$fordelivery;
        $this->inv=$inv;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $invoice_path="uploads/Inv-No-".$this->details['invoice_no']."/invoice.pdf";

        $inv_no=$this->details->invoice_no;


//        if($this->forpick==1){
//            $this->zifile($inv_no,'Bill_of_Lading','Bill-of-Lading-INV-No-');
//        }
//
//        if($this->fordelivery==1){
//        $this->zifile($inv_no,'Proof_of_Delivery','Bill-of-Lading-INV-No-');
//        }


        $subject="Invoice".$this->details->invoice_no."- Load# (".$this->details->load.")";
        $email = $this->view('Mail.customermail')->subject($subject);

        if($this->forpick==1){
           $delizip= $this->zifile($inv_no,'Bill_of_Lading','Bill-of-Lading-INV-No-');
            $email->attach(public_path('../../'.$delizip));
        }
        if($this->fordelivery==1){
           $delizip= $this->zifile($inv_no,'Proof_of_Delivery','uploads/Proof-delivery-INV-No-');
            $email->attach(public_path('../../'.$delizip));
        }
        if($this->inv==1){
            $email->attach(public_path('../../'.$invoice_path));
        }


//        $email->attach(public_path('../../'.$invoice_path));
//        foreach ($this->details->invattachlist as $attachlist){
//            $email->attach(public_path('../../'.$attachlist->attachment));
//        }
//        if($this->details['bill_send']==1){
//            $email->attach(public_path('../../'.$this->details['bill_of_lading']));
//        }




        return $email;
    }

    function zifile($invoice_id,$srcfilename,$dirname){
            $file_path='uploads/Inv-No-'.$invoice_id;
            $fileName = $dirname.$invoice_id.'.'.'zip';
            $zip = new ZipArchive;
            $stay=false;

            if ($zip->open(public_path('../../'.$fileName), ZipArchive::CREATE) === TRUE)
            {
                $files = File::files(public_path('../../'.$file_path));
                $txtdata='Inv-No-'.$invoice_id;
                foreach ($files as $key => $value) {

                    $relativeNameInZipFile = basename($value);

                    $pieces = explode($txtdata, $relativeNameInZipFile)[0];

                    $filename= explode("_id", $pieces)[0];


                    if($filename==$srcfilename){
                        $stay=1;

                        $zip->addFile($value, $relativeNameInZipFile);
                    }


                }

                $zip->close();
            }

            if($stay){
                return $fileName;
            }
    }
}
