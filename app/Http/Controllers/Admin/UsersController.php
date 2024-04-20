<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Deposit;
use App\Models\OpenOrder;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\UpdateWalletBalanceEvent;

class UsersController extends Controller
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
        $page_name = "All Users";
        $users = User::all();

        //return $users;
        return view('admin.users.all', compact('page_name', 'users'));
    }

    public function edit($user_id)
    {
        $page_name  = "Single User";
        $user       = User::where('id', $user_id)->get();
        $wallets    = Wallet::where('user_id', $user_id)->get();
        $plans = Plan::orderByRaw("CAST(rate as SIGNED)")->get();
        $addresses  = [];

        foreach ($wallets as $key => $wallet) {
            # code...
            $addresses[$wallet->wallet_type] = $wallet->address;
        }
        
        return view('admin.users.single', compact('page_name', 'user', 'addresses', 'plans'));
    }

    public function update($user_id, $type, Request $request){

        if($type == 'payment'){
            foreach ($request->all() as $key => $singleAddress) {
                # code...
                Wallet::where('user_id', $user_id)->where('wallet_type', $key)->update([
                    'address' => $singleAddress
                ]);
            } 
            
            $update = true;
        }
        elseif ($type == 'main_balance') {
            # code...
            $update = User::where('id', $user_id)->update([
                'main_balance'   => $request->all()['type'],
            ]);

            $UpdateWalletBalanceEvent = event (new UpdateWalletBalanceEvent($user_id, $request->all()['type'], 'BTC'));
        }
        elseif ($type == 'demo_balance') {
            # code...
            $update = User::where('id', $user_id)->update([
                'demo_balance'   => $request->all()['type'],
            ]);
        }
        elseif($type == 'account'){
            $update = User::where('id', $user_id)->update($request->all());
        }
        elseif($type == 'plan'){
            $update = User::where('id', $user_id)->update([
                'plan'   => $request->all()['plan'],
            ]);

            return redirect('/admin/users/edit/'.$user_id);

        }
        elseif($type == 'verification'){
            $update = User::where('id', $user_id)->update([
                'verification_submission'   => 'YES',
            ]);

            return redirect('/admin/users/edit/'.$user_id);
        }

        if($update){
            return ([
                'success' => 'true',
            ]);
        }
        else{
            return ([
                'success' => 'false',
            ]);
        }
        

        // return ([
        //     'success' => 'true',
        //     'data'    => $request->all()
        // ]);
    }

    public function deactivate(Request $request)
    {
        $user_id = $request->all()['user_id'];

        User::where('id', $user_id)->update(
            [
                'active' => 'NO'
            ]
        );

        return ([
            'success' => 'true'
        ]);
    }

    public function delete(Request $request)
    {
        $user_id = $request->all()['user_id'];

        User::where('id', $user_id)->delete();
        Deposit::where('user_id', $user_id)->delete();
        Withdrawal::where('user_id', $user_id)->delete();
        OpenOrder::where('user_id', $user_id)->delete();

        return ([
            'success' => 'true'
        ]);
    }
}
