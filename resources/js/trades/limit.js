import Swal from 'sweetalert2';

const limitRow  = $('.limit_row');

$(limitRow).on('click', function(){
    let coin = $(this).find('.to_be_traded_coins_symbol').children()[0];
    $('#limit_box .from_alt_coin, #stop_limit_box .from_alt_coin').text($(coin).text());
    $('#limit_box .from_alt_coin, #stop_limit_box .from_alt_coin').attr('price', $(coin).attr('price'));
});

//When you click on the buy or sell button at the top of the limit box.
$('#limit_box .trade_action > button').on('click', function(){
    if($(this).attr('visible') != 'yes'){
        $.each($('#limit_box .trade_action > button'), function(){
            ($(this).attr('visible') == 'yes') ? $(this).attr('visible', 'no') : $(this).attr('visible', 'yes');
            $(this).toggleClass('btn-primary');
        });
        $('#limit_box .selected_trade_action').text($(this).text().toUpperCase());
    }
});

$('.limit_buttons > button').on('click', function(){
    $.each($('.limit_buttons > button'), function(){
        ($(this).attr('visible') == 'yes') ? $(this).attr('visible', 'no') && $(this).removeClass('btn-primary') : null;
    });

    if($(this).attr('visible') == 'no'){
        $(this).attr('visible', 'yes');
        $(this).addClass('btn-primary'); 
        window.limitLeverage = $(this).text();
    }
    else{
        $(this).attr('visible', 'no');
        $(this).removeClass('btn-primary');
    }
});

$('#limit_box .coin_price').on('input', function(){
    if(!$(this).val()){
        $('#limit_box .to_alt_coin > span').text('0.00');  
    }
    else{
        $('#limit_box .to_alt_coin > span').text(parseFloat($('#limit_box .from_alt_coin').attr('price')) * parseFloat($(this).val()) );    
    }
});

//When you finally decide to place a trade.
$('#limit_box .selected_trade_action').on('click', function(){
    limitAction();
});



const limitAction = async () => {
    const {data} = await axios.get('/api/account/balance/'+page_type+'/'+user_id);
    if(parseFloat(data.value) <= 0){
        Swal.fire({
            title: 'Oops!',
            text: "Your trade balance is not enough to make a trade. Please fund your account!",
            icon: 'warning',
            padding: '2em'
        });
    }
    else{
        ($('#overlay-x').attr('visibility') == 'no') ? $('#overlay-x').attr('visibility', 'yes') : $('#overlay-x').attr('visibility', 'no');
        $('#overlay-x').toggleClass('d-none');

        window.user_balance     = data.value;
        let limitData           = await getAccLim();
        let verifyTierLimitData = await verifyTierLimit(limitData);
        if (verifyTierLimitData == true) {
            await makeALimitTrade();   
        }
    }
}

const makeALimitTrade = async () => {
    let transactionId = uniqid('trx');

    var date          =   new Date();
    var months        =   ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

    switch (limitLeverage) {
        case '25%':
            window.traded_crypto_funds = user_balance * (25/100)
        break;

        case '50%':
            window.traded_crypto_funds = user_balance * (50/100)
        break;

        case '75%':
            window.traded_crypto_funds = user_balance * (75/100)
        break;

        case '100%':
            window.traded_crypto_funds = user_balance * (100/100)
        break;
    
        default:
        break;
    }
        
    let data = {
        _token                      :   $('meta[name="csrf-token"]').attr('content'),
        date                        :   date.getDate()+" "+months[date.getMonth()]+" "+date.getFullYear(),
        open_time 				    : 	moment().format("hh:mm:ss A"),
        timezone                    :   Intl.DateTimeFormat().resolvedOptions().timeZone,
        type 					    :   page_type,
        trade_pair 					: 	$('#limit_box .from_alt_coin').text() + '/USDT',
        traded_crypto_amount 	    : 	$('#limit_box .coin_price').val() + ' ' + $('#limit_box .from_alt_coin').text(),
        trade_leverage 				:   limitLeverage,
        limit                       :   $('#limit_box .limit_price').val(),
        initiator 					: 	'user',
        trade_action  				:   $('#limit_box .selected_trade_action').text(),
        traded_amount_in_btc 		:   traded_crypto_funds,
        uniqId                      :   transactionId
    }

    axios.post('/limit/trade', data)
    .then(function (response) {
        if (response.status == 200) {
            ($('#overlay-x').attr('visibility') == 'yes')? $('#overlay-x').addClass('d-none') && $('#overlay-x').attr('visibility', 'no') : null;
            
            Swal.fire({
                title: '',
                text: "Your trade was placed successfully!",
                icon: 'success',
                padding: '2em'
            });
        
            $('#limit_box .limit_price, #limit_box .coin_price').val('');
            $('#limit_box .to_alt_coin > span').text('0.00');  
        
            $.each($('.limit_buttons > button'), function(){
                ($(this).attr('visible') == 'yes') ? $(this).attr('visible', 'no') && $(this).removeClass('btn-primary') : null;
            });
        } 
        else {
            alert('Something went wrong! Please contact the admin or try placing a trade again');
        }
    })
    .catch(function (error) {
        let message = error.response.data
        console.log(message)
    });


}
