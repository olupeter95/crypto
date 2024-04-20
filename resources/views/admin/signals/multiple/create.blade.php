@extends('admin.layouts.app')

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12">
          <div class="card bg-darker">
            <div class="card-header bg-darker">
            	<div class="row">
            		<div class="col-4">
            			<h4 class="card-title text-white"> <i class="fa fa-cogs"></i> Generate Predictions
            		</h4></div>
            		<div class="col-8">
            			<div class="row">
            				<div class="col-6">
            					<a href="/admin/multiple/trade/signals/live" class="btn btn-success">View Live Predictions</a>
            				</div>
            				<div class="col-6">
            					<a href="/admin/multiple/trade/signals/demo" class="btn btn-primary">View Demo Predictions</a>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
            <div class="card-body">
                <div class="row">
                	<div class="col-md-4">
                		<div class="form-group">
		                  	<label class="text-white" style="display: block;"><strong>Trade Type</strong></label>
		                  	<button id="trade_type" type="button" class="btn bg-primary col-lg-12 text-white">
		                    	<i class="fa fa-plus mr-2"></i><span>Live Trade</span>
		                  	</button>
		                </div>
                	</div>
                	<div class="col-md-4">
                		<div class="form-group">
                  			<label class="text-white"><strong>Amount Range From</strong></label>
                  			<div class="input-group ">
                    			<input id="amount_range_from" type="text" name="amount_range_from" class="form-control input-lg">
                    			<div class="input-group-append"><span class="input-group-text bg-default text-white">USD</span></div>
                  			</div>
                		</div>
                	</div>
                	<div class="col-md-4">
                		<div class="form-group">
                  			<label class="text-white"><strong>Amount Range To</strong></label>
                  			<div class="input-group ">
                    			<input id="amount_range_to" type="text" name="amount_range_to" class="form-control input-lg">
                    			<div class="input-group-append"><span class="input-group-text bg-default text-white">USD</span></div>
                  			</div>
                		</div>
                	</div>
                </div>
                <div class="row">
                	<div class="col-md-4">
                		<div class="form-group">
		                  	<label class="text-white" style="display: block;"><strong>Number of Trades to Generate</strong></label>
		                  	<input id="number_of_trades" type="text" name="" class="form-control input-lg">
		                </div>
                	</div>
                	<div class="col-md-4">
                		<div class="form-group">
		                    <label class="text-white" style="display: block;"><strong>Symbols</strong></label>
		                    <select id="number_of_symbols" class="form-control" name="symbols[]" multiple="multiple">
								<?php
									foreach($coin_pairs as $key => $coin){
										?>
											<option value="{{ $coin->pair_name }}">{{ $coin->pair_name }}</option>
										<?php
									}
								?>
						    </select>
		                </div>
                	</div>
                	<div class="col-md-4">
                		<div class="form-group">
		                  	<label class="text-white" style="display: block;"><strong>Intervals</strong></label>
		                  	<select id="number_of_intervals" class="form-control" name="intervals[]" multiple="multiple">
							  	<option value="1 min">1 min</option>
							  	<option value="3 mins">3 mins</option>
							  	<option value="5 mins">5 mins</option>
							  	<option value="30 mins">30 mins</option>
							  	<option value="1 hr">1 hr</option>
							</select>
		                </div>
                	</div>
                </div>
                <div class="row">
                	<div class="col-4">
                		<label class="text-white"><strong>Leverage</strong></label>
                		<select id="leverage_value" class="form-control" name="leverage[]" multiple="multiple">
						  	<option value="2x">2x</option>
						  	<option value="5x">5x</option>
						  	<option value="10x">10x</option>
						  	<option value="20x">20x</option>
						</select>
                	</div>
                	<div class="col-8">
                		<label class="text-white"><strong>Users</strong></label>
                		<select id="users_value" class="form-control" name="users[]" multiple="multiple">
							<?php
								foreach($users as $key => $user){
									?>
									    <option value="{{ $user->id }}">{{ $user->name }}</option>
									<?php
								}
							?>                            
                		</select>
                	</div>
                </div>
                <div class="row">
                	<div class="col-12 pt-3">
                		<button id="generate_predictions" class="col-12 btn text-white btn-success btn-lg">Generate</button>
                	</div>
                </div>
            </div>
          </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="generated_predictions" tabindex="-1" role="dialog" aria-labelledby="demo_balanceLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
        	<div class="modal-content">
            	<div class="modal-header">
              		<h3 class="modal-title" id="exampleModalLabel">
              			<i class="fa fa-dashboard"></i>
              			Copy the generated trade predictions below
              		</h3>
              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                		<span aria-hidden="true">&times;</span>
              		</button>
            	</div>
            	<div class="modal-body">
              		<div class="row" style="font-size: 1.5rem;">
            		</div>
            	</div>
            	<div class="modal-footer">
              		<button type="button" class="btn col-lg-6 btn-secondary" data-dismiss="modal">Close</button>
            	</div>
        	</div>
     	</div>
  	</div>
    

@endsection