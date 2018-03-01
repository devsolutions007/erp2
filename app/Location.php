<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Location extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    
    public function customers()
    {
        return $this->hasMany('App\Customer');
    }
    
    
    public static function GetAllLocationSmsOptinData() {
        $locations = \DB::select("select count(*) as total,Sum(Case When c.sms_optin = 1 and cell <> '' and cell is not null   Then 1 Else 0 End) as sms_optin,l.id,l.name from customers c 
                        inner join locations l on c.location_id = l.id
                        where c.deleted_at is null
                        group by 3,4 order by l.name ");
        
        return $locations;
    }
    
    
    
}
