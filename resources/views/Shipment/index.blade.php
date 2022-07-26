@extends('layout')
@section('page_css')
    <style>

        #table_id tbody tr:last-child .dropdown-menu{

            top: -240px;
        }
        #table_id tbody tr:nth-last-child(2) .dropdown-menu{

            top: -240px;
        }

        #table_id tbody tr:first-child .dropdown-menu{

            top: -60px !important;
        }

        .invfooterleft{
            margin-left: 118px !important;
        }
        .cancelbg{
            font-size: 10px;
            line-height: 57px;
            width: 118px;
            color: red;
            border-radius: 10px;
            padding: 6px;
            background: rgb(246 203 203 / 65%);
        }
        .cancelsm{
            font-size: 7px;line-height: 10px;width: 118px;color: red;border-radius: 10px;padding: 7px; background: rgb(246 203 203 / 65%);
        }
        .paidbtn{
            width: 58px;
            color: #0E6245;
            background: #CBF4C9;
            border-radius: 11px !important;
        }
        .tonubtn{
            padding-top: 10px !important;
            color: #828282;
            background: #A0A0A0;
            border-radius: 11px !important;
            color: #5f5c5c;
            background: #E0E0E0;
            border-radius: 11px !important;
        }

        .new_customer_btn{
            font-size: 12px;
            color:blue;
        }
        .mul>.select2-container--default .select2-selection--multiple {
            border: 1px solid #ddd !important;
            width:190px;
            border-radius: 22px;
            font-size: 16px;
            padding: 5px 4px 2px 5px;
            border: none;
            box-shadow: none;
        }
        .mul>.select2-container--default.select2-container--focus .select2-selection--multiple {

            padding: 5px 4px 2px 5px;
            border-radius: 10px;

        }
        .mul>.select2-container {
            display: inline;
        }


        .margin-bottom-20>.select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #212121 !important;
            border-radius: 11px 0px 0px 11px !important;
            width: 204.3px;

        }
        .margin-bottom-20>.select2-container--open .select2-dropdown--below {
            width: 119px !important;
        }

        {
            background-color: #fff;
            border: 1px solid #212121 !important;
            border-radius: 11px 0px 0px 11px !important;
            width: 204.3px;

        }
        .input-group-btn>.select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #212121 !important;
            border-radius: 0px 11px 11px 0px !important;
            width: 120px !important;

        }
        .download{
            cursor: pointer;
        }
        .overviewbox3{
            background: #ffffff;
            border: 1px solid #cccccc;
            box-sizing: border-box;
            box-shadow: 0px 5px 6px rgb(255 249 200 / 25%);
            border-radius: 22px;
            margin: 20px;
        }
        #truck{
            color: #000000 !important;
            font-size: 17px !important;
        }
        .btmtb{
            /*border-bottom: 1px solid #cccccc;*/
        }
        .btmtb2{
            border-bottom: 1px dotted #cccccc;
        }
        .viewtable>tbody>tr>td{
            padding:3px !important;
            margin:3px !important;
        }
        .viewtable{
            margin-bottom: 16px !important;
        }
        .distance{
            top: -2px;
            position: relative;
            margin-left: 6.6px;
            font-size: 12px;
            font-weight: 900;
        }
        .select2-container--default .select2-search--dropdown .select2-search__field {
            width: 100% !important;
            border: 1px solid #aaa;
        }
        /*/ width /*/
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #0099e5;
        }

        .location td{

            padding: 0px 2px !important;
        }



        .wizard > .steps > ul > li:first-child.current a span.round_text_center {
            position: relative;
            top: -3px;
        }

        .wizard > .steps > ul > li:nth-child(2).current a span.round_text_center {
            position: relative;
            top: -3px;
            left: -1px;
        }

        .wizard > .steps > ul > li:nth-child(3).current a span.round_text_center {
            position: relative;
            top: -3px;
            left: -2px;
        }

        .wizard > .steps > ul > li:last-child.current a span.round_text_center {
            position: relative;
            top: -3px;
            left: -3px;
        }

        .wizard > .content > .body {
            float: left;
            position: relative;
            width: 95%;
            height: 95%;
            padding: 2.5%;
        }

        .pac-container {
            z-index: 9999;
        }

        /*.select2-container {*/
        /*display: block;*/
        /*width: 100% !important;*/
        /*}*/
        .src .fa{
            color:white !important;
        }
        .mrsrcb{

            margin-right: 28px;

        }  .mrsrcc{

               margin-right: 57px;

           }


        .srcbtn{
            background-color: rgba(227, 17, 17, 0);
            border:none !important;

            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        }

        .bor{
            border-bottom: 1px solid #ede8e8;
            margin-top: 11px;
            margin-bottom: 8px;
        }

        .itemtb td{
            border-radius: 1px solid black !important;
        }

        .invlist th{
            text-align: center;
            font-style: normal;
            font-weight: 700;
            font-size: 13px;
        }

        .clsbtnst{
            font-size: 27px !important;
            font-weight: 100 !important;
            color: #0a0909 !important;
            position: relative;
            top: 8px;
        }

        .labposi{
            left: -76px;
            top: 18px;
        }




        /*search btn*/
        /* Dropdown Button */
        .dropbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        /* Dropdown button on hover & focus */
        .dropbtn:hover, .dropbtn:focus {
            background-color: #3e8e41;
        }

        /* The search field */
        #myInput {
            width: 100%;
            border-radius: 10px;
            font-size: 16px;
            padding: 14px 20px 12px 45px;
            border: none;
            box-shadow: rgb(0 0 0 / 10%) 0px 4px 12px;

        }
        /*multi src*/
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: 1px solid #fff;
            width: 195px;
            border-radius: 10px;
            font-size: 16px;
            padding: 4px 4px 2px 40px;
            border: none;
            box-shadow: rgb(0 0 0 / 10%) 0px 4px 12px;

        }

        .select2-container--default .select2-selection--multiple {
            border: 1px solid #fff;

            width: 195px;
            border-radius: 10px;
            font-size: 16px;
            padding: 4px 4px 2px 40px;
            border: none;
            box-shadow: rgb(0 0 0 / 10%) 0px 4px 12px;
        }

        /*multi src*/
        /* The search field when it gets focus/clicked on */
        #myInput:focus {outline: 3px solid #ddd;}

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }


        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #f1f1f1}

        /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
        .show {display:block;}

        .opmenu{
            font-size: 10pc;
            position: absolute;
            top: 40px;
            right: -143px;
            line-height: 19px;
        }
        .opmenu:hover{
            cursor: pointer;
        }

        .statusbtn{
            margin-left: -4px !important;
            font-family: Lato;
            font-style: normal;
            font-weight: 500;
            font-size: 12px !important;
            line-height: 26px !important;
            padding: 5px 10px 10px 8px !important;
            width: 66px;
        }
        #opposition {
            font-size: 15px;
            position: absolute;
            right: 105px;
            top: -73px;
        }


        .dropdown-menuedit{

            padding: 10px;
            left: -224px !important;
            border-radius: 10px;
            border: none !important;

        }

        #ifontsiz{
            font-size: 20px !important;
        }

        #ifontsiz2{
            position: absolute;
            right: -19px;
            top: 10px;
            font-size: 15px !important;
        }

        .optionitem tr:hover{
            cursor: pointer;
        }


        .form-check-label{
            font-family: Lato !important;
            font-style: normal !important;
        }
        .invmodal{
            padding:20px;
            border-radius: 21px;


            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;

        }

        .itemtb>thead>tr>th {
            vertical-align: bottom !important;
            border-bottom: 1px solid #e4e1e1 !important;
            border-right:1px solid #e4e1e1 !important;
        }
        .itemtb>tr>th {
            vertical-align: bottom !important;
            border-bottom: 1px solid #e4e1e1 !important;
        }

        .itemtb>tbody>tr>td{
            border-right: 1px solid #e4e1e1 !important;

        }.itemtb>tfoot>tr>td{
             border-right: 1px solid #e4e1e1 !important;

         }

        .btnstyle{
            border: 1px solid #dddddd;
            padding: 15px;
            border-radius: 31px;
            height: 38px;
        }

        .itemtx{
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-size: 12px;
            line-height: 20px;
            color:#44A4FD;

        }
        .checkboxtx{
            margin-left: 70px;font-family: 'Public Sans';
            font-style: normal;
            font-weight: 600;
            font-size: 12px;
            line-height: 21px;
            top: 1px;
            position: relative;
            margin-top: 10px;
            left: -13px;
        }
        .checktx{
            color: black !important;
            font-weight: 700 !important;
        }

        .overviewbox {
            width:none !important;
        }
        .adddetails{
            margin-top: 5px;
            border-top: 1px solid #dbdbdb;
            padding-top: 7px;
            padding-bottom: 9px;
        }



        .customer>.select2-container--default >.select2-selection--single{
            border-radius: 50% !important;
        }

        .customer>.select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #212121;
            border-radius: 10px 1px 1px 10px;
        }
        .contact>.select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #212121;
            border-radius: 1px 10px 10px 1px;
        }
        .contact{
            margin-top: 4px;
            margin-left: 0px;
            padding-left: 0px;
        }
        .customer{
            margin-right: 0px;
            padding-right: 0px;
        }



        .filterhead{
            padding-top: 0px;
            margin-top: -30px !important;
            font-style: normal;
            font-weight: 600;
            font-size: 13px;
            line-height: 26px;
            align-items: center;
            color: #3C4257;
            margin-bottom: 14px;
        }

        .invdate{
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 600;
            font-size: 12px;
            line-height: 21px;
            text-align: center;
            letter-spacing: 0.2px;
            color: #000000;
        }
        .invoicesubbtn{
            border-radius: 7px;
            height: 33px;
            color: white !important;
            font-size: 15px;
            background: none;
            padding: 3px 27px;
            background: #2F80ED;
            padding: 5px 19px 5px 19px !important;
        }
        .invsavebtn{
            border: 2px solid #2F80ED;
            color: #00aeff;
            height: 33px;
            font-size: 13px;
            background: none;
            padding: 3px 10px;
            border-radius: 8px;
            padding: 3px 20px !important;
        }

        .doclistbtn{
            height: 33px;
            font-size: 12px;
            background: none;
            box-shadow: rgb(0 0 0 / 48%) 0px 1px 4px !important;
            padding: 5px 17px;
        }
        .shipmentidtx{
            font-weight: 700;
            font-size: 15px;
            line-height: 3px;
            color: #818181;
            margin-left: 12px;
        }

        .dvbtn>.select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #020202;
            border-radius: 10px;
        }

        .select2-container--default .select2-search--inline .select2-search__field {
            font-size: 13px;
            padding-top: 5px;
        }
        .tableinputstyle{
            text-align: center;
            width: 100% !important;
            border: none;
        }
        /*.select2-search__field{*/
        /*    width: 130px !important;*/
        /*}*/

        .fa {
            font-size: 11px;
        }

        .wizard > .actions a, .wizard > .actions a:hover, .wizard > .actions a:active {
            background: rgb(43 75 242) !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            font-size: 10px !important;
        }
        .upfiletxt{
            background: rgba(201, 201, 201, 0.15);
            border-radius: 11px;
            justify-content: center;
            align-items: center;
            padding: 3px 6px 3px 11px;
            position: relative;
            overflow: hidden;
        }
        .filedel{
            position: absolute;
            top: 6px;
            right: 7px;
            cursor: pointer;
        }
        .filedel2{
            position: absolute;
            top: 5px;
            right: 3px;
            font-size: 10px;
            cursor: pointer;
        }

        .ftrtx{

            font-size: 12px;
            align-items: center;
            color: #2B4BF2;
            /* margin-bottom: 1px; */
            text-align: right;
            cursor: pointer;
        }

        .srclist.select2-container {
            width: 200px !important
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin-top: 4px;
        }

    </style>
