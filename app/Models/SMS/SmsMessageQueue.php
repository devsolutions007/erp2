<?php

namespace App\Models\SMS;


use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class SmsMessageQueue extends Model
{
    
    public function updateStatus($result){
        $now = Carbon::now()->toDateTimeString();
        $this->last_status = $result->status;
        $this->last_status_time = $now;
        $this->message_sid = $result->sid;
        $this->sent = 1;
        $this->save();
        
    }
    
    public function markFailed() {
        $now = Carbon::now()->toDateTimeString();
        $this->last_status = 'failed';
        $this->last_status_time = $now;
        $this->sent = 1;
        $this->save();
    }
}