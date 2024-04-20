@extends('layouts.app')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-one pt-5" style="height: 100%;">
                @if(Session::has('message'))
                <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Swap completed successfully!!!</strong>
                </div>
                @endif
                <div class="widget-content" id="earnings_display">
                    <form id="swapForm" action="/make/swap" method="POST">
                        @csrf
                        <label style="font-weight: 700; font-size: 12px;">Amount</label>
                        <div class="input-group mb-0">
                            <input id="fromInputField" name="fromInputField" type="text" class="form-control text-white bg-transparent col-lg-10 col-7" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="0">
                            <div class="input-group-append col-lg-2 col-5 px-0">
                                <select id="from_coin" name="from_coin" class="form-control input-group-text" style="font-weight: 700; font-size: 12px;">
                                    <?php 
                                        foreach ($wallets as $key => $wallet) {
                                            # code...
                                            ?>
                                                <option balance="{{$wallet->balance}}" value="{{$wallet->wallet_type}}">{{$wallet->wallet_type}}</option>
                                            <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex" style="justify-content: space-between;"> 
                            <small>
                                <strong>Funds:</strong>
                                <span id="fundsInSmall">{{Auth::user()->main_balance}}</span>
                            </small>
                            <span id="swapAllBtn" class="badge badge-danger mt-2" style="cursor: pointer;">Swap All</span>
                        </div>
                        <div id="svgParent" class="text-center text-white mb-2">
                            <span id="loadingSpinner" class="spinner-border d-none" visible="no"></span>
                            <svg id="arrowSvg" visible="yes" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                        <div class="input-group mb-3">
                            <input id="toInputField" name="toInputField" type="text" class="form-control text-white bg-transparent col-lg-10 col-7" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="0.0000" readonly>
                            <div class="input-group-append col-lg-2 col-5 px-0">
                                <select id="to_coin" name="to_coin" class="form-control input-group-text" style="font-weight: 700; font-size: 12px;">
                                    <?php 
                                        for ($i=count($wallets)-1; $i >= 0; $i--) { 
                                            # code...
                                            ?>
                                                <option balance="{{$wallets[$i]->balance}}" value="{{$wallets[$i]->wallet_type}}">{{$wallets[$i]->wallet_type}}</option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mt-5 text-center mb-3">
                            <button id="submitButton" type="button" class="btn btn-primary col-lg-3 col-7 text-white" style="border-radius:5px;font-weight: 700;">SWAP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one px-1" style="height:auto;">
                <div class="w-chart">
                    <div class="w-chart-section w-100">
                        <div class="media mb-3">
                            <?php
                                if(is_null(Auth::user()->profile_img)){
                                    ?>
                                        <img src="/assets/img/90x90.jpg" class="img-fluid" alt="admin-profile" style="border-radius: 10px;">
                                    <?php
                                }
                                else{
                                    ?>
                                        <img src={{ asset('/storage/profile/'. Auth::user()->profile_img) }} class="img-fluid" alt="admin-profile" style="object-fit: cover;" style="border-radius: 10px;">
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="w-detail" style="position: relative;">
                            <p class="w-title mb-1" style="font-size: 16px;letter-spacing: 1.4px;">{{ Auth::user()->name }}</p>
                            <p class="mb-0">{{ Auth::user()->main_balance }} BTC</p>
                            <p class="text-danger">Current Funds</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('javascript')
    <script src="/js/swap.js"></script>
@endsection