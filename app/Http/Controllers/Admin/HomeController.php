<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\User;
use App\Models\CoinPair;
use App\Models\Currency;
use App\Models\Plan;
use App\Models\TradeHistory;
use App\Models\OpenOrder;
use App\Models\Earning;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $page_name      = 'Index';
        $withdrawals    = Withdrawal::count();
        $deposits       = Deposit::count();
        $users          = User::count();
        $plans          = Plan::count();
        $currencies     = Currency::count();
        $coin_pairs     = CoinPair::count();

        return view('admin.home', compact('page_name', 'withdrawals', 'deposits', 'users', 'plans', 'currencies', 'coin_pairs'));
    }

    public function open_orders(){
        $page_name      = 'All Open Orders';

        $open_orders = OpenOrder::all();
        foreach($open_orders as $key => $open_order){
            $user = User::where('id', $open_order->user_id)->first();
            $open_order->name = $user->name;
        }

        return view('admin.open-orders', compact('open_orders', 'page_name'));

    }

    public function trade_history(){
        $page_name      = 'All Trades';

        $trades_history = TradeHistory::all();
        foreach($trades_history as $key => $trade){
            $user = User::where('id', $trade->user_id)->first();
            if($user)
            {
                $trade->name = $user->name;
            }
        }

        //return $trades_history;

        return view('admin.trade-history', compact('trades_history', 'page_name'));
    }

    public function trade_edit($trx_id, Request $request){

        $date_array   = explode("-", $request->all()['trade_date']);

        switch ($date_array[1]){
            case '01': 
                $month = 'Jan';
            break;

            case '02': 
                $month = 'Feb';
            break;

            case '03': 
                $month = 'Mar';
            break;

            case '04': 
                $month = 'Apr';
            break;

            case '05': 
                $month = 'May';
            break;

            case '06': 
                $month = 'Jun';
            break;

            case '07': 
                $month = 'Jul';
            break;

            case '08': 
                $month = 'Aug';
            break;

            case '09': 
                $month = 'Sep';
            break;

            case '10': 
                $month = 'Oct';
            break;

            case '11': 
                $month = 'Nov';
            break;

            case '12': 
                $month = 'Dec';
            break;
        }

        TradeHistory::where('transaction_id', $trx_id)->update([
            'date' => $date_array[2] . " " . $month . " " . $date_array[0]
        ]);

        return redirect('/admin/trade/history/all');
    }

    public function trade_earnings(){
        $page_name      = 'All Earnings';

        $live_earnings = Earning::all();
        foreach($live_earnings as $key => $earning){
            $user = User::where('id', $earning->user_id)->first();
            if($user){
                $earning['name'] = $user->name;
            }
        }
        return view('admin.earnings.all', compact('live_earnings', 'page_name'));
    }

    public function single_user_earnings($user_id){
        $page_name      = 'All Earnings';

        $live_earnings = Earning::where('user_id', $user_id)->get();
        
        return view('admin.earnings.single', compact('live_earnings', 'page_name'));
    }

}
