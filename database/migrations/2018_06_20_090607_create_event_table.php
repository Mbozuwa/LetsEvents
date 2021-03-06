<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->mediumText('description');
            $table->string('place');
            $table->string('address');
            $table->integer('max_participant');
            $table->string('image')->default('');
            $table->integer('participant_amount')->default(0);
            $table->DateTime('begin_time');
            $table->DateTime('end_time');
            $table->integer('registration_id')->nullable();
            $table->integer('user_id');
            $table->string('payment', 250)->nullable();
            $table->dateTime('signup_time')->nullable();
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
        Schema::dropIfExists('event');
    }
}