@endsection
@section('content')
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
    <div class="main-content">
        <div class="row">


            <div class="m-4 custom_position">
                <h1 class="tableheadtxt">Shipment Summary </h1>
                <h5 class="tablesecondhead">
                    Get summary of your organization’s shipments
                </h5>

            </div>
            <input type="text" id="invship_id" style="display:none">
        </div>
        <div class="row row-inline-block small-spacing">
            <div class="col-xs-12" style="background-color: white">
                <div class="box-content">
                    <div class="row mb-20px">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <form action="{{route('src_shipment_list')}}" method="get">

                                    <input  type="text" class="datetimebtn datetimebtntxt" id="daterange" name="daterange" value="{{$date_range}}" />
                                    <i class="fa fa-calendar-o" style="  color: #949494 !important;position: absolute;top: 9px;left: 196px;font-size: 16px;"></i>

                                    <button id="submit_btn"  type="submit" style="height:0px;width:0px;opacity:0"></button>
                                </form>
                            </div>
                        </div>

                        <div class="col-sm-1">
                            <form action="{{route('src_shipment_list')}}" method="get">

                                <input  type="hidden" name="daterange" value="{{date('d/m/Y').'-'.date('d/m/Y')}}">

                                <button
                                        class="btn btn-sm newbtn2 addbtneffect src"
                                        style="  width: 92px;
  border-radius: 10px;
  margin-left: -15px !important;"

                                >

                                    <span class="addbtntxt2">Today</span>
                                    &nbsp;
                                </button>
                            </form>
                        </div>
                        <div class="col-sm-2" style="width: 120px">
                            <div class="form-group">
                                <form action="{{route('src_shipment_weekly')}}" method="get">
                                    <?php
                                    $lastWeek = date("Y/m/d", strtotime("-7 days"));
                                    ?>
                                    <input type="hidden" name="daterangeweekly" value="{{$lastWeek.'-'.date("d/m/Y")}}">

                                    <button
                                            class="btn btn-sm newbtn2 addbtneffect src"
                                            style="width: 100%;border-radius: 10px; margin-left: 3px;">
                                        <span class="addbtntxt2">This Week</span>
                                        &nbsp;
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-1" style="  padding-left: 0px;
  margin-left: 0px;
  width: 116px;">

                            <div class="btn-group">
                                <button onclick="togglesrc(this)" style="border-radius: 10px;width:86px" type="button" class="btn btn-sm newbtn2 addbtneffect src" >
                                    <i id="btni" class="fa fa-sliders"></i>&nbsp;
                                    <span class="addbtntxt2" >Filter</span>
                                </button>
                                <div class="srclist" style="overflow: hidden;height: 444px;position: relative;position: absolute"  >
                                    <div class="modal-header">
                                        <div class="text-right" >    <span  onclick="togglesrc()" aria-hidden="true" style="z-index: 100;font-size: 27px !important;font-weight: 100 !important;color: #0a0909 !important;cursor: pointer;">&times;</span></div>

                                        <div style="font-weight: 700 !important;font-size: 15px !important;" class="modal-title modalheadtx text-center filterhead">Filters</div>
                                        <h4
                                                class="modal-title"
                                                id="myModalLabel"
                                                style="color: #818181; margin-top: 28px; margin-bottom: -29px"
                                        >

                                        </h4>
                                    </div>
                                    <div class="row" style="overflow-y: scroll;  width: 265px;height:380px">

                                        <div class="col-xs-10 col-md-offset-1 sl">
                                            <strong style="font-weight: 600;">Driver</strong>
                                            <br>
                                            <br>

                                            <i style="  position: absolute;top: 53px;left: 28px;z-index: 99999999;" class="fa fa-search"></i>
                                            <select onchange="srclist()"  id="myDropdown1" class="js-example-basic-multiple leaderMultiSelctdropdown" placeholder="Search.."  name="driverlist[]" multiple="multiple">
                                                @foreach($driver_list as $driverinfo)
                                                    <option value="{{$driverinfo->id}}">{{$driverinfo->driver_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xs-12 bor" >
                                        </div>


                                        <div class="col-xs-10 col-md-offset-1 sl">
                                            <strong style="font-weight: 600;">Customers</strong>
                                            <br>
                                            <br>

                                            <i style="  position: absolute;top: 53px;left: 28px;z-index: 99999999;" class="fa fa-search"></i>

                                            <select onchange="srclist()" id="myDropdown2" class="js-example-basic-multiple customerlist" placeholder="Search.."  name="customerlist[]" multiple="multiple">
                                                @foreach($customer_list as $sutomlist)
                                                    <option value="{{$sutomlist->id}}">{{$sutomlist->company_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-xs-12 bor" >
                                        </div>

                                        <div class="col-xs-10 col-md-offset-1 sl">
                                            <strong style="font-weight: 600;">Invoice Status</strong>
                                            <br>
                                            <br>
                                            <div class="form-check">
                                                <input class="uncheck form-check-input paid" onclick="srclist()" type="checkbox" value="paid" id="paid">
                                                <label style="font-family: Poppins;
                  font-style: normal" class="form-check-label" for="flexCheckDefault">
                                                    &nbsp; Paid
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="uncheck form-check-input outstanding" onclick="srclist()" type="checkbox"  id="outstanding" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    &nbsp; Outstanding
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="uncheck form-check-input submitted" onclick="srclist()" type="checkbox" value="submitted" id="submitted" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    &nbsp; Submitted
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="uncheck form-check-input notsubmitted" onclick="srclist()" type="checkbox" value="notsubmitted" id="notsubmitted" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    &nbsp; Not Submitted
                                                </label>
                                            </div>


                                        </div>

                                        <div class="col-xs-12 bor" >
                                        </div>

                                        <div class="col-xs-10 col-md-offset-1 sl">
                                            <strong style="font-weight: 600;">Documents</strong>
                                            <br>
                                            <br>
                                            <div class="form-check">
                                                <input class="uncheck form-check-input missing" onclick="srclist()" type="checkbox" value="missing" id="missing">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    &nbsp; Missing
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 bor" >
                                        </div>

                                        <div class="col-xs-10 col-md-offset-1 sl">
                                            <strong style="font-weight: 600;">Load Status</strong>
                                            <br>
                                            <br>
                                            <div class="form-check">
                                                <input class="uncheck form-check-input not_picked_up" onclick="srclist()" type="checkbox" value="not_picked_up" id="not_picked_up">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    &nbsp; Not Picked up
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="uncheck form-check-input not_delivered" onclick="srclist()" type="checkbox" value="not_delivered" id="not_delivered">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    &nbsp; Not Delivered
                                                </label>
                                            </div>

                                            <br>
                                            <br>
                                        </div>

                                    </div>
                                    <div class="col-xs-12 ftr" style="background:white;position: absolute;bottom:0px" >
                                        <h4 class="ftrtx"  onclick="deletesrclist()" >Clear all</h4>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-2" style="
    margin-right: 17px;

">
                        </div>
                        <div class="col-sm-1">
                            <?php
                            $date=explode("-", $date_range);
                            $start=strtotime($date[0]);
                            $end=strtotime($date[1]);
                            ?>
                            <a
                                    href="{{url('shipment_export/'.$start.'/'.$end)}}"

                                    class="btn btn-sm btnexport"
                                    style="  padding: 8px 8px;height: 35px !important;font-family: SF Pro Text;font-style: normal;font-weight: 500;font-size: 11px;">
                                <i class="ico icon-right-4 icon_rot"></i>
                                <span class="addbtntxt2">Export</span>
                            </a>&nbsp;&nbsp;&nbsp;

                        </div>
                        <div class="col-sm-1 ">
                            <button
                                    style="padding: 6px 8px;margin-left: 10px; background: #2B4BF2 !important;"
                                    class="btn btn-sm newbtn addbtneffect"

                                    onclick="openModalWithSelect('boostrapModal-13')">

                                <i class="ico icon-plus-5"></i>
                                <span class="addbtntxt">New Shipment</span>
                            </button>

                        </div>
                    </div>
                    <!-- /.box-title -->

                    <div class="table-responsive" style="margin-top:10px" id="data-table-wrapper">
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

                                    <td>{{$actual_data['expense']}}</td>
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
                                                                {{--<td style="display: none" data-toggle="modal" id="{{$data->id}}" onclick="setshipid({{$data->invoicedetail}},'{{$data->getcustomer->company_name}}','{{$data->getcustomer->customeragent->agent_email}}','{{$data->invoice_no}}','{{$data->id}}','{{$data->form}}','{{$data->to}}','{{$data->discountpercent}}','{{$data->discountamount}}','{{$data->is_cancel}}','{{$canclenote}}','{{$cancleamount}}','{{$data->load}}')"  data-target=".bd-example-modal-xl"><strong style="color: black;"> Edit or submit Invoice k</strong></td>--}}
                                                                <td style="display: none" data-toggle="modal" id="{{$data->id}}" onclick="setshipid({{$data->id}})"  data-target=".bd-example-modal-xl"><strong style="color: black;"> Edit or submit Invoice k</strong></td>
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
                    </div>
                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-xs-12 -->


        </div>
        <!-- /.row row-inline-block small-spacing -->


    </div>

@endsection

@section('page_modals')

    <div class="modal fade" id="boostrapModal-13" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content modalstyle" style="width: 599px">
                <div class="modal-header">
                    <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                    >
                        <span aria-hidden="true" class="closbtdst">&times;</span>
                    </button>
                    <h4 class="modal-title modalheadtx" id="myModalLabel" style=" margin-bottom: 30px;">
                        Create a new shipment
                    </h4>
                    <h5 class="modal-title modalheadtx2nd" id="myModalLabel">
                        Add shipment details, assign a driver, upload documents and more.
                    </h5>
                </div>

                <div class="modal-body" style="overflow:hidden;position:relative">
                    <form id="wizard" action="{{route('insert_shipment')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{--<div id="wizard">--}}
                        <h2 class="text-center" style="margin-left: 3px">
                            <span class="wizard-step-title round_text_center">1</span>
                        </h2>
                        <span class="shipment2txt positiontop_set2">Details</span>
                        <div class="line1"></div>
                        <div class="line2"></div>
                        <div class="line3"></div>
                        <section>
                            {{--<div class="row bg-danger" style="height:300px,wid">--}}
                            {{--</div>--}}
                            <div class="row " style="margin-top: -26px;display: flex;justify-content: center;  margin-right: 50%;">
                                {{--<div class="col-sm-2"></div>--}}
                                <div class="col-sm-4 setgroup" style="position: relative;margin-bottom: 30px">
                                    <span style="  bottom: -11px !important;" class="form-label labelstyle" for="formControlReadonly">Customer*</span>
                                    <div class="input-group margin-bottom-20">
                                        <select style="width: 200px;"  class="form-control select2stepcustomer  cutomername" name="customer_id" onchange="sub5(this)" required>
                                            <option></option>
                                            @foreach($customer_list as $list)
                                                <option value="{{$list->id}}" data-name="{{$list->company_name}}">{{$list->company_name}}</option>
                                            @endforeach

                                        </select>
                                        <div class="input-group-btn">
                                            {{--<label class="form-label " for="formControlReadonly">.</label>--}}
                                            <select style="width: 125px;" class="form-control select2step  contact" id="contact" name="agent_id" >
                                                <option style="color:black">Contact</option>


                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <span style="  position: absolute;right: 84px;top: 59px;">&nbsp;&nbsp; <i style="cursor: pointer;background: white;color: #4277ff !important;" data-toggle="modal" data-target="#exampleModalcontact" class="fa fa-plus-circle"></i> <span style="color: #4277ff;  font-size: 14px;cursor: pointer" data-toggle="modal" data-target="#exampleModalcontact"> &nbsp; New contact</span></span>

                                {{--<div class="col-sm-2"></div>--}}

                            </div>
                            <div class="row ">
                                <div class="col-xs-7" >

                                    <div class="col-sm-12">
                                        <div class="row destinationlist">
                                            <div class="col-xs-12 from_lat locationlist">
                                                <label class="form-label labelstyle" for="formControlReadonly">From *</label>
                                                <input required class="form-control input_radius start" name="form" id="autocomplete"></input>
                                                <input type="hidden" name="from_lat" class="from_lat to_lat">
                                                <input type="hidden" name="from_lng" class="from_lng to_lng">
                                                <input type="hidden" name="from_place_id" class="from_place_id">
                                                <input type="hidden"  id="start_place" class="from_place_id">
                                                @error('form')
                                                <div class="text-danger inputerror">{{ $message }}</div>
                                                @enderror
                                            </div>



                                            <div id="start_to" class="col-xs-12 locationlist" style="position: relative">
                                                <label class="form-label labelstyle" for="formControlReadonly">To *</label>
                                                <input required class="form-control input_radius end" name="to[]" id="autocomplete1"></input>
                                                <input type="hidden" name="to_lat[]"  class="to_lat">
                                                <input type="hidden" name="to_lng[]" class="to_lng">
                                                <input type="hidden" name="to_place_id[]" class="to_place_id">
                                                <input type="hidden" name="distance_reach_time[]" class="distance_reach_time" id="distance_reach_time" value="distance_reach_time" class="time">
                                                <input type="hidden" name="distance[]"  class="distance">
                                                <input type="hidden" name="time_txt[]" value="" class="time_txt">


                                            </div>
                                        </div>
                                    </div>

                                    @error('to')
                                    <div class="text-danger inputerror">{{ $message }}</div>
                                    @enderror

                                    <div class="col-xs-12" style="margin-top: 9px;">
                                        <span style="font-size: 12px;font-weight: 600;cursor: pointer" onclick="addlocaton()" > &nbsp; <i  class="fa fa-plus-circle"></i>&nbsp; Add another stop</span>
                                    </div>
                                    <div class="col-xs-12">
                                        <label
                                                class="form-label labelstyle"
                                                for="formControlReadonly">Bid price</label>
                                        <input
                                                class="form-control input_radius bit_input"
                                                id="bid_amount"
                                                name="bid_price"
                                                type="text"
                                                oninput="sub4()"
                                                required
                                        />
                                        @error('bid_price')
                                        <div class="text-danger inputerror">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{--<input type="text" name="totaldistance" value="" class="totaldistance_between">--}}


                                    <input type="hidden" class="distancebetween">
                                    <input type="hidden" class="txttime">
                                    <input type="hidden"  class="time_get">
                                </div>

                                <div class="col-xs-5">
                                    <div class="row">
                                        <div class="col-xs-12 ">
                                                <span style="
                                                    font-family: Poppins;
                                                    font-style: normal;
                                                    font-weight: 600;
                                                    font-size: 13px;
                                                    line-height: 6px;
                                                    margin-top: 31px;
                                                    display: flex;
                                                    align-items: center;
                                                  "> <i class="fa fa-info-circle"></i>&nbsp;Rate Confirmation</span>
                                            <span style="font-size: 12px;color: #575F6E;margin-left: 17px;">Requird</span>
                                        </div>

                                        <div class="col-xs-12">
                                            <button
                                                    id="yourBtn" onclick="getFile()"
                                                    type="button"
                                                    class="btn btn-primary btn-sm waves-effect waves-light btndone ncol"
                                                    style="height: 36px;margin-top: 14px; width: 178px; background-color:#647ae9 !important;box-shadow:none !important;">
                                                Upload
                                            </button>

                                            @error('rate_confirmation')
                                            <div class="text-danger inputerror">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{--uploadbtn--}}
                                        <input id="upfile" style="  height: 0px;width: 0px;opacity: 0;" type="file" data-name="mainly you click rate_confirmation" name="rate_confirmation" value="upload" onchange="sub(this)" required />
                                        {{--uploadbtn--}}

                                        <div class="col-xs-12">
                                            <label
                                                    class="form-label labelstyle"
                                                    for="formControlReadonly">PO or Load #</label>
                                            <input
                                                    class="form-control input_radius"
                                                    name="load"
                                                    type="text"
                                                    required
                                            />

                                            @error('load')
                                            <div class="text-danger inputerror">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <h2>
                            <span class="wizard-step-title round_text_center">2</span>
                        </h2>
                        <span class="shipment2txt positiontop_set">Schedule</span>
                        <section>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="row">
                                        {{--<div class="col-xs-12 shipmenttxt">Shipment ID dd<span class="invoice_no"></span> </div>--}}
                                        <div class="col-xs-12 shipment2txt">

                                            Expected Pickup <span class="start_from">710 NE 42nd ST, Seattle WA 98105</span>
                                        </div>

                                        <div class="col-xs-6">
                                            <label
                                                    class="form-label labelstyle"
                                                    for="formControlReadonly">Pickup date *</label>
                                            <input required
                                                   class="form-control input_radius pickupdate"
                                                   name="pickup_date"
                                                   type="date"/>

                                            @error('pickup_date')
                                            <div class="text-danger inputerror">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xs-6">
                                            <label
                                                    class="form-label labelstyle"
                                                    for="formControlReadonly"
                                            >Pickup time *</label
                                            >
                                            <input required
                                                   class="form-control input_radius pickuptime"
                                                   name="pickup_time"
                                                   type="time"
                                                   value="" onchange="changePickupTime(this)"
                                            />

                                            @error('pickup_time')
                                            <div class="text-danger inputerror">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row" id="deliverytime">
                                        <div class="col-xs-12 shipment2txt placetolist" style="margin-top:22px;">

                                            Expected Delivery  <span class="placeto"> </span>
                                        </div>



                                        <div class="col-xs-6 deliverydatelist">
                                            <label
                                                    class="form-label labelstyle"
                                                    for="formControlReadonly">Delivery date *</label>
                                            <input
                                                    class="form-control input_radius delivaridate"
                                                    name="delivery_date[]"
                                                    type="date"
                                                    onchange="update_deli_date(this)"
                                                    required
                                            />

                                            @error('delivery_date')
                                            <div class="text-danger inputerror">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xs-6 deliverytimelist">
                                            <label
                                                    class="form-label labelstyle"
                                                    for="formControlReadonly">Delivery time *</label>
                                            <input
                                                    class="form-control input_radius delivaritime"
                                                    name="delivery_time[]"
                                                    type="time"
                                                    value=""

                                                    onchange="update_deli_time(this)"
                                                    required
                                            />

                                            @error('delivery_time')
                                            <div class="text-danger inputerror">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>

                        <h2>
                            <span class="wizard-step-title round_text_center">3</span>
                        </h2>
                        <span class="shipment2txt positiontop_set">Driver</span>
                        <section>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="row">
                                        {{--<div class="col-xs-12 shipmenttxt">Shipment ID <span class="invoice_no"></span> </div>--}}
                                        <div class="col-xs-12 shipment2txt"
                                             style="margin-top: 32px;margin-left: 42px;">

                                            Assign a driver in your organization to complete shipment
                                        </div>

                                        <div class="col-xs-7 col-xs-offset-3">

                                            <div class="col-xs-12  sl dvbtn">
                                                <label class="form-label labelstyle" for="formControlReadonly">Driver *</label>
                                                <select class="form-control select2step drivercl" id="driver" name="driver_id" onchange="sub1(this)" required>

                                                    <option></option>
                                                    @foreach($driver_list as $list)
                                                        <option value="{{$list->id}}" data-name="{{$list->driver_name}}">{{$list->driver_name}}</option>
                                                    @endforeach

                                                </select>

                                                @error('driver_id')
                                                <div class="text-danger inputerror">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-xs-12 ">
                                                <label class="form-label labelstyle" for="formControlReadonly">Notes
                                                </label>
                                                <input class="form-control input_radius" name="notes" type="text"/>
                                                @error('notes')
                                                <div class="text-danger inputerror">{{ $message }}</div>
                                                @enderror

                                                <span style="margin-left: 37px;font-family: 'Roboto';font-style: normal;font-weight: 600;font-size: 10.5px;line-height: 19px;color: rgba(0, 0, 0, 0.67);">Estimated driver pay &nbsp;&nbsp;&nbsp; $<span class="driver_pay_data">0</span> </span>

                                            </div>

                                            <div class="col-xs-12 " style="  padding: 0px;margin-top: 14px;">
                                                <input type="hidden" id="dv_cost" name="driver_cost">
                                                <input type="hidden" id="total_cost" name="total_cost">
                                                <input type="hidden" id="total_profit" name="total_profit">
                                                <span style="font-size: 12px;font-weight: 600;">Include in the </span>
                                                &nbsp; <select name="sendtype" id="" style="font-size: 12px;"  >
                                                    <option value="email" >Email</option>
                                                    <option value="Text">Text</option>
                                                    <option value="both">Both</option>
                                                </select>
                                                &nbsp;<span style="font-size: 12px;font-weight: 600;">to the driver:</span>

                                                <br>

                                                <div class="form-check checkboxtx" >
                                                    <input style="position: absolute;top: -1px;left: -19px;"
                                                           type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                                                    &nbsp;<label class="form-check-label checktx" for="exampleCheck1">Pick up and drop off info</label>
                                                </div>
                                                <div class="form-check checkboxtx"  >
                                                    <input style="position: absolute;top: -1px;left: -19px;"
                                                           name="Scannable_links"
                                                           type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                                                    &nbsp;<label class="form-check-label checktx" for="exampleCheck1">Scannable links for POD and BOL</label>
                                                </div>
                                                <div class="form-check checkboxtx" >
                                                    <input style="position: absolute;top: -1px;left: -19px;"
                                                           type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                                                    &nbsp;<label class="form-check-label checktx" name="estimatepay" for="exampleCheck1">Driver pay estimate</label>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <h2>
                            <span class="wizard-step-title round_text_center">4</span>
                        </h2>
                        <span class="shipment2txt positiontop_set">Confirm</span>
                        <section>
                            <div class="row" style="margin-top: -33px;"></div>

                            <br/>
                            <br/>

                            <div class="col-xs-7  position_xy">Customer &nbsp;&nbsp; <span style="color: #656565;
font-weight: 500;" class="compname"></span></div>
                            <div class="col-xs-5 position_xy">Bid &nbsp; $<span class="bid_price"></span> </div>

                            <div class="col-xs-12 overviewbox  ">
                                <h5 class="text-center box-card-head">
                                    <i class="ico icon-up"></i>
                                    Expected Pickup
                                </h5>
                                <div class="cartxtdstyle">
                                    <span style="color: rgba(0, 0, 0, 0.41)">Form &nbsp;</span>
                                    <span class="start_place"> Dhaka Medical College Hospital, Secretariat Road, Dhaka, BangladeshDhaka Medical College Hospital, </span>
                                    <br/>
                                    <div class="sp-y">
                                        <span style="color: rgba(0, 0, 0, 0.41)">Date &nbsp;</span>
                                        <span class="start_date"></span>
                                        <br/>
                                    </div>
                                    <div class="sp-y">
                                        <span style="color: rgba(0, 0, 0, 0.41)">Time &nbsp;</span>
                                        <span class="start_time"></span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>

                            <div id="overview">
                                <div class="col-xs-12 overviewbox " style="margin-top: 22px;">
                                    <h5 class="text-center box-card-head">
                                        <i class="fa fa-plane"></i> &nbsp; Expected Delivery
                                    </h5>
                                    <div class="cartxtdstyle overviewlist">
                                        <div class="adddetails">
                                            <span style="color: rgba(0, 0, 0, 0.41)">To &nbsp</span>
                                            <span class="end_place placetovu">  1238 S Kirkland Pkway, Memphis TN </span>


                                            <br/>
                                            <div class="sp-y viewdlidatelist">
                                                <span style="color: rgba(0, 0, 0, 0.41)">Date &nbsp;</span >
                                                <span class="ex_deli_date"></span><br/>
                                            </div>

                                            <div class="sp-y viewdlitimelist">
                                                <span style="color: rgba(0, 0, 0, 0.41)">Time &nbsp;</span>
                                                <span class="ex_deli_time"></span>
                                            </div>

                                        </div>



                                    </div>

                                </div>

                            </div>


                            <div class="col-xs-6 smtx ">&nbsp &nbsp; Assigned Driver &nbsp;</div>
                            <div class="col-xs-6 smtx ">Rate Confirmation</div>

                            <div   class="col-xs-6" style="padding-left: 42px">
                                <label class="form-label labelstyle" style="margin-left: -25px;" for="formControlReadonly">Driver *</label><input readonly id="dvname" class="form-control input_radius dvnamebg" type="text" style="height: 34px; width: 173px; margin-left:-19px"/>
                            </div>



                            <div class="col-xs-6">
                                <div id="yourBtn2" onclick="getFile()" class="btn waves-light input_radius btntxt" style="
background-color: #e3ebff;
margin-top: 26px;
height: 34px;
width: 173px;
color: #4277FF;
overflow: hidden;
">Rate Cof.pdf</div>
                            </div>

                            <div class="col-xs-6 smtx " style="  margin-top: 18px;
  margin-left: 14px;margin-bottom:10px">
                                Estimated driver pay &nbsp; &nbsp;&nbsp;&nbsp  $<span id="driver_pay_data">0</span> &nbsp;
                            </div>


                </div>
                </section>
                {{--</div>--}}
                </form>
            </div>
        </div>
    </div>
    </div>



    <!-- //////modal Upload a document//// -->
    <div
            class="modal fade"
            id="boostrapModal-1"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content modalstyle" style="height: 358px;width: 620px">
                <div class="modal-header">
                    <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                    >
                        <span aria-hidden="true" class="closbtdst">&times;</span>
                    </button>
                    <h4 class="modal-title modalheadtx" id="myModalLabel">Upload a document</h4>
                    <h4
                            class="modal-title"
                            id="myModalLabel"
                            style="color: #818181; margin-top: 28px; margin-bottom: -29px"
                    >
                        Shipment <span id="shipment_code"></span>
                    </h4>
                </div>
                <form action="{{route('upload_document')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-body">


                        <div class="row">
                            <div class="col-xs-4">
                                <h5 style="margin-bottom: -4px">
                                    <i class="fa fa-info-circle"></i>&nbsp; Rate Confirmation
                                </h5>
                                &nbsp; &nbsp;&nbsp; <span class="reqstyle">Required</span>
                                <button
                                        type="button"
                                        class="btn btn-primary btn-sm waves-effect waves-light input_radius btntxt btnmini mtop " style="background-color: #e3ebff;color:#4277FF">
                                    Rate Cof.pdf
                                </button>

                                <br>
                                <i style="font-size: 10px;" class="fa fa-eye"></i>
                                <span class="itemtx download" data-id="" onclick="getdownloaddata(this)" data-type="Rate_Confir-view">view</span>
                                &nbsp

                                <i style="font-size: 10px;" class="ti-download"></i>
                                <span class="itemtx download" data-id="" onclick="getdownloaddata(this)" data-type="Rate_Confir-download">Download</span>


                            </div>


                            <input type="hidden" name="shipment_id" id="idinput">
                            <div class="col-xs-4 border">
                                <h5 style="margin-bottom:-4px">
                                    <i class="fa fa-info-circle"></i>&nbsp; Bill of Lading
                                </h5>
                                &nbsp; &nbsp;&nbsp; <span class="reqstyle">Required</span>
                                <button onclick="clickfile('bill_of_load')" type="button" id="bill_of_load_up" class="btn btn-primary btn-sm waves-effect waves-light input_radius btntxt btnmini mtop bill_of_load" style="background-color: #4277ff">
                                    Uploa
                                </button>
                                <br>
                                <i style="font-size: 10px;" class="fa fa-eye"></i>
                                <span class="itemtx download" data-id="" onclick="getdownloaddata(this)" data-type="lading-view">view</span>
                                &nbsp

                                <i style="font-size: 10px;" class="ti-download"></i>
                                <span class="itemtx download" data-id="" onclick="getdownloaddata(this)" data-type="lading-download">Download</span>
                                <br>
                                @error('bill_of_lading')
                                <span class="text-danger" style="font-size: 9px;">{{ $message }}</span>
                                @enderror
                                <div style='position: relative; top:-40px;height: 0px;width: 0px;overflow:hidden;'><input type="file"  name="bill_of_lading" id="bill_of_load" onchange="clickfileinfo(this,'bill_of_load')">
                                </div>


                            </div>
                            <div class="col-xs-4">
                                <h5 style="margin-bottom: -4px">
                                    <i class="fa fa-info-circle"></i> &nbsp; Proof of Delivery
                                </h5>
                                &nbsp; &nbsp;&nbsp;&nbsp;
                                <span class="reqstyle">Required</span>
                                <button onclick="clickfile('proof_of_deliver')" type="button" id="prf_deli_up" class="btn btn-primary btn-sm waves-effect waves-light input_radius btntxt btnmini mtop proof_of_deliver" style="background-color: #4277ff">
                                    Upload
                                </button>
                                <br>
                                <i style="font-size: 10px;" class="fa fa-eye"></i>
                                <span class="itemtx download" data-id="" onclick="getdownloaddata(this)" data-type="proof-view">view</span>
                                &nbsp

                                <i style="font-size: 10px;" class="ti-download"></i>
                                <span class="itemtx download" data-id="" onclick="getdownloaddata(this)" data-type="proof-download">Download</span>
                                <br>
                                @error('proof_of_delivery')
                                <span class="text-danger" style="font-size: 9px;">{{ $message }}</span>

                                @enderror

                                <div style='position: relative; top:-40px;height: 0px;width: 0px; overflow:hidden;'> <input  type="file" style="overflow:hidden" name="proof_of_delivery" id="proof_of_deliver" onchange="clickfileinfo(this,'proof_of_deliver')">
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-sm-12"  style="margin-top: 20px">
                                    <span style="color: black;font-weight: 500;margin-left: 14px;">Shipment Invoice</span> &nbsp;&nbsp;
                                    <i style="font-size: 14px;" class="fa fa-eye"></i>
                                    <a href="{{url('pdf/'.'83')}}" class="itemtx">view</a>
                                    &nbsp

                                    <i style="font-size: 14px;" class="fa fa-download"></i>
                                    <span class="itemtx download" onclick="getdownloaddata(this)" data-type="Download-Inv" data-id="">Download</span>
                                    &nbsp;

                                    <i style="font-size: 14px;" class="fa fa-pencil"></i>
                                    <span class="itemtx">Edit or Submit</span>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer contetn_center" style="padding-top: 20px;">

                        <span style="  border-bottom: 1px solid #2F80ED;color: #2F80ED;position: absolute;top: 299px;left: 89px;font-size: 14px;">Download All</span>
                        <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light btndone">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- //////Upload driver payment//// -->
    <div class="modal fade" id="boostrapModal-19" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content modalstyle" style="  height: 308px;width: 422px;margin-left: 100px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="closbtdst" onclick="openNewModal('boostrapModal-19','boostrapModal-100')">&times;</span>
                    </button>
                    <h4 class="modal-title modalheadtx" id="myModalLabel">Actual driver pay</h4>


                    <h4 class="modal-title" id="myModalLabel" style="color: #818181; margin-top: 28px; margin-bottom: -29px">

                    </h4>
                </div>
                <form action="{{route('driver_profit_percentage_update')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div   class="col-xs-8 col-sm-offset-2" >
                                <input type="hidden" id="driver_pay_update" name="shipment_id" value="{{ old('shipment_id') }}">
                                <label class="form-label labelstyle" for="formControlReadonly">Percentage of profit</label>
                                <input id="driver_profit_perc" name="driver_profit_perc" class="form-control input_radius dvnamebg" type="text"/>
                                @error('driver_profit_perc')
                                <span class="text-danger" style="font-size: 9px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer contetn_center" style="padding-top: 40px;">
                        <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light btndone">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- //////update driver //// -->
    <div class="modal fade" id="boostrapModal-199" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content modalstyle" style="  height: 308px;width: 422px;margin-left: 100px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true" class="closbtdst" onclick="openNewModal('boostrapModal-199','boostrapModal-100')">&times;</span>

                    </button>
                    <h4 class="modal-title modalheadtx" id="myModalLabel">Change Driver</h4>


                    <h4 class="modal-title" id="myModalLabel" style="color: #818181; margin-top: 28px; margin-bottom: -29px">
                    </h4>
                </div>
                <form action="{{route('driver_update_for_shipment')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <input type="hidden" id="shipment_id2" name="shipment_id" value="{{old('shipment_id')}}">
                            <div  class="col-xs-8 col-sm-offset-2">
                                <label class="form-label labelstyle" for="formControlReadonly">Driver *</label>

                                <select class="form-control select2 " id="driver_update" name="driver_id2"  required>

                                    <option value="">Select</option>
                                    @foreach($driver_list as $list)
                                        <option value="{{$list->id}}" data-name="{{$list->driver_name}}">{{$list->driver_name}}</option>
                                    @endforeach

                                </select>





                                @error('driver_id')
                                <div class="text-danger inputerror">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer contetn_center" style="padding-top: 40px;">
                        <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light btndone">
                            Save change
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /////////////modal alert/////////// -->

    <div
            class="modal fade"
            id="boostrapModal-3"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel-2"
    >
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content borderstyle" style="width: 361px">
                <div class="modal-header">
                    <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"

                    >
                        <span aria-hidden="true" class="closbtdst">&times;</span>
                    </button>

                    <div style="margin-top:22px">  <span
                                class="modal-title modalheadtx"
                                id="myModalLabel-2"
                        >
              Alert Customer and Update status
            </span></div>
                    <div style="margin-top:22px;margin-bottom:-21px">
                        <span class="modalheadtx2nd">Alert the shipper of shipment status.</span>
                    </div>
                </div>
                <form action="{{route('alert_info_insert')}}" method="post" id="alertUsersForm">
                    @csrf
                    <div class="modal-body">
                        <span class="alerttitle">Email Alert</span>

                        <div class="row">
                            <div class="col-xs-10">
                                <label class="form-label labelstyle" for="formControlReadonly"
                                >Tracking
                                </label>
                                <input
                                        class="form-control input_radius traking_email1"
                                        name="traking_email"
                                        id="traking_email"
                                        type="email"
                                        value=""
                                        required
                                />
                            </div>
                            <div class="col-xs-2 traking_email" style="cursor: pointer;margin-top: 33px; font-size: 25px">
                                &times;
                            </div>
                            <div class="col-xs-10">
                                <label class="form-label labelstyle" for="formControlReadonly">Agent</label>
                                <input
                                        class="form-control input_radius"
                                        name="agent_email"
                                        id="agent_email"
                                        type="email"
                                        value=""
                                        required
                                />
                            </div>

                            <input type="hidden" id="shipment_id1" name="shipment_id1">
                            <input type="hidden" id="customer_id1" name="customer_id1">
                            <div class="col-xs-2" style="margin-top: 39px">
                                <span style="font-size: 25px;cursor: pointer" class="agent_email">&times;</span>
                            </div>




                            <div class="col-xs-12" style="  margin-top: 20px;">
                            </div>
                            <div class="col-xs-5 text-center">
                                <input type="radio" value="1" id="pick" date="" time="" name="status_type" checked/>
                                <span class="radio_txt">Pickup</span>
                            </div>
                            <div class="col-xs-5 text-center">
                                <input type="radio" value="2" id="deli" date="" time="" name="status_type"/>
                                <span class="radio_txt">Delivery</span>
                            </div>

                            <div class="col-xs-8" style="margin-top: 10px">
                                <span class="alerttitle">Date and time</span>
                            </div>


                            <br/><br/><br/>

                            <div class="col-xs-6 paddingxyset">
                                <label class="form-label labelstyle" for="formControlReadonly"
                                >Date</label
                                >
                                <input
                                        class="form-control input_radius"
                                        id="date_1"
                                        name="date"
                                        type="date"

                                        required

                                />
                            </div>
                            <div class="col-xs-6 paddingxyset">
                                <label class="form-label labelstyle" for="formControlReadonly">Time</label>
                                <input
                                        id="time_1"
                                        class="form-control input_radius"
                                        name="time"
                                        type="time"
                                        value=""
                                        required
                                />
                            </div>

                            <div class="col-xs-10" style="margin-top: 10px">
                                <span class="alerttitle">Document attachment</span>
                            </div>


                            <div class="col-xs-12" style="  margin-top: 20px;">
                                <div class="col-xs-5 text-center">
                                    <input type="radio" value="1" name="file_type" checked/>
                                    <span class="radio_txt">BOL</span>
                                </div>
                                <div class="col-xs-5 text-center">
                                    <input type="radio" value="2" name="file_type"/>
                                    <span class="radio_txt">POD</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer contetn_center">
                            <button
                                    type="submit"
                                    class="btn btn-primary btn-sm waves-effect waves-light alertcustomersubmitbtn  addbtntxt"
                            >
                                Alert and update status
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- //////modal  Shipment Overview   //// -->

    <div
            class="modal fade md_hid"
            id="boostrapModal-100"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content modalstyle">
                <div class="modal-header">
                    <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                    >
                        <span aria-hidden="true" class="closbtdst">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Shipment Overview</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-5 shipmenttxt" style="margin-top: 3px !important;text-align: left;  margin-left: 16px !important;">
                            Shipment ID &nbsp; <span class="invoice_no"></span>
                        </div>
                        <div class="col-xs-5 text-left shipmenttxt mlf" style="text-align: left !important;margin-left: 36px !important;margin-top: 2px !important;">Status: <span
                                    style="color: #656565;" id="status">Out for delivery</span></div>
                        <br/>
                        <br/>

                        <div class="col-xs-5 text-left position_xy" style="margin-left: 16px !important;">Customer &nbsp; &nbsp; <span style="color: #656565;font-weight: 500;" class="customer_name"></span></div>
                        <div class="col-xs-5 position_xy" style="margin-left: 36px !important;">Bid $<span class="bid"></span></div>

                        <div class="col-xs-12" id="shipments_list">

                        </div>


                        <div class="col-xs-6 smtx" style=" padding-left: 50px;
">
                            &nbsp; &nbsp; Assigned Driver &nbsp;
                            <span class="pointer" id="btn99" onclick="openNewModal('boostrapModal-100','boostrapModal-199')" style="color: rgba(66, 119, 255, 0.85)">Change</span>
                        </div>
                        <div class="col-xs-6 smtx">Rate Confirmation</div>

                        <div class="col-xs-6" style="padding-left: 42px">
                            <label
                                    class="form-label labelstyle"
                                    style="left: 23px"
                                    for="formControlReadonly">Driver *</label>

                            <input
                                    class="form-control input_radius driver_name"

                                    type="text"
                                    style="height: 34px; width: 173px; margin-left: 14px"
                                    value=""

                            />
                        </div>
                        <div class="col-xs-6">

                            <button type="button" class="btn waves-light input_radius btntxt" style="
                    background-color: #e3ebff;
                    margin-top: 26px;
                    height: 34px;
                    width: 173px;
                  ">
                                Rate Cof.pdf
                            </button>


                        </div>

                        <div class="col-xs-12" style="margin-top:20px"></div>


                        <div class="col-xs-6 text-center smtx" style="padding-left: 4px;">
                            Estimated Expenses &nbsp;&nbsp;&nbsp; $<span class="est_total_expense"></span>
                        </div>
                        <div class="col-xs-6 smtx">
                            Actual Expenses &nbsp;&nbsp;&nbsp;
                            <a class="pointer" style="color: rgba(66, 119, 255, 0.85)"
                               onclick="openNewModal('boostrapModal-100', 'boostrapModal-101')" id="pay">Change</a>
                        </div>
                        <div class="col-xs-12" style="margin-top:8px"></div>


                        <div class="col-xs-6 text-center smtx" style="padding-left: 4px;">
                            Estimated driver pay &nbsp;&nbsp;&nbsp; $<span class="est_driver_pay"></span>
                        </div>

                        <div class="col-xs-6 smtx">
                            Actual driver pay &nbsp;&nbsp;&nbsp;
                            <span class="pointer" style="color: rgba(66, 119, 255, 0.85)" data-toggle="modal"
                                  onclick="openNewModal('boostrapModal-100','boostrapModal-19')">
                          Change

                  </span>
                        </div>

                    </div>
                </div>
                <div class="modal-footer contetn_center">
                    <a
                            href=""
                            type="button"
                            style="
                margin-top: 10px;
                margin-right: 30px;
                font-family: Work Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 14px;
                line-height: 24px;
                /* identical to box height, or 171% */

                display: flex;
                align-items: center;

                /* Mid Emphasis */

                color: rgba(21, 25, 32, 0.5);
                  position: relative;
                  right: -15px;
              "
                    >
                        <i class="fa fa-times-circle"></i> &nbsp; Cancel Shipment</a
                    >
                    <button
                            type="button"
                            class="btn btn-primary btn-sm waves-effect waves-light btndone"
                            style="margin-left: 109px;width: 237px;box-shadow:none !important;"
                    >
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- /////////////Expenses and payments/////////// -->
    <div
            class="modal fade"
            id="boostrapModal-101"

            role="dialog"
            aria-labelledby="myModalLabel"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content modalstyle" style="margin-top: -30px;">
                <div class="modal-header">
                    <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                    >
                        {{--<span aria-hidden="true" class="closbtdst">&times;</span>--}}
                        <span aria-hidden="true" class="closbtdst" onclick="openNewModal('boostrapModal-101','boostrapModal-100')">&times;</span>
                    </button>
                    <h4 class="modal-title modalheadtx" id="myModalLabel">
                        <i class="fa fa-long-arrow-left"></i> Expenses and payments
                    </h4>
                </div>
                <div class="modal-body" style="max-height: 800px">
                    <div class="row">


                        <div class="col-xs-6" style="padding-left: 45px;" >Shipment ID <span class="invoice_no"></span></div>
                        <div class="col-xs-6" style="  padding-left: 61px;">
                            Status: <span style="color: #0c0c0c">Out for delivery</span>
                        </div>
                        <br/>
                        <br/>

                        <div class="col-xs-7 text-left" style="padding-left: 45px;">Customer &nbsp; &nbsp; <span class="customer_name"></span>  </div>

                        <div class="col-xs-5 text-right" style="padding-right: 45px;">Bid  <span class="bid">00</span></div>
                        <div class="col-xs-12" style="margin-top: 10px"></div>

                        <div class="col-xs-6 text-left" style="padding-left: 45px;">
                            Estimated Miles
                            <strong
                                    style="
                    font-family: Poppins;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 14px;
                    line-height: 19px;
                    /* identical to box height */

                    text-align: center;

                    color: #0e0e0e;
                  "
                                    class="mile"

                            >00</strong
                            >
                        </div>
                        <div class="col-xs-6 text-right" style="padding-right: 45px;">
                            Estimated days
                            <strong style="
                    font-family: Poppins;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 14px;
                    line-height: 19px;
                    /* identical to box height */

                    text-align: center;

                    color: #0e0e0e;
                  " class="total_date">00</strong>
                        </div>

                        <div class="col-xs-12" style="margin-top: 10px"></div>

                        <div class="col-xs-6" style="
                  font-family: Poppins;
                  font-style: normal;
                  font-weight: bold;
                  font-size: 15px;
                  line-height: 22px;
                    padding-left: 46px;

                  /* material-theme/sys/light/on-primary-container */

                  color: #0b1861;
                ">
                            Estimate vs Actual
                        </div>
                        <div
                                class="col-xs-3 text-right"
                                style="
                  font-family: Poppins;
                  font-style: normal;
                  font-weight: 500;
                  font-size: 15px;
                  line-height: 22px;
                  margin-left: 88px;
                  cursor: pointer;

                  color: #2b4bf2;
                "
                                onclick="tgl('putbtn','textbtn')"
                        >
                            Edit
                        </div>

                        <div class="col-lg-12 col-xs-12">
                            <div class="box-content" style="padding: 2px;">
                                <table class="table table-hover">
                                    <thead>
                                    <tr class="tableheadtx" style="text-align: center">
                                        <td class="text-left" style="  padding-left: 31px;">Expense</td>
                                        <td>Rate</td>
                                        <td>Estimate</td>
                                        <td>Actual</td>
                                    </tr>
                                    </thead>
                                    <form action="{{route('actual_expense_insert')}}" method="post">
                                        @csrf
                                        <tbody>

                                        <tr class="tablebodytxt3">
                                            <td class="text-left" style="  padding-left: 31px;">Rental</td>
                                            <td>$<span class="truck_per_day"></span>/day</td>
                                            <td>$<span class="total_rent"></span></td>
                                            <td class="textbtn">
                                                $<span class="actual_rent_txt">0</span>
                                            </td>
                                            <td class="putbtn">
                                                <input type="text" id="actual_rent" name="rent" class="editbtn tablebodytxt33" placeholder="00">
                                            </td>
                                            <input type="hidden" id="shipment_id_st" name="shipment_id" >
                                        </tr>
                                        <tr class="tablebodytxt3">
                                            <td class="text-left" style="  padding-left: 31px;">Insurance</td>
                                            <td>$<span class="insurance_per_day"></span>/day</td>
                                            <td>$<span class="insurance"></span></td>
                                            <td class="textbtn">
                                                $<span class="actual_insurancetxt">0</span>

                                            </td>
                                            <td class="putbtn ">
                                                <input type="text" id="actual_insurance" name="actual_insurance" class="editbtn tablebodytxt33" placeholder="00">
                                            </td>
                                        </tr>
                                        <tr class="tablebodytxt3">
                                            <td class="text-left" style="  padding-left: 31px;">gas</td>
                                            <td>$<span class="per_gallon_gas_price"></span>/galon</td>
                                            <td>$<span class="est_gas_price"></span></td>
                                            <td class="textbtn">
                                                $<span class="actual_gas_price_txt">0</span>
                                            </td>
                                            <td class="putbtn " >
                                                <input type="text" id="actual_gas_price" name="actual_gas_price" class="editbtn tablebodytxt33" placeholder="00">
                                            </td>
                                        </tr>
                                        <tr class="tablebodytxt3">
                                            <td class="text-left" style="  padding-left: 31px;">Dispatch</td>
                                            <td><span class="dispatch_bid_percentage"></span>% of bid</td>
                                            <td>$<span class="dispatch"></span></td>
                                            <td class="textbtn">
                                                $<span class="actual_dispatch_price_txt">0</span>
                                            </td>
                                            <td class="putbtn">
                                                <input type="text" id="actual_dispatch_price2" name="actual_dispatch_price" class="editbtn tablebodytxt33">
                                            </td>
                                        </tr>
                                        <tr class="tablebodytxt3">
                                            <td class="text-left" style="  padding-left: 31px;">Factoring</td>
                                            <td><span class="factoring_bid_percentage"></span>% of bid</td>
                                            <td>$<span class="factoring"></span></td>
                                            <td class="textbtn">
                                                $<span class="actual_factoring_price_txt">0</span>
                                            </td>
                                            <td class="putbtn ">
                                                <input type="text" id="actual_factoring_price2" value="12" name="actual_factoring_price" class="editbtn tablebodytxt33">
                                            </td>

                                        </tr>

                                        </tbody>
                                    </form>

                                    <tfoot style="border-bottom: 1px solid #e3e5e6">
                                    <tr style="text-align: center; color:#0B1861">
                                        <td class="text-left" style="  padding-left: 31px;"><strong>Total</strong></td>
                                        <td></td>
                                        <td
                                                style="
                            font-family: Poppins;
                            font-style: normal;
                            font-weight: normal;
                            font-size: 12px;
                            line-height: 18px;

                            color: #0b1861;
                          "

                                        >
                                            $<span class="total_exp_amount">00</span>
                                        </td>
                                        <td style="
                            font-family: Poppins;
                            font-style: normal;
                            font-weight: normal;
                            font-size: 12px;
                            line-height: 18px;

                            color: #0b1861;
                          ">
                                            $<span class="total_ac_ex">00</span>
                                        </td>
                                    </tr>
                                    </tfoot>

                                </table>
                            </div>
                            <!-- /.box-content -->
                        </div>

                        <div class="col-lg-6 col-xs-6  textbold">
                            <span style="  margin-left: 31px !important;">Profit before driver</span>
                        </div>
                        <div class="col-lg-3 col-xs-3 text-center textbold">$<span class="profit_before_driver"></span></div>
                        <div class="col-lg-3 col-xs-3 text-center textbold">NA</div>
                        <div class="col-lg-12 col-xs-12 text-center" style="margin-top: 10px"></div>

                        <div class="col-lg-6 col-xs-6" style="padding-left: 45px;">
                            <span class="textbold">Driver’s pay</span> &nbsp;&nbsp;<span class="driver_profit_percen" style="  font-size: 12px;"></span>
                        </div>
                        <div class="col-lg-3 col-xs-3 text-center textbold">$<span class="est_driver_pay"></span> </div>

                        <div class="col-lg-3 col-xs-3 text-center textbold">NA</div>
                    </div>
                </div>
                <div class="modal-footer contetn_center" style=" margin-top: 19px;
                margin-bottom: 15px;">
                    <a href="" type="button" class="shipmenta"><i class="fa fa-times-circle"></i> &nbsp; Cancel Shipment</a>
                    <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light btndone">
                        Save changes
                    </button>
                </div>

                </form>
            </div>
        </div>
    </div>

    <!-- //////Add a new driver//// -->

    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="  font-size: 14px;
  font-weight: 600;">

                <div class="modal-header">
                    <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                    >
                        <span aria-hidden="true" style="  font-size: 27px !important;
  font-weight: 100 !important;
  color: #0a0909 !important;
  position: relative;
  top: 8px;" class="closbtdst">&times;</span>
                    </button>

                    <div style="font-weight: 700 !important;font-size: 15px !important;" class="modal-title modalheadtx text-center filterhead">Filters</div>
                    <h4
                            class="modal-title"
                            id="myModalLabel"
                            style="color: #818181; margin-top: 28px; margin-bottom: -29px"
                    >

                    </h4>
                </div>

                <div class="row">



                    <div class="col-xs-10 col-md-offset-1 sl">
                        <strong style="font-weight: 600;">Driver</strong>
                        <br>
                        <br>

                        <i style="  position: absolute;top: 53px;left: 28px;z-index: 99999999;" class="fa fa-search"></i>

                        <select  id="myDropdown1" class="js-example-basic-multiple" placeholder="Search.."  name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                            ...
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="col-xs-12 bor" >
                    </div>


                    <div class="col-xs-10 col-md-offset-1 sl">
                        <strong style="font-weight: 600;">Customers</strong>
                        <br>
                        <br>

                        <i style="  position: absolute;top: 53px;left: 28px;z-index: 99999999;" class="fa fa-search"></i>

                        <select id="myDropdown2" class="js-example-basic-multiple" placeholder="Search.."  name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                            ...
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>

                    <div class="col-xs-12 bor" >
                    </div>

                    <div class="col-xs-11 col-md-offset-1 sl" >
                        <strong style="font-weight: 600;">Invoice Status</strong>
                        <br>
                        <br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label style="font-family: Poppins;
                  font-style: normal" class="form-check-label" for="flexCheckDefault">
                                &nbsp; Paid
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                &nbsp; Outstanding
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                &nbsp; Submitted
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                &nbsp; Not Submitted
                            </label>
                        </div>


                    </div>

                    <div class="col-xs-12 bor" >
                    </div>

                    <div class="col-xs-10 col-md-offset-1 sl">
                        <strong style="font-weight: 600;">Documents</strong>
                        <br>
                        <br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                &nbsp; Missing
                            </label>
                        </div>
                    </div>

                    <div class="col-xs-12 bor" >
                    </div>

                    <div class="col-xs-10 col-md-offset-1 sl">
                        <strong style="font-weight: 600;">Load Status</strong>
                        <br>
                        <br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                &nbsp; Not Picked up
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                &nbsp; Not Delivered
                            </label>
                        </div>

                        <br>
                        <br>
                    </div>

                    <div class="col-xs-12 bor" style="margin-top:0px" >
                    </div>

                    <div class="modal-footer">

                        <h4 style="font-size: 12px;align-items: center;color: #2B4BF2;  margin-bottom: 0px;">Clear all</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--invoice model--}}
    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button>--}}

    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <form action="{{route('stor_invoice')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-xl" style="width: 700px !important;
  margin-right: 306px !important;">
                <div class="modal-content invmodal" >
                    <div class="modal-header">
                        <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                        >
                            <span aria-hidden="true"  class="closbtdst clsbtnst">&times;</span>
                        </button>

                        <div class="modal-title modalheadtx text-left filterhead" style="margin-top: 6px !important; font-size: 15px;">Submit invoice</div>
                        <h4
                                class="modal-title"
                                id="myModalLabel"
                                style="color: #818181; margin-top: 28px; margin-bottom: -29px"
                        >

                        </h4>
                    </div>



                    <br> <br>
                    <div class="row">
                        <div class="col-sm-10 col-lg-offset-1">
                            <div class="row">

                                <div class="col-sm-1 text-right" style="  padding-top: 10px;
  padding-left: 23px;"><span>&nbsp;&nbsp;To</span></div>
                                <div class="col-sm-5 text-center mul">
                                    <select id="submit_to"  class="js-example-tokenizer form-control select2-hidden-accessible btnstyle" name="submit_to[]" tabindex="-1" data-select2-id="select2-data-10-cy9c" multiple>
                                    </select>
                                    {{--<input type="text" class="btnstyle" id="submit_to" name="submit_to" placeholder="" value="abcd@gmail.com">--}}
                                </div>
                                <div class="col-sm-1 text-right" style="  padding-top: 10px;
  padding-left: 23px;"><span>&nbsp;&nbsp;CC</span></div>

                                <div class="col-sm-5 text-center mul">
                                    <select id="cc" name="cc[]" class="js-example-tokenizer form-control select2-hidden-accessible btnstyle" tabindex="-1" data-select2-id="select2-data-10-cy9c" multiple>
                                    </select>
                                    {{--&nbsp;   <input type="text" class="btnstyle" placeholder="" value="abc@gmail.com">--}}
                                </div>

                                <div class="col-xs-12 bor " >
                                </div>
                                <div class="col-sm-12 ">
                                    <span>Subject</span> &nbsp;&nbsp;&nbsp;

                                    <span id="subject" style="font-family: 'Roboto';font-style: normal;font-weight: 700;font-size: 14px;
