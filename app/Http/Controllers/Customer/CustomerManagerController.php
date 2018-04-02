<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\CustomerDetail;
use Session;

class CustomerManagerController extends Controller
{
    public function create() 
    {
        return view('customer.create'); 
    }

    public function saveCustomerDetails(Request $request)
    {
        if( $request->input('action') == 'basicInfo') 
        {

            $validatedData = $request->validate([
                                    'first_name' => 'required|min:3',
                                    'email' => 'required',
                                    'birth_date' => 'required',
                                    'phone' => 'required',
                                    'cell' => 'required',
                                    'carrier' => 'required',
                                    'mmj_card' => 'required',
                                    'mmj_exp' => 'required',
                                    'DL' => 'required',
                                    'dl_exp' => 'required',
                                    'referral' => 'required',
                                    'since' => 'required',
                                ]);

            $customerDetail = new CustomerDetail;
            $customerDetail->last_name = $request->input('last_name');
            $customerDetail->first_name = $request->input('first_name');
            $customerDetail->middle_name = $request->input('middle_name');
            $customerDetail->birth_date = $request->input('birth_date');
            $customerDetail->phone = $request->input('phone');
            $customerDetail->email = $request->input('email');
            $customerDetail->cell = $request->input('cell');
            $customerDetail->carrier = $request->input('carrier');
            $customerDetail->mmj_card = $request->input('mmj_card');
            $customerDetail->mmj_exp = $request->input('mmj_exp');
            $customerDetail->DL = $request->input('DL');
            $customerDetail->dl_exp = $request->input('dl_exp');
            $customerDetail->referral = $request->input('referral');
            $customerDetail->member = $request->input('member');
            $customerDetail->discount = $request->input('discount');
            $customerDetail->since = $request->input('since');
            $customerDetail->save();

            Session::flash('message', 'Basic Info succesfully saved'); 
            Session::flash('alert-class', 'alert-success');
            session(['id' => $customerDetail->id]);
            return redirect('customers/create');

        }
        if( $request->input('action') == 'moreInfo') 
        {
            $customerDetail = CustomerDetail::find($request->input('id'));
            $customerDetail->address = $request->input('address');
            $customerDetail->apt_suite = $request->input('apt_suite');
            $customerDetail->city = $request->input('city');
            $customerDetail->state = $request->input('state');
            $customerDetail->zip = $request->input('zip');
            $customerDetail->sex = $request->input('sex');
            $customerDetail->plants = $request->input('plants');
            $customerDetail->tax_exempt = $request->input('tax_exempt');
            $customerDetail->is_a_vendor = $request->input('is_a_vendor');
            $customerDetail->is_a_care_giver = $request->input('is_a_care_giver');
            $customerDetail->location = $request->input('location');
            $customerDetail->limit = $request->input('limit');
            $customerDetail->limit_unit = $request->input('limit_unit');
            $customerDetail->care_giver = $request->input('care_giver');
            $customerDetail->doctor = $request->input('doctor');
            $customerDetail->save();

            Session::flash('message', 'More Info succesfully saved'); 
            Session::flash('alert-class', 'alert-success');
             session(['id' => $customerDetail->id]);
            return redirect('customers/create');
        }

        if( $request->input('action') == 'marketing') 
        {
            $customerDetail = CustomerDetail::find($request->input('id'));
            $customerDetail->no_of_visits = $request->input('no_of_visits');
            $customerDetail->spent_on_date = $request->input('spent_on_date');
            $customerDetail->points_remaining = $request->input('points_remaining');
            $customerDetail->customer_referral = $request->input('customer_referral');
            $customerDetail->email_opt_in = $request->input('email_opt_in');
            $customerDetail->text_messaging_opt_in = $request->input('text_messaging_opt_in');
            $customerDetail->save();

            Session::flash('message', 'Marketing data succesfully saved'); 
            Session::flash('alert-class', 'alert-success');
            session(['id' => $customerDetail->id]);
            return redirect('customers/create');
        }

        if( $request->input('action') == 'custom') 
        {
            $customerDetail = CustomerDetail::find($request->input('id'));
            $customerDetail->details_came_from = $request->input('details_came_from');
            $customerDetail->details_came_from_male_female = $request->input('details_came_from_male_female');
            $customerDetail->audited = $request->input('audited');
            $customerDetail->got_birth_1_8 = $request->input('got_birth_1_8');
            $customerDetail->no_member_referrals = $request->input('no_member_referrals');
            $customerDetail->referred_by = $request->input('referred_by');
            $customerDetail->member_referrals = $request->input('member_referrals');
            $customerDetail->save();
            
            Session::flash('message', 'Custom data succesfully saved'); 
            Session::flash('alert-class', 'alert-success');
            session(['id' => $customerDetail->id]);
            return redirect('customers/create');
        }

    }

    

