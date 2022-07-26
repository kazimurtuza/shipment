<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipmentcancel extends Model
{
    use HasFactory;
    protected $fillable=[
'shipmentcancels',
'reason',
'shipment_id',
'is_requestsend',
'amount',
'note',];
}