color: #8A8A8A;">Invoice#10035-seattle,WA to jacksonville,FL</span>
                                </div>

                                <div class="col-xs-12 bor " >
                                </div>
                            </div>
                        </div>

                    </div>




                    <div class="row" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px; margin: 6px; border-radius: 14px;padding:26px">
                        <div class="col-sm-6">
                            <strong >Bridgewater logistics Group, LLc</strong>
                            <br>
                            710 NE 42nd St 303
                            <br>
                            Seattle,WA 98154632
                            <br>
                            mc-1444895
                            <br>
                            209-342-998


                        </div>
                        <div class="col-sm-6 text-right">
                            <strong>invoice# <span style="margin-left: 42px" id="invids">null</span> </strong>
                            <br>
                            <span class="invdate">invoice date: &nbsp; {{date('m/d/Y')}}</span>


                        </div>

                        <div class="col-sm-12" style="margin:10px">
                        </div>



                        <div class="col-sm-6">
                            <strong>Bill To:</strong>
                            <br>
                            <span id="customernm"></span>
                            {{--<br>--}}
                            {{--P.O Box 79--}}
                            {{--<br>--}}
                            {{--Milford, OH 45150--}}

                        </div>
                        <div class="col-sm-6 text-right" style="margin-top: 20px;">
                            <strong>Due date:</strong> &nbsp; &nbsp;upon receipt
                        </div>


                        <div class="col-sm-12" style="margin-top: 20px">
                            <table class="table itemtb" style="border:1px solid #e4e1e1">
                                <thead>
                                <tr class="invlist" style="background: #C1C1C1">
                                    <th style="width: 340px;">Description</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody id="tblist"></tbody>

                                <tfoot>
                                <tr style="font-weight: 500 !important; font-size: 12px;">
                                    <td><strong onclick="tableadditionalline()"> <i style="cursor: pointer; color:#32c351e0 !important;"  class="fa fa-plus-circle"></i> <span style="  font-size: 11px;cursor: pointer;">Add an additional line</span> </strong></td>
                                    <td></td>
                                    <td class="text-center"><strong>total</strong></td>
                                    <td class="text-center" id="subtotalcal">00</td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                        <div class="col-sm-7"></div>
                        <div class="col-sm-5">
                            <table id="subdetails" style="font-size: 12px;
  text-align: right;
  font-width: 600 !important;
  font-weight: 600">
                                <tr>
                                    <td>Subtotal</td>
                                    <td style="  padding: 1px 7px;">:</td>
                                    <td id="subtotal"></td>
                                </tr>
                                <tr>
                                    <td>Tax(0%)</td>
                                    <td style="padding: 1px 7px;">:</td>
                                    <td></td>
                                </tr>
                                <tr id="qd">
                                    <td >Quick Pay Deduction  <span id="quickprc">(0%)</span></td>
                                    <td style="  padding: 1px 7px;">:</td>
                                    <td id="quickdsc"></td>
                                </tr><tr>
                                    <td>Total</td>
                                    <td style="  padding: 1px 7px;">:</td>
                                    <td id="totalinv"></td>
                                </tr>
                            </table>




                        </div>
                    </div>




                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-10 col-lg-offset-1">
                            <div class="uploadlist" style="display: flex;
                            align-items: center;flex-wrap:wrap;" >

                            </div>
                        </div>



                    </div>


                    <div class="row">
                        <div class="col-sm-9"></div>
                        <br>
                        <div class="col-sm-12 ">
                            <div class="row">
                                <div class="col-sm-10 col-lg-offset-1" style="margin-left: 34px;">
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <button style="  height: 33px;padding: 7px !important;background: none;box-shadow: rgb(0 0 0 / 48%) 0px 1px 4px !important;" onclick="addnewdocu()" type="button" class="btn btn-secondary" >
                                                <i style="top: -3px;position: relative;  transform: rotate(-44deg);font-size: 15px;font-weight: 800;color: blue !important;" class="ico icon-attach-1"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-2"><div class="btn-group dropright" style="margin-left: 10px;">
                                                <button type="button"  class="btn btn-secondary dropdown-toggle doclistbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Documents &nbsp; <i style="position: absolute;top: 10px;" class="fa fa-sort-down"></i>
                                                </button>
                                                <div class="dropdown-menu" style="padding: 10px;width: 200px;position: absolute;left: 1px;">
                                                    <div>
                                                        <input checked class="form-check-input checkboxNoLabel1" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">  &nbsp; Select All
                                                    </div>

                                                    <div>
                                                        <input checked class="form-check-input checkboxNoLabel" type="checkbox" id="checkboxNoLabe2" name="bill_send" value="1" aria-label="..."> &nbsp; Bill of Lading
                                                    </div>
                                                    <div>
                                                        <input checked class="form-check-input checkboxNoLabel" type="checkbox" id="checkboxNoLabe3" name="rate_send" value="1" aria-label="..."> &nbsp; Rate confirmation
                                                    </div>

                                                    <div>
                                                        <input checked class="form-check-input checkboxNoLabel" type="checkbox" id="checkboxNoLabe4" name="proof_send" value="1" aria-label="..."> &nbsp; Proof of delivery
                                                    </div>

                                                </div>
                                            </div></div>
                                        <div class="col-sm-3"><input name="shipid" id="shipid" type="hidden"></div>
                                        <div class="col-sm-3">
                                            <input type="submit" class="btn btn-sm invsavebtn" name="save_and_exit" value="Save and Exit">

                                            {{--<button type="submit" class="btn btn-sm invsavebtn" >Save and Exit</button>--}}
                                        </div>
                                        <div class="col-sm-2" style=" margin-left: 12px;">
                                            <input type="submit" class="btn btn-sm  text-white invoicesubbtn" name="save_and_exit" value="Submit">
                                            {{--<span  onclick="sendinvoice()" class="btn btn-sm  text-white invoicesubbtn"> <i style="color:white !important;" class="fa fa-send-o"></i> &nbsp;&nbsp;  Submit</span>--}}

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{route('sendinvoice')}}" method="post"  >
            @csrf
            <input name="shipid2" id="shipid2" type="hidden">
            <button style="display:none"  type="submit" class="btn btn-sm  text-white invoicesubbtn sendinv "> <i style="color:white !important;" class="fa fa-send-o"></i> &nbsp;&nbsp;  Submit</button>

        </form>

        <form action="{{route('downloadallfile')}}" method="get" style="display:none"  >
            @csrf
            <input name="ship_id" id="ship_id_wn" type="hidden">
            <button style="display:none" id="dwnallzip"  type="submit" > <i style="color:white !important;" class="fa fa-send-o"></i> &nbsp;&nbsp;  Submit</button>

        </form>



    </div>






    {{--shipment cancel modal--}}

    <!-- Button trigger modal -->
    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cancelshipment">--}}
    {{--Launch demo modal--}}
    {{--</button>--}}

    <!-- Modal -->
    <div class="modal fade" id="cancelshipment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="  border-radius: 35px;width: 472px;left: 86px;">
                <form action="{{route("shipment_cancel")}}" method="post">
                    @csrf
                    <div class="modal-header" style="  margin-top: 8px;">
                        <h5 class="modal-title" id="exampleModalLabel"><strong class="text-danger" style="  top: 24px;
  position: absolute;">Cancel Shipment</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="  font-size: 28px;
  font-weight: 400;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong class="shipmentidtx">Shipment &nbsp; &nbsp;<span id="cancelinv"></span></strong>

                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-lg-offset-2">
                            <label for="" style="font-size: 14px;">Cancellation Reason</label>
                            <select value="" id="reason" name="reason" class="form-control" style="border-color:#b9b2b2;border-radius: 13px;" required>
                                <option value="Shipment not ready">Shipment not ready</option>
                                <option value="Truck  breakdown">Truck  breakdown</option>
                                <option value="Late arrival">Late arrival</option>
                                <option value="Did not fit!">Did not fit!</option>
                                <option value="No reason">No reason</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <br>
                        <br>
                        <br>

                        <div class="col-sm-10 col-lg-offset-1" style="margin-top: 16px;padding-top: 0px;  background: #FFFFFF;box-shadow: 0px 1px 4px rgb(0 0 0 / 25%);border-radius: 9px; padding: 16px;">
                            <div class="row">
                                <div class="col-sm-6" style="margin-top: 28px;">
                                    <div class="form-check" style="">
                                        <input class="form-check-input" name="is_request" type="checkbox" id="is_tonu">

                                        <span style="color: #828282;">Request tonu</span>
                                        <br>
                                        <span style="font-family: 'Public Sans';font-style: normal;font-weight: 300;font-size: 13px;padding-left: 19px;color: #828282;">(optional)</span>
                                        &nbsp;

                                    </div></div>
                                <div class="col-sm-6">
                                    <input type="hidden" id="cancel_id" name="ship_id">
                                    <div class="col-xs-12">
                                        <label
                                                class="form-label labelstyle"
                                                for="formControlReadonly">Amount *</label>
                                        <input
                                                style="    height: 38px;border-color: #b9b2b2;"
                                                class="form-control input_radius"
                                                name="amount"
                                                type="text"
                                                id="cancelamount"
                                                required
                                        />

                                        @error('load')
                                        <div class="text-danger inputerror">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12" style="height: 127px;">
                                    <div style="  margin: auto;width: 76%;margin-bottom: 16px; margin-bottom: 16px;">
                                        <label class="form-label labelstyle" for="formControlReadonly">
                                            Invoice Notes  (Optional)
                                        </label>
                                        <input id="cancelnote" style="   height: 38px;border-color: #b9b2b2;" class="form-control input_radius" name="note" type="text"  />

                                        @error('load')
                                        <div class="text-danger inputerror">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div style="padding: 1px 40px;font-size: 11px;">
                                        Notes will be mentioned in the invoice description line. Some examples are reasons to justify amount.
                                    </div>
                                    <br>
                                    <br>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer" style="  text-align: center !important;">
                        {{--<button type="submit" style=" margin-top: 6px;margin-bottom: 10px;background: #F24221;color: white!important;border-radius: 10px;font-size: 13px;padding: 5px 17px;"   class="btn">Cancel Shipment</button>--}}
                        <span type="submit" onclick="cancelshipment()" style=" margin-top: 6px;margin-bottom: 10px;background: #F24221;color: white!important;border-radius: 10px;font-size: 13px;padding: 5px 17px;"   class="btn">Cancel Shipment</span>
                    </div>

                </form>
            </div>
        </div>
    </div>


    {{--add contact--}}
    <div class="modal fade bd-example-modal-sm2" id="exampleModalcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelcoltact" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document" >
            <div class="modal-content" style="  margin-top: 66%;
  left: 100%;
  border-radius: 12px;">
                <div class="modal-header" style="  border-bottom: 1px solid #dcdada;">
                    <h5 class="modal-title" id="exampleModalLabel">Add a contact</h5>
                    <button type="button" class="close" style="  margin-top: -20px !important;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center !important;">
                    <form action="{{route('agent_add')}}}" method="post" onsubmit="submitcustomeragent(this)">
                        <div class="row">
                            <input type="hidden" id="customerget_id" name="customer_id">
                            <div class="col-xs-12 ">
                                <label class="form-label labelstyle labposi" for="formControlReadonly">Name *</label>
                                <input
                                        class="form-control input_radius"
                                        name="agent_name"
                                        id="agent_nameid"
                                        type="text"
                                        required
                                />
                                @error('agent_name')
                                <div class="text-danger inputerror">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xs-12">
                                <label class="form-label labelstyle labposi" for="formControlReadonly">Email *</label>
                                <input
                                        class="form-control input_radius"
                                        name="agent_email"
                                        id="agent_emailid"
                                        type="email"
                                        required
                                />
                                @error('agent_email')
                                <div class="text-danger inputerror">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>

                        </div>
                        <br>
                        <br>
                        <button type="submit" style="margin: auto; font-size: 12px;
          background: #2f80ed;
          color:white;
  margin: auto;
  padding: 2px 41px;
  border-radius: 10px;" class="btn ">Add</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div>
        <form action="{{route('download_view_file')}}" method="post" style="display: none">
            @csrf
            <input type="text" name="status" id="download_status">
            <input type="text" name="shipment_id" id="download_shipment_id">
            <button type="submit" id="download_submit"></button>
        </form>

    </div>

    {{--addd new customer--}}


    {{--confirm cancel shipment--}}
    <div class="modal fade"  id="cancelconfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="  width: 400px !important;">
            <div class="modal-content" style="border-radius: 28px !important;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:#F24E1E" >Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12" style="
  margin-top: -23px;
  margin-bottom: 10px;
