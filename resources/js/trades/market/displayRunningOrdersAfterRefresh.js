
$(function(){
    var runningOrderSubscription = pusher.subscribe('private-running-order-'+window.user_id);
    runningOrderSubscription.bind('DisplayRunningOpenOrdersEvent', function(response) {
        let open_orders = response.open_order;
        $.each(open_orders, function(i, v){
            let elId = '#trade_progress'+v.transaction_id;
            if($(elId).length == 0){
                $('#open_orders_tbody').append(
                    '<tr>'+
                        '<td class="py-1 text-center oo_key">'+'</td>'+
                        '<td class="py-1 text-center">'+v.transaction_id+'</td>'+
                        '<td class="py-1 text-center">'+v.date+'</td>'+
                        '<td class="py-1 text-center">'+v.open_time+'</td>'+
                        '<td class="py-1 text-center">'+v.close_time+'</td>'+
                        '<td class="py-1 text-center">'+v.symbol_traded+'</td>'+
                        '<td class="py-1 text-center">'+v.amount_traded_btc+'</td>'+
                        '<td class="py-1 text-center">BTC</td>'+
                        '<td class="py-1 text-center">'+v.trade_interval+'</td>'+
                        '<td class="py-1 text-center">'+v.action+'</td>'+
                        '<td id="trade_progress'+v.transaction_id+'" class="py-2 pr-0">'+
                            '<div style="height : 10px; border-radius : 30px"></div>'+
                            '<p class="text-center" style="font-weight: 700;"></p>'+
                        '</td>'+
                    '</tr>'
                );
            
                $.each($('#open_orders_tbody > tr'), function(i, v){
                    $(this).find('.oo_key').text(parseInt(i) + 1);
                });
        
                let w          =   0;
                let NowMoment  = moment().format("h:mm:ss a");
                let remTime    = (moment(v.close_time, 'h:mm:ss a').diff(moment(NowMoment, 'h:mm:ss a'), 'milliseconds'));
                let elpsTime   = (moment(NowMoment, 'h:mm:ss a').diff(moment(v.open_time, 'h:mm:ss a'), 'seconds'));
                
                if (remTime < 0) {
        
                }
                else if (remTime > 0) {
                    $('#trade_progress'+v.transaction_id+' > div').css(
                        {
                            'background' : '#fb6340'
                        }
                    );
        
                    let mins        = Math.floor((remTime % (1000 * 60 * 60)) / (1000 * 60));
                    let secs        = Math.floor((remTime % (1000 * 60)) / 1000);
                    let elpsSecs    = Math.floor((elpsTime % (1000 * 60)) / 1000);
        
                    if (v.trade_interval == '1 min') {
                        w = (elpsTime * 1.666666);
                    }
                    else if (v.trade_interval == '3 mins') {
                        w = (elpsTime * 0.555555);
                    }
                    else if (v.trade_interval == '5 mins') {
                        w = (elpsTime * 0.33333);
                    }
                    else if (v.trade_interval == '30 mins') {
                        w = (elpsTime * 0.05555);
                    }
                    else if (v.trade_interval == '1 hr') {
                        w = (elpsTime * 0.0277777);
                    }
        
                    var interval    = 1;
                    var dur         = moment.duration({
                        'minutes'   : mins,
                        'seconds'   : secs
                    });
        
                    var t           = setInterval(function() {
                        if (v.trade_interval == '1 min') {
                            w = w + 1.666666;
                        }
                        else if (v.trade_interval == '3 mins') {
                            w = w + 0.555555;
                        }
                        else if (v.trade_interval == '5 mins') {
                            w = w + 0.33333;
                        }
                        else if (v.trade_interval == '30 mins') {
                            w = w + 0.05555;
                        }
                        else if (v.trade_interval == '1 hr') {
                            w = w + 0.0277777;
                        }
        
                        dur       = moment.duration(dur.asSeconds() - interval, 'seconds');
                        var m     = dur.minutes();
                        var s     = dur.seconds();
        
                        s -= 1;
                        if (m < 0){
                            clearInterval(t);
                        }
                        if (m < 10 && m.length != 2){
                            m = '0' + m;
                            
                        }
                        if (s < 0 && m != 0) {
                            m -= 1;
                            s = 59;
                        } 
                        else if (s < 10 && s.length != 2){
                            s = '0' + s;
                        }
        
                        $('#trade_progress'+v.transaction_id+' > p').text(m + ':' + s);
                        if (w >= 100) {
                            $('#trade_progress'+v.transaction_id+' > div').css({'width' : '100%'});
                        }
                        else{
                            $('#trade_progress'+v.transaction_id+' > div').css({'width' : w + '%'});
                        }
        
                        if (m == 0 && s == 0){
                            clearInterval(t);
                            displayTradeStatus(v.transaction_id);
                        }
                        
                    }, 1000);
        
                }
            }
        });
    }); 
});



