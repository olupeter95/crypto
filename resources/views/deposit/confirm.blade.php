@extends('layouts.app3')

@section('content')
<div class="alert alert-info">Send <strong> ${{$amount}}</strong>  to the <strong>{{$wallet->wallet_type}}</strong> address provided and submit your proof of payment details for fast confirmation
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header border-0">
                {{-- <h4 class="mb-0 text-black fs-20">{{__('Proof of Payment')}}</h4> --}}
                <div class="authent-logo">
                    <h5 class="text-center p-2">Deposit Details</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="my-profile">
                        <img src={{"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=".$wallet->address}} alt="{{__('Qr Code')}}" class="img img-fluid">
                    </div>
                    <h4 class="mt-3 font-w600 text-white mb-0 name-text">{{$wallet->address}}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header border-0">
                {{-- <h4 class="mb-0 text-black fs-20">{{__('Proof of Payment')}}</h4> --}}
                <div class="authent-logo">
                    <h5 class="text-center p-2">Proof of Payment</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="post" action="/deposit-confirm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="coin_type" value="{{$wallet->wallet_type}}">
                        <input type="hidden" name="coin_amount" value="{{$amount}}">
                        <input type="hidden" name="network" value="{{$network}}">
                        <input type="hidden" id="base_id" name="base_id" value="" >

                    
                        <div class="form-group mb-3">
                            <label for="proof">{{__('Proof Of Payment')}}</label>
                            <input accept="image/jpeg,image/jpg,image/png,image/gif" type="file" class="form-control" name="proof_of_deposit" id="proof">
                        </div>
                        <div class="form-group mb-3">
                            <label for="sending_address">{{__('Additional Details')}}</label>
                            <textarea name="additional_information" class="form-control" id="additional_information" rows="4"></textarea>
                        </div>
                        <input type="submit" value="{{__('Submit')}}" class="btn btn-primary mt-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   
@endsection


<script>
    var coin_name = '<?php echo $wallet->wallet_type; ?>';
    $.getJSON('https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref=BTC&symbol='+coin_name, function(response){
                $('#base_id').val(response.price);
            });

</script>