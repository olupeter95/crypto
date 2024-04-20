<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Auth;

class Currency extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'currencies';

    /**
        * The attributes that aren't mass assignable.
        *
        * @var array
    */
    protected $guarded = [];

    public function live_usd(){
        $client     = new Client();
        $response   = $client->get('https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref=USD&symbol=BTC', ['verify' => false]);
        $response   = json_decode($response->getBody());

        $markets    = $response->markets;

        foreach($markets as $key => $market){
            if($market->symbol == 'USD'){
                return round($market->price);
            }
        }
        //return round(48695.19);
    }

    public function usd(){
        $currency     = DB::table('currencies')->where('symbol', 'BTC')->first();

        return $currency->usd_value;
    }
}
