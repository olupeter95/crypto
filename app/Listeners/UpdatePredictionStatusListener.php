<?php

namespace App\Listeners;

// use App\Events\MakeATradeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Prediction;
use Illuminate\Support\Facades\Auth;

class UpdatePredictionStatusListener
{

    /**
     * Handle the event.
     *
     * @param  MakeATradeEvent  $event
     * @return void
     */
    public function handle($event)
    {
       
        if ($event->status == 'LOSS') {
            # code...
            
        } 
        else {
            Prediction::where([
                ['user_id',     '=',  Auth::user()->id],
                ['symbol',      '=',  $event->trade_details['trade_pair']],
                ['leverage',    '=',  $event->trade_details['trade_leverage']],
                ['interval',    '=',  $event->trade_details['trade_interval']], 
                ['buy_or_sell', '=',  $event->t_a],
                ['status',      '=',  'Not Used'],
                ['trade_type',  '=',  $event->trade_details['type']],
            ])->where('amount', '<=', $event->from)->where('amount', '>=', $event->to)->update(['status' => 'Used']);
        }
    }
}
