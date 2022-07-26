<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipment_location extends Model
{
    use HasFactory;
    protected  $fillable=[
        'shipment_id',
        'invoice_no',
        'customer_id',
        'form',
        'to',
        'bid_price',
        'load',
        'pickup_date',
        'pickup_time',
        'delivery_date',
        'delivery_time',
        'delivery_time_txt',
        'driver_id',
        'rate_confirmation',
        'from_lat',
        'from_lng',
        'to_lat',
        'to_lng',
        'to_place_id',
        'notes',

        'actual_pickup_date',
        'actual_pickup_time',
        'actual_delivery_date',
        'actual_delivery_time',

        'actual_rent',
        'actual_insurance',
        'actual_gas',
        'actual_dispatch',
        'actual_factoring',

        'bill_of_lading',
        'proof_of_delivery',

        'distance',
        'distance_reach_time',
        'status',
        'created_by',
        'updated_by',
    ];
}
