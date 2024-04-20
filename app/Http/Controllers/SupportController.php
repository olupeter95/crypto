<?php

namespace App\Http\Controllers;

use App\Events\CreateSupportTicketEvent;
use App\Events\ReplySupportTicketEvent;
use App\Models\Conversation;
use App\Models\Currency;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function usd(){
        $currency = Currency::where('symbol', 'BTC')->get();

        return $currency[0]->usd_value;
    }
    public function index(){
        $usd                = $this->usd();

        $page_name = 'Support';

        return view('support.index', compact('page_name','usd'));
    }

    public function new(){
        $usd                = $this->usd();

        $page_name = 'Create A Support Ticket';

        return view('support.new', compact('page_name','usd'));
    }

    public function create(Request $request){
        $CreateSupportTicketEvent   = event (new CreateSupportTicketEvent(Auth::user(), $request));
        return redirect()->route('support.tickets');

    }

    public function tickets(){
        $usd                = $this->usd();

        $page_name      = 'Your Support Tickets';

        $tickets        = Support::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->where('role', 'User')->get();
        return view('support.check', compact('tickets', 'page_name','usd'));
    }

    public function single($support_id){
        $usd                = $this->usd();

        $all                = Support::orderBy('created_at', 'DESC')->where('id', $support_id)->where('user_id', Auth::user()->id)->where('role', 'User')->first();        
        $conversations      = Conversation::orderBy('created_at', 'ASC')->where('ticket_id', $support_id)->get();
        $new_one = [];
        foreach ($conversations as $key => $conversation) {
            
            $info = [
                'role'          => $conversation->role,
                'message'       => $conversation->message,
                'created_at'    => $conversation->created_at,
            ];
            $new_one[$key] = $info;
        }

        $all->conversations     = $new_one;
        $page_name              = 'Ticket - '. $all->ticket_id;
        return view('support.ticket', compact('all', 'page_name','usd'));
    }

    public function reply(Request $request){
        $usd                = $this->usd();

        $ticket_id                  = $request['ddd'];
        $ReplySupportTicketEvent    = event (new ReplySupportTicketEvent(Auth::user(), $request));

        $latest         = Conversation::orderBy('created_at', 'DESC')->where('ticket_id', $ticket_id)->where('role', 'User')->first();
        $replyInfo      = [
            'user' => Auth::user()->name,
            'message'    => $latest->message,
            'created_at' => $latest->created_at
        ];
        return redirect()->back();

        // event(new ShowTicketReplyRealTimeEvent($replyInfo));

    }

}
