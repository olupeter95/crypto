<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AltCoin;
use App\Models\Currency;

class AltCoinController extends Controller
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
        $page_name              = 'All Created Alt Coins';
        $alt_coins              = AltCoin::all();
        $cryptocurrencies       = Currency::all();

        return view('admin.alt-coins', compact('page_name', 'alt_coins', 'cryptocurrencies'));
    }

    // public function get($symbol)
    // {
        
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        AltCoin::create([
            'pair_name'     => $request->all()['pair_name'],
            'ratio'         => $request->all()['ratio'],
            'from_pair'     => $request->all()['from_pair'],
            'to_pair'       => $request->all()['to_pair'],
            'pair_status'   => $request->all()['pair_status'],
        ]);

        return redirect('/admin/alt/coins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AltCoin::where('id', $id)->delete();
        return redirect('/admin/alt/coins');
    }
}
