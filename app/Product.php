<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productCategory(){
        return $this->belongsTo('App\ProductCategory', 'productcategory');
    }

    public function inventory(){
        return $this->hasMany('App\Inventory');
    }
}
