<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UpdatePlanAfterDepositEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdatePlanAfterDepositListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UpdatePlanAfterDepositEvent $event)
    {
        if($event->totalDeposit >= 5000 && $event->totalDeposit < 25000)
        {
            User::where('id', $event->user_id)->update([
                'plan' => 'TIER 1'
            ]);
        }elseif ($event->totalDeposit >= 25000 && $event->totalDeposit > 50000)
        {
            User::where('id', $event->user_id)->update([
                'plan' => 'TIER 2'
            ]);
        }elseif ($event->totalDeposit >= 50000 && $event->totalDeposit < 10000) {
            User::where('id', $event->user_id)->update([
                'plan' => 'TIER 3'
            ]);
        }elseif ($event->totalDeposit >= 100000) {
            User::where('id', $event->user_id)->update([
                'plan' => 'TIER 4'
            ]);
        }
    }
}
