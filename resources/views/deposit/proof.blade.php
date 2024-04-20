@extends('layouts.app')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <form class="submit-deposit-proof" method="POST" action="/deposit/proof" enctype="multipart/form-data" novalidate>
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
                            <div class="col-lg-12 mx-auto">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Click The Image Below To Upload Proof Of Payment (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input name="proof_of_deposit" type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                            <div class="col-lg-7 mx-auto">
                                <div id="deposit-proof-warning" class="d-none alert alert-arrow-right alert-icon-right alert-light-danger mb-4" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg" data-dismiss="alert" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                        <line x1="12" y1="16" x2="12" y2="16"></line>
                                    </svg>
                                    <strong>Warning!</strong> You Must Upload Your Proof Of Deposit Before Proceeding!.
                                </div> 
                                <div class="form-group">
                                    <label for="coin_type" class="">Coin Type</label>
                                    <input name="coin_type" type="text" class="form-control" id="coin_type" aria-describedby="coin_type" value="<?php echo strtoupper($coin_name); ?>" readonly="">
                                    <input type="hidden" id="base_id" name="base_id" value="" >
                                </div>
                                <div class="form-group">
                                    <label for="coin_amount" class="">Coin Amount</label>
                                    <div class="input-group">
                                        <input name="coin_amount" type="text" class="form-control" placeholder="" value="" aria-label="" aria-describedby="basic-addon2" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon6">{{$symbol}}</span>
                                        </div>
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please fill the coin amount!
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="additional_information">Additional Information (Optional)</label>
                                    <textarea name="additional_information" class="form-control" id="additional_information" rows="3"></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-primary mb-2" type="submit">Upload Proof Of Payment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