    public function customerAjax(Request $request) 
    {
        // Check Email Exist
        if($request->input('action') == 'checkEmailExist') 
        {
            echo $customerDetail = CustomerDetail::where('email', $request->input('email'))->first()->count();
        }

        // check phone exist 

        if($request->input('action') == 'checkPhoneExist') 
        {
            echo $customerDetail = CustomerDetail::where('phone', $request->input('phone'))->first()->count();
        }

        // delete customer

        if($request->input('action') == 'delete_customer') 
        {
            $customerDetail = CustomerDetail::find($request->input('id'));
            $customerDetail->delete();
            echo "success";
        }
    }

    public function viewAllCustomers() 
    {
        $customerDetails = CustomerDetail::all();
        return view('customer.viewAllCustomers', compact('customerDetails')); 

    }

    public function show($id)
    {
        $customerDetail = CustomerDetail::find($id);
        return view('customer.singleView', compact('customerDetail')); 
    }

    public function edit($id)
    {
        $customerDetail = CustomerDetail::find($id);
        //print_r($customerDetail);
        return view('customer.edit', compact('customerDetail')); 
    }

    public function update(Request $request, $id)
    {
        $customerDetail = CustomerDetail::find($id);
        if( $request->input('action') == 'basicInfo') 
        {

            $validatedData = $request->validate([
                                    'first_name' => 'required|min:3',
                                    'email' => 'required',
                                    'birth_date' => 'required',
                                    'phone' => 'required',
                                    'cell' => 'required',
                                    'carrier' => 'required',
                                    'mmj_card' => 'required',
                                    'mmj_exp' => 'required',
                                    'DL' => 'required',
                                    'dl_exp' => 'required',
                                    'referral' => 'required',
                                    'since' => 'required',
                                ]);

            $customerDetail->last_name = $request->input('last_name');
            $customerDetail->first_name = $request->input('first_name');
            $customerDetail->middle_name = $request->input('middle_name');
            $customerDetail->birth_date = $request->input('birth_date');
            $customerDetail->phone = $request->input('phone');
            $customerDetail->email = $request->input('email');
            $customerDetail->cell = $request->input('cell');
            $customerDetail->carrier = $request->input('carrier');
            $customerDetail->mmj_card = $request->input('mmj_card');
            $customerDetail->mmj_exp = $request->input('mmj_exp');
            $customerDetail->DL = $request->input('DL');
            $customerDetail->dl_exp = $request->input('dl_exp');
            $customerDetail->referral = $request->input('referral');
            $customerDetail->member = $request->input('member');
            $customerDetail->discount = $request->input('discount');
            $customerDetail->since = $request->input('since');
            $customerDetail->save();

            Session::flash('message', 'Basic Info succesfully Updated'); 
            Session::flash('alert-class', 'alert-success');
            return redirect('customers/edit/'.$customerDetail->id);

        }

        if( $request->input('action') == 'moreInfo') 
        {
            $customerDetail->address = $request->input('address');
            $customerDetail->apt_suite = $request->input('apt_suite');
            $customerDetail->city = $request->input('city');
            $customerDetail->state = $request->input('state');
            $customerDetail->zip = $request->input('zip');
            $customerDetail->sex = $request->input('sex');
            $customerDetail->plants = $request->input('plants');
            $customerDetail->tax_exempt = $request->input('tax_exempt');
            $customerDetail->is_a_vendor = $request->input('is_a_vendor');
            $customerDetail->is_a_care_giver = $request->input('is_a_care_giver');
            $customerDetail->location = $request->input('location');
            $customerDetail->limit = $request->input('limit');
            $customerDetail->limit_unit = $request->input('limit_unit');
            $customerDetail->care_giver = $request->input('care_giver');
            $customerDetail->doctor = $request->input('doctor');
            $customerDetail->save();

            Session::flash('message', 'More Info succesfully updated'); 
            Session::flash('alert-class', 'alert-success');
            return redirect('customers/edit/'.$customerDetail->id);
        }

        if( $request->input('action') == 'marketing') 
        {
            $customerDetail->no_of_visits = $request->input('no_of_visits');
            $customerDetail->spent_on_date = $request->input('spent_on_date');
            $customerDetail->points_remaining = $request->input('points_remaining');
            $customerDetail->customer_referral = $request->input('customer_referral');
            $customerDetail->email_opt_in = $request->input('email_opt_in');
            $customerDetail->text_messaging_opt_in = $request->input('text_messaging_opt_in');
            $customerDetail->save();

            Session::flash('message', 'Marketing data succesfully updated'); 
            Session::flash('alert-class', 'alert-success');
            return redirect('customers/edit/'.$customerDetail->id);
            
        }

        if( $request->input('action') == 'custom') 
        {
            $customerDetail->details_came_from = $request->input('details_came_from');
            $customerDetail->details_came_from_male_female = $request->input('details_came_from_male_female');
            $customerDetail->audited = $request->input('audited');
            $customerDetail->got_birth_1_8 = $request->input('got_birth_1_8');
            $customerDetail->no_member_referrals = $request->input('no_member_referrals');
            $customerDetail->referred_by = $request->input('referred_by');
            $customerDetail->member_referrals = $request->input('member_referrals');
            $customerDetail->save();
            
            Session::flash('message', 'Custom data succesfully updated'); 
            Session::flash('alert-class', 'alert-success');
            return redirect('customers/edit/'.$customerDetail->id);
        }

    }

