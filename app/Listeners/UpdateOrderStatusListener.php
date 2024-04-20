<?php

namespace App\Listeners;

use App\Events\CheckTradeStatusEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\OpenOrder;
use Illuminate\Support\Facades\Auth;

class UpdateOrderStatusListener
{

    /**
     * Handle the event.
     *
     * @param  CheckTradeStatusEvent  $event
     * @return void
     */
    public function handle(CheckTradeStatusEvent $event)
    {
        $open_order = OpenOrder::where('user_id', Auth::user()->id)->where('transaction_id', $event->transaction_id)->first();
    
        if ($open_order->completed == 'YES') {
            # code...
            return false;
        } 
        else {
            # code...
            OpenOrder::where('user_id', Auth::user()->id)->where('transaction_id', $event->transaction_id)->update([
                'completed' => 'YES'
            ]);
        }
    }
}
