<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGrowProductRFID extends Model
{
    protected $table = 'product_grow_product_rfid';
    protected  $primaryKey = 'rfid';
    public $incrementing = false;
}