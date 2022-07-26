<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable=[
'driver_name',
'email',
'mobile',
'vehicle_number',
'gas_card_number',
'profit_percentage',
'email_status',
'status',
'fixed',
'per_mile',
'percentage_revenue',
'pay_stat',
'created_by',
'updated_by',
];

    public function shipment(){
        return $this->hasMany(shipment::class,'driver_id','id');
    }
}
