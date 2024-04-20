<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredictionsInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions_inventory', function (Blueprint $table) {
            $table->id();
            $table->string('users_id');
            $table->string('session_id');
            $table->string('range_from');
            $table->string('range_to');
            $table->string('no_of_signals');
            $table->string('type');
            $table->string('trade_type');
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
        Schema::dropIfExists('predictions_inventory');
    }
}
