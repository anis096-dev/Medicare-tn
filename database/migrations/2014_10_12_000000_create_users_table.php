<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role')->default('admin');
            $table->string('specialty')->nullable();
            $table->string('name');
            $table->enum('gender', ['m', 'f']);;
            $table->enum('marital_status', ['single', 'married']);;
            $table->string('date_of_birth')->nullable();
            $table->string('tel')->nullable();
            $table->boolean('isVerified')->default(false);
            $table->boolean('account_Verified')->default(false);
            $table->string('governorate_id')->nullable();
            $table->string('delegation_id')->nullable();
            $table->string('location_id')->nullable();
            $table->string('bio')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
            $table->timestamp('last_seen')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
