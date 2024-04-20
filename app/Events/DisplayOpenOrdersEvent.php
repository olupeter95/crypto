<?php

namespace App\Events;

use App\Models\OpenOrder;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DisplayOpenOrdersEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $open_order;
    public $transaction_id;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\OpenOrder  $order
     * @return void
    */
    public function __construct($transaction_id, $open_order)
    {
        $this->open_order = $open_order;
        $this->transaction_id = $transaction_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('order-'.$this->transaction_id);
    }

    public function broadcastAs()
    {
      return 'DisplayOpenOrdersEvent';
    }
}
