<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">





    <!-- Bootstrap CSS -->
    {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    {{--<link rel="stylesheet" href="assets/styles/custom.css" />--}}
    <title>Invoice</title>
</head>


<style>
    .cardbody{
        background: #ffffff;
        border: 1px solid #dfe0eb;
        box-sizing: border-box;
        border-radius: 8px;
        box-shadow: 0px 10px 24px rgb(54 123 245 / 25%);
        margin-top: 63px !important;
        padding: 30px;
    }
    .pad{
        padding-right: 40px;
    } .pad2{
        padding-right: 88px;
    }

    th{
        font-weight: 100;
        padding: 4px;
    }

    @font-face {
        font-family: 'myfont';
        src: url({{ storage_path('fonts\RobotoCondensed-Light.ttf') }}) format("truetype");
        font-weight: 300; // use the matching font-weight here ( 100, 200, 300, 400, etc).
        font-style: normal; // use the matching font-style here
    }
    @font-face {
        font-family: 'myfonthead2';
        src: url({{ storage_path('fonts\Oswald-VariableFont_wght.ttf') }}) format("truetype");
        font-weight: 700; // use the matching font-weight here ( 100, 200, 300, 400, etc).
        font-style: normal; // use the matching font-style here
    }

    @font-face {
        font-family: 'myfonthead';
        src: url({{ storage_path('fonts\RobotoCondensed-Bold.ttf') }}) format("truetype");
        font-weight: 500; // use the matching font-weight here ( 100, 200, 300, 400, etc).
        font-style: normal; // use the matching font-style here
    }

    body {

        font-family: 'myfont';
        font-size: 14px;
    }

    h2,h3,th,.str{
        font-family: 'myfonthead';
        /*font-weight: 700;*/

        /*color:red;*/
    }

    .inv,.str2,th{
        font-family: 'myfonthead2';
        font-weight: 700;

    }
    .bredi{
        border: 2px solid red; !important;
    }



    /*.headfont{*/
        /*font-family:'myfont';*/

    /*}*/

    table tr td {
        margin: 6px;
    }


    th{
        padding: 0 !important;
        line-height: 1;
    }

</style>
<body>

<div class="container">


    <br>
    <br>
    <br>
    <br>
        <div class="row">


            <div style="width: 48%;  padding-left: 16px; display: inline-block;">

                <h3 style="margin: 2px 0;"> <strong class="signature">Bridgewater Logistics Group LLC</strong>
                </h3>

                <span>710 NE 42nd ST 303 <br> Seattle WA 98105 <br>MC-1144759 <br> 206-887-4966 </span>

                <br>
                <br>
                <span><strong class="str">Bill To:</strong></span>
                <br>
                <span style="margin-bottom: 4px">{{$custiomer_name}}</span>
                {{--<span style="margin-bottom: 4px"><strong>{{$custiomer_name}}</strong></span>--}}
            </div>
            <div style="width: 48%; display: inline-block;">
                <h3 style="text-align: right;margin: 2px 0;"> <strong class="signature">Invoice# &nbsp;</strong> <span>{{$shipment_id}}</span>
                </h3>

                <h3 style="text-align: right;margin-top: 1px;"><strong class="str2">invoice date : </strong> <span style="font-size: 14px !important;">{{date('m/d/Y')}}</span></h3>

                    <br>
                    <br>
                    <br>


                {{--<span style="text-align: right;display: block;  padding-right: 1px;">Delivery Date:&nbsp;&nbsp;&nbsp;&nbsp;{{$delivery}}</span>--}}





                {{--<span style="width: 300px;text-align: right;border-radius:4px;padding: 4px 32px 7px 20px;display: block;background: #f1f1f1;  margin-left: 9px;  line-height: 1;">  <span class="str2">Due date:&nbsp;&nbsp;&nbsp;&nbsp; ${{$bid}}</span></span>--}}
                <span style="width: 300px;text-align: right;padding: 4px 32px 7px 20px;display: block;  margin-left: 9px;  line-height: 1;">  <span class="str2">Due date:&nbsp;&nbsp;&nbsp;&nbsp; upon receipt</span></span>



            </div>
        </div>

<?php
      function  getformdata($place){
            $fromdata=explode(",", $place);

            $fromsiz=count($fromdata);

            if($fromsiz>=3){
                $firstplace=$fromdata[$fromsiz-2];

                $secondplace=$fromdata[$fromsiz-3];
                }else{
                $firstplace=$fromdata[$fromsiz-1];

                $secondplace=$fromdata[$fromsiz-2];
                                        }
            return [$firstplace,$secondplace];
        }
    $shipment=\App\Models\shipment::find($id);
    $subtotal=0;
    $quickprc=0;
    if($shipment->discountpercent){
        $quickprc=$shipment->discountpercent;
    }

    $disc=0;

    ?>


    <table style="width: 100%;margin-top: 10px;  border-spacing:0px">
        <tr style="background:#C1C1C1;color:#333333;" class="bredi">
            <th style="text-align: center !important; padding: 3px 0 5px 0 !important;width:65%;text-align: left"> &nbsp;&nbsp; &nbsp;Description</th>
            <th style="width:10%;">Quantity</th>

            <th style="width:15%">Unit price</th>
            <th style="width:10%">Amount</th>
        </tr>

        @if($shipment->is_cancel==1)
            <?php
            $canceldata=\App\Models\shipmentcancel::where('shipment_id',$id)->orderBy('id','DESC')->first();
            $subtotal+=($canceldata->amount);
            ?>

            <tr class="bredi">
                <td>
                    <?php
                   $fromdata= getformdata($shipment->form);
                   $todata= getformdata($shipment->to);
                    ?>
                    <div style="margin-top: 10px;"> Tonu-From:{{$fromdata[1]}},{{$fromdata[0]}} To:{{$todata[1]}},{{$todata[0]}} -Load {{$shipment->load}}<br>
                        <br><strong>Note :</strong>{{$canceldata->note}} </div>
                </td>
                <td style="text-align: center">
                    <div style="margin-top: 10px;"></div>1</td>
                <td style="text-align: center">
                    <div style="margin-top: 10px;">{{$canceldata->amount}}</div></td>
                <td style="text-align: center">
                    <div style="margin-top: 10px;"></div>${{$canceldata->amount}}</td>
            </tr>

            @else
        @foreach($invtblist as $key=>$datalist)
            <?php
                    $dis=0;
                if($key==0){
                    if($shipment->discountamount){
                        $dis=$shipment->discountamount;
                    }

                }
                $subtotal+=($datalist->amount);

                    ?>

        <tr class="bredi">
            <td>
                <div style="margin-top: 10px;"></div>
                <span>{{$datalist->discription}}. </span> <br>
                Picked Up: {{$shipment->actual_pickup_date_a_format}} -  Delivered:{{$shipment->actual_delivery_date_a_format}}
            </td>
            <td style="text-align: center">
                <div style="margin-top: 10px;">{{$datalist->qty}}</div></td>
            <td style="text-align: center">
                <div style="margin-top: 10px;"></div>${{$datalist->unitprice}}</td>
            <td style="text-align: right">
                <div style="margin-top: 10px;"></div>${{$datalist->amount}}</td>
        </tr>
        @endforeach
        @endif
        <tr>

            <td>

            <td>

            </td> <td>

            </td>
            <td>
                <table>
                    <br>
                    <br>
                    <tr style="padding-left: 15px">
                        <td><span style="text-align: center;padding-left: 9px;display: block">Subtotal</span></td>
                        <td>:</td>
                        <td>{{$subtotal}}</td>
                    </tr>
                    <tr>
                        <td><span style="text-align: center;display: block;">Tax (0%)</span></td>
                        <td>:</td>
                        <td>0</td>
                    </tr>
                    @if(($shipment->discountamount>0)&&($shipment->is_cancel==0))
                    <tr>
                        <td> <span style="text-align: center;display: block; ">Deduction({{$quickprc}}%)</span></td>
                        <td>:</td>
                        <td>{{$disc=$shipment->discountamount??0}}</td>
                    </tr>
                    @endif

                    <tr>
                        <td><span style="text-align: center;  padding-left: 27px;;display: block">Total</span></td>
                        <td>:</td>
                        <td>{{$subtotal-$disc}}</td>
                    </tr>
                </table>
                {{--<span style="text-align: center;padding-left: 9px;display: block">Subtotal: &nbsp;{{$subtotal}}</span>--}}
                {{--<span style="text-align: center;display: block;  padding-left: 8px;">Tax (0%):</span>--}}

                {{--<span style="text-align: center;  padding-left: 27px;;display: block">Total:{{$subtotal-$disc}}</span>--}}

            </td>
            {{--<td>--}}
                {{--<br> <br> <span style="text-align: center;display: block">${{$bid}}</span>--}}
                {{--<span style="text-align: center;display: block;padding-right: 20px;">$0.00</span>--}}
                {{--<span style="text-align: center;display: block">${{$bid}}</span>--}}

            {{--</td>--}}
        </tr>

    </table>


</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>
</html>