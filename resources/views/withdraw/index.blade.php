@extends('layouts.app')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12">

            <form class="submit-withdrawal-request" method="POST" action="/withdraw" novalidate>
                @csrf
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4></h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-lg-7 mx-auto">
                                @if (Session::has('msg'))
                                <div class="alert alert-danger font-weight-bold text-center">
                                    {{ Session::get('msg') }}
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="destination_address" class="">Destination BTC Address <small>(Please double check this address)</small></label>
                                    <input name="destination_address" type="text" class="form-control" id="destination_address" aria-describedby="destination_address" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please fill the destination address!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="withdrawal_amount" class="">Amount BTC <small>(Maximum amount withdrawable <?php echo Auth::user()->main_balance; ?> BTC)</small></label>
                                    <div class="input-group">
                                        <input name="withdrawal_amount" type="text" class="form-control" placeholder="0.00" aria-label="" aria-describedby="basic-addon2" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon6">BTC</span>
                                        </div>
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please fill the amount to be withdrawn!
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="coin_type" class="">Bitcoin Network Fee (BTC) <small>(Transactions on the Bitcoin network are priorirized by fees)</small></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" aria-label="" aria-describedby="basic-addon2" value="0.0005" disabled="">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon6">BTC</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary mb-2">Withdraw Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
