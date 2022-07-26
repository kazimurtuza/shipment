<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alert extends Model
{
    use HasFactory;

    protected $fillable=[
'tracking_mail',
'agent_mail',
'customer_id',
'shipment_id',
'alert_for',
'alert_file',
'status',
    ];
}
