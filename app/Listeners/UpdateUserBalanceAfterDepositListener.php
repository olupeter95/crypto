<?php

namespace App\Listeners;

use App\Events\OtherCoinpaymentsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UpdateWalletBalanceEvent;
use App\Events\DisplayUserDataEvent;
use App\Models\Currency;
use App\Models\User;
use App\Models\Wallet;

class UpdateUserBalanceAfterDepositListener
{
    
    /**
     * Handle the event.
     *
     * @param  OtherCoinpaymentsEvent  $event
     * @return void
     */
    public function handle(OtherCoinpaymentsEvent $event)
    {
        $currency           = new Currency();

        $user               = User::where('email', $event->transaction['buyer_email'])->first();
        $btcWalletInfo      = Wallet::where('user_id', $user->id)->where('wallet_type', $event->transaction['coin'])->first();
        $newBalance         = $btcWalletInfo->balance + $event->transaction['receivedf'];

        if ($event->transaction['coin'] == 'BTC') {
            # code...
            User::where('id', $user->id)->update([
                'main_balance' => $newBalance
            ]);

            event (new DisplayUserDataEvent($user->id, [
                'type'  => 'WalletLIVE',
                'value' => [
                    'btc'    => $newBalance,
                    'usd'    => $newBalance * $currency->live_usd(),
                ]
            ]));
        }
    }
}
