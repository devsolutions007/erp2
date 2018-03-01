<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;
use Twilio\Rest\Client;


class CustomerManagerController extends Controller
{
    public function index($locationId = null) {
        $locations = Location::GetAllLocationSmsOptinData();
        
        $tplArgs['locations'] = $locations;
    
        $tplArgs['customers'] = [];
        $tplArgs['locationName'] = '';
        if($locationId) {
            $location = Location::findOrFail($locationId);
            $tplArgs['customers'] = $location->customers;
            $tplArgs['locationName'] = $location->name;
            
        }
        
        
        
        return view('customer.manage',$tplArgs);
    }
    
    public function edit($id) {
        
        $customer = Customer::findOrFail($id);
        $tplArgs['preferences'] = ['pref_flower','pref_concentrate','pref_edible','pref_drink','pref_clone','pref_seed',
            'pref_tincture','pref_gear','pref_topical','pref_preroll','pref_wax','pref_sativa','pref_indica',
            'pref_hybrid','pref_cbd','pref_extract','pref_cartridge','pref_accessory','pref_sports-events',
            'pref_music-events','pref_nature-outdoors','pref_health-wellness','pref_fitness','pref_travel',
            'pref_arts-culture','pref_munchies','pref_foodie','pref_cooking','pref_coffee-shops','pref_city-tours',
            'pref_social-meetups','pref_gaming-tech','pref_industry-events'];
    
        $tplArgs['locations'] = Location::all();
        $tplArgs['customer'] = $customer;
        return view('customer.edit',$tplArgs);
    }
    
    public function add() {
        $tplArgs['preferences'] = ['pref_flower','pref_concentrate','pref_edible','pref_drink','pref_clone','pref_seed',
            'pref_tincture','pref_gear','pref_topical','pref_preroll','pref_wax','pref_sativa','pref_indica',
            'pref_hybrid','pref_cbd','pref_extract','pref_cartridge','pref_accessory','pref_sports-events',
            'pref_music-events','pref_nature-outdoors','pref_health-wellness','pref_fitness','pref_travel',
            'pref_arts-culture','pref_munchies','pref_foodie','pref_cooking','pref_coffee-shops','pref_city-tours',
            'pref_social-meetups','pref_gaming-tech','pref_industry-events'];
        
        $tplArgs['locations'] = Location::all();
        return view('customer.add',$tplArgs);
    }
    
    
    public function store(Request $request) {
        $input = $request->except('_token');
        
        if(isset($input['customer_id'])) {
            $customer = Customer::findOrFail($input['customer_id']);
            $customerAddUpdate = 'Updated';
            unset($input['customer_id']);
        } else {
            $customer = new Customer();
            $customerAddUpdate = 'Added';
        }
       
        foreach($input as $k => $v) {
            if(!empty($v)) {
                $customer->$k = $v;
            }
        }
        $preferences = ['pref_flower','pref_concentrate','pref_edible','pref_drink','pref_clone','pref_seed',
            'pref_tincture','pref_gear','pref_topical','pref_preroll','pref_wax','pref_sativa','pref_indica',
            'pref_hybrid','pref_cbd','pref_extract','pref_cartridge','pref_accessory','pref_sports-events',
            'pref_music-events','pref_nature-outdoors','pref_health-wellness','pref_fitness','pref_travel',
            'pref_arts-culture','pref_munchies','pref_foodie','pref_cooking','pref_coffee-shops','pref_city-tours',
            'pref_social-meetups','pref_gaming-tech','pref_industry-events'];
        
        $preferences[] = 'sms_optin';
        
        foreach($preferences as $p) {
            if(!isset($input[$p])) {
                $customer->$p = 0;
            }
        }
        
        $customer->save();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Customer Successfully '.$customerAddUpdate.'!');
        if(isset($customer->location_id)) {
            return redirect('/customers/manage/'.$customer->location_id);
        }
        return redirect('/customers/manage');
        
    }
    
}