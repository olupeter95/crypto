<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DisplayEarningsEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $status;
    public $earning;
    public $transaction_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($status, $transaction_id, $earning)
    {
        $this->status           = $status;
        $this->transaction_id   = $transaction_id;
        $this->earning          = $earning;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('earning-'.$this->earning['user_id']);
    }

    public function broadcastAs()
    {
      return 'DisplayEarningsEvent';
    }
}
