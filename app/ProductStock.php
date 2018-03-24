<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_stock';
    protected  $primaryKey = 'rowid';

}
