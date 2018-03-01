<?php

namespace App\Console\Commands;

use App\Models\SMS\SmsMessage;
use App\Models\SMS\SmsMessageLog;
use App\Models\SMS\SmsMessageQueue;
use Illuminate\Console\Command;
use Twilio\Rest\Client;

class SmsSendMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:sendMessage {queue_id} {message_id} {phone_number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends an individual sms message from the queue';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        $queueId = $this->argument('queue_id');
        $messageId = $this->argument('message_id');
        $phoneNumber = $this->argument('phone_number');
    
        $message = SmsMessage::findOrFail($messageId);
        if($queueId == 0) {
            //This is a test send
            $result = $this->sendMessage($message,$phoneNumber);
            $this->logResult(0,$result);
            exit;
        }
        $q = SmsMessageQueue::findOrFail($queueId);
        if($q->sent !== 0) {
            throw new \Exception('Queue ID is already marked as sent');
        }
        
        $this->sendMessage($q,$message,$phoneNumber);
       
        
    
    }
    
    
    protected function sendMessage(SmsMessageQueue $q,$message,$phoneNumber) {
        
        try {
            $sid = 'AC6038d9ef4229880f72ab43df915b73ee';
            $token = '4457b37776b9437b5d87e122a8892510';
            $client = new Client($sid, $token);
            $result = $client->messages->create(
                '+1' . $phoneNumber,
                array(
                    // A Twilio phone number you purchased at twilio.com/console
                    'messagingServiceSid' => 'MGd075597265d0f4234d5421a47a170492',
                    // the body of the text message you'd like to send
                    'body' => $message->message
                )
            );
            $this->logResult($q->id,$result);
            $q->updateStatus($result);
        }catch(\Exception $e) {
            $this->logFailure($q->id,$e);
            $q->markFailed();
            throw $e;
            
        }
        
        
        
    }
    
    protected function logResult($queueId,$result) {
        try {
            $log = [];
            $log['reference_id'] = $queueId;
            $log['reference_type'] = 'queue_id';
            $log['message'] = json_encode($result->toArray());
            SmsMessageLog::create($log);
        }catch(\Exception $e) {
            $this->error('Could not log result');
        }
    }
    
    protected function logFailure($queueId,\Exception $e) {
        try {
            $log = [];
            $log['reference_id'] = $queueId;
            $log['reference_type'] = 'queue_id';
            $log['message'] = $e->getMessage();
            SmsMessageLog::create($log);
        }catch(\Exception $e) {
            $this->error('Could not log result');
        }
    }
}
