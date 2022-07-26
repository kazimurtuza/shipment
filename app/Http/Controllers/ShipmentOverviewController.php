<?php

namespace App\Http\Controllers;

use App\Models\expense;
use App\Models\shipment;
use App\Models\shipment_expense;
use Illuminate\Http\Request;

class ShipmentOverviewController extends Controller
{
    public function get_estimate_report_arr(Request $request){
        $shipmet=shipment::with('getdriver')->where('id',$request->id)->first();
        $estimate_data= get_estimate_report_arr($request->id);
        $driverpay_status=$shipmet->getdriver->pay_status;
        if($driverpay_status==1){
            $driverpay_type=$shipmet->getdriver->per_mile.'Per Mile';
        }
        if($driverpay_status==2){
            $driverpay_type=$shipmet->getdriver->percentage_revenue.'% of revenue';

        }
        if($driverpay_status==3){
            $driverpay_type=$shipmet->getdriver->profit_percentage.'% of profit';

        }
        if($driverpay_status==4){
            $driverpay_type=$shipmet->getdriver->fixed.'Fixed';

        }

        $expense_unit=shipment_expense::where('shipment_id',$request->id)->first();
        $nameinfo=['customer_name'=>$shipmet->getcustomer->company_name,
            'driver_name'=>$shipmet->getdriver->driver_name,
            'driver_profit_percen'=>$shipmet->getdriver->profit_percentage,

            'pickup_date'=> date('m-d-Y', strtotime($shipmet->pickup_date)),

            'delivery_date'=>date('m-d-Y', strtotime($shipmet->delivery_date)),



            'pickup_time'=> date('g:i a', strtotime($shipmet->pickup_time)),
            'delivery_time'=>date('g:i a', strtotime($shipmet->delivery_time)),
            'driver_profit_percentage'=>$driverpay_type,

            'ac_pickup_date'=>$shipmet->actual_pickup_date? date('m-d-Y', strtotime($shipmet->actual_pickup_date)):' ',
            'ac_pickup_time'=>$shipmet->actual_pickup_time? date('g:i a', strtotime($shipmet->actual_pickup_time)):' ',


            'ac_delivery_date'=>$shipmet->actual_delivery_date ?date('m-d-Y', strtotime($shipmet->actual_delivery_date)):'',
            'ac_delivery_time'=>$shipmet->actual_delivery_date ?date('g:i a', strtotime($shipmet->actual_delivery_time)) :'',

            ];


        return json_encode([$estimate_data,$expense_unit,$nameinfo]);

    }
}
