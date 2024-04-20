<?php

namespace App\Http\Controllers\Admin;

use App\Events\UpdateBalanceAfterDepositEvent;
use App\Events\UpdatePlanAfterDepositEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\User;

class DepositsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "All Deposits";
        $deposits = Deposit::orderBy('id', 'DESC')->get();

        foreach ($deposits as $key => $deposit) {
            # code...
            $user_id        = $deposit->user_id;
            $user          = User::findorFail($user_id);
            $deposit['name']  = $user->name;
        }
        return view('admin.deposits.all', compact('page_name', 'deposits'));
    }

    public function approved()
    {
        $page_name = "Approved Deposits";
        $deposits = Deposit::orderBy('id', 'DESC')->where('approved', 'YES')->get();

        foreach ($deposits as $key => $deposit) {
            # code...
            $user_id        = $deposit->user_id;
            $users          = User::where('id', $user_id)->get();
            $deposit->name  = $users[0]->name;
        }

        return view('admin.deposits.approved', compact('page_name', 'deposits'));
    }

    public function approve(Request $request)
    {
        $deposit_id = $request->all()['deposit_id'];
        $details = Deposit::where('id', $deposit_id)->first();
        $user_id = $details['user_id'];
        
        event(new UpdateBalanceAfterDepositEvent($details));

        Deposit::where('id', $deposit_id)->update(
            [
                'approved' => 'YES'
            ]
        );

        $totalDeposit = Deposit::where('user_id', $user_id)->where('approved', 'YES')->sum('amount_deposited');
        event(new UpdatePlanAfterDepositEvent($user_id, intval($totalDeposit)));

        return ([
            'success' => 'true'
        ]);
    }

    public function cancelled()
    {
        $page_name = "Cancelled Deposits";
        $deposits = Deposit::orderBy('id', 'DESC')->where('approved', 'NO')->get();

        foreach ($deposits as $key => $deposit) {
            # code...
            $user_id        = $deposit->user_id;
            $users          = User::where('id', $user_id)->get();
            $deposit->name  = $users[0]->name;
        }
        return view('admin.deposits.cancelled', compact('page_name', 'deposits'));
    }

    public function cancel(Request $request)
    {
        $deposit_id = $request->all()['deposit_id'];

        Deposit::where('id', $deposit_id)->update(
            [
                'approved' => 'NO'
            ]
        );

        return ([
            'success' => 'true'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $page_name  = "All Deposits";
        $deposits   = Deposit::where('user_id', $user_id)->get();

        foreach ($deposits as $key => $deposit) {
            # code...
            $user_id        = $deposit->user_id;
            $users          = User::where('id', $user_id)->get();
            $deposit->name  = $users[0]->name;
        }

        //return $deposits;

        return view('admin.deposits.all', compact('page_name', 'deposits'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $trx_id)
    {
        Deposit::where('transaction_id', $trx_id)->update([
            'created_at' => $request->all()['deposit_date']
        ]);

        return redirect('/admin/deposit/all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
