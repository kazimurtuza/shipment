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
$data_info=\Illuminate\Support\Facades\DB::table('shipments')->where('id',$shipment_id)->first();
$driver_info=\App\Models\Driver::where('id',$data_info->driver_id)->first();

?>


    <h3> <strong>Your shipment is confirmed and assigned to a driver!</strong> </h3>
    <p>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shipment ID:{{$data_info->invoice_no}}
        <br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Pickup Info</strong>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address:<?php echo $data_info->form ?>  <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date:{{$data_info->pickup_date}} and Time:{{ date('g:i a',strtotime($data_info->pickup_time))}}
        <br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Delivery Info</strong>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address:{{$data_info->to}}
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date:{{$data_info->delivery_date}} and Time {{ date('g:i a',strtotime($data_info->delivery_time))}}
        <br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Driver Info</strong>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:{{$driver_info->driver_name}}
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone: {{$driver_info->mobile}}
        <br>


    </p>




</body>
</html>