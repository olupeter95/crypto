<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Models\LicenseKey;
use App\Models\OpenOrder;
use App\Models\TradeHistory;
use App\Models\SavedTrade;
use App\Models\Prediction;
use App\Models\User;

class TpsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        # code...
        $usd            = $this->live_usd();
        $page_name      = 'Third Party Softwares';
        $license_keys   = LicenseKey::where('user_id', Auth::user()->id)->get(); 

        $bots           = [];
        foreach ($license_keys as $key => $license_key) {
            # code...
            $bots[count($bots)] = $license_key->bot_name;
        }

        return view('tps.index', compact('page_name', 'usd', 'bots'));
    }

    public function run(Request $request)
    {
        # code...
        $bot_name       = $request->session()->get('bot_name');
        $license_key    = $request->session()->get('license_key');

        if (($bot_name == null) && ($license_key == null)) {
            return redirect('/tps');
        }
        else{
            $usd            = $this->live_usd();
            $page_name      = 'Third Party Softwares';
            $saved_trades   = SavedTrade::where('user_id', Auth::user()->id)->get();
            $open_orders    = OpenOrder::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->where('trade_type', 'LIVE')->where('completed', 'NO')->where('initiator', '!=' ,'user')->get();

            $all_completed  = OpenOrder::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->where('trade_type', 'LIVE')->where('completed', 'YES')->where('initiator', '!=' ,'user')->get();
            foreach ($all_completed as $key => $completed) {
                # code...
                TradeHistory::create([
                    'user_id'           =>  Auth::user()->id,
                    'transaction_id'    =>  $completed->transaction_id,
                    'type'              =>  $completed->trade_type,
                    'b_or_s'            =>  $completed->action,
                    'date'              =>  $completed->date,
                    'initiator'         =>  $completed->initiator,
                    'open_time'         =>  $completed->open_time,
                    'close_time'        =>  $completed->close_time,
                    'trade_interval'    =>  $completed->trade_interval,
                    'pair'              =>  $completed->symbol_traded,
                    'amount_in_btc'     =>  $completed->amount_traded_btc,
                    'interval'          =>  $completed->trade_interval,
                    'status'            =>  $completed->status,
                ]);
    
                OpenOrder::where('user_id', Auth::user()->id)->where('transaction_id', $completed->transaction_id)->delete();
            }

            $trades_history = TradeHistory::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->where('type', 'LIVE')->where('initiator', '!=' ,'user')->get();

            return view('tps.run', compact('page_name', 'usd', 'bot_name', 'license_key', 'saved_trades', 'open_orders', 'trades_history'));
        }
    }

    public function save(Request $request)
    {
        # code...
        SavedTrade::create([
            'user_id'               => Auth::user()->id,
            'date'                  => $request->all()['date'],
            'action'                => $request->all()['trade_action'],
            'trade_type'            => $request->all()['type'],
            'symbol_traded'         => $request->all()['trade_pair'],
            'trade_interval'        => $request->all()['trade_interval'],
            'trade_leverage'        => $request->all()['trade_leverage'],
            'initiator'             => $request->all()['initiator'],
            'amount_traded_btc'     => $request->all()['traded_amount_in_btc'],
            'traded_crypto_usd'     => $request->all()['traded_crypto_usd'],
            'traded_crypto_amount'  => $request->all()['traded_crypto_amount'],
            'odds'                  => rand(80, 100)
        ]);
    }

    public function start(Request $request)
    {
        # code...
        $open_orders    = [];
        $saved_trades   = SavedTrade::where('user_id', Auth::user()->id)->get();
        foreach ($saved_trades as $key => $saved_trade) {
            # code...
            if ($key == 0) {
                # code...
                $usd = $this->live_usd();
            }

            $trade_pair         = $saved_trade->symbol_traded;
            $trade_pair_array   = explode("/", $trade_pair);
            $transaction_id 	= uniqid('trx');

            $info               = request()->all();

            if($saved_trade->action == 'Sell'){
                $t_a = 'Sell';
            }
            else{
                $t_a = 'Buy';
            }

            $f_amount = ($saved_trade->traded_crypto_usd + 7);
            $s_amount = ($saved_trade->traded_crypto_usd - 7);

            $status_check = Prediction::where([
                ['user_id',     '=',  Auth::user()->id],
                ['symbol',      '=',  $trade_pair],
                ['leverage',    '=',  $saved_trade->trade_leverage],
                ['interval',    '=',  $saved_trade->trade_interval], 
                ['buy_or_sell', '=',  $t_a],
                ['status',      '=',  'Not Used'],
                ['trade_type',  '=',  $saved_trade->trade_type],
            ])->where('amount', '<=', $f_amount)->where('amount', '>=', $s_amount)->count();

            if($status_check == 0){
                /*
                    This means that the above transaction did not yield a profit
                */
                $status = "LOSS";
            }
            else{
                /*
                    This means that the above transaction did yield a profit
                */
                $status = "PROFIT";
                Prediction::where([
                    ['user_id',     '=',  Auth::user()->id],
                    ['symbol',      '=',  $trade_pair],
                    ['leverage',    '=',  $saved_trade->trade_leverage],
                    ['interval',    '=',  $saved_trade->trade_interval], 
                    ['buy_or_sell', '=',  $t_a],
                    ['status',      '=',  'Not Used'],
                    ['trade_type',  '=',  $saved_trade->type],
                ])->where('amount', '<=', $f_amount)->where('amount', '>=', $s_amount)->update(['status' => 'Used']);
            }


            switch ($saved_trade->trade_interval) {
                case '1 min':
                    # code...
                    $close_time = $info['one_min'];
                break;

                case '3 mins':
                    # code...
                    $close_time = $info['three_mins'];
                break;

                case '5 mins':
                    # code...
                    $close_time = $info['five_mins'];
                break;

                case '30 mins':
                    # code...
                    $close_time = $info['thirty_mins'];
                break;

                case '1 hr':
                    # code...
                    $close_time = $info['one_hour'];
                break;
                
                default:
                    # code...
                    break;
            }

            /*
                This is to create an open order
            */

            $create_open_order = OpenOrder::create(
                [
                    'user_id'                   =>  Auth::user()->id,
                    'transaction_id'            =>  $transaction_id,
                    'date'                      =>  $saved_trade->date,
                    'action'                    =>  $saved_trade->action,
                    'open_time'                 =>  $info['open_time'],
                    'close_time'                =>  $close_time,
                    'trade_type'                =>  $saved_trade->trade_type,
                    'symbol_traded'             =>  $saved_trade->symbol_traded,
                    'trade_interval'            =>  $saved_trade->trade_interval,
                    'initiator'                 =>  $saved_trade->initiator,
                    'completed'                 =>  'NO',
                    'expected_return_usd'       =>  $this->make_a_trade($saved_trade->trade_leverage, $saved_trade->traded_crypto_usd),
                    'amount_traded_btc'         =>  $saved_trade->amount_traded_btc,
                    'traded_crypto_amount'      =>  $saved_trade->traded_crypto_amount,
                    'status'                    =>  $status,
                ]
            );

            if($create_open_order){
                SavedTrade::where('user_id', Auth::user()->id)->where('id', $saved_trade->id)->delete();

                $data = [
                    'id'					=> $transaction_id,
                    'transaction_id'		=> $transaction_id,
                    'date' 					=> $saved_trade->date,
                    'open_time' 			=> $info['open_time'],
                    'close_time' 			=> $close_time,
                    'pair'					=> $saved_trade->symbol_traded,
                    'trade_action'		    => $saved_trade->action,
                    'traded_crypto_amount' 	=> $saved_trade->traded_crypto_amount,
                    'amount_traded_btc' 	=> $saved_trade->amount_traded_btc,
                    'trade_interval' 		=> $saved_trade->trade_interval,
                ];
    
                $balance = Auth::user()->main_balance;

                /*
                    This is to update the user's bitcoin balance (subtracting the amount traded in btc from the user's bitcoin balance)
                */
                $update_user = User::where('id', Auth::user()->id)->update([
                    'main_balance'		=> $balance - $saved_trade->amount_traded_btc,
                    'limit' 			=> (Auth::user()->limit + 1),
                ]);                
    
                if($update_user){

                    $data['balance']        = User::where('id', Auth::user()->id)->first()->main_balance;
                    $data['usd_balance']    = $data['balance'] * $usd; 

                    $open_orders[count($open_orders)+1]=$data;
                }
            }

        }

        return $open_orders;
    }

    public function redirect($bot_name, Request $request)
    {
        # code...
        $result = LicenseKey::where('bot_name', $bot_name)->where('user_id', Auth::user()->id)->get();
        if (count($result) == 1) {
            # code...
            foreach ($result as $key => $single) {
                # code...
                if (($single['user_id'] == Auth::user()->id) && ($single['bot_name'] == $bot_name)) {
                    # code...
                    $request->session()->put('bot_name', $bot_name);
                    $request->session()->put('license_key', $single['license_key']);

                    return ([
                        'success' => 'true'
                    ]);
                } 
                else {
                    # code...
                    return ([
                        'success' => 'false'
                    ]);
                }
            }
        }
        elseif(count($result) == 0){
            return ([
                'success' => 'false'
            ]);
        }
    }

    public function verify($bot_name, Request $request)
    {
        # code...
        $result = LicenseKey::where('license_key', $request->all()['key'])->get();
        if (count($result) == 1) {
            # code...
            foreach ($result as $key => $single) {
                # code...
                if ($single['status'] == 'NOT USED') {
                    # code...
                    $update = LicenseKey::where('license_key', $request->all()['key'])->update([
                        'bot_name'  => $bot_name,
                        'user_id'   => Auth::user()->id,
                        'status'    => 'USED'
                    ]);

                    if ($update) {
                        # code...
                        $request->session()->put('bot_name', $bot_name);
                        $request->session()->put('license_key', $request->all()['key']);

                        return ([
                            'success' => 'true'
                        ]);
                    }
                    else{
                        return ([
                            'success' => 'false'
                        ]);
                    }
                }
                else{
                    if (($single['user_id'] == Auth::user()->id) && ($single['bot_name'] == $bot_name)) {
                        # code...
                        $request->session()->put('bot_name', $bot_name);
                        $request->session()->put('license_key', $request->all()['key']);

                        return ([
                            'success' => 'true'
                        ]);
                    } 
                    else {
                        # code...
                        return ([
                            'success' => 'false'
                        ]);
                    }
                    
                }
            }
        }
        else{
            return ([
                'success' => 'false'
            ]);
        }
    }

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
    }

    public function check_limit($up, $lp, $limit)
	{
		# code...
		//$rgn stands for randomly generated number
		switch($limit) {
            case '2x':
                $upl 	= $up * 2;
				$lpl 	= $lp * 2;
				$rgn    = mt_rand($upl,$lpl);
				return $rgn/2;
                break;

            case '5x':
                $upl 	= $up * 5;
				$lpl 	= $lp * 5;
				$rgn    = mt_rand($upl,$lpl);
				return $rgn/2;
                break;

            case '10x':
                $upl 	= $up * 10;
				$lpl 	= $lp * 10;
				$rgn    = mt_rand($upl,$lpl);
				return $rgn/2;
                break;

            case '20x':
                $upl 	= $up * 20;
				$lpl 	= $lp * 20;
				$rgn    = mt_rand($upl,$lpl);
				return $rgn/2;
                break;
	    }
	}

	public function make_a_trade($limit, $trade)
	{

		//Variables $up and $lp stands for "Upper Percentage" and "Lower Percentage"
		//Variables $upl and $lpl stands for "Upper Percentagae Limit" and "Lower Percentage Limit"
		//E.g 4.3 - 6.15
		//4.3 is the Upper Percentage and 6.15 is the Lower Percentage


		if (($trade >= 200) && ($trade <= 499)) {
			# code...
			$up 	= ($trade * 4.3)/100;
			$lp 	= ($trade * 6.15)/100;

			return $this->check_limit($up, $lp, $limit);
		}
		elseif (($trade >= 500) && ($trade <= 999)) {
			# code...
			$up 	= ($trade * 3.86)/100;
			$lp 	= ($trade * 5.82)/100;

			return $this->check_limit($up, $lp, $limit);
		}
		elseif (($trade >= 1000) && ($trade <= 2999)) {
			# code...
			$up 	= ($trade * 3.3)/100;
			$lp 	= ($trade * 3.58)/100;

			return $this->check_limit($up, $lp, $limit);
		}
		elseif (($trade >= 3000) && ($trade <= 10000)) {
			# code...
			$up 	= ($trade * 2.9)/100;
			$lp 	= ($trade * 3.29)/100;

			return $this->check_limit($up, $lp, $limit);
		}
	}
}
