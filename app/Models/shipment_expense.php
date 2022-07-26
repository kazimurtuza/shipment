<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipment_expense extends Model
{
    use HasFactory;

    protected  $fillable=[
    'shipment_id',
    'dispatch_bid_percentage',
    'factoring_bid_percentage',
    'per_gallon_gas_price',
    'insurance_per_day',
    'truck_per_day',
    'truck_per_mile_cost',
    'driver_profit_percentage',

     'driver_percentage_revenue',
     'driver_per_mile_pay',
     'driver_pay_status',
     'driver_fixed_pay',
];
}
