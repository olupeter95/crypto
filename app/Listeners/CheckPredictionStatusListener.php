<?php

namespace App\Listeners;

use App\Events\MakeATradeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Prediction;
use Illuminate\Support\Facades\Auth;
use App\Listeners\UpdatePredictionStatusListener;
use Illuminate\Support\Facades\Event;

class CheckPredictionStatusListener
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

        /*
            ================================================
                Check if trade is a profit or a loss
            ================================================
        */

        $prediction = new Prediction();
        $status     = $prediction->checkStatus($event->trade_details, $event->t_a, $event->from, $event->to);

        
        /*
            ==============================================================
                Pass information to the updatePredictionStatusListener
            ==============================================================
        */
        // Create a blank event
        $updatePredictionStatusEvent                = new Event;

        // Add the trade details to the event
        $updatePredictionStatusEvent->trade_details = $event->trade_details;
        $updatePredictionStatusEvent->status        = $status;
        $updatePredictionStatusEvent->t_a           = $event->t_a;
        $updatePredictionStatusEvent->from          = $event->from;
        $updatePredictionStatusEvent->to            = $event->to;   

        // return $updatePredictionStatusEvent;

        (new UpdatePredictionStatusListener())->handle($updatePredictionStatusEvent);
        
    }
}
