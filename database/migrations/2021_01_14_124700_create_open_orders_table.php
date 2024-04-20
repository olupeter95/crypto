<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('transaction_id');
            $table->string('date');
            $table->string('action');
            $table->string('open_time');
            $table->string('close_time');
            $table->string('timezone');
            $table->string('trade_type');
            $table->string('symbol_traded');
            $table->string('trade_interval');
            $table->string('initiator');
            $table->string('completed');
            $table->string('expected_return_btc');
            $table->string('amount_before_trade_btc');
            $table->string('amount_traded_btc');
            $table->string('traded_crypto_amount');
            $table->string('status');
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
        Schema::dropIfExists('open_orders');
    }
}
