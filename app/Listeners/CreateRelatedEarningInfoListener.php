<?php

namespace App\Listeners;

use App\Events\CheckTradeStatusEvent;
use App\Events\DisplayEarningsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use App\Models\Currency;
use App\Models\User;
use App\Models\Earning;
use Illuminate\Support\Facades\Event;

class CreateRelatedEarningInfoListener
{

    /**
     * Handle the event.
     *
     * @param  CheckTradeStatusEvent  $event
     * @return void
     */
    public function handle(CheckTradeStatusEvent $event)
    {
        $currency               = new Currency();

        $earnings = [
            'user_id'           => Auth::user()->id,
            'transaction_id'    => $event->transaction_id,
            'trade_type'        => $event->open_order->trade_type,
            'expected_return'   => number_format(($event->open_order->expected_return_btc * $currency->usd()), 4),
            'status'            => $event->open_order->status,
            'wallet_amount'     => $currency->usd() * $event->current_balance
        ];

        $earnings['earnings']   = $earnings['wallet_amount'] - $earnings['expected_return'];
        $earning                = Earning::create($earnings);
        
        
        $earnings['created_at']     = $this->the_time($earning->created_at);
        $tableField                 = ($event->open_order->trade_type == 'LIVE') ? 'main_balance' : 'demo_balance' ;

        
        $earnings['balance']        = User::where('id', Auth::user()->id)->first()->$tableField;
        $earnings['usd_balance']    = $earnings['balance'] * $currency->live_usd();

        event(new DisplayEarningsEvent($event->open_order->status, $event->transaction_id, $earnings));
    }

    public function the_time($created_at){
        $timestamp          = $created_at;
        $datetime           = explode(" ",$timestamp);
        $date               = $datetime[0];

        $exploded_date      = explode("-", $date);
        switch($exploded_date[1]){
            case '01':
                $date = $exploded_date[2] . ' Jan';
            break;

            case '02':
                $date = $exploded_date[2] . ' Feb';
            break;

            case '03':
                $date = $exploded_date[2] . ' Mar';
            break;

            case '04':
                $date = $exploded_date[2] . ' Apr';
            break;

            case '05':
                $date = $exploded_date[2] . ' May';
            break;

            case '06':
                $date = $exploded_date[2] . ' Jun';
            break;

            case '07':
                $date = $exploded_date[2] . ' Jul';
            break;

            case '08':
                $date = $exploded_date[2] . ' Aug';
            break;

            case '09':
                $date = $exploded_date[2] . ' Sep';
            break;

            case '10':
                $date = $exploded_date[2] . ' Oct';
            break;

            case '11':
                $date = $exploded_date[2] . ' Nov';
            break;

            case '12':
                $date = $exploded_date[2] . ' Dec';
            break;
        }

        $time               = $datetime[1];
        $formatted_time     = explode(":", $time);

        if($formatted_time[0] > 12){
            $meridian   = 'PM';
        }
        else{
            $meridian = 'AM';
        }

        $time       = ($formatted_time[0] + 1) . ":" . $formatted_time[1] . $meridian;
        return $date . " " . $time;
    }
}
