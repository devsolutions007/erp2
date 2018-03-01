<?php
/**
 * Created by PhpStorm.
 * User: bradley
 * Date: 2/23/18
 * Time: 11:06 PM
 */

namespace App\Models\SMS;
use Carbon\Carbon;

class SmsHelper
{
    
    public function queueMessageRecipients($messageId,$customers) {
       
        $now = Carbon::now()->toDateTimeString();
        $data = [];
        foreach($customers as $customer) {
            $data[] = [
                    'message_id'=>'1', 'customer_id'=>$customer->id,'customer_phone'=>$customer->cell,
                    'created_at'=> $now,
                    'updated_at'=> $now
                ];
        }
        
        $results = SmsMessageQueue::insert($data);
        if(!$results) {
            throw new \Exception('Queueing of Message Failed. Message was saved');
        }
       
        return $results;
        
            
    }
    
    
}