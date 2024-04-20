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
                                <a href="javascript:void(0);" class="bg-success text-white btn" data-toggle="modal" data-target="#create_currency">Add New Cryptocurrency</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-darker">
                                <tr>
                                    <th class="text-yellow" scope="col">S/N</th>
                                    <th class="text-yellow" scope="col">Name</th>
                                    <th class="text-yellow" scope="col">Symbol</th>
                                    <th class="text-yellow" scope="col">In USD</th>
                                    <th class="text-yellow" scope="col">Action</th>
                                    <th class="text-yellow" scope="col">Date Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($cryptocurrencies as $key => $cryptocurrency){
                                        ?>
                                            <tr>
                                                <td class="text-white">{{ $key + 1 }}</td>
                                                <td class="text-yellow">{{ $cryptocurrency->name }}</td>
                                                <td class="text-yellow">{{ $cryptocurrency->symbol }}</td>
                                                <td class="text-white" style="font-weight: bold;">{{ $cryptocurrency->usd_value }}</td>
                                                <td class="text-white">
                                                    <a href="javascript:void(0);" class="bg-primary text-white btn edit_cryptocurrency" data-id="{{ $cryptocurrency->id }}" data-name="{{ $cryptocurrency->name }}" data-symbol="{{ $cryptocurrency->symbol }}" data-usd-value="{{ $cryptocurrency->usd_value }}">Edit Crypto</a>
                                                    <a href="javascript:void(0);" class="bg-danger text-white btn delete_cryptocurrency" data-id="{{ $cryptocurrency->id }}">Delete Crypto</a>
                                                </td>
                                                <td class="text-white" style="font-weight: bold;">{{ $cryptocurrency->created_at }}</td>
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

    <div class="modal fade" id="create_currency" tabindex="-1" role="dialog" aria-labelledby="create_currencyLabel" style="display: none;" aria-hidden="true">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
                <form action="/admin/cryptocurrency/create" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Create Cryptocurrency</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" name="currency_title" id="currency_title">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Symbol:</label>
                            <input type="text" class="form-control" name="currency_symbol" id="currency_symbol">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Amount in USD:</label>
                            <input type="text" class="form-control" name="amount_in_usd" id="amount_in_usd">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="create_currency_btn" type="submit" class="btn btn-primary">Create Currency</button>
                    </div>
                </form>
		    </div>
		 </div>
	</div>

    <div class="modal fade" id="edit_currency" tabindex="-1" role="dialog" aria-labelledby="edit_currencyLabel" style="display: none;" aria-hidden="true">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
                <form action="/admin/cryptocurrency/edit" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Edit Cryptocurrency</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="hidden" class="form-control currency_id" name="currency_id" id="">
                            <input type="text" class="form-control currency_title" name="currency_title" id="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Symbol:</label>
                            <input type="text" class="form-control currency_symbol" name="currency_symbol" id="">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Amount in USD:</label>
                            <input type="text" class="form-control amount_in_usd" name="amount_in_usd" id="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="edit_currency_btn" type="submit" class="btn btn-primary">Edit Cryptocurrency</button>
                    </div>
                </form>
		    </div>
		 </div>
	</div>

    <div class="modal fade" id="delete_currency" tabindex="-1" role="dialog" aria-labelledby="delete_currencyLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
                <form action="" method="post">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title" id="delete_currencyLabel"><i class="fa fa-dashboard"></i> WARNING</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Before you proceed, Are you sure you want to delete this Cryptocurrency? <strong class="text-danger">Please note that this action cannot be undone.</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn col-lg-6 btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary col-lg-6 delete_plan_btn">Yes, Delete It</button>
                    </div>
                </form>
			</div>
		</div>
	</div>

    <div class="modal fade" id="delete_plan" tabindex="-1" role="dialog" aria-labelledby="delete_planLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<input type="hidden" name="plan_id" class="plan_id" value="">
					<h3 class="modal-title" id="delete_planLabel"><i class="fa fa-dashboard"></i> WARNING</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Before you proceed, Are you sure you want to delete this plan? <strong class="text-danger">Please note that this action cannot be undone.</strong></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn col-lg-6 btn-secondary" data-dismiss="modal">No</button>
					<button type="button" class="btn btn-primary col-lg-6 delete_plan_btn">Yes, Delete It</button>
				</div>
			</div>
		</div>
	</div>
@endsection