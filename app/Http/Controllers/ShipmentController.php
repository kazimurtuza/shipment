<?php

namespace App\Http\Controllers;

use App\Mail\customermail;
use App\Mail\drivershipmentConfirm;
use App\Mail\shipment_cancel;
use App\Mail\shipmentConfirm;
use App\Models\customer;
use App\Models\customer_agent;
use App\Models\Driver;
use App\Models\expense;
use App\Models\invoice;
use App\Models\proof_delivery_file;
use App\Models\shipment;
use App\Models\shipment_bill_lading_file;
use App\Models\shipment_expense;
use App\Models\shipment_location;
use App\Models\shipmentcancel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PDF;
use Image;

class ShipmentController extends Controller
{

    public function index(){

        if(Auth::check()){
            $driver_list=Driver::where('status',1)->get();
            $customer_list=customer::where('status',1)->get();

            $start=date('Y-m-d',strtotime("-1 month",strtotime(date('Y-m-d'))));
            $end=date('Y-m-d');
            $date_range=date('m/d/Y',strtotime($start)).' - '.date('m/d/Y',strtotime($end));

            $shipment_list=shipment::with('invoicedetail')
                ->with('shipmentplaces')
                ->where('status',1)
                ->whereBetween('pickup_date', [$start, $end])
                ->orderBy('id',"DESC")
                ->get();

            $this->get_driver_active();



            return  view('Shipment.index',['driver_list'=>$driver_list,'customer_list'=>$customer_list,'shipment_list'=>$shipment_list,'date_range'=>$date_range]);

        }

        return redirect("/")->withSuccess('You are not allowed to access');


    }

    public function get_driver_active(){
        $shipment_list=shipment::with('invoicedetail')->with('shipmentplaces')->where('status',1)->orderBy('id',"DESC")->get();
        return 1;
    }

    public function shipmentfilter(Request $request){
//

//        return $request;
       $srcdata= shipment::with('invoicedetail')
           ->with('shipmentplaces')
           ->where('status',1)
           ->when($request->driverlist, function ($q) use ($request) {
               $q->whereIn('driver_id',$request->driverlist);
           })
           ->when($request->paid, function($sq) use ($request){
               $sq->where('is_paid',$request->paid);
           } )
           ->when($request->customerlist, function($sq) use ($request){
                $sq->whereIn('customer_id',$request->customerlist);
           } )
           ->when($request->submitted, function($sq) use ($request){
                $sq->where('is_invoice_submit',1);
           } )
           ->when($request->notsubmitted, function($sq) use ($request){
                $sq->where('is_invoice_submit',0);
           } )
           ->when($request->not_picked_up, function($sq) use ($request){
               $sq->where('actual_pickup_date',Null);
           } )
           ->when($request->not_delivered, function($sq) use ($request){
               $sq->where('actual_delivery_date',Null);
           } )
           ->when($request->missing, function($sq) use ($request){
               $sq->where(function ($jq) {
                   $jq->where('rate_confirmation',Null)->orWhere('bill_of_lading',Null)->orWhere('proof_of_delivery',Null);
               });
           } )
           ->orderBy('id',"DESC")

           ->get();


        return view('Shipment.shipment_src_list',['shipment_list'=>$srcdata]);




    }

      public function src_shipment_list(Request $request){

          $date_range=$request->daterange;

          $dataarray=explode("-", $date_range);

          $start=date('Y-m-d',strtotime($dataarray[0]));
          $end=date('Y-m-d',strtotime($dataarray[1]));
          $driver_list=Driver::where('status',1)->get();
          $customer_list=customer::where('status',1)->get();
          $shipment_list=shipment::with('invoicedetail')->with('shipmentplaces')->where('status',1)->whereBetween('pickup_date', [$start, $end])->get();
          return  view('Shipment.index',['driver_list'=>$driver_list,'customer_list'=>$customer_list,'shipment_list'=>$shipment_list,'date_range'=>$date_range]);

      }

