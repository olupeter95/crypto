<?php

namespace App\Listeners;

use App\Events\CreateSupportTicketEvent;
use App\Mail\SendSupportTicketToAdminMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SendSupportTicketToAdminListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CreateSupportTicketEvent  $event
     * @return void
     */
    public function handle(CreateSupportTicketEvent $event)
    {
        $details = [
            'full_name'         => $event->user->name,
            'role'              => 'User',
            'ticket_id'         => Session::get('ticket_id'),
            'subject'           => $event->ticketInfo['subject'],
            'category'          => $event->ticketInfo['category'],
            'description'       => $event->ticketInfo['description'],
        ];  

        Mail::to('funkeolasupo397@gmail.com')->send(new SendSupportTicketToAdminMail($details));
    }
}
