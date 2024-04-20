<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->string('slug');
            $table->string('img');
            $table->string('rank');
            $table->string('price_usd');
            $table->string('price_btc');
            $table->string('volume_usd_24h');
            $table->string('market_cap_usd');
            $table->string('high_24h');
            $table->string('low_24h');
            $table->string('available_supply');
            $table->string('total_supply');
            $table->string('ath');
            $table->string('ath_date');
            $table->string('price_change_24h');
            $table->string('percent_change_24h');
            $table->string('weekly_expire');
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
        Schema::dropIfExists('coins');
    }
}
