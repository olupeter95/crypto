<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\DepositAdminNotification;
use Illuminate\Http\Request;
use App\Events\BtcpayPaymentEvent;
use GuzzleHttp\Client;
use App\Models\BtcpayPayment;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Wallet;
use App\Mail\Deposits;

class BtcpayPaymentsController extends Controller
{
    public function DepositCallback(Request $request)
    {
        # code... 
        $details        = $request->all();

        $orderId        = $details['data']['orderId'];
        $invoiceId      = $details['data']['id'];
        $price          = $details['data']['price'];
        $btcPrice       = $details['data']['btcPrice'];

        $response       = $this->verifyInvoice($orderId, $invoiceId, $price);
        if ($response['success'] == 'true') {
            # code...
            $buyerEmail   = $details['data']['buyerFields']['buyerEmail'];

            $fields       = $this->createFields($buyerEmail, $orderId, $invoiceId, $details);
            $verifyUser   = $this->verifyUser($buyerEmail, $fields);
            
            if ($response['status'] == 'complete' || $response['status'] == 'confirmed') {
                # code...
                
                //Check if a deposit via this invoice has entere a user's account
                $BtcpayPayment = BtcpayPayment::where('buyer_email', '=', $buyerEmail)->where('order_id', '=', $orderId)->where('invoice_id', '=', $invoiceId)->first();
            
                //This should run if a deposit via this invoice has not entered a user's account
                if ($BtcpayPayment->deposited == 'NO') {
                    # code...
                    $deposit = $this->makeBtcDeposit($buyerEmail, $price, $btcPrice, $orderId, $invoiceId);
                    if ($deposit['success'] == 'true') {
                        $details = [
                            'first_name' => 'Coinshape User',
                            'url'        => url('/deposit-logs')
                        ];
                
                        Mail::to($buyerEmail)->send(new Deposits($details));
                    }
                }
            }
        }
    }

    public function verifyInvoice($orderId, $invoiceId, $price)
    {
        # code...
        $client             = new Client();
        $url                = 'https://payments.coinshape.com/invoices/'.$invoiceId;

        // GET with basic auth
        $headers = [
            'Content-type'  => 'application/json; charset=utf-8',
            'Accept'        => 'application/json',
            'Authorization' => 'Basic bHI3dlJkRVpMUUVpYkVrb2s3RVYweUlpbkdpaU1MMDAwa29QRGJicmtkYg==',
        ];

        $response       = $client->request('GET', $url, [
            'headers'   => $headers
        ]);
        
        $info               = json_decode($response->getBody()->getContents(), true); 

        //Do not forget to run a confirmation to see if the order id generated is from the backend of this application

        if ($info['data']['orderId'] == $orderId && $info['data']['price'] == $price) {
            # code...
            //Run an expression to confirm the status of the transaction then if confirmed, add up said funds to the user's wallet
            return ([
                'success'	=> 'true', 
                'status'    => $info['data']['status']
            ]);
        }
        else{
            return ([
                'success'	=> 'false', 
                'status'    => 'FAKE'
            ]);
        }
    }

    public function verifyUser($buyerEmail, $fields)
    {
        # code...
        //Check if the buyer email belongs to a user on coinshape
        if (User::where('email', $buyerEmail)->exists()) {
            $user               = User::where('email', $buyerEmail)->first();
            $fields['user_id']  = $user->id;
            
            $payments       = BtcpayPayment::where('buyer_email', '=', $buyerEmail)
                                ->where('order_id', '=', $fields['order_id'])
                                ->where('invoice_id', '=', $fields['invoice_id'])
                                ->get();
                                
            if (count($payments) == 0) {
                # code...
    
                BtcpayPayment::create($fields);

                event(new BtcpayPaymentEvent([
                    'success'       => 'true',
                    'message'       => 'Payment information created'
                ]));
            }
            elseif (count($payments) == 1) {
                # code...
                BtcpayPayment::where('buyer_email', '=', $buyerEmail)->where('order_id', '=', $fields['order_id'])->where('invoice_id', '=', $fields['invoice_id'])->update([
                    'btc_price'     => $fields['btc_price'],
                    'btc_paid'      => $fields['btc_paid'],
                    'status'        => $fields['status']
                ]);

                event(new BtcpayPaymentEvent([
                    'success'       => 'true',
                    'message'       => 'Payment information updated'
                ]));
            }

            return ([
                'success'	=> 'true', 
                'name'      => $user->name
            ]);
            
        }
        else{
            return ([
                'success'	=> 'false', 
            ]);
        }
    }

    public function createFields($buyerEmail, $orderId, $invoiceId, $details)
    {
        # code...
        $fields = [
            'buyer_email'   => $buyerEmail,
            'order_id'      => $orderId,
            'invoice_id'    => $invoiceId,
            'price'         => $details['data']['price'],
            'currency'      => $details['data']['currency'],
            'btc_price'     => $details['data']['btcPrice'],
            'btc_paid'      => $details['data']['btcPaid'],
            'status'        => $details['data']['status'],
            'deposited'     => 'NO'
        ];

        return $fields;
    }

    public function makeBtcDeposit($buyerEmail, $price, $btcPrice, $orderId, $invoiceId)
    {
        # code...
        $user                       = User::where('email', $buyerEmail)->first();

        $theDetails      = [
            'user_id'           =>  $user->id,
            'transaction_id'    =>  uniqid('dep'),
            'image_name'        =>  'https://assets.coingecko.com/coins/images/1/large/bitcoin.png?1547033579',
            'details'           =>  'Bitcoin Payment',
            'amount_deposited'  =>  $price,
            'amount_in_btc'     =>  $btcPrice,
            'coin_type'         =>  'BTC',
            'approved'          =>  'YES'
        ];

        if(Deposit::create($theDetails)){

            $btcWalletInfo  = Wallet::where('user_id', $user->id)->where('wallet_type', 'BTC')->first();
            $newBalance     = $btcWalletInfo->balance + $btcPrice;

            User::where('id', $user->id)->update([
                'main_balance' => $newBalance
            ]);

            $update = Wallet::where('user_id', $user->id)->where('wallet_type', 'BTC')->update([
                'balance'       => $newBalance
            ]);


            $details = [
                'name' => $user->name,
                'url'  => url('/admin/deposit/all')
            ];

            Mail::to('support@coinshape.com')->send(new DepositAdminNotification($details));

            if ($update) {
                # code...
                //If the deposit has been updated as completed in the btcpayment table in the database
                $deposited = BtcpayPayment::where('buyer_email', '=', $buyerEmail)
                            ->where('order_id', '=', $orderId)
                            ->where('invoice_id', '=', $invoiceId)
                            ->update([
                                'deposited'     => 'YES'
                            ]);

                if($deposited){
                    return ([
                        'success'	=> 'true', 
                    ]);
                }
                else{
                    return ([
                        'success'	=> 'false', 
                    ]);
                }
            }

        }
    }
}
