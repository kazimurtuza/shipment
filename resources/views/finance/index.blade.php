@extends('layout')
@section('page_css')
    <style>
        #map {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }
        .topbtn{
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 300;
            font-size: 14px;
            border: 1px solid #cddcdf;
            padding: 8px 40px 8px 40px;
        }
        .cardico{
            padding: 5px 9px 5px 9px;
            background: linear-gradient(128.58deg, #0F123F 14.67%, #3A408F 86.8%);
            color: white;
            border-radius: 50%;
            font-size: 20px;
            position: absolute;
            top: 19px;
            right: 5px;
        }
        .cardbd{
            margin: 25px;
            background: #FFFFFF;
            border-radius: 10px;
            box-shadow: rgb(17 12 20 / 8%) 0px 28px 74px 0px;
            border-radius: 6px;
            padding: 6px;
        }

        .cardbdsm{

            margin:12px;
            background: #FFFFFF;
            /*border-radius: 10px;*/
            box-shadow: 0px 2px 10px rgba(86, 89, 146, 0.1);
            border-radius: 6px;
            padding:10px

        }
        .cardtxmid{
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-size: 18px;
            line-height: 1px;
            letter-spacing: 0.02em;
            color: #0F123F;
        }
        .cardtxlast{
            font-weight: 500;
            font-size: 14px;
            line-height: 40px;
            text-align: right;
            letter-spacing: 0.02em;
            color: #4CCE70;

        }
        .cardtxhead{
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 500;
            font-size: 12px;
            letter-spacing: 0.02em;
            color: #BABEC6;
        }

        .smrighttx{
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 600;
            font-size: 13px;
            line-height: 24px;
            letter-spacing: 0.02em;

            color: rgba(15, 18, 63, 0.88);
        }
        .smlefttx{
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 500;
            font-size: 12px;
            line-height: 18px;
            /* identical to box height */
            letter-spacing: 0.02em;
            color: #BABEC6;
        }
        .smtxhead{
            padding: 3px;
            border: 1px solid #d5d5d5;
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 500;
            font-size: 10px;
            line-height: 15px;
            text-align: center;
            letter-spacing: 0.02em;
            color: rgba(0, 0, 0, 0.77);
            border-radius: 5px
        }
        .cardbody{
            padding: 40px;  background: #FFFFFF;
            box-shadow: 0px 10px 29px rgb(0 0 0 / 5%);
            border-radius: 20px;
            margin-left: -10px;
            font-size: 12px;
        }
        .overviewheadtx{
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 21px;
        }
        .taglef{
            margin-left: 97px;
            background: rgba(240, 247, 255, 0.6);
            padding: 2px 18px 1px 17px;
            border-radius: 13px;
        }
        .ovmaintx{
            color: #1B2E49;
            opacity: 0.6;
        }
    </style>
@endsection
@section('content')
    <div class="main-content">

        <div class="row">

            <div class="m-4 custom_position">
                <h1 class="tableheadtxt" >Financials</h1>


                <h5 class="tablesecondhead" style="margin-top: 21px">
                    An overview of the weekly and monthly revenue goals
                </h5>
            </div>
        </div>
        <div class="row row-inline-block small-spacing">
            <div class="col-sm-12  cardbody" >
                <div class="row">
                    <div class="col-xs-12" style="text-align: center">

                        <a href="weeklyfinancesrc" class="topbtn" style="background:#F0F7FF;border-radius: 10px 0px 0px 10px;">Weekly</a><a href="monthlylyfinancesrc" class="topbtn" style="background:white; border-radius: 0px 10px 10px 0px;">Monthly</a>

                    </div>

                    <div class="col-lg-12" style="text-align: center">
                        <br>
                        <form action="{{route('datetodatefinance_src')}}" method="get">
                            <input style="margin-bottom: 4px; width: 190px !important;padding-left: 32px;!important;width: 213px;padding-left: 14px;color:black"  type="text" class="datetimebtn datetimebtntxt" id="daterange" name="daterange" value="{{date('d/m/Y')}}   ▶  {{date('d/m/Y')}}" />
                            <button id="submit_btn"  type="submit" style="height:0px;width:0px;opacity:0"></button>
                        </form>


                    </div>
                    <div class="col-sm-12" style="text-align: center;color:#44A4FD"> <span>Different dates</span></div>

                    <div class="col-sm-12">
                        <div class="row " style="justify-content: center">
                            <div class="col-sm-3 cardbd" style="  margin-left: 77px;">
                                <div class="row">
                                    <div class="col-sm-4"><span class="cardico"><i  class="ico mdi mdi-cash-multiple"></i></span> </div>
                                    <div class="col-sm-8">
                                        <span class="cardtxhead">Total Bookings</span>
                                        <br><br>
                                        <span class="cardtxmid">${{$totalbooking/1000}}k</span> <br>
                                        <span class="cardtxlast">{{$prctaakbook>0?'+':''}} {{$prctaakbook}}%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 cardbd">
                                <div class="row">
                                    <div class="col-sm-4"><span class="cardico"><i style="color:white !important;"  class="fa fa-road"></i></span> </div>
                                    <div class="col-sm-8">
                                        <span class="cardtxhead">$&nbsp;per mile</span>
                                        <br><br>
                                        <span class="cardtxmid">${{number_format(($totalbit/($totalmile>0?$totalmile:1)), 2) }}</span>
                                        <br>
                                        <span class="cardtxlast">{{$prc_mile>0?'+':''}} {{$prc_mile}}%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 cardbd">
                                <div class="row">
                                    <div class="col-sm-4"><span class="cardico"><i style="color:white !important;"  class="fa fa-group"></i></span> </div>
                                    <div class="col-sm-8">
                                        <span class="cardtxhead">$&nbsp;per driver</span>
                                        <br><br>
                                        {{--endd--}}
                                        <span class="cardtxmid">${{number_format(($paid_shipment_driver_cost_fromstart/($totaldriver_fromstarting>0?$totaldriver_fromstarting:1)), 2)}}</span>
                                        <br>
                                        <span class="cardtxlast">{{$prc_per_driv>0?'+':''}} {{$prc_per_driv}}%</span>

                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <?php
                    function getdriverdata($id,$startdate,$enddate){
                     $bookstart=date('Y-m-d 00:00:10',strtotime($startdate));
                     $bookend=date('Y-m-d 23:59:59',strtotime($enddate));
                     $driver_name=\App\Models\Driver::find($id)->driver_name;
                     $totaldrv_rev= \App\Models\shipment::where('driver_id',$id)->where('status',1)->where('is_paid',1)->whereBetween('created_at',[$bookstart,$bookend])->sum('driver_cost');
                     $totalmile=\App\Models\shipment::where('driver_id',$id)->where('status',1)->where('is_paid',1)->whereBetween('created_at',[$bookstart,$bookend])->sum('distance');
                     $totalmail_dv=($totalmile*0.000621371)+50;
                         return [$totaldrv_rev,$totalmail_dv,$driver_name];
                    }
                    ?>


                    <div class="col-sm-12" style="  padding-left: 30px;padding-right: 30px;">
                        <div class="row " style="justify-content: center">
                            @foreach($driverlist as $drvinfo)
                                <?php
                                $driverreport= getdriverdata($drvinfo->driver_id,$startdate,$enddate);
                                $drv_rev=$driverreport[0];
                                $drv_mile=$driverreport[1];
                                $drivername=$driverreport[2];
                                ?>

                            <div class="col-sm-2 cardbdsm">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span class="smtxhead">{{$drivername}}</span>
                                        <br>
                                        <br>

                                        <table>
                                            <tr>
                                                <td>  <span class="smlefttx" >Revenue</span>
                                                </td>
                                                <td> &nbsp;</td>

                                                <td><span class="smrighttx">${{number_format(($drv_rev/1000),2)}}k</span></td>

                                            </tr>

                                            <tr>
                                                <td><span class="smlefttx" >$/Mile</span>
                                                </td>
                                                <td></td>

                                                <td><span class="smrighttx">${{number_format(($drv_rev/$drv_mile), 2)}}</span></td>

                                            </tr>
                                        </table>




                                    </div>
                                </div>
                            </div>

                                @endforeach



                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-5 cardbody" style="margin-top: 10px;  padding: 21px !important;  margin-bottom: 20px;">
                <span class="overviewheadtx">Financial Overview</span>
                <br>
                <table style="  margin-top: 7px;">

                    <tr style="line-height: 30px;">
                        <td class="ovmaintx">Outstanding Invoices</td>
                        <td> <span class="taglef">{{$outstanding_invoices}}</span></td>
                    </tr>
                    <tr style="line-height: 30px;">
                        <td class="ovmaintx">Need Documents</td>
                        <td> <span class="taglef">{{$total_empty_file}}</span></td>
                    </tr>
                    <tr style="line-height: 30px;">
                        <td class="ovmaintx">Invoice Age > 30 days</td>
                        <td> <span class="taglef">{{$agemorethentherty}}</span></td>
                    </tr>    <tr style="line-height: 30px;">
                        <td class="ovmaintx">Not submitted invoices</td>
                        <td> <span class="taglef">{{$notsubmited}}</span></td>
                    </tr>


                </table>
            </div>
        </div>



    </div>
@endsection

@section('script')
    {{--date range picker--}}

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        // $('input[name="daterange"]').daterangepicker();


    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script type="text/javascript"
            src="https://maps.google.com/maps/api/js?key=AIzaSyB9jNSEI0xOA-ykAFNA3qBcWqMUKSEoWrY&sensor=false&libraries=places,geometry"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


    {{--date range picker--}}

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
    $('input[name="daterange"]').daterangepicker();

    $('.applyBtn').on('click',function(){

        setTimeout( function() { FetchData(); }, 700);
    })

    function FetchData(){

        $('#submit_btn').click()
    }
    </script>




@endsection