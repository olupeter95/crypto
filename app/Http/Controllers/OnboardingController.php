<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\User;

class OnboardingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usd        = $this->usd();
        $page_name  = 'Complete your profile';

        return view('auth.onboarding', compact('page_name', 'usd'));
    }

    public function usd(){
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



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::where('id', Auth::user()->id)->update(
            [
                'gender'        => request()->all()['gender'],
                'date_of_birth' => request()->all()['date_of_birth'],
                'currency'      => request()->all()['currency'],
                'address'       => request()->all()['address'],
                'city'          => request()->all()['city'],
                'state'         => request()->all()['state'],
                'country'       => request()->all()['country'],
            ]
        );

        return redirect(request()->all()['previous_url']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
