<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DisplayRunningOpenOrdersEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user_id;
    public $open_order;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_id, $open_order)
    {
        $this->user_id      = $user_id;
        $this->open_order   = $open_order;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('running-order-'.$this->user_id);
    }

    public function broadcastAs()
    {
      return 'DisplayRunningOpenOrdersEvent';
    }
}
