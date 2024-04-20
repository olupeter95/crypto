@extends('admin.layouts.app')
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col">
        	  	<div class="card shadow">
            		<div class="card-header border-0 bg-darker">
                		<div class="row align-items-center">
                    		<div class="col ml-4">
                    			<h6 class="mb-0 text-white">Add A New User Plan</h6>
                    		</div>
                    	<div class="col text-right">
                    		<a href="/admin/plans" class="bg-primary text-white btn btn-sm">
                    			<i class="fa fa-eye mr-3"></i>View Plans</a>
                    	</div>
                	</div>
                	<div class="card-body bg-darker">
                        <!-- <h6 class="card-title">Input Group</h6> -->
                        <div class="basic-form">
                        	<div class="form-group row">
                        		<div class="col-lg-4">
                        			<h6 class="card-title mb-2 text-white">Plan Title</h6>
                        			<div class="input-group mb-3">
		                                <input id="plan_title" type="text" class="form-control">
		                                <div class="input-group-append">
		                                	<span class="input-group-text text-white bg-yellow">A</span>
		                                </div>
		                            </div>
                        		</div>
                        		<div class="col-lg-4">
                        			<h6 class="card-title mb-2 text-white">Rate</h6>
                        			<div class="input-group mb-3">
		                                <input id="plan_rate" type="text" class="form-control">
		                                <div class="input-group-append">
		                                	<span class="input-group-text text-white bg-yellow">USD</span>
		                                </div>
		                            </div>
                        		</div>
                        		<div class="col-lg-4">
                        			<h6 class="card-title text-white mb-2">Status</h6>
                        			<a id="plan_status" href="javascript:void(0);" class="plan-status bg-danger text-white btn" style="width: 100%;">Off</a>
                        		</div>
                        	</div>
                        	<div class="form-group row">
                        		<div class="col-lg-8 description_col">
                        			<h6 class="card-title text-white mb-2">Details</h6>
                        			<!-- <div class="input-group mb-3">
		                                <input id="" type="text" class="plan_desc form-control" placeholder="Plan Description">
		                                <div class="input-group-append">
		                                	<span class="input-group-text text-white bg-yellow add_description">
		                                		<i class="fa fa-plus"></i>
		                                	</span>
		                                </div>
		                            </div> -->
									<input value="15 Trades/day" id="plan_desc" class="tagify form-control"/>
									<style>
										.tagify{
											border:none;
										}
									</style>
                        		</div>
                        		<div class="col-lg-4">
                        			<h6 class="card-title text-white mb-2">Trade Limit</h6>
                        			<div class="input-group mb-3">
		                                <input id="trade_limit" type="text" class="form-control" placeholder="">
		                                <div class="input-group-append">
		                                	<span class="input-group-text text-white bg-yellow">Per Day</span>
		                                </div>
		                            </div>
                        		</div>
                        	</div>
                        	<div class="text-center">
                        		<div id="create_plan_btn" class="btn bg-success text-white">Create Plan</div>
                        	</div>
                        </div>
                    </div>
            	</div>
            	<div class="alert-nopadding">
                </div>
          	</div>
        </div>
        </div>
    </div>
@endsection