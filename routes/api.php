<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Currency;
use App\Models\User;
use App\Models\Trade;
use App\Events\TestingEvent;
use Illuminate\Support\Facades\Broadcast;
use Pusher\Pusher;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user(); 
});

Route::post('/broadcast/auth', function (Request $request) {
    $key = '06ff101605a66883ffca';
    $secret = 'bd25654f48fe693e7060';
    $channel_name = $request->all()['channel_name'];
    $socket_id = $request->all()['socket_id'];
    $string_to_sign = $socket_id.':'.$channel_name;
    $signature = hash_hmac('sha256', $string_to_sign, $secret);
    return response()->json(['auth' => $key.':'.$signature]);; 
});

Route::post('/callback', 'Api\BtcpayPaymentsController@DepositCallback');
Route::get('/testing', function () {
    $trade_date         = explode(" ", '24 Aug 2021');
    $trade_open_time    = '01:12:09 pm';

    $trade_interval     = explode(" ", '1 hr');
    if($trade_interval[1] == 'hr') {
        $trade_interval[0] = '60';
        $trade_interval[1] = 'mins';
    }

    $dt         = new DateTime("now", new DateTimeZone('Etc/GMT+12'));
    $cdatetime  = DateTime::createFromFormat('Y-m-d H:i:s', $dt->format('Y-m-d').' '.$dt->format('H:i:s'));
   

    $Hour       =  date("H:i:s", strtotime($trade_open_time)); 
    $day_part   = $trade_date[2].'-'.(new Trade())->getTradeMonth($trade_date[1]).'-'.$trade_date[0];
    $tdatetime  = DateTime::createFromFormat('Y-m-d H:i:s', $day_part.' '.$Hour);

    $diff = $tdatetime->diff($cdatetime)->i;



    $retval = (new Trade())->time_difference($trade_date, $trade_open_time, $datetime, 'Pacific/Kiritimati');

    return $retval;
    //$current_time       = $dt->addHours(1); 
});

Route::get('/currency/{symbol}', function($symbol){
    $currency = Currency::where('symbol', $symbol)->first();
    
    return ([
        'success' => 'true',
        'value'   => $currency->usd_value
    ]);
});

Route::get('/symbol/{from_coin}/{against_coin}', function($from_coin, $against_coin){
    $fcurrency = Currency::where('symbol', $from_coin)->first();
    $acurrency = Currency::where('symbol', $against_coin)->first();
    
    return ([
        'success' => 'true',
        'fv'      => $fcurrency->usd_value,
        'av'      => $acurrency->usd_value,
    ]);
});

Route::get('/account/balance/{type}/{user_id}', function($type, $user_id){
    $type = strtolower($type);
    $user = User::where('id', $user_id)->first();
    if ($type == 'live') {
        # code...
        return ([
            'success' => 'true',
            'value'   => $user->main_balance
        ]);
    } 
    else {
        # code...
        return ([
            'success' => 'true',
            'value'   => $user->demo_balance
        ]);
    }
});

Route::post('/deposit-callback', 'Api\DepositPaymentsController@callback');
