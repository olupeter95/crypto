<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coinshape | </title>
    <!-- Scripts -->

    <link rel="icon" href="/main/images/favicon.png" type="image/png">
</head>
<body>
    <a href="{{$link}}">Click here to make payment</a>
    {{-- <form action="https://www.coinpayments.net/index.php" method="post" target="_top">
        <input type="hidden" name="cmd" value="_pos">
        <input type="hidden" name="reset" value="1">
        <input type="hidden" name="merchant" value="fda6a9389613cf0b3660a818aa3f831b">
        <input type="hidden" name="currency" value="USD">
        <input type="hidden" name="amountf" value="7.00">

        <input type="hidden" name="allow_amount" value="0">
        <input type="hidden" name="item_number" value="sfjdfsj">

        <input type="hidden" name="success_url" value="{{URL::to('/')}}">
        <input type="hidden" name="cancel_url" value="{{URL::to('/deposit')}}">

        <input type="hidden" name="allow_currency" value="0">
        <input type="hidden" name="ipn_url" value="https://coinshape.com/api/deposit-callback">
        <input type="hidden" name="email" value="{{Auth::user()->email}}">
        
        <input type="hidden" name="item_name" value="Coinshape BTC Deposit">	
        <button type="submit">Submit</button>
    </form> --}}
</body>
</html>