      public function src_shipment_weekly(Request $request){
          $date_range=$request->daterangeweekly;
          $dataarray=explode("-", $date_range);
          $start=date('Y-m-d',strtotime($dataarray[0]));
          $end=date('Y-m-d');
          $driver_list=Driver::where('status',1)->get();
          $customer_list=customer::where('status',1)->get();
          $shipment_list=shipment::with('invoicedetail')->with('shipmentplaces')->where('status',1)->whereBetween('pickup_date', [$start, $end])->get();
          return  view('Shipment.index',['driver_list'=>$driver_list,'customer_list'=>$customer_list,'shipment_list'=>$shipment_list,'date_range'=>$date_range]);

      }


    public function  insert_shipment(Request $request){

        $customerper=customer::find($request->customer_id)->pay_percent;
        $quickpay_discount=null;
        if($customerper){
            $quickpay_discount=($request->bid_price*$customerper)/100;
           $request->bid_price=$request->bid_price;
         }




        $total_distance=0;
        $total_time=0;
        $delivery_date_arr= $request->delivery_date;
        $delivery_time_arr= $request->delivery_time;
        $lastindex=count($delivery_date_arr);


        $last_delivery_date=$delivery_date_arr[$lastindex-1];
        $last_delivery_time=$delivery_time_arr[$lastindex-1];


        foreach ($request->distance as $row){
            $total_distance+=$row;
        }
        foreach ($request->distance_reach_time as $rowtime){
            $total_time+=$rowtime;
        }

            $last_invloice = shipment::orderBy('id', 'DESC')->first();

            $invoice_number = $last_invloice ? ($last_invloice->invoice_no + 1) : 1000;
            //rate_confirmation file upload
            $uploadfile_path = 'uploads/Inv-No-' . $invoice_number;
            $fileName = 'Rate_Confirmation' . '.' . $request->rate_confirmation->extension();
            $request->rate_confirmation->move($uploadfile_path, $fileName);
            $rate_confirmation_path = 'uploads/Inv-No-' . $invoice_number . '/' . $fileName;
            // rate_confirmation file upload


            $data = new shipment();
            $data->customer_id = $request->customer_id;
            $data->invoice_no = $invoice_number;
            $data->form = $request->form;
            $data->notes = $request->notes;
            $data->to = $request->to[$lastindex-1];
            $data->bid_price = $request->bid_price;
            $data->load = $request->load;
            $data->pickup_date = $request->pickup_date;
            $data->pickup_time = $request->pickup_time;
            $data->delivery_date = $last_delivery_date;
            $data->delivery_time = $last_delivery_time;
            $data->driver_id = $request->driver_id;
            $data->rate_confirmation = $rate_confirmation_path;
            $data->distance = $total_distance;
            $data->distance_reach_time = $total_time;
            $data->driver_cost = $request->driver_cost;
            $data->total_cost = $request->total_cost;
            $data->total_profit = $request->total_profit;
            $data->agent_id = $request->agent_id;
            $data->discountamount = $quickpay_discount;
            $data->discountpercent = $customerper;
            $data->status = 1;
            $data->created_by = Auth::user()->id;
            //$data->updated_by=$request->updated_by;
            $info = $data->save();


           $pickupexp_date=null;
           $pickupexp_time=null;

//           invoice document
        function getlocationname($data){
            $fromdata=explode(",", $data);
            $fromsiz=count($fromdata);

            if($fromsiz>=3){
                $fromfirst=$fromdata[$fromsiz-2];
                $fromsecond=$fromdata[$fromsiz-3];
            }else {
                $fromfirst = $fromdata[$fromsiz - 1];
                $fromsecond = $fromdata[$fromsiz - 2];
            }

            return $fromsecond.','.$fromfirst;

        }

        $invoice_details='Ln:'.getlocationname($request->form);

        foreach ($request->distance as $datakey1=>$shipmentlist1) {

                $invoice_details.=' To: '.getlocationname($request->to[$datakey1]) ;

        }

        $invdata=new invoice();
        $invdata['discription']=$invoice_details;
        $invdata['unitprice']=$request->bid_price;
        $invdata['amount']=$request->bid_price;
        $invdata['amount']=$request->bid_price;
        $invdata['qty']=1;
        $invdata['status']=1;
        $invdata['shipment_id']=$data->id;
        $invdata->save();

//           invoice document





        foreach ($request->distance as $datakey=>$shipmentlist){
            $data2 = new shipment_location();
            $data2->shipment_id = $data->id;
            if($datakey==0){
                $data2->form = $request->form;
            }else{
                $data2->form = $request->to[$datakey-1];
            }
            $data2->to = $request->to[$datakey];
            $data2->customer_id = $request->customer_id;
            if($datakey==0){
                $data2->pickup_date = $request->pickup_date;
                $data2->pickup_time = $request->pickup_time;
            }else{
                $data2->pickup_date = $pickupexp_date;
                $data2->pickup_time = $pickupexp_time;
            }

            $data2->delivery_date = $request->delivery_date[$datakey];
            $data2->delivery_time = $request->delivery_time[$datakey];
//            $data2->delivery_time_txt = $request->delivery_time_txt;
            $data2->driver_id = $request->driver_id;
            if($datakey==0){
                $data2->from_lat = $request->from_lat;
                $data2->from_lng = $request->from_lng;
            }else{
                $data2->from_lat = $request->to_lat[$datakey-1];
                $data2->from_lng = $request->to_lng[$datakey-1];
            }

            $data2->to_lat = $request->to_lat[$datakey];
            $data2->to_lng = $request->to_lng[$datakey];
            $data2->to_place_id = $request->to_place_id[$datakey];
            $data2->distance = $request->distance[$datakey];
            $data2->distance_reach_time = $request->distance_reach_time[$datakey];
            $data2->status = 1;
            $data2->created_by = Auth::user()->id;
            $info = $data2->save();

            $pickupexp_date=$request->delivery_date[$datakey];
            $pickupexp_time= $request->delivery_time[$datakey];
        }



            $drv_info= Driver::find($request->driver_id);
            $dv_pay_type=$drv_info->pay_status;


           //----expense info--------
            $ex = expense::first();

            $profit_perc = Driver::where('id', $request->driver_id)->first()->profit_percentage;
            $ex_data = new shipment_expense();
            $ex_data->shipment_id = $data->id;
            $ex_data->dispatch_bid_percentage = $ex->dispatch_bid_percentage;
            $ex_data->factoring_bid_percentage = $ex->factoring_bid_percentage;
            $ex_data->truck_per_mile_cost = $ex->truck_per_mile_cost;
            $ex_data->per_gallon_gas_price = $ex->per_gallon_gas_price;
            $ex_data->insurance_per_day = $ex->insurance_per_day;
            $ex_data->truck_per_day = $ex->truck_per_day;
            $ex_data->truck_per_mile_cost = $ex->truck_per_mile_cost;
            $ex_data->driver_profit_percentage = $profit_perc;



            $ex_data->driver_pay_status =$dv_pay_type ;

            if($dv_pay_type==1){
                $ex_data->driver_per_mile_pay =$drv_info->per_mile ;
            }
            if($dv_pay_type==2){
                $ex_data->driver_percentage_revenue =$drv_info->percentage_revenue;
            }
            if($dv_pay_type==3){
                $ex_data->driver_profit_percentage = $drv_info->profit_percentage ;
            }
            if($dv_pay_type==4){
                $ex_data->driver_fixed_pay = $drv_info->fixed ;
            }

            $ex_data->save();



            //------Email send-------

            $customerdata = customer::where('id', $request->customer_id)->first();

            $agentdata = customer_agent::where('id', $request->agent_id)->first();
            $shipment_id = $data->id;
            $driver_email = Driver::where('id', $request->driver_id)->first()->email;

//            driver mail
           Mail::send('Mail.mail_to_driverfor_upload_photo', ['shipment_id' => $data->id], function($message) use($request,$driver_email){
            $message->to($driver_email);
            $message->subject('Start pickup');
        });

            $this->sendmaildatainfo($customerdata->tracking_email, $agentdata->agent_email, $shipment_id, $driver_email, $request->notes);
            if ($info && $ex_data) {
                return redirect()->back()->with('success', 'Successfully created a New Shipment');
            }



    }
     public function sendmaildatainfo($traking,$agent,$shipmetn_id,$driver_email,$notes){

//        $driver_email_status= Mail::to($driver_email)->send(new drivershipmentConfirm($shipmetn_id,$notes));
        $traking_mail_status= Mail::to($traking)->send(new shipmentConfirm($shipmetn_id));
        $agent_email_status= Mail::to($agent)->send(new shipmentConfirm($shipmetn_id));

        return $traking_mail_status;
    }

