window.makeATrade = async () => {
    
    let transactionId = uniqid('trx');
   
    let orderSubscription = pusher.subscribe('private-order-'+transactionId );
    orderSubscription.bind('DisplayOpenOrdersEvent', function(response) {
        displayOpenOrders(response.open_order);
    });

    setTimeout(() => {
        var date          =   new Date();
        var months        =   ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
        
        let data = {
            _token                      :   $('meta[name="csrf-token"]').attr('content'),
            date                        :   date.getDate()+" "+months[date.getMonth()]+" "+date.getFullYear(),
            open_time 				    : 	moment().format("hh:mm:ss A"),
            close_time 				    : 	close_time,
            timezone                    :   Intl.DateTimeFormat().resolvedOptions().timeZone,
            type 					    :   page_type,
            trade_pair 					: 	$('.from_coin').text() + '/' + $('.against_coin').text(),
            traded_crypto_amount 	    : 	$('#market_trade_amount').val() + ' ' + $('.from_coin').text(),
            traded_crypto_usd 	        : 	parseInt($('.from_amount > span').text()),
            trade_interval 				: 	interval,
            trade_leverage 				:   leverage,
            initiator 					: 	'user',
            trade_action  				:   $('#market_trade .selected_trade_action').text(),
            traded_amount_in_btc 		:   $('.against_amount').val(),
            uniqId                      :   transactionId
        }

        axios.post('/market/trade', data)
        .then(function (response) {
            if (response.status == 200) {
                ($('#overlay-x').attr('visibility') == 'yes')? $('#overlay-x').addClass('d-none') && $('#overlay-x').attr('visibility', 'no') : null;
                
                Swal.fire({
                    title: '',
                    text: "Your trade was placed successfully!",
                    icon: 'success',
                    padding: '2em'
                });
            
                $('#market_trade_amount, .against_amount').val('');
                $('.from_amount > span').text('0.00');
            
                $.each($('.market_interval_buttons > button'), function(){
                    ($(this).attr('visible') == 'yes') ? $(this).attr('visible', 'no') && $(this).removeClass('btn-primary') : null;
                });
            
                $.each($('.market_limit_buttons > button'), function(){
                    ($(this).attr('visible') == 'yes') ? $(this).attr('visible', 'no') && $(this).removeClass('btn-primary') : null;
                });
            } 
            else {
                alert('Something went wrong! Please contact the admin or try placing a trade again');
            }
        })
        .catch(function (error) {
            console.log(error);
        });
    }, 3000);

    
}