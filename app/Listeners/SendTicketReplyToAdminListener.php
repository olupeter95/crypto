<?php

namespace App\Listeners;

use App\Events\ReplySupportTicketEvent;
use App\Mail\SendSupportTicketReplyToAdminMail;
use App\Mail\SendSupportTicketToAdminMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendTicketReplyToAdminListener
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
        $details = [
            'full_name'         => $event->user->name,
            'ticket_id'         => $event->ticketInfo['tiD'],
            'description'       => $event->ticketInfo['description'],
        ];

        Mail::to('funkeolasupo397@gmail.com')->send(new SendSupportTicketReplyToAdminMail($details));
    }
}
