<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsMessageQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_message_queues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('message_id');
            $table->integer('customer_id');
            $table->string('customer_phone');
            $table->integer('sent')->default(0)->index();
            $table->string('message_sid')->nullable();
            $table->string('last_status')->index()->nullable();
            $table->datetime('last_status_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_message_queues');
    }
}
