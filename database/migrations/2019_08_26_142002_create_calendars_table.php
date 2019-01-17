<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned()->nullable();
            $table->integer('professional_id')->unsigned()->nullable();
            $table->integer('clinic_id')->unsigned()->nullable();
            $table->integer('treatment_id')->unsigned()->nullable();
            $table->timestamps();
            $table->string('event_name');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('full_day')->default(false);
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('clinic_id')->references('id')->on('clinics');
            $table->foreign('treatment_id')->references('id')->on('treatments');
            $table->foreign('professional_id')->references('id')->on('professionals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendars');
    }
}
