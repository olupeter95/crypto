<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositPaymentsController extends Controller
{
    public function callback(Request $request)
    {
        # code...
        // event(new BtcpayPaymentEvent([
        //     'success'       => 'true',
        //     'message'       => $request
        // ]));
    }
}
