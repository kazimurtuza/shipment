<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_agent extends Model
{
    use HasFactory;
    protected  $fillable=[
'agent',
'gent_email',
'ustomer_id'
    ];
}
