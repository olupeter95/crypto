<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateWalletBalanceEvent 
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $user_id;
    public $main_balance;
    public $wallet_type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_id, $main_balance, $wallet_type)
    {
        $this->user_id      = $user_id;
        $this->main_balance = $main_balance;
        $this->wallet_type  = $wallet_type;
    }
}
