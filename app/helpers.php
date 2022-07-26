<?php
use App\Models\expense;
function getmile_with_ex($meter){
    $mile=$meter*0.000621371;
    $exmile=50;
    $total_mile=$mile+$exmile;

    return round($total_mile, 2);
}

function get_estimate_report($shipment_id,$get_type){

    //get data from shipment
     $shipment_data=\App\Models\shipment::where('id',$shipment_id)->first();
     $bid=$shipment_data->bid_price;
     $total_time_second=$shipment_data->distance_reach_time;
     $meter=$shipment_data->distance;


    //get data from shipment


    $exdata=\App\Models\shipment_expense::where('shipment_id',$shipment_id)->first();
    $dispatch_bid_perc=$exdata->dispatch_bid_percentage;
    $factoring_bid_perc=$exdata->factoring_bid_percentage;
    $driver_profit_percentage =$exdata->driver_profit_percentage;
    $extra_mile=50;

    $total_day=($total_time_second*0.000277778)/12;
    $total_mile=($meter*0.000621371)+$extra_mile;
    $per_gallon_gas_price=$exdata->per_gallon_gas_price; //unit=$;
//    we assume the trucks usage is 8.5 miles per every gallon and that each gallon costs $4.00.
    $total_gas_in_gallon=$total_mile/8.5;
//    Truck per mile: $0.15


    $total_ex_truck_per_mile=$exdata->truck_per_mile_cost*$total_mile;

    $total_ex_truck=$total_day*$exdata->truck_per_day;
    $total_ex_insurance=$total_day*$exdata->insurance_per_day;

    $total_ex_truck_and_insurance_daily=$total_ex_truck+$total_ex_insurance;



    $total_ex_dispatch=($dispatch_bid_perc*$bid)/100;  //12% of bid
    $total_ex_factoring=($factoring_bid_perc*$bid)/100; //4.5% of bid;
    $total_ex_gas=$total_gas_in_gallon*$per_gallon_gas_price; //unit=$;

    $total_expense=$total_ex_gas+$total_ex_factoring+$total_ex_dispatch+$total_ex_truck_per_mile+$total_ex_truck_and_insurance_daily;
    $total_gross_profit=$bid-$total_expense;

    $driver_pay=($total_gross_profit*$driver_profit_percentage)/100;


    if($get_type=='EX'){
        return round($total_expense+$driver_pay, 3);

    }
    if($get_type=='PR'){
        return round($total_gross_profit-$driver_pay, 3);
    }
    if($get_type=='DR'){
        return round($driver_pay, 3);
    }

    if($get_type=='GAS'){
        return round($total_ex_gas, 3);
    }

//
    if($get_type=='total_rent'){
        return round(($total_ex_truck_per_mile+$total_ex_truck), 3);
    }

    if($get_type=='insurance'){
        return round($total_ex_insurance, 3);
    }
    if($get_type=='dispatch'){
        return round($total_ex_dispatch, 3);
    }

    if($get_type=='factoring'){
        return round($total_ex_factoring, 3);
    }

    if($get_type=='mile'){
        return round($total_mile, 3);
    }

    if($get_type=='total_date'){
        return round($total_day, 2);
    }

    if($get_type=='profit_before_driver'){
        return round($total_gross_profit, 2);
    }

}
function get_estimate_report_arr($shipment_id){

    //get data from shipment
     $shipment_data=\App\Models\shipment::where('id',$shipment_id)->first();
     $bid=$shipment_data->bid_price;
     $total_time_second=$shipment_data->distance_reach_time;
     $meter=$shipment_data->distance;



    //get data from shipment


    $exdata=\App\Models\shipment_expense::where('shipment_id',$shipment_id)->first();
    $dispatch_bid_perc=$exdata->dispatch_bid_percentage;
    $factoring_bid_perc=$exdata->factoring_bid_percentage;


    $extra_mile=50;

    $total_day=round(($total_time_second*0.000277778)/12, 3);
    $total_mile_cal=round(($meter*0.000621371),3)+round($extra_mile,3);
    $total_mile=round($total_mile_cal,3);
    $per_gallon_gas_price=$exdata->per_gallon_gas_price; //unit=$;
//    we assume the trucks usage is 8.5 miles per every gallon and that each gallon costs $4.00.
    $total_gas_in_gallon=round($total_mile/8.5,3);
//    Truck per mile: $0.15


    $total_ex_truck_per_mile=$exdata->truck_per_mile_cost*$total_mile;

    $total_ex_truck=$total_day*$exdata->truck_per_day;
    $total_ex_insurance=$total_day*$exdata->insurance_per_day;

    $total_ex_truck_and_insurance_daily=$total_ex_truck+$total_ex_insurance;



    $total_ex_dispatch=round(($dispatch_bid_perc*$bid)/100,3);  //12% of bid
    $total_ex_factoring=round(($factoring_bid_perc*$bid)/100,3); //4.5% of bid;
    $total_ex_gas=round($total_gas_in_gallon*$per_gallon_gas_price,3); //unit=$;

    $total_expense=$total_ex_gas+$total_ex_factoring+$total_ex_dispatch+$total_ex_truck_per_mile+$total_ex_truck_and_insurance_daily;
    $total_gross_profit=$bid-$total_expense;


    $driver_pay=0;

    if($exdata->driver_pay_status==3){
        $driver_profit_percentage =$exdata->driver_profit_percentage;
        $driver_pay=round(($total_gross_profit*$driver_profit_percentage)/100,3);
    }
    if($exdata->driver_pay_status==1){
        $driver_pay_milewise=$total_mile*$exdata->driver_per_mile_pay;
        $driver_pay=round($driver_pay_milewise,3);
    }
    if($exdata->driver_pay_status==2){
        $driver_percentage_revenue =$exdata->driver_percentage_revenue;
        $driver_pay=round(($bid*$driver_percentage_revenue)/100,3);
    }
    if($exdata->driver_pay_status==4){
        $driver_pay=round($exdata->driver_fixed_pay,3);
    }


    $shipment_report=[
        'total_gross_profit'=>$total_gross_profit,
        'total_expense'=>$total_expense,
        'total_mile'=>$total_mile,
       'ex'=>round($total_expense+$driver_pay, 3),
       'pr'=>round($total_gross_profit-$driver_pay, 3),
       'dr'=>round($driver_pay, 3),
       'gas'=>round($total_ex_gas, 3),
       'total_rent'=>round(($total_ex_truck_per_mile+$total_ex_truck), 3),
       'insurance'=>round($total_ex_insurance, 3),
       'dispatch'=>round($total_ex_dispatch, 3),
       'factoring'=>round($total_ex_factoring, 3),
       'mile'=>round($total_mile, 3),
       'total_date'=>round($total_day, 3),
       'profit_before_driver'=>round($total_gross_profit, 2),
    ];

    return $shipment_report;

}

