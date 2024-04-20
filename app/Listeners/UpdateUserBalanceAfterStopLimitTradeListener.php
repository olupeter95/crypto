<?php

namespace App\Listeners;

use App\Events\MakeATradeStopLimitEvent;
use App\Events\MakeATradeLimitEvent;
use App\Events\UpdateWalletBalanceEvent;
use App\Events\DisplayUserDataEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use App\Models\Currency;

class UpdateUserBalanceAfterStopLimitTradeListener
{
    /**
     * Handle the event.
     *
     * @param  MakeATradeStopLimitEvent  $event
     * @return void
     */
    public function handle(MakeATradeStopLimitEvent $event)
    {
        $currency                   = new Currency();
        $user                       = User::where('id', Auth::user()->id)->first();

        $tableField                 = ($event->trade_details['type'] == 'LIVE') ? 'main_balance' : 'demo_balance' ;
        $balance                    = number_format(($user->$tableField - $event->trade_details['traded_amount_in_btc']), 6);

        /*
            ============================================================================================================================
                This is to update the user's bitcoin balance (subtracting the amount traded in btc from the user's bitcoin balance)
            ============================================================================================================================
        */

        ($event->trade_details['type'] == 'LIVE') ? User::where('id', $user->id)->update([$tableField => $balance,'limit' => ($user->limit + 1),]) : '' ;

        event (new UpdateWalletBalanceEvent($user->id, $balance, 'BTC'));
        event (new DisplayUserDataEvent($user->id, [
            'type'  => 'Wallet'.$event->trade_details['type'],
            'value' => [
                'btc'    => $balance,
                'usd'    => $balance * $currency->live_usd(),
            ]
        ]));
    }
}
