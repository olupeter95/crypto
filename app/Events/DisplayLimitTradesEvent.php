<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DisplayLimitTradesEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $limit_trade;
    public $transaction_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($transaction_id, $limit_trade)
    {
        $this->limit_trade = $limit_trade;
        $this->transaction_id = $transaction_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('limit-'.$this->transaction_id);
    }

    public function broadcastAs()
    {
      return 'DisplayLimitTradesEvent';
    }
}
