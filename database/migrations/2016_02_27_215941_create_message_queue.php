<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageQueue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_queue', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('certificate_id')->unsigned()->index();
            $table->integer('device_id')->usigned()->index();
            $table->string('device_token');
            $table->text('message');
            $table->integer('badge')->default('0');
            $table->string('sound')->default('default');
            $table->integer('status')->default('0');
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
        Schema::drop('message_queue');
    }
}
