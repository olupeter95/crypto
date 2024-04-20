<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminSupportReply;
use App\Models\Conversation;
use App\Models\Currency;
use App\Models\Support;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function all()
    {
        # code...
          $tickets        = Support::orderBy('created_at', 'DESC')->get();
        if (count($tickets)==0) {

         $page_name = 'Support - All Tickets';
        $usd                = $this->usd();

        return view('admin.support.all', compact('tickets', 'page_name', 'usd'));
        }
        foreach($tickets as $ticket)
        {
            $email = User::where('id', $ticket->user_id)->first()->email;
            $ticket['email'] = $email;
        }
        $page_name = 'Support - All Tickets';
        $usd                = $this->usd();
        return view('admin.support.all', compact('tickets', 'page_name',  'usd'));
    }

    public function single($support_id)
    {
        # code...

        $all                = Support::orderBy('created_at', 'DESC')->where('id', $support_id)->get();

        $ticket_id          = $all[0]->id;
        $user_id                = $all[0]->user_id;
        $user             = User::where('id', $user_id)->first();
        $full_name              = $user->name;

        $conversations          = Conversation::orderBy('created_at', 'ASC')->where('ticket_id', $ticket_id)->get();

        $new_one = [];
        foreach ($conversations as $key => $conversation) {

            $info = [
                'role'          => $conversation->role,
                'message'       => $conversation->message,
                'created_at'    => $conversation->created_at,
            ];
            $new_one[$key] = $info;
        }

        $all[0]->conversations = $new_one;

        $page_name = 'Ticket- ' . $all[0]->ticket_id;
        $usd                = $this->usd();


        return view('admin.support.single', compact('all', 'page_name', 'full_name', 'usd'));
    }

    public function reply(Request $request)
    {
        $ticket_id  = $request['ddd'];
        $message    = $request['description'];

        $all                = Support::orderBy('created_at', 'DESC')->where('id', $ticket_id)->get();
        $user_id                = $all[0]->user_id;
        $user             = User::where('id', $user_id)->get();

        $full_name          = $user[0]->name;
        $email              = $user[0]->email;

        $details = [
            'full_name'         => $full_name,
            'role'              => 'User',
            'ticket_id'         => $all[0]->ticket_id,
            'description'       => $message,
        ];

        Mail::to($email)->send(new AdminSupportReply($details));

        Conversation::create(
            [
                'ticket_id'         => $ticket_id,
                'message'           => $message,
                'role'              => 'Admin'
            ]
        );

        return redirect()->back();
    }

    public function close(Request $request)
    {
        # code...
        $ticket_id = $request->all()['ticket_id'];

        Support::where('ticket_id', $ticket_id)->update(
            [
                'status'             => 'CLOSED'
            ]
        );

        return redirect()->back();
    }

    public function usd()
    {
        $currency = Currency::where('symbol', 'BTC')->get();

        return $currency[0]->usd_value;
    }
}
