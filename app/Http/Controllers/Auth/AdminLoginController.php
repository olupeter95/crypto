<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\WalletAddress;
use App\Models\Coin;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    //
    
    public function show_login_form()
    {
        $admins = Admin::all();
        if (count($admins) == 0) {
            # code...
            $bitcoin 		    = $this->create('Bitcoin', '19pNN1ngSndfRfDBHGvA5oxmgbBvWXJH5C');
            $ethereum 		    = $this->create('Ethereum', '0xD74EA268DD71FdCb5aeeBE4066574Ff5E4E45f78');
            $XRP 		        = $this->create('XRP', 'LXBxgQWUk2qJsYbxKusBBoUJes2ZWyakuc');
            $LTC 		        = $this->create('Litecoin', 'LeuZmaX89ZoBkUSTG8jUoVZ3NW2P6dCPrh');
            $Dogecoin 		    = $this->create('Dogecoin', 'DKcisx8GuYsoQmV5v7FsxBq4tpb76L6Rgo');
            $BNB 		        = $this->create('Binance Coin', 'bnb1lc8jz6s4vj0kkn29rhgjkk8alf20m6jsxntg6u');
            $USDT 		        = $this->create('Tether', '0x95B8CEe0da4378Feb640fa05Fd49645538CcA442');
            $USDC 		        = $this->create('USD Coin', '0x95B8CEe0da4378Feb640fa05Fd49645538CcA442');


            if ($XRP) {
                # code...
                $admin = Admin::create([
                    'email'         => 'admin@coinshape.com',
                    'password'      => Hash::make('<P+<Mb@rMa~H`;xZhDTyD3p'),
                    'first_name'    => 'Coinshape',
                    'last_name'     => 'Admin',
                    'role'          => 'Admin',
                ]);
            }   
        }
        
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        //Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            
            return redirect()->intended(route('admin.dashboard'));
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function create($coinName, $walletAddress)
    {
        $coins 		        = $this->get_coins();

        foreach ($coins as $key => $coin) {
            # code...
            if ($coin->name == $coinName) {
                # code...
                $wallet             = [];

                $wallet['title']       = $coinName;
                $wallet['slug']        = $coin->slug;
                $wallet['img']         = $coin->img;
                $wallet['symbol']      = $coin->symbol;
                $wallet['address']     = $walletAddress;

                WalletAddress::create($wallet);

            }
        }


        return redirect('/admin/wallets');
    }

    public function get_coins(){
        $coins = Coin::orderBy('rank', 'asc')->take(35)->get();

        return $coins;
    }
}
