<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Driver Mail</title>
</head>
<style>

    @font-face {
        font-family: 'myfont';
        src: url({{ storage_path('fonts\RobotoCondensed-Light.ttf') }}) format("truetype");
        font-weight: 300; // use the matching font-weight here ( 100, 200, 300, 400, etc).
    font-style: normal; // use the matching font-style here
    }

    body {

        font-family: 'myfont';
        font-size: 14px;
    }

</style>
<body>

<?php
//$data_info=\Illuminate\Support\Facades\DB::table('shipments')->where('invoice_no',1000)->first();
//$driver_info=\App\Models\Driver::where('id',$data_info->driver_id)->first();
//$customername=\App\Models\customer::where('id',$data_info->customer_id)->first()->company_name;

?>

<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dear {{$details->getcustomer->company_name}}</h3>
<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your shipments has been canceled</h3>
<h5> &nbsp;&nbsp; Attached, you will find an invoice with the details of the work.We have summarized this information below:</h5>



{{--<p>--}}
    {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shipment ID:{{$details->invoice_no}}--}}
    {{--<br>--}}
    {{--<br>--}}
    {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Pickup Info</strong>--}}
    {{--<br>--}}
    {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Address:<?php echo $details->form ?>  <br>--}}
    {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date:{{$details->actual_pickup_date}} and Time:{{date('g:i a',strtotime($details->actual_pickup_time))}}--}}
    {{--<br>--}}
    {{--<br>--}}
    {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Delivery Info</strong>--}}
    {{--<br>--}}
    {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Address:{{$details->to}}--}}
    {{--<br>--}}
    {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date:{{$details->actual_delivery_date}} and Time:{{date('g:i a',strtotime($details->actual_delivery_time))}}--}}
    {{--<br>--}}
    {{--<br>--}}

    {{--<br>--}}
    {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total amount: ${{$details->bid_price}}--}}
    {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Balance due: ${{$details->bid_price}}--}}

    {{--<br>--}}
    {{--<br>--}}
    {{--Thank you for your business and we look forward to working with you in the future.--}}
{{--</p>--}}





</body>
</html>