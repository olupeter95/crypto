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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->nullable();
            $table->string('plan')->nullable();
            $table->string('plan_status')->nullable();
            $table->string('main_balance')->nullable();
            $table->string('demo_balance')->nullable();
            $table->string('limit')->nullable();
            $table->string('each_trade_time')->nullable();
            $table->string('strtotime')->nullable();
            $table->string('profile_img')->nullable();
            $table->string('identification_verification')->nullable();
            $table->string('active')->nullable();
            $table->string('two_fa_status')->nullable();
            $table->string('mailing_status')->nullable();
            $table->string('verification_submission')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('currency')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('show_password')->nullable();;
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
