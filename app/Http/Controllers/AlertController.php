<?php

namespace App\Http\Controllers;

use App\Mail\alertmail;
use App\Mail\customermail;
use App\Models\alert;
use App\Models\customer;
use App\Models\customer_agent;
use App\Models\shipment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AlertController extends Controller
{
    //AlertInfoInsert --class name declaration
    //alertInfoInsert --method/function name declaration
    //variable name declaration -- $file_path_get / $filePathGet
    public function alert_info_insert(Request $request)
    {
        DB::beginTransaction();
        try {

            $fiel_path_get=shipment::where('id',$request->shipment_id1)->first();
            if($request->status_type==2){
                if($fiel_path_get->proof_of_delivery==''){
                    return response()->json(['status' => 501, 'message'=>'Proof of Delivery File Not Found for Send Mail.Please Upload file First']);
                    return redirect()->back()->with('error', 'Proof of Delivery File Not Found for Send Mail.Please Upload file First');
                }
                if($fiel_path_get->bill_of_lading==''){
                    return response()->json(['status' => 501, 'message'=>'Bill of Lading File Not Found for Send Mail.Please Upload file First']);
                    return redirect()->back()->with('error', 'Bill of Lading File Not Found for Send Mail.Please Upload file First');
                }

            }
            if($request->status_type==1){
                $update_time=shipment::where('id',$request->shipment_id1)->update([
                    'actual_pickup_date'=>$request->date,
                    'actual_pickup_time'=>$request->time,
                ]);

            }

            if($request->status_type==2){

                $update_time=shipment::where('id',$request->shipment_id1)->update([
                    'actual_delivery_date'=>$request->date,
                    'actual_delivery_time'=>$request->time,
                ]);


            }

            if($request->file_type==1){

                if($fiel_path_get->bill_of_lading==''){
                    return response()->json(['status' => 501, 'message'=>'Bill of Lading File Not Found for Send Mail.Please Upload file First']);
                    return redirect()->back()->with('error', 'Bill of Lading File Not Found for Send Mail.Please Upload file First');

                }
                else{

                    $bol_details=[
                        'subject'=>'Your shipment has been picked up!',
                        'title'=>'Your shipment has been picked up!',
                        'shipment_inv_no'=>$fiel_path_get->invoice_no,
                        'type'=>'DOL',
                        'bol_file_path'=>$fiel_path_get->bill_of_lading,
                    ];
                    $this->sendmaildata($request,$bol_details);
                }
            }
            if($request->file_type==2){
                if($fiel_path_get->proof_of_delivery==''){
                    return response()->json(['status' => 501, 'message'=>'Proof of Delivery File Not Found for Send Mail.Please Upload file First']);
                    return redirect()->back()->with('error', 'Proof of Delivery File Not Found for Send Mail.Please Upload file First');
                }

                else{
                    $pof_details=[
                        'subject'=>'Your shipment has been delivered!
    ',
                        'title'=>'Your shipment has been delivered!',
                        'shipment_inv_no'=>$fiel_path_get->invoice_no,
                        'type'=>'POF',
                        'body'=>'This is for Proof of delivery',
                        'bol_file_path'=>$fiel_path_get->proof_of_delivery,
                    ];

                    $this->sendmaildata($request,$pof_details);
                }

            }

            $data=new alert();
            $data->tracking_mail=$request->traking_email;
            $data->agent_mail=$request->agent_email;
            $data->alert_for=$request->status_type;
            $data->alert_file=$request->file_type;
            $data->customer_id=$request->customer_id1;
            $data->shipment_id=$request->shipment_id1;
            $data->save();


            //        pdf file upload


            if($request->status_type==2){



                $customer_data=customer::where('id',$request->customer_id1)->first();
                $shipment_info=shipment::where('id',$request->shipment_id1)->first();
                $fiel_path_get=$shipment_info;


                $contactemail=customer_agent::where('id',$shipment_info->agent_id)->first()->agent_email;

                if($customer_data->process_type==2){

    //                return $shipment_info->getcustomer->company_name;
                    $data = [
                        'title' => 'Welcome to ItSolutionStuff.com',
                        'form'=>$shipment_info->form,
                        'to'=>$shipment_info->to,
                        'shipment_id'=>$shipment_info->invoice_no,
                        'load'=>$shipment_info->load,
                        'bid'=>$shipment_info->bid_price,
                        'delivery'=>date('m-d-Y',strtotime($shipment_info->actual_delivery_date)),
                        'pickup'=>date('m-d-Y',strtotime($shipment_info->actual_pickup_date)) ,
                        'custiomer_name'=>$shipment_info->getcustomer->company_name,
                        'custiomer_email'=>$shipment_info->getcustomer->company_name,
                        'date' => date('m/d/Y')
                    ];

//                    return view('invoicepdf',$data);


                    $pdf = PDF::loadView('invoicepdf', $data);

                    $pathdatainvo='Inv-No-'.$fiel_path_get->invoice_no.'/'.'invoice.pdf';

                    $content = $pdf->download()->getOriginalContent();

                    Storage::disk('public_path')->put($pathdatainvo,$content);
//                    return view('invoicepdf',$data);


                    $delivery=1;
                    $pickup=1;
                    $inv=0;

                    Mail::to($contactemail)->send(new customermail($fiel_path_get,$pickup,$delivery,$inv));
//                    Mail::to($customer_data->accounting_email)->send(new customermail($fiel_path_get));

    //                return $pdf->download('itsolutionstuff.pdf');
                }
            }


        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 500, 'message' => $exception->getMessage()]);
        }
        DB::commit();
        session()->flash('success_alert', 'Successfully create  a New Shipment Alert');
        return response()->json(['status' => 200, 'message' => 'Successfully create  a New Shipment Alert']);

//        return redirect()->back()->with('success', 'Successfully create  a New Shipment Alert');

    }


    public function sendmaildata($request,$maildata){

//        return 1;
        $traking_mail_status= mail::to($request->traking_email)->send(new alertmail($maildata));
        $agent_email_status= mail::to($request->agent_email)->send(new alertmail($maildata));
        return $traking_mail_status;
    }
}
