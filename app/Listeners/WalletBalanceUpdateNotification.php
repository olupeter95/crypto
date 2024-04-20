<?php

namespace App\Listeners;

use App\Events\UpdateWalletBalanceEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Wallet;

class WalletBalanceUpdateNotification
{
    /**
     * Handle the event.
     *
     * @param  UpdateWalletBalanceEvent  $event
     * @return void
     */
    public function handle(UpdateWalletBalanceEvent $event)
    {
        $user_id        = $event->user_id;
        $main_balance   = $event->main_balance;
        $wallet_type    = $event->wallet_type;

        Wallet::where('user_id', $user_id)->where('wallet_type', $wallet_type)->update([
            'balance'       => $main_balance
        ]);
    }
}
