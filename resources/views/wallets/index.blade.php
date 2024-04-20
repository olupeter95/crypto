@extends('layouts.app3')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">S/N</th>
                                <th class="text-center">COIN</th>
                                <th class="text-center">NAME</th>
                                <th class="text-center">TOTAL BALANCE</th>
                                <th class="text-center">AVAILABLE BALANCE</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 0;
                                foreach ($wallets as $key => $wallet) {
                                    # code...
                                    $count = $count + 1;
                                    ?>
                                        <tr>
                                            <td class="text-center">{{$count}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="mr-3">
                                                        <img src="{{$wallet->img}}" alt="{{$wallet->slug}}" style="width: 30px;height: 30px;">
                                                    </div>
                                                    <div class="text-white">
                                                        {{$wallet->symbol}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">{{$wallet->name}}</td>
                                            <td class="text-center">{{$wallet->balance}}</td>
                                            <td class="text-center">{{$wallet->balance}}</td>
                                            <td>
                                                <a href="/deposit" class="btn bg-success mr-4">Deposit</a>
                                                <a href="/withdraw" class="btn bg-danger mr-4">Withdraw</a>
                                                <a href="/swap" class="btn bg-dark">Swap</a>
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
@endsection