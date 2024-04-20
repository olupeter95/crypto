<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\PlanDescription;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name      = 'All Plans';
        $plans          = Plan::all();
        foreach($plans as $key => $plan){
            //$plan->description = [];
            $plan_description  = PlanDescription::where('plan_id', $plan->id)->get();
            $plan->description = $plan_description;
            for ($i=0; $i < count($plan_description); $i++) { 
                # code...
                $plan->description[$i] = $plan_description[$i]->description;
            }
        }

        //return $plans;
        return view('admin.plans.index', compact('page_name', 'plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name      = 'Create A Plan';

        return view('admin.plans.create', compact('page_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plan_title 	= $request->all()['plan_title'];
		$rate 			= $request->all()['plan_rate'];
		$status 		= $request->all()['plan_status'];
		$details 		= explode(',',$request->all()['plan_desc']);
        $trade_limit 	= $request->all()['trade_limit'];
        
        $post_data 		= [
            'plan_title'        => $plan_title,
            'rate'   			=> $rate,
            'status'   			=> $status,
            'trade_limit' 		=> $trade_limit,
        ];

        $plan = Plan::create($post_data);
        $plan_id = $plan->id;

        
        $values = array_map(function ($detail) {
            $detail = rtrim($detail, ']');
            $detail = ltrim($detail, '[');
            $detail = json_decode($detail, true);
            return $detail['value'];
        }, $details);
        
        $keys = array_keys($values);
        $details = array_combine($keys, $values);
    
        foreach ($details as $key => $description) {
            # code...
            $description_data 	= [
                'plan_id'       => $plan_id,
                'plan_title'   	=> $plan_title, 
                'description'   => $description
            ];
            PlanDescription::create($description_data);
        }

        return json_encode([
            'success' => 'true'
        ]);

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
    public function update(Request $request)
    {
        $plan_title 	= $request->all()['plan_title'];
		$rate 			= $request->all()['plan_rate'];
		$status 		= $request->all()['plan_status'];
		$details 		= $request->all()['plan_desc'];
        $trade_limit 	= $request->all()['trade_limit'];
        
        $post_data 		= [
            'plan_title'        => $plan_title,
            'rate'   			=> $rate,
            'status'   			=> $status,
            'trade_limit' 		=> $trade_limit,
        ];

        Plan::where('id', $request->all()['plan_id'])->update($post_data);
        PlanDescription::where('plan_id', $request->all()['plan_id'])->delete();

        foreach ($details as $key => $description) {
            # code...
            $description_data 	= array(
                'plan_id'       => $request->all()['plan_id'],
                'plan_title'   	=> $plan_title, 
                'description'   => $description
            );
            PlanDescription::create($description_data);
        }

        return json_encode([
            'success' => 'true'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($plan_id)
    {
        Plan::where('id', $plan_id)->delete();
        return redirect('/admin/plans');
    }
}
