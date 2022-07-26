<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inv_attachmentlist extends Model
{
    use HasFactory;
    protected $fillable=[
'attachment',
'shipment_id',
'filename',
'status',
    ];
}
