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
                                <a href="javascript:void(0);" class="bg-success text-white btn" data-toggle="modal" data-target="#create_wallet">Add New Wallet</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-darker">
                                <tr>
                                    <th class="text-yellow" scope="col">S/N</th>
                                    <th class="text-yellow" scope="col">Name</th>
                                    <th class="text-yellow" scope="col">Address</th>
                                    <th class="text-yellow" scope="col">Action</th>
                                    <th class="text-yellow" scope="col">Date Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($wallets as $key => $wallet){
                                        ?>
                                            <tr>
                                                <td class="text-white">{{ $key + 1 }}</td>
                                                <td class="text-yellow">{{ $wallet->title }}</td>
                                                <td class="text-yellow">{{ $wallet->address }}</td>
                                                <td class="text-white">
                                                    <a href="javascript:void(0);" class="bg-primary text-white btn edit_wallet" data-id="{{ $wallet->id }}" data-symbol="{{ $wallet->symbol }}" data-address="{{ $wallet->address }}" data-name="{{ $wallet->title }}">Edit</a>
                                                    <a href="javascript:void(0);" class="bg-danger text-white btn delete_wallet" data-id="{{ $wallet->id }}">Delete</a>
                                                </td>
                                                <td class="text-white" style="font-weight: bold;">{{ $wallet->created_at }}</td>
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

    <div class="modal fade" id="create_wallet" tabindex="-1" role="dialog" aria-labelledby="create_walletLabel" style="display: none;" aria-hidden="true">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
                <form action="/admin/wallet/create" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Create Wallet</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" name="title" id="wallet_title">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Symbol:</label>
                            <input type="text" class="form-control" name="symbol" id="wallet_symbol">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Address:</label>
                            <input type="text" class="form-control" name="address" id="wallet_address">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="create_wallet_btn" type="submit" class="btn btn-primary">Create Wallet</button>
                    </div>
                </form>
		    </div>
		 </div>
	</div>

    <div class="modal fade" id="edit_wallet" tabindex="-1" role="dialog" aria-labelledby="edit_walletLabel" style="display: none;" aria-hidden="true">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
                <form action="/admin/wallet/edit" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title" id="edit_walletLabel">Edit Wallet</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="hidden" class="form-control wallet_id" name="wallet_id" id="">
                            <input type="text" class="form-control wallet_title" name="wallet_title" id="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Symbol:</label>
                            <input type="text" class="form-control wallet_symbol" name="wallet_symbol" id="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Address:</label>
                            <input type="text" class="form-control wallet_address" name="wallet_address" id="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="edit_wallet_btn" type="submit" class="btn btn-primary">Edit Wallet</button>
                    </div>
                </form>
		    </div>
		 </div>
	</div>

    <div class="modal fade" id="delete_wallet" tabindex="-1" role="dialog" aria-labelledby="delete_walletLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
                <form action="" method="post">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title" id="delete_walletLabel"><i class="fa fa-dashboard"></i> WARNING</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Before you proceed, Are you sure you want to delete this Wallet? <strong class="text-danger">Please note that this action cannot be undone.</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn col-lg-6 btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary col-lg-6 delete_wallet_btn">Yes, Delete It</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
@endsection