function getroleid(){
    $role_id=\Illuminate\Support\Facades\Auth::user()->role;
    return $role_id;
}

function get_driver_payment($bid,$time,$distance,$driver_id){
    $expense=expense::first();

    $driver_info=\App\Models\Driver::where('id',$driver_id)->first();


    $bid=$bid;
    $total_time_second=$time;
    $meter=$distance;

    $dispatch_bid_perc=$expense->dispatch_bid_percentage;
    $factoring_bid_perc=$expense->factoring_bid_percentage;
    $driver_profit_percentage =$driver_info->profit_percentage;
    $extra_mile=50;



    $total_day=round(($total_time_second*0.000277778)/12, 3);
    $total_mile=round(($meter*0.000621371)+$extra_mile,3);
    $per_gallon_gas_price=$expense->per_gallon_gas_price; //unit=$;
//    we assume the trucks usage is 8.5 miles per every gallon and that each gallon costs $4.00.
    $total_gas_in_gallon=round($total_mile/8.5,3);
//    Truck per mile: $0.15

    $total_ex_truck_per_mile=$expense->truck_per_mile_cost*$total_mile;

    $total_ex_truck=$total_day*$expense->truck_per_day;
    $total_ex_insurance=$total_day*$expense->insurance_per_day;

    $total_ex_truck_and_insurance_daily=$total_ex_truck+$total_ex_insurance;


    $total_ex_dispatch=round(($dispatch_bid_perc*$bid)/100,3);  //12% of bid
    $total_ex_factoring=round(($factoring_bid_perc*$bid)/100,3); //4.5% of bid;
    $total_ex_gas=round($total_gas_in_gallon*$per_gallon_gas_price,3); //unit=$;

    $total_expense=$total_ex_gas+$total_ex_factoring+$total_ex_dispatch+$total_ex_truck_per_mile+$total_ex_truck_and_insurance_daily;
    $total_gross_profit=$bid-$total_expense;

    $driver_pay=0;
    if($driver_info->pay_status==3){
        $driver_profit_percentage =$driver_info->profit_percentage;
        $driver_pay=round(($total_gross_profit*$driver_profit_percentage)/100,3);
    }
    if($driver_info->pay_status==1){
        $driver_pay_milewise=$total_mile*$driver_info->per_mile;
        $driver_pay=round($driver_pay_milewise,3);
    }
    if($driver_info->pay_status==2){
        $percentage_revenue =$driver_info->percentage_revenue;
        $driver_pay=round(($bid*$percentage_revenue)/100,3);
    }
    if($driver_info->pay_status==4){
        $driver_pay=round($driver_info->fixed,3);
    }
    $final_total_expense=$total_expense+$driver_pay;
    $final_total_profit=$bid-$final_total_expense;

    return [$driver_pay,$final_total_expense,$final_total_profit];


//    [$total_ex_gas,$total_ex_factoring,$total_ex_dispatch,$total_ex_truck_per_mile,$total_ex_truck_and_insurance_daily,$total_ex_truck_per_mile,$total_ex_truck,$total_ex_insurance,$total_mile,$total_expense,$total_day];



}









