<?php

namespace App\Listeners;

use App\Events\OtherCoinpaymentsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\DepositAdminNotification;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Wallet;
use App\Mail\Deposits;

class MakeDepositListener
{
    /**
     * Handle the event.
     *
     * @param  OtherCoinpaymentsEvent  $event
     * @return void
     */
    public function handle(OtherCoinpaymentsEvent $event)
    {
        $user                       = User::where('email', $event->transaction['buyer_email'])->first();

        $theDetails      = [
            'user_id'           =>  $user->id,
            'transaction_id'    =>  uniqid('dep'),
            'image_name'        =>  'https://www.coinpayments.net/images/coins/'.$event->transaction['coin'].'.png',
            'details'           =>  $event->transaction['coin'].' Payment',
            'amount_deposited'  =>  $event->transaction['amount_total_fiat'],
            'amount_in_btc'     =>  $event->transaction['receivedf'],
            'coin_type'         =>  $event->transaction['coin'],
            'approved'          =>  'YES'
        ];

        if(Deposit::create($theDetails)){
            
            Mail::to('support@coinshape.com')->send(new DepositAdminNotification([
                'name' => $user->name,
                'url'  => url('/admin/deposit/all')
            ]));
    
            Mail::to($event->transaction['buyer_email'])->send(new Deposits([
                'first_name' => 'Coinshape User',
                'url'        => url('/deposit-logs')
            ]));
        }
    }
}
