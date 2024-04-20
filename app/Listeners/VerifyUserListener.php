<?php

namespace App\Listeners;

use App\Events\OtherCoinpaymentsEvent;
use App\Events\BtcpayPaymentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Models\OtherCoinpayment;

class VerifyUserListener
{
    /**
     * Handle the event.
     *
     * @param  OtherCoinpaymentsEvent  $event
     * @return void
     */
    public function handle(OtherCoinpaymentsEvent $event)
    {
        $user               = User::where('email', $event->transaction['buyer_email'])->first();
        
        OtherCoinpayment::create([
            'user_id'       => $user->id,
            'buyer_email'   => $event->transaction['buyer_email'],
            'order_id'      => $event->transaction['order_id'],
            'invoice_id'    => $event->transaction['txn_id'],
            'price'         => $event->transaction['amount_total_fiat'],
            'currency'      => $event->transaction['currency_code'],
            'coin_price'    => $event->transaction['amountf'],
            'coin_paid'     => $event->transaction['receivedf'],
            'coin_type'     => $event->transaction['coin'],
            'status'        => $event->transaction['status_text'],
            'deposited'     => 'YES',
        ]);

        event(new BtcpayPaymentEvent([
            'success'       => 'true',
            'message'       => 'Payment information created'
        ]));
        
    }
}
