<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CheckTradeStatusEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $transaction_id;
    public $open_order;
    public $current_balance;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($transaction_id, $open_order, $current_balance)
    {
        $this->transaction_id   = $transaction_id;
        $this->open_order       = $open_order;
        $this->current_balance  = $current_balance;
    }
}
