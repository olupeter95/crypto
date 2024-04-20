<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MakeATradeLimitEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $transaction_id;
    public $trade_details;
    public $t_a;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($transaction_id, $trade_details)
    {
        $this->transaction_id   = $transaction_id;
        $this->trade_details    = $trade_details;
        $this->t_a              = $trade_details['trade_action'];
    }
}
