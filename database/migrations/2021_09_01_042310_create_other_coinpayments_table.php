<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherCoinpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_coinpayments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('buyer_email');
            $table->string('order_id');
            $table->string('invoice_id');
            $table->string('price');
            $table->string('currency');
            $table->string('coin_price');
            $table->string('coin_paid');
            $table->string('coin_type');
            $table->string('status')->nullable();
            $table->string('deposited')->nullable();
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
        Schema::dropIfExists('other_coinpayments');
    }
}
