<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliverytimeController extends Controller
{
    public function get_delivery_time(Request $request){
        $reachtimelist=$request->reachtimelist;

        $deliverydatetimelist=[];

        $start_time=$request->start_time;
        $start_date=$request->start_date;

        foreach ($reachtimelist as $value) {
            $include_time=$value;

//         in working time total  need time to reach,here  working time 12 hours per day

//            $work_time_per_day_second= (12*3600);
//            $total_work_day=($include_time*3600)/($work_time_per_day_second*3600);

            $start_date_time=$start_date.' '.$start_time;

            $start=strtotime($start_date_time);

            $delivery_date_time_str=$start+$include_time;

            $delivery_date=date('Y-m-d',$delivery_date_time_str);
            $delivery_time=date('g:i a',$delivery_date_time_str);
            $start_timedata=date('g:i a',strtotime($start_time));
            $delivery_time_show=date('H:i',$delivery_date_time_str);

            $delivery_date_time=date('Y-m-d g:i a',$delivery_date_time_str);

            $delivery_date_time_arr=['strt_time'=>$start_time,'strt_date'=>$start_date,'delivery_date'=>$delivery_date,'delivery_tim'=>$delivery_time,'delivery_date_time'=>$delivery_date_time,'delivery_time_show'=>$delivery_time_show,'
            delivery_date_time_str'=>$delivery_date_time_str,'start_timedata'=>$start_timedata];

            $deliverydatetimelist[]=$delivery_date_time_arr;
            $start_time= date('H:i',strtotime($delivery_time)) ;
            $start_date=date('Y-m-d',strtotime($delivery_date));


        }

        return $deliverydatetimelist;



    }


}
