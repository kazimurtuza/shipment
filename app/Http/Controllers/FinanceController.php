<?php

namespace App\Http\Controllers;

use App\Models\shipment;
use File;
use Illuminate\Http\Request;
use ZipArchive;

class FinanceController extends Controller
{
    public function index(){
        $today=date('Y-m-d');
        $weekago='2000-1-1';
        return $this->srcbydate($weekago,$today);

      }
    public  function phoneindex($shipment_id){
        return view('phone.index',['shipment_id'=>$shipment_id]);
    }
    public  function shipment_delivery_info_set($shipment_id){
        return view('phone.delivery_info',['shipment_id'=>$shipment_id]);
    }
    public  function success(){
        return view('phone.success');
    }


    function weeklyfinancesrc(){
        $today=date('Y-m-d');
        $weekago=date("Y-m-d", strtotime("-7 days"));
        return $this->srcbydate($weekago,$today);
    }
    function monthlylyfinancesrc(){
        $today=date('Y-m-d');
        $weekago=date("Y-m-d", strtotime("-1 Months"));

        return $this->srcbydate($weekago,$today);

    }

    public function datetodatefinance_src(Request $request){

        $dataarray=explode("-", $request->daterange);
        $startd=$dataarray[0];
        $endd=$dataarray[1];
        $start= date('Y-m-d',strtotime($dataarray[0]));
        $end= date('Y-m-d',strtotime($dataarray[1]));
        return $this->srcbydate($start,$end);
    }

