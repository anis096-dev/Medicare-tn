<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('related_id');
            $table->string('treatment');
            $table->string('sub_treatment');
            $table->enum('status', ['accepted', 'refused', 'waiting'])->nullable();
            $table->enum('passage_number', ['just once', 'recurrent treatment'])->nullable();
            $table->enum('certificate', ['yes', 'no'])->nullable();
            $table->enum('home_mention', ['yes', 'no'])->nullable();
            $table->string('start_date')->nullable();
            $table->string('duration')->nullable();
            $table->string('user_dispo')->nullable();
            $table->enum('care_place', ['home', 'cabinet', 'both']);
            $table->enum('covid_symptom', ['yes', 'no'])->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
