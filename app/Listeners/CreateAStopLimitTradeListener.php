<?php

namespace App\Listeners;

use App\Events\MakeATradeStopLimitEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\StopLimit;
use Illuminate\Support\Facades\Auth;

class CreateAStopLimitTradeListener
{
    /**
     * Handle the event.
     *
     * @param  MakeATradeLimitEvent  $event
     * @return void
     */
    public function handle(MakeATradeStopLimitEvent $event)
    {
        /*
            ===================================
                This is to create a limit trade
            ===================================
        */

        StopLimit::create(
            [
                'user_id'                   =>  Auth::user()->id,
                'transaction_id'            =>  $event->transaction_id,
                'date'                      =>  $event->trade_details['date'],
                'action'                    =>  $event->trade_details['trade_action'],
                'open_time'                 =>  $event->trade_details['open_time'],
                'timezone'                  =>  $event->trade_details['timezone'],
                'trade_type'                =>  $event->trade_details['type'],
                'symbol_traded'             =>  $event->trade_details['trade_pair'],
                'trade_limit'               =>  $event->trade_details['limit'],
                'trade_stop_limit'          =>  $event->trade_details['stop_limit'],
                'leverage'                  =>  $event->trade_details['trade_leverage'],
                'completed'                 =>  'NO',
                'expected_return_usd'       =>  0,
                'amount_traded_btc'         =>  $event->trade_details['traded_amount_in_btc'],
                'traded_crypto_amount'      =>  $event->trade_details['traded_crypto_amount'],
                'status'                    =>  'PENDING',
            ]
        );

        $data = [
            'id'					=> $event->transaction_id,
            'transaction_id'		=> $event->transaction_id,
            'date' 					=> $event->trade_details['date'],
            'open_time' 			=> $event->trade_details['open_time'],
            'timezone'              => $event->trade_details['timezone'],
            'pair'					=> $event->trade_details['trade_pair'],
            'trade_action'		    => $event->trade_details['trade_action'],
            'traded_crypto_amount' 	=> $event->trade_details['traded_crypto_amount'],
            'amount_traded_btc' 	=> $event->trade_details['traded_amount_in_btc'],
            'trade_limit' 		    => $event->trade_details['limit'],
            'trade_stop_limit' 		=> $event->trade_details['stop_limit'],
            'status'                => 'PENDING'
        ];

        // event(new DisplayLimitTradesEvent($event->transaction_id, $data));
    }
}
