<?php

namespace App\Listeners;

use App\Events\CheckTradeStatusEvent;
use App\Events\UpdateWalletBalanceEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\OpenOrder;
use Illuminate\Support\Facades\Auth;
use App\Models\Trade;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Support\Facades\Event;

class GetOrderInformationListener
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

        $expected_return_btc    = number_format($event->open_order->expected_return_usd/$currency->usd(), 4);
        $tableField             = ($event->open_order->trade_type == 'LIVE') ? 'main_balance' : 'demo_balance' ;

        
        // $earnings['wallet_amount'] = $this->usd() * Auth::user()->main_balance;
        $user                       = User::where('id', Auth::user()->id)->first();

        /*
            ============================================================================================================================
                This is to update the user's bitcoin balance (subtracting the amount traded in btc from the user's bitcoin balance)
            ============================================================================================================================
        */

        $balance       = ($event->open_order->status == 'LOSS') ? ($user->$tableField - $expected_return_btc) : ($user->$tableField + $expected_return_btc + $event->open_order->amount_traded_btc) ;
        
        event (new UpdateWalletBalanceEvent($user->id, $balance, 'BTC'));
        User::where('id', Auth::user()->id)->update([
            $tableField  => $balance
        ]);

        
        // else{
        //     $earnings['wallet_amount'] = $this->usd() * Auth::user()->demo_balance;

        //     if ($event->open_order->status == 'LOSS') {
        //         # code...
        //         User::where('id', Auth::user()->id)->update([
        //             'demo_balance'  => Auth::user()->demo_balance - $expected_return_btc
        //         ]);
        //     } 
        //     else {
        //         # code...
        //         User::where('id', Auth::user()->id)->update([
        //             'demo_balance'  => Auth::user()->demo_balance + $expected_return_btc + $event->open_order->amount_traded_btc
        //         ]);
        //     }
        // }
    }

}
