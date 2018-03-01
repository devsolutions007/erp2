<?php

namespace App\Http\Controllers\CRM;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Location;
use App\Models\SMS\SmsHelper;
use App\Models\SMS\SmsMessage;
use Illuminate\Http\Request;
use Twilio\Rest\Client;


class SMSController extends Controller
{
    
    public function start(Request $request) {
        //If a new SMS is started, clear the session
        $request->session()->remove('sms');
        
        
        $locations = Location::GetAllLocationSmsOptinData();
        $tplArgs['locations'] = $locations;
    
        $tplArgs['preferences'] = ['pref_flower','pref_concentrate','pref_edible','pref_drink','pref_clone','pref_seed',
            'pref_tincture','pref_gear','pref_topical','pref_preroll','pref_wax','pref_sativa','pref_indica',
            'pref_hybrid','pref_cbd','pref_extract','pref_cartridge','pref_accessory','pref_sports-events',
            'pref_music-events','pref_nature-outdoors','pref_health-wellness','pref_fitness','pref_travel',
            'pref_arts-culture','pref_munchies','pref_foodie','pref_cooking','pref_coffee-shops','pref_city-tours',
            'pref_social-meetups','pref_gaming-tech','pref_industry-events'];
        
        return view('crm.sms.start',$tplArgs);
    }
   
    public function confirmAudience(Request $request) {
        $input = $request->except('_token');
        
        $locations = $input['locations'];
        unset($input['locations']);
        
        $whereFilter = $input['match_type'];
        
        $preferences = ['pref_flower','pref_concentrate','pref_edible','pref_drink','pref_clone','pref_seed',
            'pref_tincture','pref_gear','pref_topical','pref_preroll','pref_wax','pref_sativa','pref_indica',
            'pref_hybrid','pref_cbd','pref_extract','pref_cartridge','pref_accessory','pref_sports-events',
            'pref_music-events','pref_nature-outdoors','pref_health-wellness','pref_fitness','pref_travel',
            'pref_arts-culture','pref_munchies','pref_foodie','pref_cooking','pref_coffee-shops','pref_city-tours',
            'pref_social-meetups','pref_gaming-tech','pref_industry-events'];
        
        $selectedPreferences = [];
        $selectedPreferencesString = '';
        foreach($preferences as $p) {
            if(isset($input[$p]) && $input[$p] == 1) {
                $selectedPreferences[] = $p;
                $selectedPreferencesString .= ucwords(str_replace('-',' ',str_replace('pref_','',$p))).", ";
            }
        }
        $selectedPreferencesString = rtrim($selectedPreferencesString,', ');
        $selectedPreferencesString = (!empty($selectedPreferencesString) ? $selectedPreferencesString : "All Customers");
        $tplArgs['selectedPreferencesString'] = $selectedPreferencesString;
        
        $customerDb = new Customer;
        $customers = $customerDb->getCustomersByLocationAndPreferenceFilters($locations,$selectedPreferences,$whereFilter);
        $request->session()->put('sms.locations',$locations);
        $request->session()->put('sms.selectedPreferences',$selectedPreferences);
        $request->session()->put('sms.selectedPreferencesString',$selectedPreferencesString);
        $request->session()->put('sms.whereFilter',$whereFilter);
        
        $tplArgs['whereFilter'] = $whereFilter;
        
        $locations = Location::whereIn('id',$locations)->get();
        $tplArgs['locations'] = $locations;
        
        $customerCount = count($customers);
        $tplArgs['customerCount'] = $customerCount;
        $request->session()->put('sms.customerCount',$customerCount);
        
        return view('crm.sms.confirm_audience',$tplArgs);
        
    }
    
    
    public function confirmMessage(Request $request) {
        if($request->isMethod('post')) {
            $input = $request->except('_token');
            $request->session()->put('sms.sms_message', $input['sms_message']);
            $messageLength = strlen($input['sms_message']);
            $messageSegments = ceil($messageLength/160);
            $request->session()->put('sms.message_length',$messageLength);
            $request->session()->put('sms.message_segments',$messageSegments);
            
            
        }
        $tplArgs = $request->session()->get('sms');
        
        $locations = Location::whereIn('id',$tplArgs['locations'])->get();
        $tplArgs['locations'] = $locations;
        
        return view('crm.sms.confirm_message',$tplArgs);
    }
    
    
    
    
    public function sendTest(Request $request) {
        $phoneNumber = $request->input('test_number');
        $smsMessage = $request->session()->get('sms.sms_message');
        
        $sid = 'AC6038d9ef4229880f72ab43df915b73ee';
        $token = '4457b37776b9437b5d87e122a8892510';
        $client = new Client($sid,$token);
        $result = $client->messages->create(
        // the number you'd like to send the message to
            '+1'.$phoneNumber,
            array(
                // A Twilio phone number you purchased at twilio.com/console
                'messagingServiceSid' => 'MGd075597265d0f4234d5421a47a170492',
                // the body of the text message you'd like to send
                'body' => $smsMessage
            )
        );
        
       
        return back();
    }
    
    public function scheduleMessage(Request $request) {
        $sms = $request->session()->get('sms');
        
        $customerDb = new Customer;
        $customers = $customerDb->getCustomersByLocationAndPreferenceFilters($sms['locations'],
                $sms['selectedPreferences'],$sms['whereFilter']);
        if($customers->count() !== $sms['customerCount']) {
            throw new \Exception('Customer count does not match!');
        }
        
        $smsMessage = new SmsMessage;
        $smsMessage->user_id = \Auth::id();
        $smsMessage->quoted_credits = $request->input('quoted_credits');
        $smsMessage->number_of_recipients = $sms['customerCount'];
        $smsMessage->message = $sms['sms_message'];
        $smsMessage->full_details = json_encode($sms);
        $smsMessage->save();
        
        $smsHelper = new SmsHelper;
        $smsHelper->queueMessageRecipients($smsMessage->id,$customers);
    
    
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Your messages has been succeffully scheduled and will start sending shortly!');
        return view('crm.sms.scheduled');
    }
}