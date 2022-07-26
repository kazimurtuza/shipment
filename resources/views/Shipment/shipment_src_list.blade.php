<?php

function actualex($data){

    if(($data->actual_rent>0)&&($data->actual_insurance>0)&&($data->actual_gas>0)){
        $actual_gross_ex=$data->actual_rent+$data->actual_insurance+$data->actual_gas+$data->actual_dispatch+$data->actual_factoring;
        $bid=$data->bid_price;
        $grossprofit=$bid-$actual_gross_ex;
        $driver_profit_perc=\App\Models\shipment_expense::where('shipment_id',$data->id)->first()->driver_profit_percentage;
        $driver_pay=($grossprofit*$driver_profit_perc)/100;
        $acex=$actual_gross_ex+$driver_pay;
        if($acex<=0){$acex;$driver_pay='';}

        return ['expense'=>$acex,'driver'=>$driver_pay];
    }
    else{
        return ['expense'=>'','driver'=>''];
    }

}

function get_customer_info($id){
    $ship=\App\Models\shipment::find($id);

    return [$ship->getcustomer->tracking_email,$ship->customeragent->agent_email];
}
?>
<table id="table_id"  class="table table-bordered tablesutom shiptb">
    <thead>
    <tr class="tbl-head-txt tableheadtx">
        <th style="width:103px">PICKUP</th>
        <th class="hidden_ico" style="background-image:none !important;width: 287px;">ORIGIN / DEST</th>
        <th style="width: 107px;">DELIVERY</th>
        <th class="hidden_ico" style="background-image:none !important;" >DRIVER</th>
        <th class="hidden_ico" style="background-image:none !important;">MILES</th>
        <th class="hidden_ico" style="background-image:none !important;">BID</th>
        <th class="hidden_ico" style="background-image:none !important;">EXPENSE</th>
        <th class="hidden_ico" style="background-image:none !important;">$Driver</th>
        <th class="text-center hidden_ico" style="background-image:none !important;">CUSTOMER</th>
        <th class="hidden_ico" style="background-image:none !important;">DOCS</th>
        <th class="hidden_ico" style="background-image:none !important;">INVOICE</th>
    </tr>
    </thead>
    <tbody class="tbodylist">
    <?php  $totallist=$shipment_list->count();$i=0;?>

    @foreach($shipment_list as $key=>$data)
        <?php $actual_data=actualex($data);$shipment=json_encode($data);
        $cancleinfo=[];
        $canclenote="";
        $cancleamount="";

        if($data->is_cancel){
            $canceldata=\App\Models\shipmentcancel::where('shipment_id',$data->id)->get()->first();
            $canclenote=$canceldata->note;
            $cancleamount=$canceldata->amount;
        }

        ?>
        <tr class="tablebodytxt3">
            <td>
                <span style="display:none"><?php echo $number=$i+=1;?></span>
                <span>{{$data->actual_pickup_date?date('M d', strtotime($data->actual_pickup_date)):date('M d', strtotime($data->pickup_date))}}</span>
                <?php
                $pickupdate=$data->actual_pickup_date?$data->actual_pickup_date:$data->pickup_date;
                $pickuptime=$data->actual_pickup_time?$data->actual_pickup_time:$data->pickup_time;
                $pick_time=date('H:i',strtotime($pickuptime));


                $actual_delivery_date=$data->actual_delivery_date?$data->actual_delivery_date:'';
                $actual_delivery_time=$data->actual_delivery_time?$data->actual_delivery_time:$data->actual_delivery_time;
                $ac_deli_time=date('H:i',strtotime($actual_delivery_time));


                $customer_data=get_customer_info($data->id);
                $alert_info_ar=json_encode([$customer_data[0],$customer_data[1],$data->id,$data->customer_id,$pickupdate,$pick_time,$actual_delivery_date,$ac_deli_time]);


                $fromdata=explode(",", $data->form);
                $fromsiz=count($fromdata);
                if($fromsiz>=3){
                    $fromfirst=$fromdata[$fromsiz-2];
                    $fromsecond=$fromdata[$fromsiz-3];
                }else{
                    $fromfirst=$fromdata[$fromsiz-1];
                    $fromsecond=$fromdata[$fromsiz-2];

                }
                //
                ?>
                @if($data->is_cancel==1)
                    <br>
                    <span class="cancelsm">Cancelled</span>
                @else
                    <a data-toggle="modal"
                       onclick="alert_data({{$alert_info_ar}})"
                       data-target="#boostrapModal-3" href=""
                       style="display: block; color:#44A4FD; z-index:3">
                        Alert</a>
                @endif
            </td>
            <td
                    style="text-align: left;line-height: 15px;font-size: 13px;"
                    data-toggle="modal"
                    onclick="shipment_overview({{$shipment}})"
                    data-target="#boostrapModal-100" class="pointer">


                <table class="location" style="position: relative">
                    <tr>
                        <td><span class="hl"><i class="ico icon-record"></i></span></td>
                        <td>{{$fromsecond}},{{$fromfirst}}</td>
                    </tr>

                    @foreach($data->shipmentplaces as $rowdata)
                        <?php
                        $todata=explode(",", $rowdata->to);
                        $toomsiz=count($todata);

                        if($toomsiz>=3){

                            $tofirst=$todata[$toomsiz-2];
                            $tosecond=$todata[$toomsiz-3];
                        }else{
                            $tofirst=$todata[$toomsiz-1];
                            $tosecond=$todata[$toomsiz-2];

                        }
                        ?>
                        <tr>
                            <td><span class="distance">|</span></td>
                            <td></td>
                        </tr>

                        <tr>
                            {{$rowdata->is_cancel}}
                            @if($rowdata->is_cancel==1)
                                <span style="background:rgba(255,0,0,0.43);padding:3px;border-radius: 20px">Cancelled</span>
                            @else
                                <td><span class="hl"><i style="font-size: 15px;  margin-left: -2px;" class="ico icon-location-1"></i></span></td>
                                <td>{{$tosecond}},{{$tofirst}},</td>
                            @endif


                        </tr>
                    @endforeach

                </table>


            </td>
            <td>
                @if($data->is_cancel==1)
                    <span class="cancelbg">Cancelled</span>

                @else
                    @if($data->actual_delivery_date)
                        {{ date('M-d',strtotime($data->actual_delivery_date))}}
                        <br>
                        <span>{{date('g:i a',strtotime($data->actual_delivery_time))}}</span>
                    @else
                        <span style="color:#44A4FD">Submit <br> Time</span>
                    @endif

                @endif
            </td>
            <td>{{$data->getdriver->driver_name}}</td>
            <td>{{getmile_with_ex($data->distance)}}</td>
            <td>${{$data->bid_price}}</td>

            <td>{{$actual_data['expense']}} {{$number}}</td>
            <td>{{$actual_data['driver']}}</td>
            <td>
                <!--                                        --><?php //echo $data->actual_gas>0?$data->actual_gas:' '; ?>
                {{$data->getcustomer->company_name}}</td>



            <td class="text-center">

                <?php
                $bill_load=$data->bill_of_lading;
                $bill_deli=$data->proof_of_delivery;
                $bill_rate=$data->rate_confirmation;



                $data2=[$data->id,$data->invoice_no,$bill_rate,$bill_load,$bill_deli] ?>
                <a
                        href=""
                        onclick="idinput({{json_encode($data2)}})"
                        data-toggle="modal"
                        data-target="#boostrapModal-1"
                ><i class="ico icon-upload-4"></i
                    ></a>
                <br/>

                @if( $bill_load&&$bill_deli&&$bill_rate)
                    3/3
                @elseif($bill_deli&&$bill_rate)
                    2/3
                @elseif($bill_load&&$bill_rate)
                    2/3
                @else
                    1/3

                @endif
            </td>
            <td>
                <div class="row">
                    <div class="col-11">

                        @if(($data->is_invoice_submit==0)&&($data->is_paid==0)&&($data->is_cancel!=1))

                            @if( empty($data->actual_delivery_date))
                                <a onclick="clickinvsubmitcondition({{$data->id}})" class="btn btn-sm li-btn statusbtn" style="color:white; background:#2B4BF2; border-radius: 11px !important;">
                                    Submit
                                </a>
                            @else
                                <a onclick="clickinvsubmit({{$data->id}})" class="btn btn-sm li-btn statusbtn" style="color:white; background:#2B4BF2; border-radius: 11px !important;">
                                    Submit
                                </a>
                            @endif
                        @elseif($data->is_paid==1)
                            <a class="btn btn-sm li-btn statusbtn paidbtn">Paid</a>
                        @elseif(($data->is_cancel==1)&&($data->is_invoice_submit==1))
                            <a style="font-size: 11px !important;" class="btn btn-sm li-btn statusbtn tonubtn"
                            >
                                Submitted
                            </a> <br> +tonu

                        @elseif(($data->is_cancel==1)&&($data->is_invoice_submit==0))

                            {{--<i style="color: #828282;position: relative;top: 20px;left: 2px;" class="ti-check"></i>--}}
                            <a style="font-size: 11px !important;background:rgba(255,0,0,0.2)!important;color:red" class="btn btn-sm li-btn statusbtn tonubtn" >
                                Canceled
                            </a>
                        @elseif(($data->is_cancel==0)&&($data->is_invoice_submit==1))
                            <a style="font-size: 11px !important;" class="btn btn-sm li-btn statusbtn tonubtn">
                                Submitted
                            </a>

                        @elseif($data->is_invoice_submit==0)
                            <a
                                    class="btn btn-sm li-btn statusbtn"
                                    style="color:white; background:#2B4BF2; border-radius: 11px !important;"
                            >
                                {{--Download--}}
                                Submit
                            </a>
                        @endif
                    </div>


                    <div class="col-1" > <div class="btn-group dropleft">
                            @if(getroleid()==1)
                                <a class="opmenu dropdown-toggle" @if(($data->is_cancel==1)&&($data->is_invoice_submit==1)&&($data->is_paid==0)) style="margin-top: -22px;" @endif data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i id="opposition" class="fa fa-ellipsis-v"></i></a>
                        @endif
                        <!--style="{{(($totallist==$number)||($totallist-1==$number))?'top:-226px !important;':''}}"-->
                            <div class="dropdown-menu dropdown-menuedit" >

                                <table class="optionitem">
                                    <tr data-toggle="modal" data-target="#boostrapModal-100" onclick="shipment_overview({{$data}})">
                                        <td><i id="ifontsiz" style="  color: #04a9ed;" class="ti-view-grid"></i></td>
                                        <td><strong  style="color: black;">Load overview</strong> </td>
                                    </tr> <tr>
                                        <td><i id="ifontsiz"  style="color:forestgreen !important;" class="fa fa-check-square"></i></td>
                                        <td><a href="{{url('makeaspaid/'.$data->id)}}"><strong style="color: black;">Mark as Paid</strong></a></td>
                                    </tr>
                                    <tr>
                                        <td><i id="ifontsiz"  style="color:#b7a524" class="ti-pencil"></i></td>
                                        @if(empty($data->actual_delivery_date)&&($data->is_cancel!=1) &&($data->is_paid!=1))
                                            <td onclick="clickinvsubmitcondition({{$data->id}})"><strong style="color: black;">Edit or submit Invoice </strong></td>
                                        @elseif((($data->is_cancel==1)&&($data->is_invoice_submit==1))|| ($data->is_paid==1))
                                            <td onclick="clickinvsubmit_no_condition({{$data->id}})"><strong style="color: black;">  Edit or submit Invoice</strong></td>

                                        @elseif(($data->is_cancel==1)&&($data->is_invoice_submit==0 &&($data->is_paid!=1)))
                                            <td onclick="no_invoice()"><strong style="color: black;">Edit or submit Invoice</strong></td>

                                        @elseif(($data->is_cancel==1)&&($data->is_invoice_submit==0 &&($data->is_paid!=1)))
                                            <td onclick="no_invoice()"><strong style="color: black;">Edit or submit Invoice </strong></td>

                                        @elseif(($data->is_cancel==0)&&($data->is_invoice_submit==0 &&($data->is_paid=0))&&(empty($data->actual_delivery_date)))
                                            <td onclick="no_invoice()"><strong style="color: black;">Edit or submit Invoice </strong></td>

                                        @elseif(($data->is_cancel==0)&&($data->is_invoice_submit==0 &&($data->is_paid=0))&&(empty($data->actual_delivery_date)))
                                            <td onclick="no_invoice()"><strong style="color: black;">Edit or submit Invoice s</strong></td>

                                        @elseif(($data->is_cancel==0)&&($data->is_invoice_submit==0 &&($data->is_paid=0))&&(empty($data->actual_delivery_date)))
                                            <td onclick="no_invoice()"><strong style="color: black;">Edit or submit Invoice </strong></td>

                                        @elseif(($data->is_cancel==0)&&($data->is_invoice_submit==0) &&($data->is_paid==0)||(!empty($data->actual_delivery_date)))
                                            <td onclick="clickinvsubmit_no_condition({{$data->id}})"><strong style="color: black;">Edit or submit Invoice </strong></td>

                                        @endif
                                        <td style="display: none" data-toggle="modal" id="{{$data->id}}" onclick="setshipid({{$data->invoicedetail}},'{{$data->getcustomer->company_name}}','{{$data->getcustomer->customeragent->agent_email}}','{{$data->invoice_no}}','{{$data->id}}','{{$data->form}}','{{$data->to}}','{{$data->discountpercent}}','{{$data->discountamount}}','{{$data->is_cancel}}','{{$canclenote}}','{{$cancleamount}}','{{$data->load}}')"  data-target=".bd-example-modal-xl"><strong style="color: black;"> Edit or submit Invoice k</strong></td>
                                    </tr>
                                    <tr>
                                        <td><i id="ifontsiz"  style="color:blue" class="ti-download"></i></td>
                                        <td><a  href="{{url('downloadzipfile/'.$data->invoice_no)}}"><strong style="color: black;">Download document</strong></a></td>
                                    </tr>

                                    <tr data-toggle="modal" data-inv="{{$data->invoice_no}}"  onclick="cancelshipid({{$data->id}},this)" data-target="#cancelshipment">
                                        <td><i id="ifontsiz"  style="color:red !important;" class="fa fa-trash-o"></i></td>
                                        <td style="color:red"><strong>Cancel Shipment </strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>

    @endforeach

    </tbody>
</table>

