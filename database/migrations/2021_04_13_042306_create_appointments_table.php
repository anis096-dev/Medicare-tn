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
            $table->string('related_name');
            $table->string('patient_name');
            $table->string('patient_email');
            $table->string('patient_tel')->nullable();
            $table->string('treatment');
            $table->string('sub_treatment');
            $table->enum('status', [ 'waiting', 'accepted', 'refused'])->default('waiting');
            $table->string('passage_number')->nullable();
            $table->enum('certificate', ['yes', 'no'])->nullable();
            $table->enum('home_mention', ['yes', 'no'])->nullable();
            $table->date('start_date')->nullable();
            $table->string('duration')->nullable();
            $table->string('user_dispo')->nullable();
            $table->string('user_dispo2')->nullable();
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