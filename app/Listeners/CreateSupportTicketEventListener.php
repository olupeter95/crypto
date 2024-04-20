<?php

namespace App\Listeners;

use App\Events\CreateSupportTicketEvent;
use App\Models\Support;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;

class CreateSupportTicketEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    /**
     * Handle the event.
     *
     * @param  \App\Events\CreateSupportTicketEvent  $event
     * @return void
     */
    public function handle(CreateSupportTicketEvent $event)
    {
        $data = [
            'user_id'     => $event->user->id,
            'role'              => 'User',
            'ticket_id'         => uniqid(),
            'subject'           => $event->ticketInfo['subject'],
            'category'          => $event->ticketInfo['category'],
            'description'       => $event->ticketInfo['description'],
            'status'            => 'OPEN'
        ];

        Support::create($data);
        Session::put('ticket_id', $data['ticket_id']);
    }
}
