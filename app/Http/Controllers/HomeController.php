<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Coin;
use App\Models\Plan;
use App\Models\User;
use App\Models\Limit;
use App\Models\TwoFa;
use App\Mail\Deposits;
use App\Models\Wallet;
use GuzzleHttp\Client;
use App\Models\AltCoin;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Currency;
use App\Mail\Withdrawals;
use App\Models\OpenOrder;
use App\Models\StopLimit;
use App\Models\Withdrawal;
use App\Models\TradeHistory;
use Illuminate\Http\Request;
use App\Models\WalletAddress;
use App\Models\PlanDescription;
use Illuminate\Support\Facades\DB;
use App\Events\DisplayUserDataEvent;
use Hexters\CoinPayment\CoinPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DepositAdminNotification;
use Illuminate\Support\Facades\Storage;
use App\Mail\WithdrawalAdminNotification;
use Illuminate\Support\Facades\Validator;
use App\Events\DisplayRunningOpenOrdersEvent;  

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $user = Auth::user();

            $two_fa_status = $user['two_fa_status'];

            if ($two_fa_status == 'ACTIVE') {
                # code...
                $twoFa = $request->session()->get('2fa');
                if ($twoFa == null) {
                    # code...
                    $TwoFa          = new TwoFa();
                    $secret         = $TwoFa->createSecret();
                    $qrCodeUrl 		= $TwoFa->getQRCodeGoogleUrl($user->email, $secret,'https://coinshape.com');
                    return response()->view('twofa.setup', compact('qrCodeUrl'));             
                } 
                else{
                    # code...
                    return $next($request);
                }
            } 
            else{
                $skip = $request->session()->get('skip');
                if ($skip == null) {
                    return response()->view('twofa.index'); 
                }
                else{
                    return $next($request);
                }            
            }
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $usd                     = (new Currency())->live_usd();
        
        $page_name               = '';
        
        $live_earnings           = Earning::orderBy('id', 'DESC')->where('trade_type', 'LIVE')->where('user_id', Auth::user()->id)->take(4)->get();
        $open_orders             = OpenOrder::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->where('trade_type', 'LIVE')->where('completed', 'NO')->get();
        
        $trades_history          = TradeHistory::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->where('type', 'LIVE')->get();
        $buys                    = TradeHistory::where('user_id', Auth::user()->id)->where('type', 'LIVE')->where('b_or_s', 'BUY')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->sum('amount_in_btc');
        $sells                   = TradeHistory::where('user_id', Auth::user()->id)->where('type', 'LIVE')->where('b_or_s', 'SELL')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->sum('amount_in_btc');
        $usd_active_orders       = OpenOrder::where('user_id', Auth::user()->id)->where('trade_type', 'LIVE')->sum('amount_traded_btc');
        $no_of_active_orders     = count($open_orders);

        $trade_coins 		     = $this->get_coins();
        $btc                     = $trade_coins[0];
        $eth                     = $trade_coins[0];

        $first_alt_coin          = AltCoin::first();

        $alt_coins               = AltCoin::all();
        $get_usdt                = $this->get_coin('USDT');

        $limit_trades            = Limit::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->get();
        $stop_limit_trades       = StopLimit::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->get();

        foreach ($alt_coins as $key => $alt_coin) {
            # code...
            $coin                           = Coin::where('symbol', $alt_coin->from_pair)->first();
            
            $alt_coin->price_usd            = number_format(($coin->price_usd/$get_usdt->price_usd), 2);
            $alt_coin->percent_change_24h   = number_format(($coin->percent_change_24h/$get_usdt->percent_change_24h), 2);
            $alt_coin->class                = ($alt_coin->percent_change_24h > 0) ? 'text-success': 'text-danger';
        }

        // return $alt_coins;

        /*
            bpu stands for btc price in usd
            bpc stands for btc percent change in 24h
        */
        $bpu     = $btc['price_usd'];
        $bpc     = $btc['percent_change_24h'];

        if($bpc == 0 ){
            $bpc = $bpc + 0.1;
            $trade_coins[0]['bpc'] = $bpc;
        }
        else{
            $bpc = $btc['percent_change_24h'];
            $trade_coins[0]['bpc'] = $bpc;
        }

        if($bpu == 0 ){
            $bpu = $bpu + 0.1;
            $trade_coins[0]['bpu'] = $bpu;
        }
        else{
            $bpu = $btc['price_usd']; 
            $trade_coins[0]['bpu'] = $bpu; 
        }

        /*
            epu stands for btc price in usd
            epc stands for btc percent change in 24h
        */
        $epu     = $eth['price_usd'];
        $epc     = $eth['percent_change_24h'];

        if($epc == 0 ){
            $epc = $epc + 0.1;
            $trade_coins[1]['epc'] = $epc;
        }
        else{
            $epc = $eth['percent_change_24h'];
            $trade_coins[0]['epc'] = $epc;
        }

        if($epu == 0 ){
            $epu = $epu + 0.1;
            $trade_coins[0]['epu'] = $epu;
        }
        else{
            $epu = $eth['price_usd'];  
            $trade_coins[0]['epu'] = $epu; 
        }

        // return $alt_coins;
        return view('home', compact('page_name', 'limit_trades', 'stop_limit_trades', 'first_alt_coin', 'usd', 'open_orders', 'buys', 'sells', 'no_of_active_orders', 'usd_active_orders', 'live_earnings', 'trades_history', 'trade_coins', 'alt_coins'));
    }

    public function usd(){
        $currency = Currency::where('symbol', 'BTC')->get();

        return $currency[0]->usd_value;
    }

    public function live_usd(){
        $client     = new Client();
        $response   = $client->get('https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref=USD&symbol=BTC', ['verify' => false]);
        $response   = json_decode($response->getBody());

        $markets    = $response->markets;

        foreach($markets as $key => $market){
            if($market->symbol == 'USD'){
                return round($market->price);
            }
        }
    }

    public function demo()
    {
        $usd              = (new Currency())->live_usd();
        $page_name = '';


        $live_earnings           = Earning::orderBy('id', 'DESC')->where('trade_type', 'DEMO')->where('user_id', Auth::user()->id)->take(4)->get();
        $open_orders             = OpenOrder::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->where('trade_type', 'DEMO')->get();
        $trades_history          = TradeHistory::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->where('type', 'DEMO')->get();
        $buys                    = TradeHistory::where('user_id', Auth::user()->id)->where('type', 'DEMO')->where('b_or_s', 'BUY')->sum('amount_in_btc');
        $sells                   = TradeHistory::where('user_id', Auth::user()->id)->where('type', 'DEMO')->where('b_or_s', 'SELL')->sum('amount_in_btc');
        $usd_active_orders       = OpenOrder::where('user_id', Auth::user()->id)->where('trade_type', 'DEMO')->sum('amount_traded_btc');
        $no_of_active_orders     = count($open_orders);

        $trade_coins 		     = $this->get_coins();
        $btc                     = $trade_coins[0];
        $eth                     = $trade_coins[0];

        $first_alt_coin          = AltCoin::first();

        $alt_coins               = AltCoin::all();
        $get_usdt                = $this->get_coin('USDT');

        $limit_trades            = Limit::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->get();
        $stop_limit_trades       = StopLimit::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->get();

        foreach ($alt_coins as $key => $alt_coin) {
            # code...
            $alt_coin->price_usd            = number_format(( ($this->get_coin($alt_coin->from_pair))->price_usd/$get_usdt->price_usd), 8);
            $alt_coin->percent_change_24h   = number_format(( ($this->get_coin($alt_coin->from_pair))->percent_change_24h/$get_usdt->percent_change_24h), 2);
            $alt_coin->class                = ($alt_coin->percent_change_24h > 0) ? 'text-success': 'text-danger';
        }


        /*
            bpu stands for btc price in usd
            bpc stands for btc percent change in 24h
        */
        $bpu     = $btc['price_usd'];
        $bpc     = $btc['percent_change_24h'];

        if($bpc == 0 ){
            $bpc = $bpc + 0.1;
            $trade_coins[0]['bpc'] = $bpc;
        }
        else{
            $bpc = $btc['percent_change_24h'];
            $trade_coins[0]['bpc'] = $bpc;
        }

        if($bpu == 0 ){
            $bpu = $bpu + 0.1;
            $trade_coins[0]['bpu'] = $bpu;
        }
        else{
            $bpu = $btc['price_usd']; 
            $trade_coins[0]['bpu'] = $bpu; 
        }

        /*
            epu stands for btc price in usd
            epc stands for btc percent change in 24h
        */
        $epu     = $eth['price_usd'];
        $epc     = $eth['percent_change_24h'];

        if($epc == 0 ){
            $epc = $epc + 0.1;
            $trade_coins[1]['epc'] = $epc;
        }
        else{
            $epc = $eth['percent_change_24h'];
            $trade_coins[0]['epc'] = $epc;
        }

        if($epu == 0 ){
            $epu = $epu + 0.1;
            $trade_coins[0]['epu'] = $epu;
        }
        else{
            $epu = $eth['price_usd'];  
            $trade_coins[0]['epu'] = $epu; 
        }

        return view('home', compact('page_name', 'limit_trades', 'stop_limit_trades', 'first_alt_coin', 'usd', 'open_orders', 'buys', 'sells', 'no_of_active_orders', 'usd_active_orders', 'live_earnings', 'trades_history', 'trade_coins', 'alt_coins'));
    }

    public function coinPaymentsDeposit(Request $request)
    {
        # code...
        // dd($request->all()['amount']);
        $transaction['order_id']        = uniqid(); // invoice number
        $transaction['amountTotal']     = floatval($request->all()['amount']);
        $transaction['note']            = 'Transaction note';
        $transaction['buyer_name']      = Auth::user()->name;
        $transaction['buyer_email']     = Auth::user()->email;
        $transaction['redirect_url']    = url('/'); // When Transaction was completed
        $transaction['cancel_url']      = url('/deposit'); // When user click cancel link

         /*
        *   @required true
        *   @example first item
        */
        $transaction['items'][0] = [
            'itemDescription'       => 'Coinshape Deposit',
            'itemPrice'             => floatval($request->all()['amount']), // USD
            'itemQty'               => 1,
            'itemSubtotalAmount'    => floatval($request->all()['amount']) // USD
        ];
        
        $link = CoinPayment::generatelink($transaction);
        return redirect($link);
    }

    public function retOpenOrders($type)
    {
        # code...
        $open_orders             = OpenOrder::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->where('trade_type', $type)->where('completed', 'NO')->get();
        if (count($open_orders) > 0) {
            # code...
            event(new DisplayRunningOpenOrdersEvent(Auth::user()->id, $open_orders));
            // foreach ($open_orders as $key => $open_order) {
            //     # code...
                
            // }
        }
        
    }

    public function get_coins(){
        $coins = Coin::orderBy('rank', 'asc')->take(35)->get();

        return $coins;
    }

    public function get_coin($symbol){
        $coin = Coin::where('symbol', $symbol)->first();
        return $coin;
    }

    public function myOrders(){
        $usd                     = $this->usd();
        $trades_history          = TradeHistory::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->where('type', 'LIVE ')->get();

        $page_name  = 'My Orders';
        return view('my-orders', compact('page_name', 'usd', 'trades_history'));
    }

    public function withdraw(){
        $usd        = $this->usd();
        $page_name  = 'Withdraw Funds';
        return view('withdraw.index', compact('page_name', 'usd'));
    }

    public function withdrawal_request(Request $request)
    {
        # code...
        $info = request()->all();

        $balance = Wallet::where('user_id',Auth::user()->id)->where('wallet_type','BTC')->first()->balance;

        if($request->withdrawal_amount > $balance){
            return back()->with([
                'msg'=>'Insufficient funds'
            ]);
        }

        Withdrawal::create(
            [
                'user_id'           =>  Auth::user()->id,
                'transaction_id'    =>  uniqid('wwal'),
                'method_of_payment' =>  'BTC',
                'wallet_address'    =>  $info['destination_address'],
                'amount'            =>  $info['withdrawal_amount'],
                'approved'          =>  'PENDING'
            ]
        );

        $details = [
            'first_name' => Auth::user()->name,
            'url'  => url('/withdraw-logs')
        ];

        Mail::to(Auth::user()->email)->send(new Withdrawals($details));

        $details = [
            'name' => Auth::user()->name,
            'url'  => url('/admin/withdrawal/all')
        ];
        Mail::to('support@coinshape.com')->send(new WithdrawalAdminNotification($details));

        return redirect('/withdraw-logs');
    }
        

    public function withdrawLogs(){
        $usd            = $this->usd();
        $page_name      = 'Withdraw Logs';
        $withdrawals    = Withdrawal::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->get();

        return view('withdraw.logs', compact('page_name', 'usd', 'withdrawals'));
    }

    public function deposit(){
        $usd        = $this->usd();
        
        if(is_null(Auth::user()->country) || is_null(Auth::user()->gender) || is_null(Auth::user()->date_of_birth) || is_null(Auth::user()->currency) || is_null(Auth::user()->address) || is_null(Auth::user()->city) || is_null(Auth::user()->state)){
            $page_name  = 'Complete your profile';
            $intended   = '/deposit';
            return view('auth.onboarding', compact('page_name', 'usd', 'intended'));
        }
        else{
            $page_name          = 'Deposit Funds';
            $WalletAddresses    = Wallet::where('user_id',Auth::user()->id)->get();
            return view('deposit.index', compact('page_name', 'usd', 'WalletAddresses'));
        }
    }
    public function depositDetails(Request $request){
        $usd        = $this->usd();

        $request->validate([
            'amount' => ['required', 'numeric', 'min:0'],
            'wallet' => ['required'],
            'network' => ['required']

        ]);
        
        $page_name ="Confirm Deposit";

        $wallet = Wallet::where('address',$request->wallet)->where('user_id',Auth::user()->id)->first();
        return view('deposit.confirm', ['wallet' => $wallet, 'amount' => $request->amount, 'page_name'=>$page_name,'usd'=>$usd, 'network'=>$request->network]);

    }

    // public function proof($coin_name = null){
    //     if ($coin_name) {
    //         # code...
    //         $usd        = $this->usd();
    //         $coins 		= $this->get_coins();

    //         foreach ($coins as $key => $coin) {
    //             # code...
    //             if ($coin->name == $coin_name) {
    //                 # code...
    //                 $img    = $coin->img;
    //                 $symbol = $coin->symbol;
    //             }
    //         }

    //         $page_name  = 'Proof Of Payment';
    //         return view('deposit.proof', compact('page_name', 'usd', 'coin_name', 'symbol'));
    //     }
    //     else{
    //         return redirect('/deposit');
    //     }
    // }

    // public function upload_proof(Request $request)
    // {
    //     # code...
    //     $info = request()->all();

    //     // cache the file
    //     $file = $request->file('proof_of_deposit');

    //     // generate a new filename. getClientOriginalExtension() for the file extension
    //     $filename = 'dep-' . time() . '.' . $file->getClientOriginalExtension();

    //     // save to storage/app/photos as the new $filename
    //     $path = $file->storeAs('public/deposits', $filename);
    //     $amount_in_btc = $info['coin_amount'] * $info['base_id'];

    //     Deposit::create(
    //         [
    //             'user_id'           =>  Auth::user()->id,
    //             'transaction_id'    =>  uniqid('dep'),
    //             'image_name'        =>  $filename,
    //             'details'           =>  $info['additional_information'],
    //             'amount_deposited'  =>  $info['coin_amount'],
    //             'amount_in_btc'     =>  number_format($amount_in_btc, 6),
    //             'coin_type'         =>  $info['coin_type'],
    //             'approved'          =>  'PENDING'
    //         ]
    //     );

    //     $details = [
    //         'first_name' => Auth::user()->name,
    //         'url'  => url('/deposit-logs')
    //     ];

    //     Mail::to(Auth::user()->email)->send(new Deposits($details));

    //     $details = [
    //         'name' => Auth::user()->name,
    //         'url'  => url('/admin/deposit/all')
    //     ];
    //     Mail::to('support@coinshape.com')->send(new DepositAdminNotification($details));

    //     return redirect('/deposit-logs');
    // }

    public function depositProof(Request $request ){
         $info = request()->all();

       $validator =  Validator::make($request->all(), [
            'coin_amount' => ['required'],
            'coin_type' => ['required'],
            'proof_of_deposit' => 'required|image|mimes:jpg,png,jpeg,gif',
        ]);

        if($validator->fails()){
            return redirect('/deposit')->withErrors($validator)->withInput();
        }

        if($request->hasFile('proof_of_deposit')){

            $file = $request->file('proof_of_deposit');

            // generate a new filename. getClientOriginalExtension() for the file extension
            $filename = 'dep-' . time() . '.' . $file->getClientOriginalExtension();
    
            // save to storage/app/photos as the new $filename
            $path = $file->storeAs('public/deposits', $filename);
        }
        
                // $amount_in_btc = $info['coin_amount'] * $info['base_id'];

                $client     = new Client();
                $response   = $client->get('https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref=USD&symbol='. $request->coin_type, ['verify' => false]);
                $response   = json_decode($response->getBody());
                $amount_in_btc = $request->coin_amount / $response->price ;

        Deposit::create(
                    [
                        'user_id'           =>  Auth::user()->id,
                        'transaction_id'    =>  uniqid('dep'),
                        'image_name'        =>  $filename,
                        'details'           =>  $info['additional_information'],
                        'amount_deposited'  =>  $info['coin_amount'],
                        'amount_in_btc'     =>  number_format($amount_in_btc, 6),
                        'coin_type'         =>  $info['coin_type'],
                        'approved'          =>  'PENDING',
                        'network'          => $info['network']
                    ]
                );
         $details = [
            'first_name' => Auth::user()->name,
            'url'  => url('/deposit-logs')
        ];

        Mail::to(Auth::user()->email)->send(new Deposits($details));

        $details = [
            'name' => Auth::user()->name,
            'url'  => url('/admin/deposit/all')
        ];
        Mail::to('support@coinshape.com')->send(new DepositAdminNotification($details));

        return redirect('/deposit-logs');
    }
            
            

    public function testing(){
        
        $details = [
            'first_name' => Auth::user()->name,
            'url'  => url('/withdraw-logs')
        ];

        Mail::to(Auth::user()->email)->send(new Withdrawals($details));

        $details = [
            'name' => Auth::user()->name,
            'url'  => url('/admin/withdrawal/all')
        ];
        Mail::to('support@coinshape.com')->send(new WithdrawalAdminNotification($details));

        echo "done";
    }

    public function depositLogs(){
        $usd        = $this->usd();
        $page_name  = 'Deposit Logs';
        $deposits   = Deposit::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->get();
        
        return view('deposit.logs', compact('page_name', 'usd', 'deposits'));
    }

    public function liveEarnings(){
        $usd                     = $this->usd();
        $live_earnings           = Earning::orderBy('id', 'DESC')->where('trade_type', 'LIVE')->where('user_id', Auth::user()->id)->get();

        $page_name  = 'Live Earnings';
        return view('live-earnings', compact('page_name', 'usd', 'live_earnings'));
    }

    public function plans(){
        $usd        = $this->usd();
        $page_name  = 'Plans';
        $plans = Plan::where('status', 'On')->orderByRaw("CAST(rate AS SIGNED)")->with('desc')->get();
        return view('plans', compact('page_name', 'usd', 'plans'));
    }

    public function verification(){
        $usd        = $this->usd();
        if(is_null(Auth::user()->country) || is_null(Auth::user()->gender) || is_null(Auth::user()->date_of_birth) || is_null(Auth::user()->currency) || is_null(Auth::user()->address) || is_null(Auth::user()->city) || is_null(Auth::user()->state)){
            $page_name  = 'Complete your profile';
            $intended   = '/verification';
            return view('auth.onboarding', compact('page_name', 'usd', 'intended'));
        }
        else{
            $page_name  = 'Verification';
            return view('verification', compact('page_name', 'usd'));
        }
    }

    public function submit_verification(Request $request){
        // cache the file
        $file = $request->file('verification_image');
        
        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename = 'vrf-' . time() . '.' . $file->getClientOriginalExtension();

        // save to storage/app/photos as the new $filename
        $path = $file->storeAs('public/verification', $filename);

        User::where('id', Auth::user()->id)->update(
            [
                'identification_verification'   => $filename,
            ]
        );

        return redirect('/verification');
    }

    public function settings(){
        $usd        = $this->usd();
        $page_name  = 'Settings';
        return view('settings', compact('page_name', 'usd'));
    }

    public function profile()
    {
        # code...
        $usd        = $this->usd();

        if(is_null(Auth::user()->country) || is_null(Auth::user()->gender) || is_null(Auth::user()->date_of_birth) || is_null(Auth::user()->currency) || is_null(Auth::user()->address) || is_null(Auth::user()->city) || is_null(Auth::user()->state)){
            $page_name  = 'Complete your profile';
            $intended   = '/profile';
            return view('auth.onboarding', compact('page_name', 'usd', 'intended'));
        }
        else{
            $page_name  = 'Profile';
            return view('profile', compact('page_name', 'usd'));
        }
    }

    public function profile_upload(Request $request)
    {
        # code...
        $info = request()->all();
        // cache the file
        $file = $request->file('proof_of_deposit');
        
        if($request->hasFile('proof_of_deposit'))
        {
            //delete old image
            $old_image = User::where('id', Auth::id())->first()->profile_img;
            Storage::delete('public/profile/'.$old_image);

            // generate a new filename. getClientOriginalExtension() for the file extension
            $filename = 'prf-' . time() . '.' . $file->getClientOriginalExtension();
            // save to storage/app/photos as the new $filename
            $path = $file->storeAs('public/profile', $filename);

            User::where('id', Auth::user()->id)->update(
                [
                    'city'          => $info['city'],
                    'state'         => $info['state'],
                    'country'       => $info['country'],
                    'date_of_birth' => $info['date_of_birth'],
                    'gender'        => $info['gender'],
                    'currency'      => $info['currency'],
                    'address'       => $info['address'],
                    'profile_img'   => $filename
                ]
            );
        }else {
            
            User::where('id', Auth::user()->id)->update(
                [
                    'city'          => $info['city'],
                    'state'         => $info['state'],
                    'country'       => $info['country'],
                    'date_of_birth' => $info['date_of_birth'],
                    'gender'        => $info['gender'],
                    'currency'      => $info['currency'],
                    'address'       => $info['address'],
                ]
            );
        }


        return redirect('/profile')->with(['message' => 'Profile updated successfully']);
    }

    public function wallets()
    {
        # code...
        $usd                = $this->usd();
        $coins 		        = $this->get_coins();

        $main               = ['BTC', 'ETH', 'BNB', 'XRP', 'USDT', 'USDC', 'DOGE', 'LTC'];
        $wallets            = [];
    
        foreach ($main as $key => $single) {
            # code...
            $coin               = Coin::where('symbol', $single)->first();

            $wallet             = Wallet::where('user_id', Auth::user()->id)->where('wallet_type', $single)->first();
            $coin->balance      = $wallet->balance;
            
            $wallets[$single]   = $coin;
        }


        $page_name          = 'My Wallets';

        return view('wallets.index', compact('page_name', 'usd', 'wallets'));
    }

    public function swap()
    {
        # code...
        $usd                = $this->usd();
        // $coins 		        = $this->get_coins();

        $wallets            = Wallet::where('user_id', Auth::user()->id)->get();

        $page_name          = 'Swap Crypto';
        return view('wallets.swap', compact('page_name', 'usd', 'wallets'));
    }

    public function makeSwap(Request $request)
    {
        # code...
        
        $info = $request->all();

        $from = Wallet::where('user_id', Auth::user()->id)->where('wallet_type', $info['from_coin'])->first();
        if ($info['from_coin'] == 'BTC') {
            # code...
            User::where('id', Auth::user()->id)->update([
                'main_balance' => $from->balance - $info['fromInputField']
            ]);
        }

        Wallet::where('user_id', Auth::user()->id)->where('wallet_type', $info['from_coin'])->update([
            'balance' => $from->balance - $info['fromInputField']
        ]);



        $to = Wallet::where('user_id', Auth::user()->id)->where('wallet_type', $info['to_coin'])->first();
        if ($info['to_coin'] == 'BTC') {
            # code...
            User::where('id', Auth::user()->id)->update([
                'main_balance' => $to->balance + $info['toInputField']
            ]);
        }

        Wallet::where('user_id', Auth::user()->id)->where('wallet_type', $info['to_coin'])->update([
            'balance' => $to->balance + $info['toInputField']
        ]);

        return redirect('/swap')->with(['message' => 'Swap completed successfully']);
    }
}
