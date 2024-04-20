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
                                <a href="javascript:void(0);" class="bg-success text-white btn" data-toggle="modal" data-target="#create_alt_coin">Add New Alt Coin Pair</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-darker">
                                <tr>
                                    <th class="text-yellow" scope="col">S/N</th>
                                    <th class="text-yellow" scope="col">Pair Name</th>
                                    <th class="text-yellow" scope="col">Ratio</th>
                                    <th class="text-yellow" scope="col">From Symbol</th>
                                    <th class="text-yellow" scope="col">To Symbol</th>
                                    <th class="text-yellow" scope="col">Status</th>
                                    <th class="text-yellow" scope="col">Action</th>
                                    <th class="text-yellow" scope="col">Date Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($alt_coins as $key => $alt_coins){
                                        ?>
                                            <tr>
                                                <td class="text-white">{{ $key + 1 }}</td>
                                                <td class="text-yellow">{{ $alt_coins->pair_name }}</td>
                                                <td class="text-yellow">{{ $alt_coins->ratio }}</td>
                                                <td class="text-yellow">{{ $alt_coins->from_pair }}</td>
                                                <td class="text-white" style="font-weight: bold;">{{ $alt_coins->to_pair }}</td>
                                                <td class="text-white" style="font-weight: bold;">{{ $alt_coins->pair_status }}</td>
                                                <td class="text-white">
                                                    <a href="javascript:void(0);" class="bg-danger text-white btn delete_alt_coin" data-id="{{ $alt_coins->id }}" data-pair-name="{{ $alt_coins->pair_name }}">Delete Pair</a>
                                                </td>
                                                <td class="text-white" style="font-weight: bold;">{{ $alt_coins->created_at }}</td>
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

    <div class="modal fade" id="create_alt_coin" tabindex="-1" role="dialog" aria-labelledby="create_alt_coinLabel" style="display: none;" aria-hidden="true">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
                <form action="/admin/alt/coins/create" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Create Alt Coin</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Pair Name:</label>
                            <input type="text" name="pair_name" class="form-control" id="pair_name" value="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Ratio:</label>
                            <input type="text" name="ratio" class="form-control" id="ratio" value="0.00">
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
                                <option value="USDT">USDT</option>
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
                        <button id="create_alt_coin_btn" type="submit" class="btn btn-primary">Create Alt Coin</button>
                    </div>
                </form>
		    </div>
		 </div>
	</div>

    <div class="modal fade" id="delete_alt_coin" tabindex="-1" role="dialog" aria-labelledby="delete_alt_coinLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
                <form action="" method="post">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title" id="delete_alt_coinLabel"><i class="fa fa-dashboard"></i> WARNING</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-dark">
                        <p class="text-center text-white">Are you sure you want to delete this ALT trading pair?</p>
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