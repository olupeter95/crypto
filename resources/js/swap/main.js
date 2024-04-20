//From Coin is BTC
//To Coin is ETH
//https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref=ETH&symbol=BTC

import Swal from 'sweetalert2';
$('#fromInputField').on('input', function(){
    let amount      = $('#fromInputField').val();
    let fromCoin    = $('#from_coin').val();
    let toCoin      = $('#to_coin').val();

    $.each(wls, function(){
        if(this.wallet_type == fromCoin){
            let balance = parseFloat(this.balance);

            if (parseFloat(amount) > balance) {
                Swal.fire({
                    title: 'Warning!',
                    text: "Insufficient Funds!",
                    icon: 'warning',
                    padding: '2em'
                });
            } 
            else {
                $('#loadingSpinner, #arrowSvg').toggleClass('d-none');
                $.get('https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref='+toCoin+'&symbol='+fromCoin, function(response){
                    let total = parseFloat(response.price) * parseFloat($('#fromInputField').val());  
                    $('#loadingSpinner, #arrowSvg').toggleClass('d-none');    
                    $('#toInputField').val(total);    
                });
            }
        }
    });
});

$('#swapAllBtn').on('click', function(){
    console.log('you clicked on me')
    let fromCoin    = $('#from_coin').val();
    let toCoin      = $('#to_coin').val();
    
    $.each(wls, function(){
        if(this.wallet_type == fromCoin){
            let balance = parseFloat(this.balance);

            if (balance <= 0) {
                Swal.fire({
                    title: 'Warning!',
                    text: "Insufficient Funds!",
                    icon: 'warning',
                    padding: '2em'
                });
            } 
            else {
                $('#fromInputField').val(balance);
                $('#loadingSpinner, #arrowSvg').toggleClass('d-none');
                $.get('https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref='+toCoin+'&symbol='+fromCoin, function(response){
                    let total = parseFloat(response.price) * parseFloat(balance);  
                    $('#loadingSpinner, #arrowSvg').toggleClass('d-none');    
                    $('#toInputField').val(total);    
                });
            }
        }
    });
});


$('#submitButton').on('click', function(){
    if ($('#fromInputField').val() == '0') {
        Swal.fire({
            title: 'Warning!',
            text: "Input a swap amount!",
            icon: 'warning',
            padding: '2em'
        });
    }
    else{
        if ($('#from_coin').val() == $('#to_coin').val()) {
            Swal.fire({
                title: 'Warning!',
                text: "Coins to be swapped can't be the same!",
                icon: 'warning',
                padding: '2em'
            });
        } 
        else {            
            $('#swapForm').submit();
        }
    }
});