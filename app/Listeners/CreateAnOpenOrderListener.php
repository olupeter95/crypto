<?php

namespace App\Listeners;

use App\Events\DisplayOpenOrdersEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\OpenOrder;
use Illuminate\Support\Facades\Auth;
use App\Models\Trade;
use App\Models\User;
use App\Models\Prediction;
use Illuminate\Support\Facades\Event;
use App\Listeners\UpdatePredictionStatusListener;
use App\Models\Currency;

class CreateAnOpenOrderListener
{
    public $trade;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $trade              = new Trade();
        $this->trade        = $trade;
    }

    /**
     * Handle the event.
     *
     * @param   $event
     * @return void
     */
    public function handle($event)
    {

        /*
            ================================================
                Check if trade is a profit or a loss
            ================================================
        */

        $prediction     = new Prediction();
        $status         = $prediction->checkStatus($event->trade_details, $event->t_a, $event->from, $event->to);

        $user           = User::where('id', Auth::user()->id)->first();
        $tableField     = ($event->trade_details['type'] == 'LIVE') ? 'main_balance' : 'demo_balance' ;

        $currency               = new Currency();
        $expected_return_usd    = $this->trade->make_a_trade($event->trade_details['trade_leverage'], $event->trade_details['traded_crypto_usd']);
        $expected_return_btc    = number_format($expected_return_usd/$currency->usd(), 4);
        // event(new TestingEvent($expected_return_btc));

        /*
            ===================================
                This is to create an open order
            ===================================
        */

        OpenOrder::create(
            [
                'user_id'                   =>  Auth::user()->id,
                'transaction_id'            =>  $event->transaction_id,
                'date'                      =>  $event->trade_details['date'],
                'action'                    =>  $event->trade_details['trade_action'],
                'open_time'                 =>  $event->trade_details['open_time'],
                'close_time'                =>  $event->trade_details['close_time'],
                'timezone'                  =>  $event->trade_details['timezone'],
                'trade_type'                =>  $event->trade_details['type'],
                'symbol_traded'             =>  $event->trade_details['trade_pair'],
                'trade_interval'            =>  $event->trade_details['trade_interval'],
                'initiator'                 =>  $event->trade_details['initiator'],
                'completed'                 =>  'NO',
                'expected_return_btc'       =>  $expected_return_btc,
                'amount_before_trade_btc'   =>  $user->$tableField,
                'amount_traded_btc'         =>  $event->trade_details['traded_amount_in_btc'],
                'traded_crypto_amount'      =>  $event->trade_details['traded_crypto_amount'],
                'status'                    =>  $status,
            ]
        );

        /*
            ==============================================================
                Pass information to the updatePredictionStatusListener
            ==============================================================
        */
        // Create a blank event
        $updatePredictionStatusEvent                = new Event;

        // Add the trade details to the event
        $updatePredictionStatusEvent->trade_details = $event->trade_details;
        $updatePredictionStatusEvent->status        = $status;
        $updatePredictionStatusEvent->t_a           = $event->t_a;
        $updatePredictionStatusEvent->from          = $event->from;
        $updatePredictionStatusEvent->to            = $event->to;   

        // return $updatePredictionStatusEvent;

        (new UpdatePredictionStatusListener())->handle($updatePredictionStatusEvent);

        $data = [
            'id'					=> $event->transaction_id,
            'transaction_id'		=> $event->transaction_id,
            'date' 					=> $event->trade_details['date'],
            'open_time' 			=> $event->trade_details['open_time'],
            'close_time' 			=> $event->trade_details['close_time'],
            'timezone'              => $event->trade_details['timezone'],
            'pair'					=> $event->trade_details['trade_pair'],
            'trade_action'		    => $event->trade_details['trade_action'],
            'traded_crypto_amount' 	=> $event->trade_details['traded_crypto_amount'],
            'amount_traded_btc' 	=> $event->trade_details['traded_amount_in_btc'],
            'trade_interval' 		=> $event->trade_details['trade_interval'],
        ];

        event(new DisplayOpenOrdersEvent($event->transaction_id, $data));

    }
}
