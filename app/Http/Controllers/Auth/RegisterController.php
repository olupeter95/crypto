<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\RegistrationAdminNotification;
// use App\Mail\Withdrawals;
use Illuminate\Support\Facades\Mail;
use App\Models\WalletAddress;
use App\Models\Wallet;
use App\Models\Coin;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name'                          => $data['name'],
            'email'                         => $data['email'],
            'password'                      => Hash::make($data['password']),
            'show_password'                 => $data['password'],
            'plan' 							=> 'ACTIVATE',
            'plan_status' 					=> 'ACTIVE',
            'main_balance' 					=> 0,
            'demo_balance'  				=> 3.00,
            'limit'  				        => 0,
            'identification_verification' 	=> 'NO',
            'active' 						=> 'YES',
            'two_fa_status'         		=> 'INACTIVE',
            'mailing_status'				=> 'ACTIVE',
            'email_verification'    		=> 'YES',
            'pending' 						=> 'NO',
            'verification_submission'  		=> 'NO'
        ]);

        if($user){
            $WalletAddresses = WalletAddress::all();
            foreach ($WalletAddresses as $key => $WalletAddress) {
                # code...
                Wallet::create([
                    'user_id'       => $user->id,
                    'wallet_id'     => $WalletAddress->id,
                    'wallet_type'   => $WalletAddress->symbol,
                    'address'       => $WalletAddress->address,
                    'balance'       => 0.00
                ]);
            }

            $details = [
                'name' => $data['name'],
                'url'  => url('/admin/users/all')
            ];
            Mail::to('admin@coinshape.com')->send(new RegistrationAdminNotification($details));

            return $user;
        }
    }
}
