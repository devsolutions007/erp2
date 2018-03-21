<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product';

    public function productCategory(){
        return $this->belongsTo('App\ProductCategory', 'productcategory');
    }

    public function inventory(){
        return $this->hasMany('App\Inventory');
    }
}
