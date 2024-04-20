<?php

namespace App\Listeners;

use App\Events\MakeATradeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DisplaySellsThisMonthsListener
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
     * @param  MakeATradeEvent  $event
     * @return void
     */
    public function handle(MakeATradeEvent $event)
    {
        //
    }
}
