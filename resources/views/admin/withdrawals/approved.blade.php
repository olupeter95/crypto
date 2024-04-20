@extends('admin.layouts.app')

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Approved Withdrawals</h4>
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