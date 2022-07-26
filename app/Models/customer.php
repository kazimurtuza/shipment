<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
protected $fillable=[
    'company_name',
    'customer_type',
    'mc_number',
    'tracking_email',
    'process_type',
    'status',
    'accounting_email',
    'pay_percent',
    'created_by',
    'update_by',
];
public function customeragent(){
    return $this->hasOne(customer_agent::class,'customer_id','id');
}

    public function allcustomeragent(){
        return $this->hasMany(customer_agent::class,'customer_id','id');
    }
    public function shipmentdetails(){
        return $this->hasMany(shipment::class,'customer_id','id');
    }
}
