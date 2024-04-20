<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Trade;
use Illuminate\Support\Facades\DB;
use App\Events\CheckTradeStatusEvent; 
use App\Events\TestingEvent; 
use Auth;

class OpenOrder extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'open_orders';

    /**
        * The attributes that aren't mass assignable.
        *
        * @var array
    */
    protected $guarded = [];

    public function checkIfOrderIsStuck($open_orders)
    {
        # code...
        foreach ($open_orders as $key => $open_order) {
            # code...
            $trade_date         = explode(" ", $open_order->date);
            $trade_open_time    = $open_order->open_time;

            $trade_interval     = explode(" ", $open_order->trade_interval);
            if($trade_interval[1] == 'hr') {
                $trade_interval[0] = '60';
                $trade_interval[1] = 'mins';
            }

            $retval = (new Trade())->time_difference($trade_date, $trade_open_time, $open_order->timezone);
            // event(new TestingEvent($retval));
            
            if( $retval >= $trade_interval[0]){

                $tableField     = ($open_order->trade_type == 'LIVE') ? 'main_balance' : 'demo_balance' ;
                event(new CheckTradeStatusEvent($open_order->transaction_id, $open_order, Auth::user()->$tableField));   

                DB::table('trades_history')->insert([
                    'user_id'           =>  Auth::user()->id,
                    'transaction_id'    =>  $open_order->transaction_id,
                    'type'              =>  $open_order->trade_type,
                    'b_or_s'            =>  $open_order->action,
                    'date'              =>  $open_order->date,
                    'initiator'         =>  $open_order->initiator,
                    'open_time'         =>  $open_order->open_time,
                    'close_time'        =>  $open_order->close_time,
                    'trade_interval'    =>  $open_order->trade_interval,
                    'pair'              =>  $open_order->symbol_traded,
                    'amount_in_btc'     =>  $open_order->amount_traded_btc,
                    'interval'          =>  $open_order->trade_interval,
                    'status'            =>  $open_order->status,
                ]);

                DB::table('open_orders')->where('user_id', Auth::user()->id)->where('transaction_id', $open_order->transaction_id)->delete();
            }
        }

    }

    public function moveToTradeHistory($open_orders)
    {
        # code...
        foreach ($open_orders as $key => $open_order) {
            # code...
            DB::table('trades_history')->insert([
                'user_id'           =>  Auth::user()->id,
                'transaction_id'    =>  $open_order->transaction_id,
                'type'              =>  $open_order->trade_type,
                'b_or_s'            =>  $open_order->action,
                'date'              =>  $open_order->date,
                'initiator'         =>  $open_order->initiator,
                'open_time'         =>  $open_order->open_time,
                'close_time'        =>  $open_order->close_time,
                'trade_interval'    =>  $open_order->trade_interval,
                'pair'              =>  $open_order->symbol_traded,
                'amount_in_btc'     =>  $open_order->amount_traded_btc,
                'interval'          =>  $open_order->trade_interval,
                'status'            =>  $open_order->status,
            ]);

            DB::table('open_orders')->where('user_id', Auth::user()->id)->where('transaction_id', $open_order->transaction_id)->delete();
        }
    }

    public function checkForIncompleteOrders($routeName)
    {
        # code...
        $tradeType        = ($routeName == 'home') ? 'LIVE' : 'DEMO' ;
        $open_orders      = DB::table('open_orders')->orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->where('trade_type', $tradeType)->where('completed', 'NO')->get();
        return $open_orders;
    }

    public function checkForCompleteOrders($routeName)
    {
        # code...
        $tradeType        = ($routeName == 'home') ? 'LIVE' : 'DEMO' ;
        $open_orders      = DB::table('open_orders')->orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->where('trade_type', $tradeType)->where('completed', 'YES')->get();
        return $open_orders;
    }
}
