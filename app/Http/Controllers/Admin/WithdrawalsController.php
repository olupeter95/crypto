<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdrawal;
use App\Models\User;

class WithdrawalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "All Withdrawals";
        $withdrawals = Withdrawal::all();

        foreach ($withdrawals as $key => $withdrawal) {
            # code...
            $user_id            = $withdrawal->user_id;
            $users              = User::where('id', $user_id)->get();
            $withdrawal->name   = $users[0]->name;
        }

        return view('admin.withdrawals.all', compact('page_name', 'withdrawals'));
    }

    public function approved()
    {
        $page_name = "Approved Withdrawals";
        $withdrawals = Withdrawal::where('approved', 'YES')->get();

        foreach ($withdrawals as $key => $withdrawal) {
            # code...
            $user_id            = $withdrawal->user_id;
            $users              = User::where('id', $user_id)->get();
            $withdrawal->name   = $users[0]->name;
        }
        return view('admin.withdrawals.approved', compact('page_name', 'withdrawals'));
    }

    public function approve(Request $request)
    {
        $withdrawal_id = $request->all()['withdrawal_id'];

        Withdrawal::where('id', $withdrawal_id)->update(
            [
                'approved' => 'YES'
            ]
        );

        return ([
            'success' => 'true'
        ]);
    }

    public function cancelled()
    {
        $page_name = "Cancelled Withdrawals";
        $withdrawals = Withdrawal::where('approved', 'NO')->get();

        foreach ($withdrawals as $key => $withdrawal) {
            # code...
            $user_id            = $withdrawal->user_id;
            $users              = User::where('id', $user_id)->get();
            $withdrawal->name   = $users[0]->name;
        }
        return view('admin.withdrawals.cancelled', compact('page_name', 'withdrawals'));
    }

    public function cancel(Request $request)
    {
        $withdrawal_id = $request->all()['withdrawal_id'];

        Withdrawal::where('id', $withdrawal_id)->update(
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
        $page_name = "All Withdrawals";
        $withdrawals = Withdrawal::where('user_id', $user_id)->get();

        foreach ($withdrawals as $key => $withdrawal) {
            # code...
            $user_id            = $withdrawal->user_id;
            $users              = User::where('id', $user_id)->get();
            $withdrawal->name   = $users[0]->name;
        }

        return view('admin.withdrawals.all', compact('page_name', 'withdrawals'));
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
    public function update(Request $request, $id)
    {
        //
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
