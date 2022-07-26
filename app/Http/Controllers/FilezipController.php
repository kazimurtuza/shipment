<?php

namespace App\Http\Controllers;

use App\Models\shipment;
use File;
use Illuminate\Http\Request;
use ZipArchive;

class FilezipController extends Controller
{

    public function downloadZip($id)
    {
        $invoice_id= $id;
        $zip = new ZipArchive;

       $file_path='uploads/Inv-No-'.$invoice_id;
        $fileName = 'uploads/Dispatcher-INV-No-'.$invoice_id.'.'.'zip';
        //   return $fileName;

        if ($zip->open(public_path('../../'.$fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('../../'.$file_path));

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }
     

        return response()->download(public_path('../../'.$fileName));
    }


    public function downloadallfile(Request $request){
        $id=shipment::find($request->ship_id_wn)->invoice_no;
        $invoice_id= $id;
        $zip = new ZipArchive;

        $file_path='uploads/Inv-No-'.$invoice_id;
        $fileName = 'uploads/Dispatcher-INV-No-'.$invoice_id.'.'.'zip';
        //   return $fileName;

        if ($zip->open(public_path('../../'.$fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('../../'.$file_path));

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }


        return response()->download(public_path('../../'.$fileName));
    }







    public function download_view_file(Request $request){

       $stay=0;

        $shipment_id=$request->shipment_id;
        $inv_id=shipment::where('id',$shipment_id)->first()->invoice_no;

        $invoice_id= $inv_id;
        $zip = new ZipArchive;

        if($request->status=='proof-download'){
            $file_path='uploads/Inv-No-'.$invoice_id;
            $fileName = 'uploads/Proof-delivery-INV-No-'.$invoice_id.'.'.'zip';
            //   return $fileName;

            if ($zip->open(public_path('../../'.$fileName), ZipArchive::CREATE) === TRUE)
            {
                $files = File::files(public_path('../../'.$file_path));
                $txtdata='Inv-No-'.$invoice_id;
                foreach ($files as $key => $value) {

                    $relativeNameInZipFile = basename($value);

                    $pieces = explode($txtdata, $relativeNameInZipFile)[0];

                    $filename= explode("_id", $pieces)[0];


                    if($filename=='Proof_of_Delivery'){
                        $stay=1;

                        $zip->addFile($value, $relativeNameInZipFile);
                    }


                }

                $zip->close();
            }
            if($stay){
                return response()->download(public_path('../../'.$fileName));
            }else{
                return redirect()->back()->with('error','Sorry This File is Not Available Now');
            }

        }
        if($request->status=='lading-download'){
            $file_path='uploads/Inv-No-'.$invoice_id;
            $fileName = 'uploads/Bill-of-Lading-INV-No-'.$invoice_id.'.'.'zip';
            //   return $fileName;

            if ($zip->open(public_path('../../'.$fileName), ZipArchive::CREATE) === TRUE)
            {
                $files = File::files(public_path('../../'.$file_path));
                $txtdata='Inv-No-'.$invoice_id;
                foreach ($files as $key => $value) {

                    $relativeNameInZipFile = basename($value);

                    $pieces = explode($txtdata, $relativeNameInZipFile)[0];

                    $filename= explode("_id", $pieces)[0];


                    if($filename=='Bill_of_Lading'){
                        $stay=1;

                        $zip->addFile($value, $relativeNameInZipFile);
                    }


                }

                $zip->close();
            }

            if($stay){
                return response()->download(public_path('../../'.$fileName));
            }else{
                return redirect()->back()->with('error','Sorry This File is Not Available Now');
            }
        }
        if($request->status=='Rate_Confir-download'){
            $file_path='uploads/Inv-No-'.$invoice_id;
            $fileName = 'uploads/Rate_Confirmation-INV-No-'.$invoice_id.'.'.'zip';
            //   return $fileName;

            if ($zip->open(public_path('../../'.$fileName), ZipArchive::CREATE) === TRUE)
            {
                $files = File::files(public_path('../../'.$file_path));
                $txtdata='Inv-No-'.$invoice_id;
                foreach ($files as $key => $value) {

                    $relativeNameInZipFile = basename($value);


                    $pieces = explode('.', $relativeNameInZipFile)[0];


                    if($pieces=='Rate_Confirmation'){
                        $stay=1;

                        $zip->addFile($value, $relativeNameInZipFile);
                    }


                }

                $zip->close();
            }
            if($stay){
                return response()->download(public_path('../../'.$fileName));
            }else{
                return redirect()->back()->with('error','Sorry This File is Not Available Now');
            }

        }

        if($request->status=='Download-Inv'){
            $file_path='uploads/Inv-No-'.$invoice_id;

            $fileName = 'uploads/Inv-No-'.$invoice_id.'/invoice.pdf';
            $inv__path= public_path('../../'.$fileName);

            $stay=1;

//            if (file_exists($inv__path)) {
//                $message = "The file $fileName exists";
//            } else {
//                $stay=1;
//            }


            //   return $fileName;

//            if ($zip->open(public_path('../../'.$fileName), ZipArchive::CREATE) === TRUE)
//            {
//                $files = File::files(public_path('../../'.$file_path));
//                $txtdata='Inv-No-'.$invoice_id;
//                foreach ($files as $key => $value) {
//
//                    $relativeNameInZipFile = basename($value);
//
//
//                    $pieces = explode('.', $relativeNameInZipFile)[0];
//
//
//                    if($pieces=='invoice'){
//                        $stay=1;
//
//                        $zip->addFile($value, $relativeNameInZipFile);
//                    }
//
//
//                }
//
//                $zip->close();
//            }
            if($stay){
                return response()->download(public_path('../../'.$fileName));
            }else{
                return redirect()->back()->with('error','Sorry this File is not Available Now');
            }

        }

    }
}
