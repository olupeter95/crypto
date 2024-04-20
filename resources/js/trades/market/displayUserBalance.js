$(function () {
    var userSubscription = pusher.subscribe('private-user-balance-info'+window.user_id);
    userSubscription.bind('DisplayUserDataEvent', function(response) {
        let retval = response.data.value;
        console.log(retval);
        $('.theBtcBalance').text(retval.btc);
        $('.available-btc').text(retval.btc + ' BTC');
        $('.theBtcBalance, .acc-amount, .available-btc').attr('value', retval.btc);

        $('.theUsdBalance, .acc-amount, .available-usd').text(retval.usd);
        $('.theUsdBalance').attr('value', retval.usd);
    }); 

    var earningSubscription = pusher.subscribe('private-earning-'+window.user_id);
    earningSubscription.bind('DisplayEarningsEvent', function(response) {
        $('#earnings_display > div').last().remove();
        let status = '';          
        if(response.earning.status == 'LOSS'){
            status += '<div class="t-rate rate-dec"><p>';   
            status += '<span>-$'+response.earning.expected_return+'</span>';
            status += '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down">';
            status += '<line x1="12" y1="5" x2="12" y2="19"></line>';
            status += '<polyline points="19 12 12 19 5 12"></polyline></svg></p></div>';
        }
        else{
            status +=  '<div class="t-rate rate-inc"><p>';     
            status +=  '<span>+$'+response.earning.expected_return+'</span>';
            status +=  '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up">';
            status +=  '<line x1="12" y1="19" x2="12" y2="5"></line>';
            status +=  '<polyline points="5 12 12 5 19 12"></polyline></svg></p></div>';                                        
        }

        let trtype = (response.earning.trade_type = 'LIVE') ? 'LT' : 'DT' ;

        $('#earnings_display').prepend(
            '<div class="transactions-list">'+
                '<div class="t-item">'+
                    '<div class="t-company-name">'+
                        '<div class="t-icon">'+
                            '<div class="avatar avatar-xl">'+
                                '<span class="avatar-title rounded-circle">'+trtype+'</span>'+
                            '</div>'+
                        '</div>'+
                        '<div class="t-name">'+
                            '<h4>'+response.earning.transaction_id+'</h4>'+
                            '<p class="meta-date">'+response.earning.created_at+'</p>'+
                        '</div>'+
                    '</div>'+
                    status+
                '</div>'+
            '</div>'
        );
    }); 
});
