<?php

namespace App\Http\Controllers;

use App\Mail\driverMail;
use App\Models\Driver;
use App\Models\shipment_expense;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class DriverController extends Controller
{
    public function index(){
        $driver=Driver::where('status',1)->get();
        return view('Driver.index',['driver_list'=>$driver]);
    }

    public function insert_driver(Request $request){


        $validatedData = $request->validate([
            'driver_name' => 'required|max:255',
            'email' => 'required|email',
            'mobile' => 'required',
            'vehicle_number' => 'required',
            'gas_card_number' => 'required',
            'profit_percentage' => 'required',
        ]);

//        if($request->email_status=='on'){
//
//            $details=[
//                'title'=>'Mail from Retina Soft ',
//                'body'=>'This is for testing',
//            ];
//            Mail::to($request->email)->send(new driverMail($details));
//
//        }


        $insert_data=new Driver();
            $insert_data->driver_name =$request->driver_name;
            $insert_data->email =$request->email;
            $insert_data->mobile =$request->mobile;
            $insert_data->vehicle_number =$request->vehicle_number;
            $insert_data->gas_card_number =$request->gas_card_number;
            $insert_data->pay_status =$request->paystatus;
            if($request->paystatus==4){
                $insert_data->fixed =$request->fixed;
            }
            if($request->paystatus==3){
                $insert_data->profit_percentage =$request->profit_percentage;
            }
            if($request->paystatus==2){

                $insert_data->percentage_revenue =$request->percentage_revenue;
            }
            if($request->paystatus==1){
                $insert_data->per_mile =$request->per_mile;
            }


            if($request->email_status=='on'){
                $insert_data->email_status =1;
            }else{
                $insert_data->email_status =0;
            }

            if($request->edit==0){
                $info=$insert_data->save();
                if($info){
                    $info="save";
                }

            }else if($request->edit==1){
                $insert_data->exists = true;
                $insert_data->id=$request->id;
                $info=$insert_data->save();
                if($info){
                    $info="edit";
                }

            }

            if($info=='edit'){
                return redirect()->back()->with('success', 'Successfully Update Driver info');
            } else if($info=='save'){



                return redirect()->back()->with('success','successfully Driver created');
            }



    }

    public function driver_profit_percentage_update(Request $request){

        $validatedData = $request->validate([
            'driver_profit_perc' => 'required|numeric|max:100',
        ]);

        $data=shipment_expense::where('shipment_id',$request->shipment_id)->update(['driver_profit_percentage'=>$request->driver_profit_perc]);

        return redirect()->back()->with('success','Successfully updated Driver Profit Percentage
for this Shipment');
}
}


