<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proof_delivery_file extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'path',
        'shipment_id',
    ];
}
