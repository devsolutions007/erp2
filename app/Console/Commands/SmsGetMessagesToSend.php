<?php

namespace App\Console\Commands;

use App\Models\SMS\SmsMessageQueue;
use Illuminate\Console\Command;

class SmsGetMessagesToSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    
    protected $signature = 'sms:getMessagesToSend';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets a list of SMS messages that need to be queued';

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
        $messages = SmsMessageQueue::where('sent','=',0)->get();
        foreach($messages as $m) {
            $this->line($m->id." ".$m->message_id." ".str_replace(' ','',$m->customer_phone));
        }
    }
}
