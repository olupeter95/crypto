<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Currency;
use App\Events\DisplayUserDataEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\UpdateBalanceAfterDepositEvent;

class UpdateBalanceAfterDepositListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UpdateBalanceAfterDepositEvent  $event
     * @return void
     */
    public function handle(UpdateBalanceAfterDepositEvent $event)
    {
        $currency           = new Currency();
        
        $user_id = $event->details['user_id'];
        $coin_type = $event->details['coin_type']; 
        
        if($coin_type === 'BTC')
        {
            $userBal = User::where('id', $user_id)->first()->main_balance;
            $newBal = $event->details['amount_in_btc'] + $userBal;
            User::findorFail($user_id)->update([
                'main_balance' => $newBal,
            ]);
            Wallet::where('user_id', $user_id)->where('wallet_type', $coin_type)
            ->update([
                'balance' => $newBal,
            ]);

            event (new DisplayUserDataEvent($user_id, [
                'type'  => 'WalletLIVE',
                'value' => [
                    'btc'    => $newBal,
                    'usd'    => $newBal * $currency->live_usd(),
                ]
            ]));
        }else {
            $walletBal = Wallet::where('user_id', $user_id)->where('wallet_type', $coin_type)
            ->first()->balance;
            $newBal = $event->details['amount_in_btc'] +  $walletBal;
            Wallet::where('user_id', $user_id)->where('wallet_type', $coin_type)
            ->update([
                'balance' => $newBal,
            ]);
        }
    }
}
