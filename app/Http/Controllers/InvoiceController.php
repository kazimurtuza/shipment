<?php

namespace App\Http\Controllers;

use App\Mail\customermail;
use App\Models\customer_agent;
use App\Models\inv_attachmentlist;
use App\Models\invoice;
use App\Models\shipment;
use Illuminate\Http\Request;
use Twilio\TwiML\Voice\Redirect;

use PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use DB;

class InvoiceController extends Controller
{
    public function stor_invoice(Request $request){
        $proof_send= $request->proof_send ?? 0;
        $bill_send=$request->bill_send ?? 0;
        $rate_send=$request->rate_send ?? 0;


         //invoice fileupload

          if($request->emailattfile){
            $invoice_number=shipment::find($request->shipid)->invoice_no;
            foreach($request->emailattfile as $key=>$filedata){
                $randomnum=rand();
                $uploadfile_path = 'uploads/Inv-No-' . $invoice_number;
                $fileName = $randomnum. '.' . $filedata->extension();
                $filedata->move($uploadfile_path, $fileName);
                $path = 'uploads/Inv-No-' . $invoice_number . '/' . $fileName;
                $data_attc=new inv_attachmentlist();
                $data_attc['attachment']=$path;
                $data_attc['shipment_id']=$request->shipid;
                $data_attc['filename']=$fileName;
                $data_attc->save();
            }
        }

        if($request->amount){
            foreach ($request->amount as $key=>$value){
                $data=new invoice();
                $data->discription=$request->discription[$key];
                $data->qty=$request->qty[$key];
                $data->unitprice=$request->unitprice[$key];
                $data->amount=$request->amount[$key];
                $data->status=1;
                $data->shipment_id=$request->shipid;
                $data->save();
            }
        }
        $is_cancel=0;

          //--create invoice PDF
              $this->createvoice_pdf($request->shipid,$is_cancel);
         //--create invoice PDF End


       if($request->save_and_exit=="Save and Exit"){
           shipment::with('id',$request->shipid)->update(['proof_send'=>$proof_send,'bill_send'=>$bill_send,'rate_send'=>$rate_send]);
           return \redirect()->back()->with('success', 'Successfully invoice updated');
       }
      elseif ($request->save_and_exit=="Submit"){
          $shipment_info_data=shipment::with('invattachlist')->with('getshipmentcancel')->find($request->shipid);

          if($shipment_info_data->proof_send==1){
              if($shipment_info_data->proof_of_delivery==''){
                  return redirect()->back()->with('error', 'Proof of Delivery File Not Found for Send Mail.Please Upload file First');
              }
          }

          if($shipment_info_data->bill_send==1){
              if($shipment_info_data->bill_of_lading==''){
                  return redirect()->back()->with('error', 'Bill of Lading File Not Found for Send Mail.Please Upload file First');

              }

          }
          if($shipment_info_data->rate_send==1){
              if($shipment_info_data->rate_confirmation==''){
                  return redirect()->back()->with('error', 'Rate confirmation File Not Found for Send Mail.Please Upload file First');

              }
          }
//        $agetent_id=shipment::where('id',$request->shipid)->get()->first()->agent_id;
//
//          $agetent_email=customer_agent::where('id',$agetent_id)->first()->agent_email;


          $forpick=1;$fordelivery=1;$inv=1;
           Mail::to($request->submit_to)->cc($request->cc)->send(new customermail($shipment_info_data,$forpick,$fordelivery,$inv));

          shipment::where('id',$request->shipid)->update(['is_invoice_submit'=>1]);
          shipment::with('id',$request->shipid)->update(['proof_send'=>$proof_send,'bill_send'=>$bill_send,'rate_send'=>$rate_send]);

          return \redirect()->back()->with('success', 'Successfully Mail Submitted');
      }

    }

    public function createvoice_pdf($ship_id,$is_cancel){

        $shipment_info=shipment::find($ship_id);
        $invtblist=$shipment_info->invoicedetail;

        $fiel_path_get=$shipment_info;

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'form'=>$shipment_info->form,
            'to'=>$shipment_info->to,
            'id'=>$ship_id,
            'shipment_id'=>$shipment_info->invoice_no,
            'load'=>$shipment_info->load,
            'bid'=>$shipment_info->bid_price,
            'delivery'=>date('m-d-Y',strtotime($shipment_info->actual_delivery_date)),
            'pickup'=>date('m-d-Y',strtotime($shipment_info->actual_pickup_date)) ,
            'custiomer_name'=>$shipment_info->getcustomer->company_name,
            'custiomer_email'=>$shipment_info->getcustomer->company_name,
            'date' => date('m/d/Y'),
            'invtblist'=>$invtblist,
            'is_cancel'=>$is_cancel,
        ];


        $pdf = PDF::loadView('invoicepdf', $data);

        $pathdatainvo='Inv-No-'.$fiel_path_get->invoice_no.'/'.'invoice.pdf';

        $content = $pdf->download()->getOriginalContent();

        Storage::disk('public_path')->put($pathdatainvo,$content);

        return true;

    }









    public function deleteinvlist(Request $request){

        invoice::where('id',$request->id)->delete();

        return 'success';

    }
}
