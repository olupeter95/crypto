@extends('admin.layouts.app')

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5 pull-right">
                        
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-4">
                                {{-- <button class="btn btn-primary col-12" type="button" data-toggle="modal" data-target="#predictions_modal">
                                    <i class="fa fa-eye" alt="Show Trading Text"></i> Show Trade Texts
                                </button> --}}
                            </div>
                            <div class="col-6">
                                <a href="/admin/multiple/trade/signals" class="btn btn-success col-12"><i class="fa fa-area-chart"></i> Create Multiple Predictions</a>  
                            </div>
                            
                        </div>
                    </div>
                </div>
                <h3 class="tile-title text-white">Live Predictions </h3>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover order-column" id="">
                            <thead>
                                <tr>
                                    <th class="text-yellow">ID</th>
                                    <th class="text-yellow">Session ID</th>
                                    <th class="text-yellow" style="width: 145px;">Users</th>
                                    <th class="text-yellow">Range From</th>
                                    <th class="text-yellow">Range To</th>
                                    <th class="text-yellow">No Of Trades</th>
                                    <th class="text-yellow">Type</th>
                                    <th class="text-yellow">Date Created</th>
                                    <th class="text-yellow"></th>
                                    </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($predictions as $key => $prediction){
                                        ?>
                                            <tr>
                                                <td class="text-white">{{$key+1}}</td>
                                                <td class="text-white"><strong class="session_id">{{$prediction->session_id}}</strong></td>
                                                <td class="text-white">
                                                    <button class="btn btn-primary view_users" data-id={{$prediction->session_id}}><i class="fa fa-eye mr-2" alt="Show Users"></i>View Users</button>
                                                </td>
                                                <td class="text-white">{{$prediction->range_from}}</td>
                                                <td class="text-white">{{$prediction->range_to}}</td>
                                                <td class="text-white">{{$prediction->no_of_signals}}</td>
                                                <td class="text-white">{{$prediction->type}}</td>
                                                <td class="text-white"><span class="btn btn-danger btn-sm">{{$prediction->created_at}} </span></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger col-12 btn-sm delete_trade_signal" data-id={{$prediction->session_id}}>Delete this trade signal</button>
                                                </td>
                                            </tr> 
                                        <?php
                                    }
                                ?>                          
                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="users_modal" tabindex="-1" role="dialog" aria-labelledby="demo_balanceLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
        	<div class="modal-content">
            	<div class="modal-header">
              		<h3 class="modal-title" id="exampleModalLabel">
              			<i class="fa fa-dashboard"></i>
              			List of users
              		</h3>
              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                		<span aria-hidden="true">&times;</span>
              		</button>
            	</div>
            	<div class="modal-body">
              		<div class="" style="height: 200px;overflow-y: scroll;">
						
					</div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="predictions_modal" tabindex="-1" role="dialog" aria-labelledby="demo_balanceLabel" aria-hidden="true">
    	<div class="modal-dialog modal-lg" role="document">
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
              		<div class="row" style="height: 200px;overflow-y: scroll;" contenteditable="true">
						
					</div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="delete_modalLabel"><i class="fa fa-dashboard"></i> WARNING</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <p>Before you proceed, Are you sure you want to delete this trade signal? <strong class="text-danger">Please note that this action cannot be undone.</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn col-lg-6 btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary col-lg-6 delete_signal_btn">Yes, Delete It</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
@endsection