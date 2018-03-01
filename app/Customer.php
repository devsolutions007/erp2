<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Customer extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function location()
    {
        return $this->belongsTo('App\Location');
    }
    
    
    public function getCustomersByLocationAndPreferenceFilters($locations,$preferences,$matchType) {
        //matchType is where / orWhere
        $customers = $this->where(function ($query) use ($locations) {
            foreach($locations as $location) {
                $query->orWhere('location_id', '=', $location);
            }
            })->where(function ($query) use ($preferences,$matchType) {
            foreach ($preferences as $pref) {
                $query->$matchType($pref, '=', 1);
            }
        })->get();
        return $customers;
    }
    
    
}
