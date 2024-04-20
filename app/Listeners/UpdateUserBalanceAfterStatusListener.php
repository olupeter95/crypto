<?php

namespace App\Listeners;

use App\Events\CheckTradeStatusEvent;
use App\Events\TestingEvent;
use App\Events\DisplayUserDataEvent;
use App\Events\UpdateWalletBalanceEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\OpenOrder;
use Illuminate\Support\Facades\Auth;
use App\Models\Trade;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Support\Facades\Event;

class UpdateUserBalanceAfterStatusListener
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
        $user                   = User::where('id', Auth::user()->id)->first();
        
        $tableField             = ($event->open_order->trade_type == 'LIVE') ? 'main_balance' : 'demo_balance' ;
        

        /*
            ============================================================================================================================
                This is to update the user's bitcoin balance (subtracting the amount traded in btc from the user's bitcoin balance)
            ============================================================================================================================
        */

        

        $balance       = ($event->open_order->status == 'LOSS') ? ($event->open_order->amount_before_trade_btc - $event->open_order->expected_return_btc) : ($event->open_order->expected_return_btc + $event->open_order->amount_before_trade_btc) ;
        User::where('id', Auth::user()->id)->update([
            $tableField  => $balance
        ]);

        // event(new TestingEvent([
        //     'currentBal'            => $user->$tableField,
        //     'amount_traded_btc'     => $event->open_order->amount_before_trade_btc,
        //     'expected_return_btc'   => $event->open_order->expected_return_btc,
        // ]));

        event (new UpdateWalletBalanceEvent($user->id, $balance, 'BTC'));
        event (new DisplayUserDataEvent($user->id, [
            'type'  => 'Wallet'.$event->open_order->trade_type,
            'value' => [
                'btc'    => $balance,
                'usd'    => $balance * $currency->live_usd(),
            ]
        ]));
    }
}