    public function driver_update_for_shipment(Request $request){


//        driver_id
        $drv=Driver::where('id',$request->driver_id2)->first();

       $update_dri=shipment::with('id',$request->shipment_id)->update(['driver_id'=>$request->driver_id2]);
       $shipmet_ex=shipment_expense::where('shipment_id',$request->shipment_id)->update(['driver_profit_percentage'=>$drv->profit_percentage]);

       if($update_dri&&$shipmet_ex){
           return redirect()->back()->with('success', 'Successfully changed Driver');
       }
    }

    public function get_driver_payment(Request $request){
       $driver_pay= get_driver_payment($request->bid,$request->time,$request->distance,$request->driver_id);
        return $driver_pay;
    }
    public function makeaspaid($id){
       $data= shipment::where('id',$id)->update(['is_paid'=>1,'paid_date'=>date('Y-m-d')]);

       if($data){
           return redirect()->back()->with('success', 'Successfully Shipment Paid');
       }
     }



    public function shipment_cancel(Request $request){


        if($request->is_request=='1'){
            $inv_sub=1;

        }else{
            $inv_sub=0;

        }
       shipment::where('id',$request->ship_id)->update(['is_cancel'=>1,'is_invoice_submit'=>$inv_sub]);



       $datacancel=shipmentcancel::where('shipment_id',$request->ship_id)->get()->first();

        if(!empty($datacancel)){
            $data = shipmentcancel::find($datacancel->id);
        }else {
            $data = new shipmentcancel();
        }
            $data['reason'] = $request->reason;
            $data['shipment_id'] = $request->ship_id;
            $data['is_requestsend'] = $request->is_request;
            $data['amount'] = $request->amount;
            $data['note'] = $request->note;
            $data->save();




//        $invdata=new invoice();
//        $invdata['discription']=$request->note;
//        $invdata['unitprice']=00;
//        $invdata['amount']=$request->amount;
//        $invdata['status']=2;
//        $invdata['shipment_id']=$request->ship_id;
//        $invdata->save();


        if($request->is_request==1){
            $is_cancel=1;
            //--create invoice PDF
            $this->createvoice_pdf($request->ship_id,$is_cancel);
            //--create invoice PDF End


            $shipment_info_data=shipment::with('invattachlist')->with('getshipmentcancel')->find($request->ship_id);
          $agetent_id=shipment::where('id',$request->ship_id)->get()->first()->agent_id;
          $agetent_email=customer_agent::where('id',$agetent_id)->first()->agent_email;


//          Mail::to($agetent_email)->send(new shipment_cancel($shipment_info_data));
          Mail::to($agetent_email)->send(new shipment_cancel($shipment_info_data));

      }


//      return redirect()->back()->with('error', 'Successfully  Shipment Cancel');




        $start=date('Y-m-d',strtotime("-1 month",strtotime(date('Y-m-d'))));
        $end=date('Y-m-d');
        $shipment_list=shipment::with('invoicedetail')
            ->with('shipmentplaces')
            ->where('status',1)
            ->whereBetween('pickup_date', [$start, $end])
            ->orderBy('id',"DESC")
            ->get();



      return view('Shipment.shipment_src_list',['shipment_list'=>$shipment_list]);

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





    public function updatepickup_from_phone(Request $request){
        $this->validate($request, [
            'pickuptime' => 'required',
            'pickupdate' => 'required',
            'bill_of_lading' => 'required',
//            'delivery_date' => 'required',
//            'delivery_time' => 'required',
        ]);

//      return $request;


//         dd($request);

        $picdate=date('Y-m-d',strtotime($request->pickuptime));
        $pictime=date('H:i:s',strtotime($request->pickuptime));
        shipment::where('id', $request->shipment_id)->update(['actual_pickup_date'=>$picdate,'actual_pickup_time'=>$pictime,'bill_of_lading'=>'bill_of_lading']);


        foreach ($request->bill_of_lading as $key=>$image){
            $img = $image;
            $folderPath = base_path('../uploads/Inv-No-' .$request->inv_id);
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $uniqid = uniqid();
            $file = $folderPath.'/'.'Bill_of_Lading_id'.($key+1).'.'.$image_type;
            file_put_contents($file, $image_base64);

            $ladingstor=new shipment_bill_lading_file();
            $ladingstor['name']='Bill_of_Lading_id'.($key+1).'.'.$image_type;
            $ladingstor['path']='uploads/Inv-No-'.$request->inv_id.'/'.'Bill_of_Lading_id'.($key+1).'.'.$image_type;
            $ladingstor['shipment_id']=$request->shipment_id;
            $ladingstor->save();
        }

//        mail send to customer
        $shipment_info=shipment::where('id',$request->shipment_id)->first();
        $contactemail=customer_agent::where('id',$shipment_info->agent_id)->first()->agent_email;
        $fiel_path_get=$shipment_info ;
        $delivery=0;
        $pickup=1;
        $inv=0;
        Mail::to($contactemail)->send(new customermail($fiel_path_get,$pickup,$delivery,$inv));
//        mail send to customer

        return view('phone.success',['shipment_id'=>$request->shipment_id,'status'=>'pic']);
    }


    public function updatedelivery_from_phone(Request $request){
        $this->validate($request, [
            'proof_delivery' => 'required',
            'delivery_date' => 'required',
            'delivery_time' => 'required',
        ]);




        shipment::where('id',$request->shipment_id)->update(['actual_delivery_date'=>$request->delivery_date,'actual_delivery_time'=>$request->delivery_time,'proof_of_delivery'=>'proof_of_delivery']);


        foreach ($request->proof_delivery as $key=>$image){

            $img = $image;
            $folderPath = base_path('../uploads/Inv-No-' . $request->inv_id);
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $uniqid = uniqid();
            $file = $folderPath.'/'.'Proof_of_Delivery_id'.($key+1).'.'.$image_type;
            file_put_contents($file, $image_base64);


            $ladingstor=new proof_delivery_file();
            $ladingstor['name']='Proof_of_Delivery_id'.($key+1).'.'.$image_type;
            $ladingstor['path']='uploads/Inv-No-'.$request->inv_id.'/'.' Proof_of_Delivery_id'.($key+1).'.'.$image_type;
            $ladingstor['shipment_id']=$request->shipment_id;
            $ladingstor->save();

        }

        //mail send to customer
        $shipment_info=shipment::where('id',$request->shipment_id)->first();
        $contactemail=customer_agent::where('id',$shipment_info->agent_id)->first()->agent_email;
        $fiel_path_get=$shipment_info ;
        $delivery=1;
        $pickup=0;
        $inv=0;
        Mail::to($contactemail)->send(new customermail($fiel_path_get,$pickup,$delivery,$inv));
       //mail send to customer

        return view('phone.success',['shipment_id'=>$request->shipment_id,'status'=>'del']);
    }
    function mapnavigate($ship_id){
        $locations=shipment_location::where('shipment_id',$ship_id)->get();
        return view('phone.map',['location'=>$locations]);
    }

    public function shipmentlistdata(Request $request){

        $data=shipment::with('shipmentplaces')->where('id',$request->ship_id)->get()->first();
        return $data;
    }


    public function getinvoicedetails(Request $request){

       $shipmentdata=shipment::with(['invoicedetail', 'getshipmentcancel', 'getcustomer', 'getcustomer.customeragent'])
           ->where('id',$request->id)->get()->first();
        return $shipmentdata;

    }

}
