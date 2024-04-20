@extends('layouts.app3')

@section('content')

    <div class="row" style="justify-content: center;">
        <div id="tabsWithIcons" class="col-lg-6 mt-5 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row mt-4 mx-auto" style="justify-content: space-between; width:90%;">
                        <div class="">
                            <h4 class="pl-0">Cold Wallet Deposit Address</h4>
                        </div>
                        @if ($errors->any())
                            <div class="badge badge-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div>
                            <a id="viewQRCode" class="btn btn-primary d-none" data-toggle="collapse" href="#QrCodeDIV"
                                role="button" aria-expanded="false" aria-controls="QrCodeDIV">View QR Code</a>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area rounded-pills-icon" style="box-shadow: none;">
                    <div class="clipboard bg-transparent">
                        <form method="POST" id="fundsDepositForm" class="form-horizontal" action="/deposit-details">
                            @csrf
                            <div class="mb-0 mt-0">
                                <label style="font-size: 12px;">Select Coin</label>
                                <select id="switch_coin" class="form-control" name="wallet">
                                    <?php 
                                        foreach ($WalletAddresses as $key => $WalletAddress) {
                                            # code...
                                            ?>
                                    <option coin="{{ $WalletAddress->wallet_type }}" title="{{ $WalletAddress->kind->title }}" address="{{ $WalletAddress->address }}" value="{{ $WalletAddress->address }}">
                                        {{ $WalletAddress->wallet_type }}</option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                                <?php
                                $orderId = 'ord-' . uniqid();
                                ?>
                                <input type="hidden" name="email" value="{{ Auth::user()->email }}" />
                                <input type="hidden" name="orderId" value="{{ $orderId }}" />
                                <input type="hidden" name="notificationUrl" value="{{ URL::to('/api/callback') }}" />
                                <input type="hidden" name="redirectUrl" value="{{ URL::to('/deposit') }}" />

                            </div>
                         <div class="mb-0 mt-0">
                                <label style="font-size: 12px;">Network</label>
                                <select id="network" class="form-control text-primary" name="network" readonly>
                                    <option value="Bitcoin">BTC (Bitcoin)</option>
                                </select>
                             

                        </div>

                            <div class="collapse" id="QrCodeDIV">
                                <div class="qrcode text-center my-4">
                                    <img
                                        src="https://chart.googleapis.com/chart?cht=qr&amp;chs=200x200&amp;chl={{ $WalletAddresses[0]->address }}&amp;choe=UTF-8">
                                </div>
                            </div>
                            <div id="btcAmountRow" class="row mt-4">
                                <div class="col-12">
                                    <div class="d-flex" style="justify-content: space-between;">
                                        <label style="font-size: 12px;">Deposit Amount (In USD)</label>
                                        <label id="toBeBTC" style="font-size: 12px;">0 BTC</label>
                                    </div>
                                    <input type="text" class="form-control mb-0" id="btc_amount_field" name="amount"
                                        value="0">
                                    <div id="invalidErrorDIV" style="font-size: 12px;font-weight: bold;"
                                        class="text-danger mt-1"></div>
                                </div>
                            </div>
                            <div id="walletAddressRow" class="row d-none">
                                <div class="col-12">
                                    <input type="text" class="form-control mb-4" id="wallet_address_field"
                                        value="{{ $WalletAddresses[0]->address }}" readonly="">
                                </div>
                                <div class="col-12">
                                    <a class="mb-2 btn btn-primary" href="javascript:;" data-clipboard-action="copy"
                                        data-clipboard-target="#wallet_address_field">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy">
                                            <rect x="9" y="9" width="13" height="13" rx="2"
                                                ry="2"></rect>
                                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                        </svg> Copy Wallet Address
                                    </a>
                                </div>
                            </div>
                            <p class="mt-5">
                                <small id="whenYouSure" class="d-none" style="color:#fb9300; font-size: 70%;">Click the
                                    button below when you are sure you have credited the above wallet address</small>
                            <div>
                                <input id="" type="submit" class="btn btn-outline-primary mb-2 mt-2"
                                    value="Make Deposit">

                                <a href="javascript:void(0);" class="ml-3" data-toggle="modal"
                                    data-target="#comingSoonModal">
                                    <img src="cf/visa.png" alt="Visa Payment Method">
                                </a>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#comingSoonModal">
                                    <img src="cf/mc.png" alt="Mastercard Payment Method">
                                </a>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#comingSoonModal">
                                    <img src="cf/paypal.png" alt="Paypal Payment Method">
                                </a>
                            </div>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-notification" id="comingSoonModal" tabindex="-1" role="dialog"
        aria-labelledby="comingSoonModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" id="comingSoonModalLabel">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="icon-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </div>
                    <p class="modal-text">This feature is not available at the moment. Please check back later.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
