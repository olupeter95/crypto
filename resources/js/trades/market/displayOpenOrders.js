window.displayOpenOrders = (open_order) => {
        
    $('#open_orders_tbody').prepend(
        '<tr>'+
            '<td class="py-1 text-center oo_key">'+'</td>'+
            '<td class="py-1 text-center">'+open_order.transaction_id+'</td>'+
            '<td class="py-1 text-center">'+open_order.date+'</td>'+
            '<td class="py-1 text-center">'+open_order.open_time+'</td>'+
            '<td class="py-1 text-center">'+open_order.close_time+'</td>'+
            '<td class="py-1 text-center">'+open_order.pair+'</td>'+
            '<td class="py-1 text-center">'+open_order.amount_traded_btc+'</td>'+
            '<td class="py-1 text-center">BTC</td>'+
            '<td class="py-1 text-center">'+open_order.trade_interval+'</td>'+
            '<td class="py-1 text-center">'+open_order.trade_action+'</td>'+
            '<td id="trade_progress'+open_order.transaction_id+'" class="py-2 pr-0">'+
                '<div style="height : 10px; border-radius : 30px"></div>'+
                '<p class="text-center" style="font-weight: 700;"></p>'+
            '</td>'+
        '</tr>'
    );

    $.each($('#open_orders_tbody > tr'), function(i, v){
        $(this).find('.oo_key').text(parseInt(i) + 1);
    });

    let width   = 0;
    let minute  = '';
    let seconds = '';
    let hours   = '';
    switch (open_order.trade_interval) {
        case '1 min':
            minute  = '1';
            seconds = '02';
            progress_bar(minute, seconds, hours, open_order.trade_interval, open_order.transaction_id);
        break;
            
        case '3 mins':
            minute  = '3';
            seconds = '02';
            progress_bar(minute, seconds, hours, open_order.trade_interval, open_order.transaction_id);
        break;

        case '5 mins':
            minute  = '5';
            seconds = '02';
            progress_bar(minute, seconds, hours, open_order.trade_interval, open_order.transaction_id);
        break;

        case '30 mins':
            minute  = '30';
            seconds = '02';
            progress_bar(minute, seconds, hours, open_order.trade_interval, open_order.transaction_id);
        break;

        case '1 hr':
            hours   = '1';
            minute  = '00';
            seconds = '02';
            progress_bar(minute, seconds, hours, open_order.trade_interval, open_order.transaction_id);
        break;
    
        default:
        break;
    }

    function progress_bar(minute, seconds, hours, trade_interval, transaction_id) {
        $('#trade_progress'+transaction_id+' > div').css(
            {
                'background' : 'red'
            }
        );

        let duration = moment.duration({
            'hours' : hours,
            'minutes' : minute,
            'seconds' : seconds
        });

        let interval = 1;
        let timer = setInterval(function() {
            if (trade_interval == '1 min') {
                width = width + 1.666666;
            }
            else if (trade_interval == '3 mins') {
                width = width + 0.555555;
            }
            else if (trade_interval == '5 mins') {
                width = width + 0.33333;
            }
            else if (trade_interval == '30 mins') {
                width = width + 0.05555;
            }
            else if (trade_interval == '1 hr') {
                width = width + 0.0277777;
            }

            duration = moment.duration(duration.asSeconds() - interval, 'seconds');

            let min = duration.minutes();
            let sec = duration.seconds();

            sec -= 1;
            if (min < 0) return clearInterval(timer);
            if (min < 10 && min.length != 2) min = '0' + min;
            if (sec < 0 && min != 0) {
                min -= 1;
                sec = 59;
            }
            else if (sec < 10 && length.sec != 2) sec = '0' + sec;

            $('#trade_progress'+transaction_id+' > p').text(min + ':' + sec);
            if (width >= 100) {
                $('#trade_progress'+transaction_id+' > div').css({'width' : '100%'});
            }
            else{
                $('#trade_progress'+transaction_id+' > div').css({'width' : width + '%'});
            }

            if (min == 0 && sec == 0){
                clearInterval(timer);
                displayTradeStatus(transaction_id);
            }

        }, 1000);
    }
    
}