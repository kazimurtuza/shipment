<?php

namespace App\Models;

use App\Mail\customermail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipment extends Model
{
    use HasFactory;

    protected  $fillable=[
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
'is_paid',
'paid_date',
'driver_cost',
'total_cost',
'total_profit',
'is_cancel',
'is_invoice_submit',
'distance',
'distance_reach_time',
'status',
'created_by',
'updated_by',
'agent_id',
'discountpercent',
'discountamount',

        ];

    protected $appends = [
        'actual_pickup_date_a_format',
        'actual_delivery_date_a_format',
    ];

    public function getActualPickupDateAFormatAttribute()
    {
        if ($this->actual_pickup_date != '') {
            return Carbon::make($this->actual_pickup_date)->format('m/d/Y');
        }
        return '--';
    }
    public function getActualDeliveryDateAFormatAttribute()
    {
        if ($this->actual_delivery_date != '') {
            return Carbon::make($this->actual_delivery_date)->format('m/d/Y');
        }
        return '--';
    }

    public function shipmentplaces(){
        return $this->hasMany(shipment_location::class,'shipment_id','id');
    }
    public function getdriver(){
        return $this->hasOne(Driver::class,'id','driver_id');
    }

    public function getshipmentcancel(){
        return $this->hasOne(shipmentcancel::class,'shipment_id','id');
    }
    public function getcustomer(){
        return $this->hasOne(customer::class,'id','customer_id');
    }
    public function customeragent(){
        return $this->hasOne(customer_agent::class,'id','agent_id');
    }
    public function getexp(){
        return $this->hasOne(shipment_expense::class,'shipment_id','id');
    }

    public function invoicedetail(){
        return $this->hasMany(invoice::class,'shipment_id','id')->orderBy('id',"ASC");
    }
    public function invattachlist(){
        return $this->hasMany(inv_attachmentlist::class,'shipment_id','id');
    }




}
