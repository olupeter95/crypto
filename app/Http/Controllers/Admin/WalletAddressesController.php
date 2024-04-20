<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coin;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Models\WalletAddress;
use App\Http\Controllers\Controller;

class WalletAddressesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $page_name              = 'All Created Wallets';
        $wallets                = WalletAddress::all();

        return view('admin.wallets', compact('page_name', 'wallets'));
    }

    public function create(Request $request)
    {
        $coins 		        = $this->get_coins();

        $wallet = [
            'title'       => $request->all()['title'],
            'symbol'      => $request->all()['symbol'],
            'address'     => $request->all()['address'],
        ];

        $symbol = $request->all()['symbol'];
        
        foreach ($coins as $key => $coin) {
            # code...
            if ($coin->symbol == $symbol) {
                # code...
                $wallet['img']    = $coin->img;
                $wallet['slug']   = $coin->slug;
            }
        }
        
        $walletAddress = WalletAddress::create($wallet);
        $this->createNewWalletForUser($walletAddress);

        return redirect('/admin/wallets');
    }

    public function createNewWalletForUser($walletAddress)
    {
        if(User::count() > 0){
            foreach(User::all() as $user){
                Wallet::create([
                    'user_id' => $user->id,
                    'wallet_id' => $walletAddress->id,
                    'wallet_type' => $walletAddress->symbol,
                    'address' => $walletAddress->address,
                    'balance' => 0.00 
                ]);
            }
        }
    }

    public function edit(Request $request)
    {
        WalletAddress::where('id', $request->all()['wallet_id'])->update([
            'address'     => $request->all()['wallet_address'],
        ]);

        return redirect('/admin/wallets');

    }

    public function delete($wallet_id)
    {
        WalletAddress::where('id', $wallet_id)->delete();

        return redirect('/admin/wallets');

    }

    public function get_coins(){
        $coins = Coin::orderBy('id', 'asc')->take(35)->get();

        return $coins;
    }
}
