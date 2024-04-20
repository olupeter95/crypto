<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;

class CryptocurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $page_name              = 'All Created Cryptocurrencies';
        $cryptocurrencies       = Currency::all();

        return view('admin.cryptocurrency', compact('page_name', 'cryptocurrencies'));
    }

    public function create(Request $request)
    {
        Currency::create([
            'name' 		    => $request->all()['currency_title'],
            'symbol' 		=> $request->all()['currency_symbol'],
            'usd_value'     => $request->all()['amount_in_usd'],
        ]);

        return redirect('/admin/cryptocurrency');
    }

    public function edit(Request $request)
    {
        Currency::where('id', $request->all()['currency_id'])->update([
            'name' 		    => $request->all()['currency_title'],
            'symbol' 		=> $request->all()['currency_symbol'],
            'usd_value'     => $request->all()['amount_in_usd'],
        ]);

        return redirect('/admin/cryptocurrency');

    }

    public function delete($currency_id)
    {
        Currency::where('id', $currency_id)->delete();

        return redirect('/admin/cryptocurrency');

    }
}
