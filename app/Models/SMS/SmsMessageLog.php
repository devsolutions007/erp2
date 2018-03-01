<?php

namespace App\Models\SMS;


use Illuminate\Database\Eloquent\Model;

class SmsMessageLog extends Model
{
    protected $fillable = ['reference_id','reference_type','message'];
}