    // public function index($locationId = null) {
    //     $locations = Location::GetAllLocationSmsOptinData();
        
    //     $tplArgs['locations'] = $locations;
    
    //     $tplArgs['customers'] = [];
    //     $tplArgs['locationName'] = '';
    //     if($locationId) {
    //         $location = Location::findOrFail($locationId);
    //         $tplArgs['customers'] = $location->customers;
    //         $tplArgs['locationName'] = $location->name;
            
    //     }
        
        
        
    //     return view('customer.manage',$tplArgs);
    // }
    
    // public function edit($id) {
        
    //     $customer = Customer::findOrFail($id);
    //     $tplArgs['preferences'] = ['pref_flower','pref_concentrate','pref_edible','pref_drink','pref_clone','pref_seed',
    //         'pref_tincture','pref_gear','pref_topical','pref_preroll','pref_wax','pref_sativa','pref_indica',
    //         'pref_hybrid','pref_cbd','pref_extract','pref_cartridge','pref_accessory','pref_sports-events',
    //         'pref_music-events','pref_nature-outdoors','pref_health-wellness','pref_fitness','pref_travel',
    //         'pref_arts-culture','pref_munchies','pref_foodie','pref_cooking','pref_coffee-shops','pref_city-tours',
    //         'pref_social-meetups','pref_gaming-tech','pref_industry-events'];
    
    //     $tplArgs['locations'] = Location::all();
    //     $tplArgs['customer'] = $customer;
    //     return view('customer.edit',$tplArgs);
    // }
    
    // public function add() {
    //     $tplArgs['preferences'] = ['pref_flower','pref_concentrate','pref_edible','pref_drink','pref_clone','pref_seed',
    //         'pref_tincture','pref_gear','pref_topical','pref_preroll','pref_wax','pref_sativa','pref_indica',
    //         'pref_hybrid','pref_cbd','pref_extract','pref_cartridge','pref_accessory','pref_sports-events',
    //         'pref_music-events','pref_nature-outdoors','pref_health-wellness','pref_fitness','pref_travel',
    //         'pref_arts-culture','pref_munchies','pref_foodie','pref_cooking','pref_coffee-shops','pref_city-tours',
    //         'pref_social-meetups','pref_gaming-tech','pref_industry-events'];
        
    //     $tplArgs['locations'] = Location::all();
    //     return view('customer.add',$tplArgs);
    // }
    
    
    // public function store(Request $request) {
    //     $input = $request->except('_token');
        
    //     if(isset($input['customer_id'])) {
    //         $customer = Customer::findOrFail($input['customer_id']);
    //         $customerAddUpdate = 'Updated';
    //         unset($input['customer_id']);
    //     } else {
    //         $customer = new Customer();
    //         $customerAddUpdate = 'Added';
    //     }
       
    //     foreach($input as $k => $v) {
    //         if(!empty($v)) {
    //             $customer->$k = $v;
    //         }
    //     }
    //     $preferences = ['pref_flower','pref_concentrate','pref_edible','pref_drink','pref_clone','pref_seed',
    //         'pref_tincture','pref_gear','pref_topical','pref_preroll','pref_wax','pref_sativa','pref_indica',
    //         'pref_hybrid','pref_cbd','pref_extract','pref_cartridge','pref_accessory','pref_sports-events',
    //         'pref_music-events','pref_nature-outdoors','pref_health-wellness','pref_fitness','pref_travel',
    //         'pref_arts-culture','pref_munchies','pref_foodie','pref_cooking','pref_coffee-shops','pref_city-tours',
    //         'pref_social-meetups','pref_gaming-tech','pref_industry-events'];
        
    //     $preferences[] = 'sms_optin';
        
    //     foreach($preferences as $p) {
    //         if(!isset($input[$p])) {
    //             $customer->$p = 0;
    //         }
    //     }
        
    //     $customer->save();
    //     $request->session()->flash('message.level', 'success');
    //     $request->session()->flash('message.content', 'Customer Successfully '.$customerAddUpdate.'!');
    //     if(isset($customer->location_id)) {
    //         return redirect('/customers/manage/'.$customer->location_id);
    //     }
    //     return redirect('/customers/manage');
        
    // }
    
}