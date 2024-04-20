<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavedTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_trades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('date');
            $table->string('action');
            $table->string('trade_type');
            $table->string('symbol_traded');
            $table->string('trade_interval');
            $table->string('trade_leverage');
            $table->string('initiator');
            $table->string('amount_traded_btc');
            $table->string('traded_crypto_usd');
            $table->string('traded_crypto_amount');
            $table->string('odds');
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
        Schema::dropIfExists('saved_trades');
    }
}
