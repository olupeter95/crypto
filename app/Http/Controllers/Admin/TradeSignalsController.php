<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PredictionsInventory;
use App\Models\LimitPrediction;
use App\Models\StopLimitPrediction;
use App\Models\Prediction;
use App\Models\User;
use App\Models\CoinPair;
use App\Models\Currency;
use App\Models\AltCoin;

class TradeSignalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $page_name      = 'Multiple Trade Signals';
        $users          = User::all();
        $coin_pairs     = CoinPair::all();

        return view('admin.signals.multiple.create', compact('page_name', 'users', 'coin_pairs'));
    }

    public function limit()
    {
        $page_name      = 'Limit Trade Signals';
        $users          = User::all();
        $coin_pairs     = AltCoin::all();

        return view('admin.signals.limit', compact('page_name', 'users', 'coin_pairs'));
    }

    public function stop_limit()
    {
        $page_name      = 'Stop Limit Trade Signals';
        $users          = User::all();
        $coin_pairs     = AltCoin::all();

        return view('admin.signals.stop-limit', compact('page_name', 'users', 'coin_pairs'));
    }

    public function single($user_id){
        $page_name      = 'Single Trade Signals';
        // $users          = User::all();
        $coin_pairs     = CoinPair::all();

        return view('admin.signals.single', compact('page_name', 'coin_pairs', 'user_id'));
    }

    public function live()
    {
        $page_name      = 'All Live Trade Signals';
        //$license_keys   = LicenseKey::all();
        $predictions = PredictionsInventory::where('trade_type', 'LIVE')->get();
        return view('admin.signals.live', compact('page_name', 'predictions'));
    }

    public function demo()
    {
        $page_name      = 'All Demo Trade Signals';
        //$license_keys   = LicenseKey::all();
        $predictions = PredictionsInventory::where('trade_type', 'DEMO')->get();
        return view('admin.signals.demo', compact('page_name', 'predictions'));
    }

    public function user($user_id, $session_id, $trade_type)
    {
        //$license_keys   = LicenseKey::all();
        $inventory = PredictionsInventory::where('session_id', $session_id)->first();

        switch ($inventory->type) {
            case 'Limit':
                # code...
                $predictions = LimitPrediction::where('user_id', $user_id)->where('session_id', $session_id)->where('trade_type', $trade_type)->where('status', 'Not Used')->get();
            break;

            case 'Stop Limit':
                # code...
                $predictions = StopLimitPrediction::where('user_id', $user_id)->where('session_id', $session_id)->where('trade_type', $trade_type)->where('status', 'Not Used')->get();
            break;

            case 'Market':
                # code...
                $predictions = Prediction::where('user_id', $user_id)->where('session_id', $session_id)->where('trade_type', $trade_type)->where('status', 'Not Used')->get();
            break;
            
            default:
                # code...
            break;
        }
        
        foreach ($predictions as $key => $prediction) {
            # code...
            $symbol_array = explode("/",$prediction->symbol);
            $prediction->traded_symbol = $symbol_array[0];
        }

        $currencies  = Currency::all();
        return ([
            'success'       => 'true',
            'predictions'   => $predictions,
            'currencies'    => $currencies,
            'type'          => $inventory->type
        ]);
    }

    public function users($session_id, $trade_type){
        $user_ids       = PredictionsInventory::where('session_id', $session_id)->where('trade_type', $trade_type)->pluck('users_id');
        $ids_array      = explode(",",$user_ids[0]);
		
        $users = [];

        for ($i=0; $i < count($ids_array); $i++) { 
            # code...
            $user = User::where('id', $ids_array[$i])->first();
			if($user){
				$users[] = [
					'name' => $user->name,
					'email' => $user->email,
					'id' => $user->id
				];
			}
        }

        return ([
            'success' => 'true',
            'users'   => $users
        ]);
    }

    public function create_limit(Request $request)
    {
        # code...
        $number_of_trades   	= $request->all()['number_of_trades'];
		$amount_range_from 		= $request->all()['amount_range_from'];
		$amount_range_to 		= $request->all()['amount_range_to'];
		$limit_range_from 		= $request->all()['limit_range_from'];
		$limit_range_to 		= $request->all()['limit_range_to'];
		$buy_or_sell 			= $request->all()['buy_or_sell'];
		$leverage_value 		= $request->all()['leverage_value'];
		$number_of_symbols 		= $request->all()['number_of_symbols'];
        $users_id 				= $request->all()['users_id'];
        
        $trade_prediction 		= [];
		$dump 					= [];

		$str 					= rand(); 
        $session_id 			= md5($str); 
        
        $ids = '';

        foreach ($users_id as $key => $user_id) {
            if ($key == 1) {
                # code...
                $ids .= $user_id . ",";
            }
            else{
                $ids .= $user_id;
            }
        }

	
		$trade_prediction['live_prediction_inventory'] = [
			'users_id'      => $ids,
			'session_id' 	=> $session_id,
			'range_from' 	=> $amount_range_from,
			'range_to' 		=> $amount_range_to,
			'no_of_signals' => $number_of_trades,
			'type' 			=> 'Limit',
			'trade_type' 	=> 'LIVE',
		];
		PredictionsInventory::create($trade_prediction['live_prediction_inventory']);


        for ($i=1; $i <= $number_of_trades; $i++) { 
			# code...

			$symbol_min 		= array_key_first($number_of_symbols);
			$symbol_max 		= array_key_last($number_of_symbols);

			$leverage_min   	= array_key_first($leverage_value);
			$leverage_max   	= array_key_last($leverage_value);

			$bs_max    			= array_key_first($buy_or_sell);
			$bs_min 			= array_key_last($buy_or_sell);

			$amount 			= rand($amount_range_from, $amount_range_to);
			$limit 				= rand($limit_range_from * 100, $limit_range_to * 100)/100;
			$symbol_key 		= rand($symbol_max, $symbol_min);
			$leverage_key 		= rand($leverage_max, $leverage_min);
			$bs_key 			= rand($bs_max, $bs_min);

			
			foreach ($users_id as $key => $user_id) {
				$trade_prediction[$key]['single_live_prediction'][$i] = [
					'amount'  		=> $amount,
					'limit'  		=> $limit,
					'leverage' 		=> $leverage_value[$leverage_key],
					'symbol' 		=> $number_of_symbols[$symbol_key],
					'status' 		=> 'Not Used',
					'session_id'    => $session_id,
					'buy_or_sell'   => $buy_or_sell[$bs_key],
					'trade_type' 	=> 'LIVE',
					'user_id'  		=> $user_id,
				];

				LimitPrediction::create($trade_prediction[$key]['single_live_prediction'][$i]);
			}

			$dump[$i] = [
				'amount'  		=> $amount,
				'limit'  		=> $limit,
				'leverage' 		=> $leverage_value[$leverage_key],
				'symbol' 		=> $number_of_symbols[$symbol_key],
				'buy_or_sell'   => $buy_or_sell[$bs_key],
				'trade_type' 	=> 'LIVE',
			];
        }

        return ([
            'message' => 'Limit Predictions Generated Successfully!',
			'success' => 'true',
			'data'    =>  $dump,
        ]);
    }

    public function create_stop_limit(Request $request)
    {
        # code...
        $number_of_trades   	= $request->all()['number_of_trades'];
		$amount_range_from 		= $request->all()['amount_range_from'];
		$amount_range_to 		= $request->all()['amount_range_to'];

		$limit_range_from 		= $request->all()['limit_range_from'];
		$limit_range_to 		= $request->all()['limit_range_to'];

		$stop_limit_range_from  = $request->all()['stop_limit_range_from'];
		$stop_limit_range_to 	= $request->all()['stop_limit_range_to'];

		$buy_or_sell 			= $request->all()['buy_or_sell'];
		$leverage_value 		= $request->all()['leverage_value'];
		$number_of_symbols 		= $request->all()['number_of_symbols'];
        $users_id 				= $request->all()['users_id'];
        
        $trade_prediction 		= [];
		$dump 					= [];

		$str 					= rand(); 
        $session_id 			= md5($str); 
        
        $ids = '';

        foreach ($users_id as $key => $user_id) {
            if ($key == 1) {
                # code...
                $ids .= $user_id . ",";
            }
            else{
                $ids .= $user_id;
            }
        }

	
		$trade_prediction['live_prediction_inventory'] = [
			'users_id'      => $ids,
			'session_id' 	=> $session_id,
			'range_from' 	=> $amount_range_from,
			'range_to' 		=> $amount_range_to,
			'no_of_signals' => $number_of_trades,
			'type' 			=> 'Stop Limit',
			'trade_type' 	=> 'LIVE',
		];
		PredictionsInventory::create($trade_prediction['live_prediction_inventory']);


        for ($i=1; $i <= $number_of_trades; $i++) { 
			# code...

			$symbol_min 		= array_key_first($number_of_symbols);
			$symbol_max 		= array_key_last($number_of_symbols);

			$leverage_min   	= array_key_first($leverage_value);
			$leverage_max   	= array_key_last($leverage_value);

			$bs_max    			= array_key_first($buy_or_sell);
			$bs_min 			= array_key_last($buy_or_sell);

			$amount 			= rand($amount_range_from, $amount_range_to);
			$limit 				= rand($limit_range_from * 100, $limit_range_to * 100)/100;
			$stop_limit 	    = rand($stop_limit_range_from * 100, $stop_limit_range_to * 100)/100;
			$symbol_key 		= rand($symbol_max, $symbol_min);
			$leverage_key 		= rand($leverage_max, $leverage_min);
			$bs_key 			= rand($bs_max, $bs_min);

			
			foreach ($users_id as $key => $user_id) {
				$trade_prediction[$key]['single_live_prediction'][$i] = [
					'amount'  		=> $amount,
					'limit'  		=> $limit,
					'stop_limit'    => $stop_limit,
					'leverage' 		=> $leverage_value[$leverage_key],
					'symbol' 		=> $number_of_symbols[$symbol_key],
					'status' 		=> 'Not Used',
					'session_id'    => $session_id,
					'buy_or_sell'   => $buy_or_sell[$bs_key],
					'trade_type' 	=> 'LIVE',
					'user_id'  		=> $user_id,
				];

				StopLimitPrediction::create($trade_prediction[$key]['single_live_prediction'][$i]);
			}

			$dump[$i] = [
				'amount'  		=> $amount,
				'limit'  		=> $limit,
				'stop_limit'    => $stop_limit,
				'leverage' 		=> $leverage_value[$leverage_key],
				'symbol' 		=> $number_of_symbols[$symbol_key],
				'buy_or_sell'   => $buy_or_sell[$bs_key],
				'trade_type' 	=> 'LIVE',
			];
        }

        return ([
            'message' => 'Limit Predictions Generated Successfully!',
			'success' => 'true',
			'data'    =>  $dump,
        ]);
    }

    public function create(Request $request)
    {
        // return $request->all();
        $number_of_trades   	= $request->all()['number_of_trades'];
		$amount_range_from 		= $request->all()['amount_range_from'];
		$amount_range_to 		= $request->all()['amount_range_to'];
		$buy_or_sell 			= $request->all()['buy_or_sell'];
		$leverage_value 		= $request->all()['leverage_value'];
		$number_of_intervals    = $request->all()['number_of_intervals'];
		$number_of_symbols 		= $request->all()['number_of_symbols'];
		$trade_type 			= $request->all()['trade_type'];
        $users_id 				= $request->all()['users_id'];
        
        $trade_prediction 		= [];
		$dump 					= [];

		$str 					= rand(); 
        $session_id 			= md5($str); 
        
        $ids = '';

        foreach ($users_id as $key => $user_id) {
            if ($key == 1) {
                # code...
                $ids .= $user_id . ",";
            }
            else{
                $ids .= $user_id;
            }
        }

        if ($trade_type == 'Live Trade') {

			$trade_prediction['live_prediction_inventory'] = [
                'users_id'      => $ids,
				'session_id' 	=> $session_id,
				'range_from' 	=> $amount_range_from,
				'range_to' 		=> $amount_range_to,
				'no_of_signals' => $number_of_trades,
				'type' 			=> 'Market',
				'trade_type' 	=> 'LIVE',
			];
			PredictionsInventory::create($trade_prediction['live_prediction_inventory']);
		}
		elseif ($trade_type == 'Demo Trade') {
			# code...
			$trade_prediction['demo_prediction_inventory'] = [
                'users_id'      => $ids,
				'session_id' 	=> $session_id,
				'range_from' 	=> $amount_range_from,
				'range_to' 		=> $amount_range_to,
				'no_of_signals' => $number_of_trades,
				'type' 			=> 'Market',
				'trade_type' 	=> 'DEMO',
			];
			PredictionsInventory::create($trade_prediction['demo_prediction_inventory']);
		}

        for ($i=1; $i <= $number_of_trades; $i++) { 
			# code...

			$symbol_min 		= array_key_first($number_of_symbols);
			$symbol_max 		= array_key_last($number_of_symbols);

			$interval_min 		= array_key_first($number_of_intervals);
			$interval_max   	= array_key_last($number_of_intervals);

			$leverage_min   	= array_key_first($leverage_value);
			$leverage_max   	= array_key_last($leverage_value);

			$bs_max    			= array_key_first($buy_or_sell);
			$bs_min 			= array_key_last($buy_or_sell);

			$amount 			= rand($amount_range_from, $amount_range_to);
			$symbol_key 		= rand($symbol_max, $symbol_min);
			$interval_key 		= rand($interval_max, $interval_min);
			$leverage_key 		= rand($leverage_max, $leverage_min);
			$bs_key 			= rand($bs_max, $bs_min);

			if ($trade_type == 'Live Trade') {
				# code...

				foreach ($users_id as $key => $user_id) {
					$trade_prediction[$key]['single_live_prediction'][$i] = [
						'amount'  		=> $amount,
						'leverage' 		=> $leverage_value[$leverage_key],
						'symbol' 		=> $number_of_symbols[$symbol_key],
						'status' 		=> 'Not Used',
						'session_id'    => $session_id,
						'buy_or_sell'   => $buy_or_sell[$bs_key],
						'trade_type' 	=> 'LIVE',
						'interval' 		=> $number_of_intervals[$interval_key],
						'user_id'  		=> $user_id,
					];

					Prediction::create($trade_prediction[$key]['single_live_prediction'][$i]);
				}

				$dump[$i] = [
					'amount'  		=> $amount,
					'leverage' 		=> $leverage_value[$leverage_key],
					'symbol' 		=> $number_of_symbols[$symbol_key],
					'buy_or_sell'   => $buy_or_sell[$bs_key],
					'trade_type' 	=> 'LIVE',
					'interval' 		=> $number_of_intervals[$interval_key],
				];

			}
			elseif ($trade_type == 'Demo Trade') {
				# code...

				foreach ($users_id as $key => $user_id) {

					$trade_prediction[$key]['single_demo_prediction'][$i] = [
						'amount'  		=> $amount,
						'leverage' 		=> $leverage_value[$leverage_key],
						'symbol' 		=> $number_of_symbols[$symbol_key],
						'status' 		=> 'Not Used',
						'session_id'    => $session_id,
						'buy_or_sell'   => $buy_or_sell[$bs_key],
						'trade_type' 	=> 'DEMO',
						'interval' 		=> $number_of_intervals[$interval_key],
						'user_id'  		=> $user_id,
					];

					Prediction::create($trade_prediction[$key]['single_demo_prediction'][$i]);
				}

				$dump[$i] = [
					'amount'  		=> $amount,
					'leverage' 		=> $leverage_value[$leverage_key],
					'symbol' 		=> $number_of_symbols[$symbol_key],
					'buy_or_sell'   => $buy_or_sell[$bs_key],
					'trade_type' 	=> 'DEMO',
					'interval' 		=> $number_of_intervals[$interval_key],
				];
			}
        }
        
        if ($trade_type == 'Live Trade') {
			$alert 		= 'Live Predictions Generated Successfully!';
		}
		elseif ($trade_type == 'Demo Trade') {
			$alert      = 'Demo Predictions Generated Successfully!';
		}

        return json_encode([
            'message' => $alert,
			'success' => 'true',
			'data'    =>  $dump,
        ]);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($session_id, $type)
    {
        $inventory = PredictionsInventory::where('session_id', $session_id)->first();

        switch ($inventory->type) {
            case 'Limit':
                # code...
                LimitPrediction::where('session_id', $session_id)->delete();
            break;

            case 'Stop Limit':
                # code...
                StopLimitPrediction::where('session_id', $session_id)->delete();
            break;

            case 'Market':
                # code...
                Prediction::where('session_id', $session_id)->delete();
            break;
            
            default:
                # code...
            break;
        }

        PredictionsInventory::where('session_id', $session_id)->delete();
        
        if($type == 'LIVE'){
            return redirect('/admin/multiple/trade/signals/live');
        }
        else{
            return redirect('/admin/multiple/trade/signals/demo');
        }
    }
}
