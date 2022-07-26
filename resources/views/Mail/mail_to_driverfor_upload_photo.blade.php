
<?php
        $dataship=\App\Models\shipment::find($shipment_id);
?>

{{--You can Start Pickup:--}}
{{--<a href="{{ route('shipment_pickup_start', $shipment_id) }}">Start Pickup</a>--}}
{{--<br>--}}
{{--You can update Delivery file date time:--}}
{{--<a href="{{ route('shipment_delivery_info_set', $shipment_id) }}">Set Delivery Information</a>--}}



<p style="margin-bottom: 10px;">Hello,</p>
<p style="padding-left: 40px;"><strong>Bridgewater Logistics Group </strong><span style="fontweight: normal;">has assigned you to a new shipment.</span></p>
<p style="padding-left: 40px;">&nbsp;</p>
<p style="padding-left: 40px;"><span style="text-decoration: underline;"><span style="font-weight:
normal;">Load# {{$dataship->load}}</span></span></p>
<p style="padding-left: 80px;"><br><strong>↑ Pickup address: </strong><span style="font-weight:
normal;">{{$dataship->form}}</span></p>
<p style="padding-left: 80px;"><span style="font-weight: bold;">Schedule:&nbsp;</span><span
            style="font-weight: normal;">{{date('g:i a',strtotime($dataship->pickup_time))}}  &nbsp;{{date('m/d/y',strtotime($dataship->pickup_date))}}</span><br>Use this <a href="{{ route('shipment_pickup_start', $shipment_id) }}"
                                                                                 rel="noopener">link</a> to upload pickup documents.</p>
<p style="padding-left: 80px;">&nbsp;</p>
<p style="padding-left: 80px;"><strong>↓Delivery address: <span style="font-weight: normal;">{{$dataship->to}}</span></strong></p>
<p style="padding-left: 80px;"><strong><span style="font-weight: normal;"><span style="font-weight:
bold;">Schedule:&nbsp;</span>{{date('g:i a',strtotime($dataship->delivery_time))}}&nbsp;{{date('m/d/y',strtotime($dataship->delivery_date))}}  <br>Use this <a href="{{ route('shipment_delivery_info_set', $shipment_id) }}"
                                                              rel="noopener">link</a> to upload delivery documents.</span></strong></p>
<p style="padding-left: 80px;">&nbsp;</p>
<p style="padding-left: 80px;"><span style="font-weight: bold;">Estimated pay:</span> {{$dataship->driver_cost}}
</p>
<p style="margin-bottom: 10px;padding-left: 80px;">Thanks,<br>Dispatcher For Less</p>