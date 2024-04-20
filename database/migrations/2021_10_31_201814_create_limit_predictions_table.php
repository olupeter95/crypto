<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLimitPredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limit_predictions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('session_id');
            $table->string('symbol');
            $table->string('leverage');
            $table->string('amount');
            $table->string('limit');
            $table->string('buy_or_sell');
            $table->string('trade_type');
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
        Schema::dropIfExists('limit_predictions');
    }
}