"> <h5 class="text-center" style="color:#818181">The shipment is not delivered yet</h5></div>
                        <div class="col-sm-6"> <button onclick="yessubmit()" class="btn" style="color:#2F80ED;background:white; border: 2px solid #2F80ED;font-size: 11px;
  font-weight: 700;
  padding: 2px 27px;  border-radius: 10px;">Yes, submit!</button></div>
                        <div class="col-sm-6"><button onclick="notcancel()" class="btn" style="color:white;background:#2F80ED;font-size: 11px;
  font-weight: 700;
  padding: 4px 27px; margin-bottom:20px;  border-radius: 10px;">No, take me back</button></div>


                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script type="text/javascript"
            src="https://maps.google.com/maps/api/js?key=AIzaSyB9jNSEI0xOA-ykAFNA3qBcWqMUKSEoWrY&sensor=false&libraries=places,geometry"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


    {{--date range picker--}}

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script src="assets/plugin/select2/js/select2.min.js"></script>
    <script>

        $(document).ready(function () {
            google.maps.event.addDomListener(window, 'load', initialize);
        });

        function initialize() {
            var input = document.getElementById('autocomplete');
            var input1 = document.getElementById('autocomplete1');
            var autocomplete = new google.maps.places.Autocomplete(input);
            var autocomplete1 = new google.maps.places.Autocomplete(input1);
            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                $('.from_lat').val(place.geometry['location'].lat());
                $('.from_lng').val(place.geometry['location'].lng());
                $('.from_place_id').val(place.place_id);

                if($('.to_lat').val()){
                    setdistance();
                }
            });
            autocomplete1.addListener('place_changed', function () {
                var place1 = autocomplete1.getPlace();
                $('#start_to').children('.to_lat').val(place1.geometry['location'].lat());
                $('#start_to').children('.to_lng').val(place1.geometry['location'].lng());
                $('#start_to').children('.to_place_id').val(place1.place_id);

                setdistance();
            });
        }

        function setdistance(){
            let from_lat = $(".from_lat").val();
            let from_lng = $(".from_lng").val();
            let to_lat = $(".to_lat").val();
            let to_lng = $(".to_lng").val();
            // getDistanceFromBackend([from_lat, from_lng], [to_lat, to_lng]);

        }

        //getDistance([23.745258, 90.352048], [23.774802, 90.365544]);
        function getDistance(from_point, end_point) {
            let from_latlng = new google.maps.LatLng(from_point[0], from_point[1]);
            let end_latlng = new google.maps.LatLng(end_point[0], end_point[1]);
            var distance = google.maps.geometry.spherical.computeDistanceBetween(from_latlng, end_latlng);
            return distance;
        }

        function getDistanceFromBackend(from_point, end_point) {
            let route = "{{ route('map.get-distance') }}";
            let _token = "{{ csrf_token() }}";

            var distance=0;
            var dataar=[];

            $.ajax({
                url: route, //PHP file to execute oop
                async: false,
                data: {
                    _token: _token,
                    lat1: from_point[0],
                    lat2: end_point[0],
                    lng1: from_point[1],
                    lng2: end_point[1],
                    mode: 'driving'
                },
                type: 'POST', //method used POST or GET
                success: function (result) { // Has to be there !


                    distance = result.distance;
                    let total_time = result.time;

                    //data txt
                    let dist_txt = result.dist_txt;
                    let time_txt = result.time_txt;


                    $(".distancebetween").val(distance);
                    $(".time_get").val(total_time);
                    $(".txttime").val(time_txt);
                    dataar=[distance,total_time,time_txt]

                },
                error: function (result, statut, error) { // Handle errors

                    // alert('select place from or to properly')
                    swal("error", "Please select the Pickup Location and Delivery Location Correctly");
                    return false;
                }

            });

            return dataar;
        }

        // google address autocomplete

        function openModalWithSelect(id) {
            $('#' + id).modal('show');
            $('.select2step').select2({
                placeholder: "Select"
            });
            $('.select2stepcustomer').select2({
                placeholder: "Select",
                language: {
                    noResults: function () {
                        return $("<a class='new_customer_btn'  href='{{route("customer_view")}}?open=createModal'>New Customer</a>");
                    }
                }
            });
        }

        function openNewModal(oldModal, newModal) {

            $('#' + newModal).modal('show');
            $('#' + oldModal).modal('hide');
        }

        $(document).ready(function () {

            $(function () {
                var form = $("#wizard").show();
                form.steps({
                    headerTag: "h2",
                    bodyTag: "section",
                    transitionEffect: "slideLeft",
                    onContentLoaded: function () {
                        $('.select2step').select2({
                            placeholder: "Select"
                        });
                        $('.select2stepcustomer').select2({
                            placeholder: "Select"
                        });
                    },
                    onStepChanging: function (event, currentIndex, newIndex) {
                        // Allways allow previous action even if the current form is not valid!
                        if (currentIndex > newIndex) {
                            return true;
                        }
                        // Needed in some cases if the user went back (clean up)
                        if (currentIndex < newIndex) {
                            // To remove error styles
                            // form.find(".body:eq(" + newIndex + ") label.error").remove();
                            // form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                        }
                        if (currentIndex == 0) {
                            let from_lat = $(".from_lat").val();
                            let from_lng = $(".from_lng").val();
                            let from_place_id = $(".from_place_id").val();
                            let to_lat = $(".to_lat").val();
                            let to_lng = $(".to_lng").val();
                            let to_place_id = $(".to_place_id").val();
                            if (!from_lat || !from_lng || !from_place_id) {

                                swal('Please Select Correct  Location.');
                                return false;
                            }
                            if (!to_lat || !to_lng || !to_place_id) {
                                swal('Please Select Correct To Location.');
                                return false;
                            }


                        }

                        if (newIndex == 1){
                            var to_place_name = $('input[name="to[]"]').map(function(){
                                return this.value;
                            }).get();



                            $('#deliverytime .placetolist').each(function(index){
                                $(this).find('.placeto').html(to_place_name[index])
                            })

                            $('.overviewlist .adddetails').each(function(index){
                                $(this).find('.placetovu').html(to_place_name[index])
                            })



                            //hhh
                            var route = "{{ route('map.get-distance') }}";
                            var _token = "{{ csrf_token() }}";
                            var from_lat=0
                            var from_lng=0
                            var i=0
                            $('.destinationlist .locationlist').each(function(){
                                let to_lat=$(this).find('.to_lat').val()
                                let to_lng=$(this).find('.to_lng').val()
                                if(i>0){
                                    let distanceinfo=getDistanceFromBackend([from_lat,from_lng],[to_lat, to_lng]);

                                    $(this).find('.distance').val(distanceinfo[0])
                                    $(this).find('.distance_reach_time').val(distanceinfo[1])
                                    $(this).find('.time_txt').val(distanceinfo[2])

                                }
                                from_lat=to_lat
                                from_lng=to_lng

                                i=i+1
                            })



                            // let distance =$('.distance_between').val();
                            // if (!distance) {
                            //     return false;
                            // }
                        }
                        if (currentIndex == 2){
                            ///kkk


                            {{--let bid=$('#bid_amount').val()--}}
                            {{--let time=$('#distance_reach_time').val() //second--}}
                            {{--let distance =$('.distance_between').val()--}}
                            {{--let driver_id =$('#driver').val()--}}


                            {{--let route = "{{ route('get_driver_payment')}}";--}}
                            {{--let _token = "{{ csrf_token() }}";--}}

                            {{--$.ajax({--}}
                            {{--url:route,--}}
                            {{--data:{--}}
                            {{--_token:_token,--}}
                            {{--bid:bid,--}}
                            {{--time:time,--}}
                            {{--distance:distance,--}}
                            {{--driver_id:driver_id,--}}
                            {{--},--}}
                            {{--type:'post',--}}
                            {{--success:function(result){--}}

                            {{--$data=JSON.parse(result);--}}
                            {{--console.log($data)--}}


                            {{--$('#driver_pay_data').html($data)--}}

                            {{--$('.driver_pay_data').html($data)--}}




                            {{--}--}}

                            {{--})--}}


                        }
                        form.validate().settings.ignore = ":disabled,:hidden";
                        return form.valid();
                    },
                    onStepChanged: function (event, currentIndex, priorIndex) {
                        $('.select2step').select2({
                            placeholder: "Select"
                        });
                        // if (currentIndex === 2 && priorIndex === 3)
                        // {
                        //     form.steps("previous");
                        // }
                    },

                    onFinishing: function (event, currentIndex) {
                        form.validate().settings.ignore = ":disabled";
                        return form.valid();
                    },
                    onFinished: function (event, currentIndex) {
                        // if($('#yourBtn2').html())
                        let file_name_siz=$('#yourBtn2').html().length;
                        if(! file_name_siz > 0){
                            alert('Rate Confirmation')
                            event.preventDefault();
                        }else{

                            //wizsub

                            $("#wizard").submit();
                            $("#page-loading").show();
                            $("#boostrapModal-13").modal('hide');

                        }

                    }
                });
            });
        });

        //distance_between


        // upload file

        function getFile() {
            document.getElementById("upfile").click();
        }

        function sub(obj) {

            var file = obj.value;
            var fileName = file.split("\\");

            document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
            document.getElementById("yourBtn2").innerHTML = fileName[fileName.length - 1];
            if(fileName==""){
                $('#yourBtn').html('Upload');
            }
            // document.myForm.submit();
            event.preventDefault();
        }

        // driver

        function sub1(obj) {


            var distance =0;
            $("input[name='distance[]']").map(function(){
                distance+=parseFloat($(this).val(),3) ;
            })
            var time=0; //second

            $("input[name='distance_reach_time[]']").map(function(){
                time+=parseFloat($(this).val(),3) ;
            })

            // console.log(distance)
            // console.log(time)


            let bid=$('#bid_amount').val()


            let driver_id=$(obj).val()


            let route = "{{ route('get_driver_payment')}}";
            let token = "{{ csrf_token() }}";

            $.ajax({
                url:route,
                data:{
                    _token:token,
                    bid:bid,
                    time:time,
                    distance:distance,
                    driver_id:driver_id,
                },
                type:'post',

                // tstdrv
                success:function(result){
                    // console.log(result);

                    $data=result;

                    let drv_cost=$data[0];
                    let total_cost=$data[1];
                    let total_profit=$data[2];





                    $('#driver_pay_data').html(drv_cost)
                    $('.driver_pay_data').html(drv_cost)
                    $('#dv_cost').val(drv_cost);
                    $('#total_cost').val(total_cost);
                    $('#total_profit').val(total_profit);
                }

            })

            let name=$('option:selected', obj).attr('data-name');
            $('#dvname').val(name);


        }

        function sub4(){
            // alert('bid_price')

            $('.bid_price').html($('.bit_input').val())

            let from=$('.start').val();
            let to=$('.end').val();

            $('.start_from').html(from)

            $('.end_to').html(to)

            $('.start_place').html(from)
            $('.end_place').html(to)
        }




        function changePickupTime(input) {
            let time = $(input).val();
            let date = $('.pickupdate').val();
            let total_need_time=$('.time').val();
            var i=0
            var j=0

            console.log('time'+total_need_time)

            let route = "{{ route('delivery_time')}}";
            let _token = "{{ csrf_token() }}";
            var reach_time_list = $('input[name="distance_reach_time[]"]').map(function(){
                return this.value;
            }).get();



            $.ajax({
                url: route, //PHP file to execute
                data: {
                    _token: _token,
                    start_time: time,
                    start_date: date,
                    include_time:total_need_time,
                    reachtimelist: reach_time_list,
                },
                type: 'POST', //method used POST or GET
                success: function (result) { // Has to be there !

                    $('#deliverytime .deliverydatelist').each(function(){
                        $(this).find('.delivaridate').val(result[i].delivery_date)
                        i=i+1;
                    })


                    $('#deliverytime .deliverytimelist').each(function(){
                        $(this).find('.delivaritime').val(result[j].delivery_time_show)
                        j=j+1;
                    })



                    $('.overviewlist .viewdlidatelist').each(function(index){
                        $(this).find('.ex_deli_date').html(result[index].delivery_date)
                    })

                    $('.overviewlist .viewdlitimelist').each(function(index){
                        $(this).find('.ex_deli_time').html(result[index].delivery_tim)
                    })

                    $('.start_date').html(date)
                    $('.start_time').html(result[0].start_timedata)




                },
                error: function (result, statut, error) { // Handle errors

                }

            });
        }



        function sub5(obj){

            let name=$('option:selected', obj).attr('data-name');
            $('.compname').html(name)
            let id=$('option:selected', obj).val();
            $('#customerget_id').val(id);
            $.ajax({
                url: "{{url('customer_agentlist')}}",
                type: "get",
                data: {
                    data_id:id,
                },
                success: function(response) {
                    $('#contact').empty();
                    response.map(function(data){
                        $('#contact').append(`     <option value="${data.id}" >${data.agent}</option>`)

                    })
                },
                error: function(xhr) {
                    //Do Something to handle error
                }});



        }
        function tConvert (time) {
            // Check correct time format and split into components
            time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

            if (time.length > 1) { // If time format correct
                time = time.slice (1);  // Remove full string match value
                time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
                time[0] = +time[0] % 12 || 12; // Adjust hours
            }
            return time.join (''); // return adjusted time or original string
        }

        function shipment_overview(shipment){
            $.ajax({
                url: "{{url('shipmentlistdata')}}",
                type: "get",
                data: {
                    ship_id:shipment.id,
                },
                success: function(response) {
                    var i=0;
                    $shipdatalist=response.shipmentplaces
                    $('#shipments_list').empty()
                    $shipdatalist.forEach(function(shipdata){

                        // var  fromdata=shipdata.form.split(",");
                        // var fromsiz=fromdata.length;
                        // let fromfirst
                        // let fromsecond
                        //
                        // if(fromsiz>=3){
                        //      fromfirst=fromdata[fromsiz-2];
                        //      fromsecond=fromdata[fromsiz-3];
                        // }else {
                        //     fromfirst = fromdata[fromsiz - 1];
                        //     fromsecond = fromdata[fromsiz - 2];
                        // }
                        //
                        //
                        // var  todata=shipdata.to.split(",");
                        // var tosiz=fromdata.length;
                        // let tofirst
                        // let tosecond
                        // console.log('to='+shipdata.to)
                        // console.log('to arr='+todata)
                        //
                        //
                        // if(tosiz>=3){
                        //     tofirst=todata[tosiz-2];
                        //     tosecond=todata[tosiz-3];
                        // }else {
                        //     tofirst = todata[tosiz - 1];
                        //     tosecond = todata[tosiz - 2];
                        // }



                        $('#shipments_list').append(`
                           <div class="row overviewbox3">
                               <h5 class="text-center"><span style="padding: 2px;margin: 2px;font-weight: 600;">Shipment &nbsp; ${i+=1}</span></h5>
                                <div class="col-sm-6 ">

                                    <table class="viewtable table table-borderless">
                                        <thead>
                                        <tr class="btmtb">
                                            <td scope="col" colspan="3" class="text-center box-card-head"><i class="ico icon-up"></i> &nbsp; Expected Pickup</td>
                                        </tr>
                                        </thead>
                                        <tbody class="cartxtdstyle">
                                        <tr>
                                            <td style="width:20px">From</td>
                                            <td style="width:10px">:</td>
                                            <td>${shipdata.form}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:20px">Date</td>
                                            <td style="width:10px">:</td>
                                            <td>${shipdata.pickup_date}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:20px">Time</td>
                                            <td style="width:10px">:</td>
                                           <td>${tConvert(shipdata.pickup_time)}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 ">
                                    <table class="viewtable table table-borderless">
                                        <thead>
                                        <tr class="btmtb">
                                            <td scope="col" colspan="3" class="text-center box-card-head"><i id="truck" class="ti-truck"></i> &nbsp; Expected Delivery</td>
                                        </tr>
                                        </thead>
                                        <tbody class="cartxtdstyle">
                                          <tr>
                                            <td style="width:20px">To</td>
                                            <td style="width:10px">:</td>
                                             <td>${shipdata.to}</td>
                                        </tr>

                                        <tr>
                                            <td style="width:20px">Date</td>
                                            <td style="width:10px">:</td>
                                             <td>${shipdata.delivery_date}</td>


                                        </tr>
                                        <tr>
                                            <td style="width:20px">Time</td>
                                            <td style="width:10px">:</td>
                                            <td>${tConvert(shipdata.delivery_time)}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-12 btmtb2"></div>
                                <div class="col-sm-6 ">
                                    <table class="viewtable table table-borderless">
                                        <thead>
                                        <tr class="btmtb">
                                            <td scope="col" colspan="3" class="text-center box-card-head"><i class="ico icon-up"></i> &nbsp; Actual Pickup</td>
                                        </tr>
                                        </thead>
                                        <tbody class="cartxtdstyle">
                                          <tr>
                                            <td style="width:20px">Date</td>
                                            <td style="width:10px">:</td>
                                             <td>${shipdata.actual_pickup_date}</td>


                                        </tr>
                                        <tr>
                                            <td>Time</td>
                                            <td>:</td>
                                            <td>${shipdata.actual_pickup_time}</td>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 ">
                                    <table class="viewtable table table-borderless">
                                        <thead>
                                        <tr class="btmtb">
                                            <td scope="col" colspan="3" class="text-center box-card-head"><i id="truck" class="ti-truck"></i> &nbsp; Actual Delivery</td>
                                        </tr>
                                        </thead>
                                        <tbody class="cartxtdstyle">

                                        <tr>
                                            <td style="width:20px">Date</td>
                                            <td style="width:10px">:</td>
                                            <td>${shipdata.actual_delivery_date}</td>
                                        </tr>
                                        <tr>
                                            <td>Time</td>
                                            <td>:</td>
                                            <td>${shipdata.actual_delivery_time}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        `)
                    })
                    // alert(response);
                },
                error: function(xhr) {
                    //Do Something to handle error
                }});




            $('#driver_pay_update').val(shipment.id)

            $('#shipment_id2').val(shipment.id);
            tgl('textbtn','putbtn')
            let url="{{route('get_estimate_report_arr')}}"
            let token="{{csrf_token()}}"
            $.ajax({
                url:url,
                data:{
                    _token:token,
                    id:shipment.id
                },
                type:'post',
                success:function(result){

                    $data=JSON.parse(result);
                    let estimate_info=$data[0]

                    let expense_unit=$data[1]
                    let shipment_data=$data[2]

                    // tstdrv

                    // console.log(estimate_info).total_rent

                    $('.bid').html(shipment.bid_price)
                    $('.est_total_expense').html(estimate_info.ex)
                    $('.est_gas_price').html(estimate_info.gas)
                    $('.est_driver_pay').html(estimate_info.dr)
                    $('.est_pickup_date').html(shipment_data.pickup_date)
                    $('.est_pickup_time').html(shipment_data.pickup_time)
                    $('.est_delivery_date').html(shipment_data.delivery_date)
                    $('.est_delivery_time').html(shipment_data.delivery_time)




                    $('.ac_pickup_date').html(shipment_data.ac_pickup_date)
                    $('.ac_pickup_time').html(shipment_data.ac_pickup_time)

                    $('.ac_delivery_date').html(shipment_data.ac_delivery_date)
                    $('.ac_delivery_time').html(shipment_data.ac_delivery_time)


                    $('.customer_name').html(shipment_data.customer_name)
                    $('.driver_name').val(shipment_data.driver_name)

                    $('.form').html(shipment.form)
                    $('.to').html(shipment.to)
                    $('.invoice_no').html(shipment.invoice_no)


                    $('.insurance_per_day').html(expense_unit.insurance_per_day);
                    $('.truck_per_day').html(expense_unit.truck_per_day);
                    $('.truck_per_mile_cost').html(expense_unit.truck_per_mile_cost);
                    $('.factoring_bid_percentage').html(expense_unit.factoring_bid_percentage);
                    $('.per_gallon_gas_price').html(expense_unit.per_gallon_gas_price);
                    $('.dispatch_bid_percentage').html(expense_unit.dispatch_bid_percentage);


                    $('.total_rent').html(estimate_info.total_rent);
                    $('.insurance').html(estimate_info.insurance);
                    $('.dispatch').html(estimate_info.dispatch);
                    $('#actual_dispatch_price2').val(estimate_info.dispatch)






                    $('.factoring').html(estimate_info.factoring);

                    $('#actual_factoring_price2').val(estimate_info.factoring);


                    $('.profit_before_driver').html(estimate_info.profit_before_driver);
                    $('.mile').html(estimate_info.mile);
                    $('.total_date').html(estimate_info.total_date);

                    let total_exp=parseFloat(estimate_info.total_rent)+parseFloat(estimate_info.insurance)+parseFloat(estimate_info.dispatch)+parseFloat(estimate_info.factoring)+parseFloat(estimate_info.gas);
                    $('.total_exp_amount').html(total_exp);



                    // actual expense
                    $('.actual_rent_txt').html(shipment.actual_rent)
                    $('#actual_rent').val(shipment.actual_rent)
                    $('.actual_gas_price_txt').html(shipment.actual_gas)
                    $('#actual_gas_price').val(shipment.actual_gas)
                    $('.actual_dispatch_price_txt').html(shipment.actual_dispatch)




                    $('#actual_dispatch_price').val(shipment.actual_dispatch)
                    $('.actual_factoring_price_txt').html(shipment.actual_factoring)
                    $('#actual_factoring_price').val(shipment.actual_factoring)
                    $('.actual_insurancetxt').html(shipment.actual_insurance)

                    $('#actual_insurance').val(shipment.actual_insurance)

                    $('#shipment_id_st').val(shipment.id)


                    $('.driver_profit_percen').html(shipment_data.driver_profit_percentage)

                    //kk11
                    $total_ac_ex=parseFloat(shipment.actual_insurance)+parseFloat(shipment.actual_gas)+parseFloat(shipment.actual_dispatch)+parseFloat(shipment.actual_factoring)+parseFloat(shipment.actual_rent);
                    $('.total_ac_ex').html($total_ac_ex);


                    if((shipment_data.ac_pickup_date==" ") && (shipment_data.ac_delivery_date=="")){
                        $('#status').html('Processing')
                    }
                    else if(shipment_data.ac_delivery_date!=""){
                        $('#status').html('Delivered')
                    }else if (shipment_data.ac_pickup_date!=" "){
                        $('#status').html('Pickedup')
                    }
                }

            })


        }
        $('.editbtn').on('input',function(){
            let rent= $('#actual_rent').val()
            let gas= $('#actual_gas_price').val()
            let dispatch=$('#actual_dispatch_price2').val()
            let facto=$('#actual_factoring_price2').val()
            let insuran=$('#actual_insurance').val()
            let rent1= rent== ''?0:rent;
            let gas1= gas== ''?0:gas;
            let dispatch1= dispatch== ''?0:dispatch;
            let facto1= facto== ''?0:facto;
            let insuran1= insuran== ''?0:insuran;


            $total_ac_ex=parseFloat(rent1)+parseFloat(gas1)+parseFloat(dispatch1)+parseFloat(facto1)+parseFloat(insuran1)

            $('.total_ac_ex').html($total_ac_ex);


        })
        $('.putbtn').hide()

        function tgl(show,hidd){
            $('.'+hidd).hide();
            $('.'+show).show();

        }

        function clickfile(fileid){
            // console.log(fileid);
            $('#'+fileid).click()
            console.log($('#'+fileid).val())
        }

        function clickfileinfo(obj,nameset){
            var name = obj.value;
            var fileName = name.split("\\");
            let getname=fileName[fileName.length - 1];
            $('.'+nameset).html(getname);
            $('.'+nameset).css({"backgroundColor":"#e3ebff","color":"#4277ff"})

        }

        function idinput(data){
            $('.download').attr( "data-id", data[0] );
            $('#idinput').val(data[0])
            $('#shipment_code').html(data[1])

            let bill_prf=data[2];
            let bill_load=data[3];
            let bill_deli=data[4];
            if(bill_load){

                // $('#bill_of_load_up').html(bill_load.split('s/')[1].split('/')[1])
                $('#bill_of_load_up').html(bill_load)
                $('#bill_of_load_up').css({"backgroundColor":"#e3ebff",'color':'#4277FF'})
            }else{
                $('#bill_of_load_up').html('Upload')
                $('#bill_of_load_up').css({"backgroundColor":"#4277ff",'color':'white'})

            }
            if(bill_deli){

                // $('#prf_deli_up').html(bill_deli.split('s/')[1].split('/')[1])
                $('#prf_deli_up').html(bill_deli)

                $('#prf_deli_up').css({"backgroundColor":"#e3ebff",'color':'#4277FF'})
            }else{
                $('#prf_deli_up').html('Upload')
                $('#prf_deli_up').css({"backgroundColor":"#4277ff",'color':'white'})
            }


        }

        function alert_data($data){
            //kkk

            let tracking_email=$data[0]
            let agent_email=$data[1]
            let shipment_id=$data[2]
            let customer_id=$data[3]
            let pick_date=$data[4]
            let pick_time=$data[5]
            let deli_date=$data[6]
            let deli_time=$data[7]

            // date_1
            // time_1


            $('#date_1').val(pick_date);
            $('#time_1').val(pick_time);

            $('#pick').attr('date', pick_date);
            $('#pick').attr('time', pick_time);


            $('#deli').attr('date', deli_date);
            $('#deli').attr('time', deli_time);




            $('.traking_email1').val(tracking_email);
            $('#agent_email').val(agent_email);

            $('#shipment_id1').val(shipment_id);
            $('#customer_id1').val(customer_id);
        }

        $('#deli').on('click',function(){
            $date= $('#deli').attr('date');
            $time= $('#deli').attr('time');

            $('#date_1').val($date);
            if($time=="00:00"){
                $('#time_1').val('');
            }else{
                $('#time_1').val($time);
            }



        })

        $('#pick').on('click',function(){
            $date= $('#pick').attr('date');
            $time= $('#pick').attr('time');

            $('#date_1').val($date);
            $('#time_1').val($time);


        })

        $('.traking_email').on('click',function(){
            $('#traking_email').val('');
        })

        $('.agent_email').on('click',function(){
            $('#agent_email').val('');
        })

        $('.wizard .content .body input').on('click',function(){
            alert($(this).val())
        })



        $(document).ready(function() {
            @if($errors->any())
            console.log(<?php  echo json_encode($errors->has('bill_of_lading'))  ?>);

            @if($errors->has('bill_of_lading')|| $errors->has('proof_of_delivery'))
            $("#boostrapModal-1").modal('show');
            @endif
            @if($errors->has('driver_profit_perc'))
            $("#boostrapModal-19").modal('show');
            @endif

            @endif


        });

    </script>


    <script>

        $('input[name="daterange"]').daterangepicker();


        $('.applyBtn').on('click',function(){



            setTimeout( function() { FetchData(); }, 700);
        })

        function FetchData(){


            $('#submit_btn').click()
        }


        function update_deli_date(obj){


            $('.ex_deli_date').html($(obj).val())

        }

        function update_deli_time(obj){
            // alert($(obj).val());
            let time  = $(obj).val();
            let explode_time = time.split(":");
            let hour = explode_time[0];
            let minute = explode_time[1];
            hour = parseInt(hour);
            let postfix = 'AM';

            if (hour == 0) {
                hour = 12;
            } else if (hour == 12) {
                postfix = 'PM';
            } else if(hour > 12) {
                hour = hour - 12;
                postfix = 'PM';
            }

            $('.ex_deli_time').html(hour + ':' + minute + ' '+ postfix);

        }


        $(document).ready(function() {
            $('#driver_update').select2({
                dropdownParent: $('#boostrapModal-199')
            });

            $("#alertUsersForm").submit(function(e) {
                // return true;
                e.preventDefault(); // prevent actual form submit
                var form = $(this);
                var url = form.attr('action'); //get submit url [replace url here if desired]
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes form input
                    beforeSend: function() {
                        // $("#page-loading").css('display', 'flex');
                        $("#page-loading").show();
                    },
                    success: function(data){
                        if(data.status == 200) {
                            window.location.reload(1);
                        } else {
                            $("#boostrapModal-3").modal('hide');
                            var err_html = `
                                <div class="alert alert-danger">
                                        ${data.message}
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  </div>
`;
                            $(".layout-message-wrapper").html(err_html);
                            $("#page-loading").hide();
                        }
                        // console.log(data);
                    },
                    complete: function () {
                        setTimeout(function () {
                            $("#page-loading").hide();
                        }, 3000);

                    }
                });
            });

        });

        function driversrc($this){
            let div = document.getElementById("myDropdown");
            let a = div.getElementsByTagName("a");
            for (let i = 0; i < a.length; i++) {

                a[i].style.display = "none";
            }





            $('#exampleModalLong').modal('show');
            $('.select2step').select2({
                placeholder: "Select"
            });
        }

        $(document).ready(function() {
            $(".selectdriver").select2({
                dropdownParent: $("#exampleModalLong")
            });


        });




        // search btn

        /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        $('.drvlist').hide();

        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");


            filter = input.value.toUpperCase();


            if (filter == "") {
                $('.drvlist').hide();
            }
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            if (filter){
                for (i = 0; i < a.length; i++) {
                    a[i].style.display = "none";
                    txtValue = a[i].textContent || a[i].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                    } else {
                        a[i].style.display = "none";
                    }
                }
            }
        }

        function deleteshipment($class_id){
            event.preventDefault()
            $('.'+$class_id).remove();
        }



        function addlocaton(){

            let x = Math.floor((Math.random() * 19999) + 1);
            var divid='p'+x;

            $('.destinationlist').append(`
             <div class="col-xs-12 ${x} locationlist" style="positon:relative" id="${divid}">
                                                <a onclick="deleteshipment(${x})" href="#" style="position: absolute;top: 38px;right: -6px;"> <i style="font-size: 20px;color: red !important;" class="fa fa-trash-o"></i></a>
                                                <label class="form-label labelstyle" for="formControlReadonly">To *</label>
                                                <input required class="form-control input_radius start" name="to[]" id="${x}"></input>
                                                <input type="hidden" name="to_lat[]" id="to_lat${x}" class="to_lat">
                                                <input type="hidden" name="to_lng[]" id="to_lng${x}" class="to_lng">
                                                <input type="hidden" name="to_place_id[]" id="to_place_id${x}">
                                                 <input type="hidden" name="distance_reach_time[]" id="distance_reach_time" value="" class="distance_reach_time" class="time">
                                                <input type="hidden" name="time_txt[]" value="" class="time_txt">
                                                <input type="hidden" name="distance[]"  class="distance">
                                                @error('form')
                                                <div class="text-danger inputerror">{{ $message }}</div>
                                                @enderror
                                            </div>
            `)

            var input = document.getElementById(x);
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                $('#to_lat'+x).val(place.geometry['location'].lat());
                $('#to_lng'+x).val(place.geometry['location'].lng());
                $('#to_place_id'+x).val(place.place_id);

                // if($('.to_lat').val()){
                //     setdistance();
                // }
            });









            $('#deliverytime').append(`
            <div class="col-xs-12 shipment2txt ${x} placetolist" style="margin-top:22px;">

                                            Expected Delivery  <span class="placeto"> </span>
                                        </div>

                                        <div class="col-xs-6 ${x} deliverydatelist">
                                            <label
                                                    class="form-label labelstyle"
                                                    for="formControlReadonly">Delivery date *</label>
                                            <input
                                                    class="form-control input_radius delivaridate"
                                                    name="delivery_date[]"
                                                    type="date"
                                                    onchange="update_deli_date(this)"
                                                    required
                                            />

                                            @error('delivery_date')
                                            <div class="text-danger inputerror">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xs-6 ${x} deliverytimelist">
                                            <label
                                                    class="form-label labelstyle"
                                                    for="formControlReadonly">Delivery time *</label>
                                            <input
                                                    class="form-control input_radius delivaritime"
                                                    name="delivery_time[]"
                                                    type="time"
                                                    value=""

                                                    onchange="update_deli_time(this)"
                                                    required
                                            />
                                            @error('delivery_time')
                                            <div class="text-danger inputerror">{{ $message }}</div>
                                            @enderror
                                        </div>

            `)

            $('.overviewlist').append(`
                  <div class="adddetails  ${x}">
                                            <span style="color: rgba(0, 0, 0, 0.41)">To &nbsp</span>
                                            <span class="end_place${x} placetovu">  1238 S Kirkland Pkway, Memphis TN </span>

                                            <br/>
                                            <div class="sp-y viewdlidatelist">
                                                <span style="color: rgba(0, 0, 0, 0.41)">Date &nbsp;</span >
                                                <span class="ex_deli_date"></span><br/>
                                            </div>

                                            <div class="sp-y viewdlitimelist">
                                                <span style="color: rgba(0, 0, 0, 0.41)">Time &nbsp;</span>
                                                <span class="ex_deli_time"></span>
                                            </div>
                                        </div>
               `)


        }



        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();

            $("#myDropdown2").select2({
                multiple:true,
                placeholder: "Search customers",

            }); $("#myDropdown1").select2({
                multiple:true,
                placeholder: "Search drivers",
            });

            $(".js-example-tokenizer").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            })


        });

        function tableadditionalline(){

            let x = Math.floor((Math.random() * 19999) + 1);
            // let rnid='l'.x;
            let countdata= $('#tblist > tr').size()+1;


            $('#tblist').append(`

               <tr id="${x}" style="  color: #333333;font-size: 12px;border-bottom: 1px solid #e4e1e1 !important;position: relative">
                               <td style="border-right: 1px solid #e4e1e1 !important;border-top: 1px solid #e4e1e1 !important;">
                                    <textarea style="height: 17px;" class="tableinputstyle form-control"  name="discription[]" type="text" placeholder=""></textarea> </td>
                                <td scope="row" class="text-center"><input class="tableinputstyle" name="qty[]" min="0" step="any" type="number" placeholder=""></td>

                                <td class="text-center"><input class="tableinputstyle" name="unitprice[]" type="number" min="0" step="any" placeholder=""></td>
                                <td class="text-center">
                                    <input class="tableinputstyle inputamount" onchange="calculatetotal()" name="amount[]" min="0" step="any" type="number" placeholder="">

                                    <i  id="ifontsiz2" onclick="deletetlit(${x})"  style="cursor: pointer; color:red !important;font-size: 13px !important;" class="fa fa-trash-o"></i>


                                </td>
                            </tr>


           `)


        }

        function calculatetotal(){
            let total=0;

            $('.inputamount').each(function(i, obj) {
                let val=$(obj).val();
                ;
                if(val){
                    total=parseFloat(total)+parseFloat(val);
                }

            });


            let dis=$('#quickdsc').html();
            if(!dis){
                dis=0;
            }

            $('#subtotal').html( parseFloat(total).toFixed(2) )
            $('#subtotalcal').html(parseFloat(total).toFixed(2))


            let finaltotal=parseFloat(total)-parseFloat(dis);


            $('#totalinv').html(parseFloat(finaltotal).toFixed(2))


        }

        function deletetlit(id){
            $('#'+id).remove();

        }

        function togglesrc(){
            $('.srclist').toggle();
        }


        function setshipid(id){

            $.ajax({
                url: "{{url('getinvoicedetails')}}",
                type: "get",
                data: {
                    id:id,
                },
                success: function(response) {
                    let from=response.form;
                    let to=response.to;
                    let discountamount=response.discountamount;
                    let discountprc=response.discountpercent;
                    var cancleamount=0;
                    var load=response.load;
                    var iscancel=response.is_cancel;
                    if((response.is_cancel==1)&&(response.is_invoice_submit==1)) {
                        if (response.getshipmentcancel.amount) {
                            cancleamount = response.getshipmentcancel.amount
                        }
                        if (response.getshipmentcancel.note) {
                            canclenote = response.getshipmentcancel.note
                        }
                    }




                    $('.uploadlist').empty();
                    // $('#submit_to').val(toemail)
                    $('#submit_to').html(`<option selected="selected">${response.getcustomer.customeragent.agent_email}</option>`)
                    $('#cc').html(`<option selected="selected">ysi.naj@gmail.com</option>`)
                    $('#subject').html(` Load#${response.load}-${response.form} to ${response.to}`)
                    $('#customernm').html(response.getcustomer.company_name)
                    $('#invids').html(response.invoice_no)




                    var discountam=0;
                    if(discountamount){
                        discountam=response.discountamount;
                    }
                    if(response.is_cancel==1){
                        discountam=0;
                    }
                    var discountprcdata=0;
                    if(discountprc){
                        discountprcdata= parseFloat(response.discountpercent).toFixed(1) ;
                    }
                    let fromarr=from.split(",");
                    let fromlenth=fromarr.length;
                    let lastfrom= fromarr[fromlenth-2]
                    let secondfrom= fromarr[fromlenth-3]

                    let toarr=to.split(",");
                    let tolenth=toarr.length;
                    let lastto= toarr[tolenth-2]
                    let secondto= toarr[tolenth-3]


                    var i=1;
                    $('#tblist').empty()
                    var subtotal=0;



                    if(iscancel==1){
                        subtotal+=parseFloat(parseFloat(cancleamount))
                        $('#tblist').append(`
                   <tr id="${id}" style=" color: #333333;font-size: 12px;border-bottom: 1px solid #e4e1e1 !important;position: relative">

                                <td style="border-right: 1px solid #e4e1e1 !important;border-top: 1px solid #e4e1e1 !important;">
                                  <span>Tonu-${secondfrom},${lastfrom} To: ${secondto},${lastto} -Load:${load} <br></span>
                                </br>
                               <strong>Note &nbsp;</strong>${canclenote}</td>
                                <td scope="row" class="text-center">1</td>
                                <td class="text-center">${parseFloat(cancleamount).toFixed(2)}</td>
                                <td class="text-center">
                         <input type="text" style="text-align: center;" class="inputamount tableinputstyle" readonly value="${parseFloat(cancleamount).toFixed(2)}">
                                    <!--<i id="ifontsiz2"   onclick="deleteinvlist(${id})" style="cursor: pointer;color:red !important;font-size: 13px !important;" class="fa fa-trash-o"></i>-->

                                </td>
                            </tr>
                                `)
                    }   else{
                        response.invoicedetail.forEach(value=>{
                            if(i==1){
                                subtotal+=parseFloat(value.amount)
                            }else{
                                subtotal+=parseFloat(value.amount)
                            }
                            $('#tblist').append(`
                            <tr id="${value.id}" style=" color: #333333;font-size: 12px;border-bottom: 1px solid #e4e1e1 !important;position: relative">

                                <td style="border-right: 1px solid #e4e1e1 !important;border-top: 1px solid #e4e1e1 !important;">${value.discription } <br>Load:#${response.load} Picked Up: ${response.actual_pickup_date_a_format} &nbsp  Delivered:${response.actual_delivery_date_a_format}  </td>
                                <td scope="row" class="text-center">${value.qty}</td>
                                <td class="text-center"> ${parseFloat(value.unitprice).toFixed(2)}</td>
                                <td class="text-center">
                                 <input type="text"  class="inputamount tableinputstyle" readonly value="${parseFloat(value.amount).toFixed(2)}">
                                    <i id="ifontsiz2"   onclick="deleteinvlist(${value.id})" style="cursor: pointer;color:red !important;font-size: 13px !important;" class="fa fa-trash-o"></i>

                                </td>
                            </tr>
                                `)


                        })
                    }

                    $('#shipid').val(id);
                    $('#shipid2').val(id);

                    $('#subtotal').html(parseFloat(subtotal).toFixed(1) )
                    $('#subtotalcal').html(parseFloat(subtotal).toFixed(1))
                    $('#quickprc').html(`(${discountprcdata}%)`)
                    $('#quickdsc').html(discountam)
                    $('#totalinv').html(parseFloat(subtotal-discountam).toFixed(1))


                    if((discountam==0)||(iscancel==1)){
                        $('#qd').hide()
                        $('#subdetails').css({'margin-left':'118px'});
                        // $("#my_id").attr("class", "my_new_class_name");
                    }else{
                        $('#subdetails').css({'margin-left':'0px'});
                        $('#qd').show()

                    }


                },

                error: function(xhr) {
                    //Do Something to handle error
                }});




        }

        function deleteinvlist(id){

            $('#'+id).remove();

            $.ajax({
                url: "{{url('deleteinvlist')}}",
                type: "get",
                data: {
                    id:id,
                },
                success: function(response) {

                },
                error: function(xhr) {
                    //Do Something to handle error
                }});



        }

        function srclist(){


            let driverlist= $(".leaderMultiSelctdropdown").val();
            let customerlist= $(".customerlist").val();
            let paid=($(".paid").is(':checked') == true)?1:null;
            let outstanding=($(".outstanding").is(':checked') == true)?1:null;
            let notsubmitted=($(".notsubmitted").is(':checked') == true)?1:null;
            let submitted=($(".submitted").is(':checked') == true)?1:null;
            let missing=($(".missing").is(':checked') == true)?1:null;
            let not_picked_up=($(".not_picked_up").is(':checked') == true)?1:null;
            let not_delivered=($(".not_delivered").is(':checked') == true)?1:null;




            let route = "{{ route('shipmentfilter') }}";
            let token = "{{ csrf_token()}}";
            $.ajax({
                url: route,
                type: 'POST',
                data: {
                    _token:token,
                    driverlist:driverlist,
                    customerlist:customerlist,
                    paid:paid,
                    outstanding:outstanding,
                    notsubmitted:notsubmitted,
                    submitted:submitted,
                    missing:missing,
                    not_picked_up:not_picked_up,
                    not_delivered:not_delivered,
                },
                success: function(response) {

                    $("#data-table-wrapper").html(response);

                    var oTable1 = $('#table_id').DataTable();
                    $('#myInputTextField').on('input', function() {
                        oTable1.search($(this).val() ).draw();
                    });



                },
                error: function(xhr) {
                    //Do Something to handle error
                },
            });

        }

        function sendinvoice(){
            $('.sendinv').click()
        }

        function cancelshipid(id,){
            $('#cancelinv').html($(this).attr("data-inv"));

            $('#cancel_id').val(id);
        }
        function addnewdocu(){
            let x = Math.floor((Math.random() * 19999) + 1);
            let y = Math.floor((Math.random() * 19) + 1);

            $('.uploadlist').append(`  <div class="upfiletxt" style="padding:10px;margin: 5px;">
                                <input id="${x}" style="display:none" class="emailattfileclass" onchange="uploadEmailAttFile(this)"  type="file" name="emailattfile[]">
                                <span style="margin:10px" class="${x}">Select document</span>
                                <span  class="filedel2" onclick="invfiledel(this)"><i class="ti-close"></i></span>
                               </div>`);
            $('#'+x).click();
        }
        function uploadEmailAttFile(input) {
            let fileName = $(input).val().split('\\').pop();
            let className = $(input).attr('id');
            $("."+className).html(fileName);
        }

        $('input[type="file"]').change(function(e) {
            var geekss = e.target.files[0].name;
            // alert(geekss);

        });

        function invfiledel(data){
            $(data).parent().remove();
        }
        function submitcustomeragent(){
            event.preventDefault()
            let customer_id=$('#customerget_id').val();
            let agent_name=$('#agent_nameid').val();
            let agent_email=$('#agent_emailid').val();
            let token = "{{ csrf_token()}}";
            if(customer_id){
                $.ajax({
                    url: "{{url('agent_add')}}",
                    type: "post",
                    data: {
                        _token:token,
                        customer_id:customer_id,
                        agent_name:agent_name,
                        agent_email:agent_email,
                    },
                    success: function(response) {
                        $('#contact').empty();
                        response.map(function(data){
                            $('#contact').append(`     <option value="${data.id}" >${data.agent}</option>`)

                        })

                        $('#exampleModalcontact').modal('hide');
                    },
                    error: function(xhr) {
                        //Do Something to handle error
                    }});

            }else{
                alert('first Select Customer')
            }
        }

        function getdownloaddata(data){
            $('#download_status').val($(data).attr("data-type"))
            $('#download_shipment_id').val($(data).attr("data-id"))
            $('#download_submit').click()
        }

        function deletesrclist(){
            let driverlist= $(".leaderMultiSelctdropdown").val('');
            let customerlist= $(".customerlist").val('');
            $('.select2-selection__rendered').html('')
            $('.uncheck').prop( "checked", false );
            srclist();


        }

        $('.checkboxNoLabel1').on('click',function(){
            if($('.checkboxNoLabel1').is(':checked')){
                $('#checkboxNoLabe2').prop( "checked", true );
                $('#checkboxNoLabe3').prop( "checked", true );
                $('#checkboxNoLabe4').prop( "checked", true );
            }else{
                $('#checkboxNoLabe2').prop( "checked", false );
                $('#checkboxNoLabe3').prop( "checked", false );
                $('#checkboxNoLabe4').prop( "checked", false );
            }

        })
        function clickinvsubmit($data){

            $('#'+$data).click()
        }
        function clickinvsubmitcondition($data){
            $('#cancelconfirm').modal('show')

            $('#invship_id').val($data);

        }

        function clickinvsubmit_no_condition(data){
            $('#'+data).click()
        }
        function no_invoice(){
            alert('No Invoice')
        }


        function yessubmit(){
            $('#shipcancelid').click();
            let open_inv_id=$('#invship_id').val();
            $('#'+open_inv_id).click()
            $('#cancelconfirm').modal('hide')
        }


        $(document).ready( function () {

            var table = $('#table_id').DataTable();

            var data = table.row( ':last-child' ).data();

            // console.log($(data[10]).find('.dropdown-menu'));
            // $(data[10]).find('.dropdown-menu').remove();
            // $(data[10]).find('.row').remove();
            // alert(data[10]);

        } );


        function cancelshipment(){
            $('#page-loading').show();
            let is__tonu=0
            let is_tonu=$('#is_tonu').is(':checked')
            if(is_tonu) {
                is__tonu = 1
            }
            var cancel_id=  $('#cancel_id').val()
            let amount=  $('#cancelamount').val()
            let note=  $('#cancelnote').val()
            let reason=  $('#reason').val()



            let token = "{{ csrf_token()}}";
            $.ajax({
                url: "{{route('shipment_cancel')}}",
                type: "post",
                data: {
                    _token:token,
                    is_request:is__tonu,
                    ship_id:cancel_id,
                    amount:amount,
                    note:note,
                    reason:reason,
                },
                success: function(response) {

                    $("#data-table-wrapper").html(response);

                    $('#cancelshipment').modal('hide');
                    $('#page-loading').hide();

                    if(is__tonu==1){
                        $('#'+cancel_id).click()
                    }
                    var oTable1 = $('#table_id').DataTable();
                    $('#myInputTextField').on('input', function() {
                        oTable1.search($(this).val() ).draw();
                    });
                },
                error: function(xhr) {
                    //Do Something to handle error
                }});
        }


    </script>

@endsection



