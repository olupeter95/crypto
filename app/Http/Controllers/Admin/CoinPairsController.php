<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoinPair;
use App\Models\Currency;

class CoinPairsController extends Controller
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
        $page_name              = 'All Created Coin Pairs';
        $coin_pairs             = CoinPair::all();
        $cryptocurrencies       = Currency::all();

        return view('admin.coin-pairs', compact('page_name', 'coin_pairs', 'cryptocurrencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        CoinPair::create([
            'pair_name'     => $request->all()['pair_name'],
            'from_pair'     => $request->all()['from_pair'],
            'to_pair'       => $request->all()['to_pair'],
            'pair_status'   => $request->all()['pair_status'],
        ]);

        return redirect('/admin/coin/pairs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CoinPair::where('id', $id)->delete();
        return redirect('/admin/coin/pairs');
    }
}
