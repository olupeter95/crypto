<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\OpenOrder;

use App\Models\PredictionsInventory;
use App\Models\User;
use App\Models\Trade;
use App\Models\Currency;
use App\Models\Earning;
use App\Models\TradeHistory;
use App\Events\UpdateWalletBalanceEvent; 
use App\Events\MakeATradeEvent; 
use App\Events\MakeATradeLimitEvent; 
use App\Events\MakeATradeStopLimitEvent; 

use App\Events\DisplayUserDataEvent;  
use App\Events\CheckTradeStatusEvent; 

class TradesController extends Controller
{
    public $trade;
    public $currency;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $trade              = new Trade();
        $this->trade        = $trade;

        $currency          = new Currency();
        $this->currency    = $currency;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trade_details      = request()->all();
        $transaction_id      = $trade_details['uniqId'];

        event(new MakeATradeEvent($transaction_id, $trade_details));
    }

    public function limitTrade(Request $request)
    {
        # code...
        $trade_details          = request()->all();
        $transaction_id         = $trade_details['uniqId'];

        event(new MakeATradeLimitEvent($transaction_id, $trade_details));
    }

    public function stopLimitTrade(Request $request)
    {
        # code...
        $trade_details          = request()->all();
        $transaction_id         = $trade_details['uniqId'];

        event(new MakeATradeStopLimitEvent($transaction_id, $trade_details));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($transaction_id)
    {
        $open_order     = OpenOrder::where('user_id', Auth::user()->id)->where('transaction_id', $transaction_id)->first();
        $tableField     = ($open_order->trade_type == 'LIVE') ? 'main_balance' : 'demo_balance' ;

        event(new CheckTradeStatusEvent($transaction_id, $open_order, Auth::user()->$tableField));  
        return ([
            'status' => $open_order->status
        ]);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function limit()
    {   
        return ([
            'success' => 'true',
            'plan'    => Auth::user()->plan,
            'limit'   => Auth::user()->limit,
        ]);
    }
    
}
