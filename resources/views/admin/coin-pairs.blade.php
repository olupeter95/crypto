@extends('admin.layouts.app')

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col">
                <div class="card shadow bg-darker px-5">
                    <div class="card-header border-0 bg-darker">
                        <div class="row align-items-center">
                            <div class="col"></div>
                            <div class="col text-right">
                                <a href="javascript:void(0);" class="bg-success text-white btn" data-toggle="modal" data-target="#create_coin_pair">Add New Coin Pair</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-darker">
                                <tr>
                                    <th class="text-yellow" scope="col">S/N</th>
                                    <th class="text-yellow" scope="col">Pair Name</th>
                                    <th class="text-yellow" scope="col">From Symbol</th>
                                    <th class="text-yellow" scope="col">To Symbol</th>
                                    <th class="text-yellow" scope="col">Status</th>
                                    <th class="text-yellow" scope="col">Action</th>
                                    <th class="text-yellow" scope="col">Date Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($coin_pairs as $key => $coin_pair){
                                        ?>
                                            <tr>
                                                <td class="text-white">{{ $key + 1 }}</td>
                                                <td class="text-yellow">{{ $coin_pair->pair_name }}</td>
                                                <td class="text-yellow">{{ $coin_pair->from_pair }}</td>
                                                <td class="text-white" style="font-weight: bold;">{{ $coin_pair->to_pair }}</td>
                                                <td class="text-white" style="font-weight: bold;">{{ $coin_pair->pair_status }}</td>
                                                <td class="text-white">
                                                    <a href="javascript:void(0);" class="bg-danger text-white btn delete_coin_pair" data-id="{{ $coin_pair->id }}" data-pair-name="{{ $coin_pair->pair_name }}">Delete Pair</a>
                                                </td>
                                                <td class="text-white" style="font-weight: bold;">{{ $coin_pair->created_at }}</td>
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

    <div class="modal fade" id="create_coin_pair" tabindex="-1" role="dialog" aria-labelledby="create_coin_pairLabel" style="display: none;" aria-hidden="true">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
                <form action="/admin/coin/pairs/create" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Create Coin Pair</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Pair Name:</label>
                            <input type="text" name="pair_name" class="form-control" id="pair_name" value="">
                        </div>
                        <div class="form-group focused">
                            <label for="message-text" class="col-form-label">From Pair:</label>
                            <select id="from_pair" name="from_pair" class="form-control">
                                <?php
                                    foreach($cryptocurrencies as $key => $cryptocurrency){
                                        ?>
                                            <option value="<?php echo $cryptocurrency->symbol; ?>"><?php echo $cryptocurrency->symbol; ?></option>		            									            
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group focused">
                            <label for="message-text" class="col-form-label">To Pair:</label>
                            <select id="to_pair" name="to_pair" class="form-control">
                                <option value="BTC">BTC</option>
                                <option value="ETH">ETH</option>
                            </select>
                        </div>
                        <div class="form-group focused">
                            <label for="message-text" class="col-form-label">Status</label>
                            <select id="pair_status" name="pair_status" class="form-control">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
		      	    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="create_coin_pair_btn" type="submit" class="btn btn-primary">Create Coin Pair</button>
                    </div>
                </form>
		    </div>
		 </div>
	</div>

    <div class="modal fade" id="delete_coin_pair" tabindex="-1" role="dialog" aria-labelledby="delete_coin_pairLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
                <form action="" method="post">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title" id="delete_coin_pairLabel"><i class="fa fa-dashboard"></i> WARNING</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-dark">
                        <p class="text-center text-white">Are you sure you want to delete this trading pair?</p>
                        <h2 class="text-center text-danger"><strong></strong></h2>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn col-lg-6 btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary col-lg-6 delete_btn">Yes, Delete It</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
@endsection