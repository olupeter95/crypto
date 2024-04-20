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
            			</div>
            		</div>
            	</div>
            </div>
            <div class="card-body">
                <div class="row">
                	<div class="col-md-4">
                		<div class="form-group">
                  			<label class="text-white"><strong>Limit Range From</strong></label>
                  			<div class="input-group ">
                    			<input id="limitFrom" type="text" name="limitFrom" class="form-control input-lg">
                    			<div class="input-group-append"><span class="input-group-text bg-default text-white">USDT</span></div>
                  			</div>
                		</div>
                	</div>
                    <div class="col-md-4">
                		<div class="form-group">
                  			<label class="text-white"><strong>Limit Range To</strong></label>
                  			<div class="input-group ">
                    			<input id="limitTo" type="text" name="limitTo" class="form-control input-lg">
                    			<div class="input-group-append"><span class="input-group-text bg-default text-white">USDT</span></div>
                  			</div>
                		</div>
                	</div>
                    <div class="col-md-4">
                		<div class="form-group">
		                  	<label class="text-white" style="display: block;"><strong>Number of Trades to Generate</strong></label>
		                  	<input id="number_of_trades" type="text" name="" class="form-control input-lg">
		                </div>
                	</div>
                </div>
                <div class="row">
                	<div class="col-md-4">
                		<div class="form-group">
                  			<label class="text-white"><strong>Stop Limit Range From</strong></label>
                  			<div class="input-group ">
                    			<input id="stopLimitFrom" type="text" name="stopLimitFrom" class="form-control input-lg">
                    			<div class="input-group-append"><span class="input-group-text bg-default text-white">USDT</span></div>
                  			</div>
                		</div>
                	</div>
                    <div class="col-md-4">
                		<div class="form-group">
                  			<label class="text-white"><strong>Stop Limit Range To</strong></label>
                  			<div class="input-group ">
                    			<input id="stopLimitTo" type="text" name="stopLimitTo" class="form-control input-lg">
                    			<div class="input-group-append"><span class="input-group-text bg-default text-white">USDT</span></div>
                  			</div>
                		</div>
                	</div>
                    <div class="col-4">
                		<label class="text-white"><strong>Leverage</strong></label>
                		<select id="leverage_value" class="form-control" name="leverage[]" multiple="multiple">
						  	<option value="25%">25%</option>
						  	<option value="50%">50%</option>
						  	<option value="75%">75%</option>
						  	<option value="100%">100%</option>
						</select>
                	</div>
                </div>
                <div class="row">
                	
                	<div class="col-md-4">
                		<div class="form-group">
		                    <label class="text-white" style="display: block;"><strong>Symbols</strong></label>
		                    <select id="number_of_symbols" class="form-control" name="symbols[]" multiple="multiple">
								<?php
									foreach($coin_pairs as $key => $coin_pair){
										?>
											<option value="{{ $coin_pair->pair_name }}">{{ $coin_pair->pair_name }}</option>
										<?php
									}
								?>
						    </select>
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
                	
                	<div class="col-12">
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

@section('javascript')
    <script src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
    <script>
        $('#users_value, #leverage_value, #number_of_intervals, #number_of_symbols').select2({
            tags: true
        });
    </script>
    <script>
        $('#generate_predictions').on('click', function(){
            let symbols 				  =  {};
            let intervals       		  =  {};
            let leverages 				  =  {};
            let users 				  	  =  {};

            let buy_or_sell           	  =  {'1' : 'Buy', '2' : 'Sell'};

            let symbols_data 			  =  $('#number_of_symbols').select2('data');
            let leverages_data 			  =  $('#leverage_value').select2('data');
            let users_data 			  	  =  $('#users_value').select2('data');

            let symbolscounter  		  = 0; 
            let leveragescounter 		  = 0;
            let userscounter 		  	  = 0;

            $.each(symbols_data, function(){
                symbolscounter++;
                symbols[symbolscounter] = this.id;
            });

            $.each(leverages_data, function(){
                leveragescounter++;
                leverages[leveragescounter] = this.id;
            });

            $.each(users_data, function(){
                userscounter++;
                users[userscounter] = this.id;
            });

            let amount_range_from 			=	 $('#amount_range_from').val();
            let amount_range_to 		  	=	 $('#amount_range_to').val();

            let limit_range_from 			=	 $('#limitFrom').val();
            let limit_range_to 		  	    =	 $('#limitTo').val();
            let number_of_trades 		  	=	 $('#number_of_trades').val();

            let stoplimit_range_from 	    =	 $('#stopLimitFrom').val();
            let stoplimit_range_to 		  	=	 $('#stopLimitTo').val();

            let all = {
                users_id                  : users,
                amount_range_from 	      : amount_range_from,
                amount_range_to 	      : amount_range_to,
                limit_range_from 	      : limit_range_from,
                limit_range_to 	          : limit_range_to,
                 stop_limit_range_from 	  : stoplimit_range_from,
                stop_limit_range_to 	  : stoplimit_range_to,
                number_of_trades 	      : number_of_trades,
                number_of_symbols 	      : symbols,
                buy_or_sell 		      : buy_or_sell,
                leverage_value 		      : leverages,
            }

            console.log(all)

            $.ajax({
                url: "/admin/create/stop/limit/trade/signals",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data: all,
                success: function(response) {
                    console.log(response)
                    
                    $('#generated_predictions').find('.row').empty()
                    $.each(response.data, function(i, v){
                        $('#generated_predictions').find('.row').append(
                            '<div class="col-12 py-1 modal-text mb-1">'+v.amount+' USDT | '+v.limit+' | '+v.leverage+' | '+v.symbol+' | '+v.trade_type+ ' | ' +v.buy_or_sell+'</div>'
                        );      			
                    });
                    $('#amount_range_from, #amount_range_to, #limitFrom, #limitTo, #stopLimitFrom, #stopLimitTo').val('');
                    $('#number_of_symbols, #number_of_intervals, #leverage_value, #users_value').val('').trigger('change');
                    $('#generated_predictions').modal();
                },
            });
        });
    </script>
@endsection