    public function srcbydate($start,$end){

        $shipmentlist=shipment::where('is_paid',1)->where('status',1)->whereBetween('paid_date',[$start,$end])->get();
        $totalbit=shipment::where('is_paid',1)->where('status',1)->whereBetween('paid_date',[$start,$end])->sum('bid_price');
        $totalmail_miter=shipment::where('is_paid',1)->where('status',1)->whereBetween('paid_date',[$start,$end])->sum('distance');
        $totalmile= ($totalmail_miter*0.000621371)+50;


        $driverlist= shipment::where('is_paid',1)->where('status',1)->whereBetween('paid_date',[$start,$end])->groupBy('driver_id')->select('driver_id')->get();

        $bookstart=date('Y-m-d 00:00:10',strtotime($start));
        $bookend=date('Y-m-d 23:59:59',strtotime($end));
        $totalbooking=shipment::where('is_paid',0)->where('is_cancel',0)->where('status',1)->whereBetween('created_at',[$bookstart,$bookend])->sum('bid_price');


        $driver_total_pay_fromstart=shipment::where('is_paid',1)->where('status',1)->where('is_cancel',0)->whereBetween('created_at',[$bookstart,$bookend])->sum('driver_cost');

//         return $driver_total_pay_fromstart;
        $outstanding_invoices=shipment::where('is_cancel',0)->where('is_paid',0)->where('status',1)->whereBetween('created_at',[$bookstart,$bookend])->get()->count();

        $notsubmited=shipment::where('is_cancel',0)->where('is_invoice_submit',0)->where('status',1)->whereBetween('created_at',[$bookstart,$bookend])->get()->count();

        $totaldriver=$driverlist->count();

        $totaldriver_fromstarting=shipment::where('is_paid',1)->where('status',1)->whereBetween('created_at',[$bookstart,$bookend])->groupBy('driver_id')->select('driver_id')->get()->count();

        $totalmail_miter_fromstart=shipment::where('is_paid',1)->where('status',1)->whereBetween('created_at',[$bookstart,$bookend])->sum('distance');
        $totalmile_fromstart= ($totalmail_miter_fromstart*0.000621371)+50;


         $count_one = shipment::where('status',1)->whereBetween('created_at',[$bookstart,$bookend])
             ->where('bill_of_lading', Null)
             ->count();
         $count_two = shipment::where('status',1)->whereBetween('created_at',[$bookstart,$bookend])
             ->where('proof_of_delivery', Null)
             ->count();

         $total_empty_file = $count_one+$count_two;

        $agemorethentherty=shipment::where('status',1)->whereBetween('created_at',[$bookstart,date("Y-m-d 23:59:59", strtotime("-1 Months"))])->select('created_at')->get()->count();


            $start_date = strtotime($start);
            $end_date = strtotime($end);
            $datediff = $end_date-$start_date;
            $totaldatesrc=round($datediff / (60 * 60 * 24));

            $subt_date='-'.$totaldatesrc.'days';
        $previous_satart_date=date('Y-m-d', strtotime($start. $subt_date));
        $previous_end_date=$start;

//        previous booking
        $bookstart_pre=date('Y-m-d 00:00:10',strtotime($previous_satart_date));
        $bookend_pre=date('Y-m-d 23:59:59',strtotime($previous_end_date));
        $totalbooking_pre=shipment::where('is_paid',0)->where('is_cancel',0)->where('status',1)->whereBetween('created_at',[$bookstart_pre,$bookend_pre])->sum('bid_price');

        $prctaakbook=0;
        if($totalbooking_pre==0){
            $prctaakbook=100;
        }else{
            $prctaakbook=round(((($totalbooking-$totalbooking_pre)/$totalbooking_pre)*100), 2);
        }

//        previous booking


//        previous use mile,bit
        $pre_totalbit=shipment::where('is_paid',1)->where('status',1)->whereBetween('paid_date',[$previous_satart_date,$start])->sum('bid_price');
        $pre_totalmail_miter=shipment::where('is_paid',1)->where('status',1)->whereBetween('paid_date',[$previous_satart_date,$start])->sum('distance');
        $pre_totalmile= ($pre_totalmail_miter*0.000621371)+50;
        $present_mile= number_format(($totalbit/($totalmile>0?$totalmile:1)), 2);
        $prev_mile= number_format(($pre_totalbit/($pre_totalmile>0?$pre_totalmile:1)), 2);
        $prc_mile=0;
        if($prev_mile==0){
            $prc_mile=100;
        }else{
            $prc_mile=round(((($present_mile-$prev_mile)/$prev_mile)*100), 2);
        }
//        previous mile


//        previous per driver

        $pre_paid_shipment_driver_cost_fromstart=shipment::where('is_paid',1)->where('status',1)->where('is_cancel',0)->whereBetween('created_at',[$bookstart_pre,$bookend_pre])->sum('driver_cost');
        $pre_totaldriver_fromstarting=shipment::where('is_paid',1)->where('status',1)->whereBetween('created_at',[$bookstart_pre,$bookend_pre])->groupBy('driver_id')->select('driver_id')->get()->count();


        $present_perdrv=$driver_total_pay_fromstart/($totaldriver_fromstarting>0?$totaldriver_fromstarting:1);
        $past_perdrv=$pre_paid_shipment_driver_cost_fromstart/($pre_totaldriver_fromstarting>0?$pre_totaldriver_fromstarting:1);

        $prc_perdiver=0;
        if($past_perdrv==0){
            $prc_perdiver=100;
        }else{
            $prc_perdiver=round((($present_perdrv-$past_perdrv)/$past_perdrv)*100,2);
        }


//        previous per driver

        return  view('finance.index',['agemorethentherty'=>$agemorethentherty,'total_empty_file'=>$total_empty_file,'totalmile_fromstart'=>$totalmile_fromstart,'totaldriver_fromstarting'=>$totaldriver_fromstarting,'notsubmited'=>$notsubmited,'outstanding_invoices'=>$outstanding_invoices,'paid_shipment_driver_cost_fromstart'=>$driver_total_pay_fromstart,'shipmentlist'=>$shipmentlist,'totalmile'=>$totalmile,'totalbit'=>$totalbit,'totaldriver'=>$totaldriver,'driverlist'=>$driverlist,'startdate'=>$start,'enddate'=>$end,'totalbooking'=>$totalbooking,'prctaakbook'=>$prctaakbook,'prc_mile'=>$prc_mile,'prc_per_driv'=>$prc_perdiver]);

    }

}
