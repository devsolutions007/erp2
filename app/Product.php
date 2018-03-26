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
    protected  $primaryKey = 'rowid';

    public function productCategory(){
        return $this->belongsTo('App\ProductCategory', 'fk_product_type');
    }

    public function inventory(){
        return $this->hasMany('App\Inventory');
    }
}
