<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    use HasFactory;

    protected  $fillable=[
        'dispatch_bid_percentage',
        'factoring_bid_percentage',
        'per_gallon_gas_price',
        'insurance_per_day',
        'truck_per_day',
        'truck_per_mile_cost',
    ];
}
