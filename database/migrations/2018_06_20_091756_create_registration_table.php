<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('event_id')->unsigned()->nullable();
            $table->index('event_id');
            $table->string('status');
            $table->integer('paid')->nullable();
            $table->dateTime('pay_date')->nullable();
            $table->timestamps();

        });
        Schema::table('registration', function ($table) {
            $table->foreign('event_id')->references('id')->on('event')->onDelete('restrict')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registration');
    }
}
