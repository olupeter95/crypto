@extends('admin.layouts.app')

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>All Withdrawals</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive mb-4 style-1">
                            <table id="style-1" class="table style-1 table-hover non-hover">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column"> Record no. </th>
                                        <th>Name</th>
                                        <th>Customers</th>
                                        <th>Transaction ID</th>
                                        <th>Method</th>
                                        <th>Sent To</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th class="">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($withdrawals as $key => $withdrawal){
                                            ?>
                                                <tr>
                                                    <td class="checkbox-column"> {{ $key+1}} </td>
                                                    <td class="user-name">{{ $withdrawal->name }}</td>
                                                    <td class="">
                                                        <a class="profile-img" href="javascript: void(0);">
                                                            <img src="/assets/img/90x90.jpg" alt="product">
                                                        </a>
                                                    </td>
                                                    <td>{{ $withdrawal->transaction_id }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="usr-img-frame mr-2 rounded-circle">
                                                                <img alt="avatar" class="img-fluid rounded-circle" src="https://s2.coinmarketcap.com/static/img/coins/200x200/1.png">
                                                            </div>
                                                            <p class="mt-2 ml-2">BTC</p>
                                                        </div>
                                                    </td>
                                                    <td>{{ $withdrawal->wallet_address }}</td>
                                                    <td>{{ $withdrawal->amount }}</td>
                                                    <td>{{ $withdrawal->created_at }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class=" align-self-center d-m-success  mr-1 data-marker"></div>
                                                            <?php
                                                                if($withdrawal->approved == 'PENDING'){
                                                                    ?>
                                                                        <span class="label label-warning">Pending</span>
                                                                    <?php
                                                                }
                                                                elseif($withdrawal->approved == 'YES'){
                                                                    ?>
                                                                        <span class="label label-success">Approved</span>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                        <span class="label label-danger">Cancelled</span>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="dropdown custom-dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                                <a class="dropdown-item approve_withdrawal" w_id="{{ $withdrawal->id }}" href="javascript:void(0);">Approve</a>
                                                                <a class="dropdown-item cancel_withdrawal" w_id="{{ $withdrawal->id }}" href="javascript:void(0);">Cancel</a>
                                                                <a class="dropdown-item" href="javascript:void(0);">Edit Withdrawal Time</a>
                                                            </div>
                                                        </div>
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
    </div>
@endsection