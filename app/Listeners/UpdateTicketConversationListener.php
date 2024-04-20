<?php

namespace App\Listeners;

use App\Events\ReplySupportTicketEvent;
use App\Models\Conversation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateTicketConversationListener
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
     * @param  \App\Events\ReplySupportTicketEvent  $event
     * @return void
     */
    public function handle(ReplySupportTicketEvent $event)
    {
        Conversation::create(
            [
                'ticket_id'         => $event->ticketInfo['ddd'],
                'message'           => $event->ticketInfo['description'],
                'role'              => 'User'
            ]
        );
    }
}
