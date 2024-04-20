// window.$ = window.jQuery = require('jquery');

window.dt = require( 'datatables.net' );
import moment from 'moment';
let botName = $('#mediaObjectNotationIcon h4').attr('botName');


// t.fnAddData( );
//     data: [
        
//         [ "Garrett Winters", "Accountant", "Tokyo", "8422", "2011/07/25", "$170,750", "5421", "2011/04/25", "$320,800" ],
//         [ "Ashton Cox", "Junior Technical Author", "San Francisco", "1562", "2009/01/12", "$86,000", "5421", "2011/04/25", "$320,800" ],
//         [ "Cedric Kelly", "Senior Javascript Developer", "Edinburgh", "6224", "2012/03/29", "$433,060", "5421", "2011/04/25", "$320,800" ],
//         [ "Airi Satou", "Accountant", "Tokyo", "5407", "2008/11/28", "$162,700", "5421", "2011/04/25", "$320,800" ],
//         [ "Brielle Williamson", "Integration Specialist", "New York", "4804", "2012/12/02", "$372,000", "5421", "2011/04/25", "$320,800" ],
//         [ "Herrod Chandler", "Sales Assistant", "San Francisco", "9608", "2012/08/06", "$137,500", "5421", "2011/04/25", "$320,800" ],  
//         [ "Garrett Winters", "Accountant", "Tokyo", "8422", "2011/07/25", "$170,750", "5421", "2011/04/25", "$320,800" ],
//         [ "Ashton Cox", "Junior Technical Author", "San Francisco", "1562", "2009/01/12", "$86,000", "5421", "2011/04/25", "$320,800" ],
//         [ "Cedric Kelly", "Senior Javascript Developer", "Edinburgh", "6224", "2012/03/29", "$433,060", "5421", "2011/04/25", "$320,800" ],
//         [ "Airi Satou", "Accountant", "Tokyo", "5407", "2008/11/28", "$162,700", "5421", "2011/04/25", "$320,800" ],
//         [ "Brielle Williamson", "Integration Specialist", "New York", "4804", "2012/12/02", "$372,000", "5421", "2011/04/25", "$320,800" ],
//         [ "Herrod Chandler", "Sales Assistant", "San Francisco", "9608", "2012/08/06", "$137,500", "5421", "2011/04/25", "$320,800" ], 
//     ],
// });

$('#html5-extension002_wrapper > div > div:nth-child(1), #html5-extension002_length, #html5-extension002_filter, #html5-extension002_paginate, #html5-extension002_info').addClass('d-none');

$('.insertTrades button').on('click', function(){
    if(!$('#trade_signals').val()){
        alert("Please input trades in the box before clicking on the insert button!");
    }
    else{
        $('#load_screen').removeClass('d-none');
        $.when(
            /* 
                This is to split each of the trade signals inputted into the text area
            */
            $.each($('#trade_signals').val().split(/\n/), function (i, signal) {
                if (signal) {
                    let spliced_signal  = signal.split('|');
                    let in_usd          = spliced_signal[0].trim();
                    let interval        = spliced_signal[1].trim();
                    let leverage        = spliced_signal[2].trim();
                    let symbols         = spliced_signal[3].trim();
                    let trade_type      = spliced_signal[4].trim();
                    let in_crypto       = spliced_signal[5].trim();
                    let from_coin       = symbols.split('/')[0];
                    let against_coin    = symbols.split('/')[1];

                    var date            =   new Date();
                    var months          =   ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

                    $.get('/api/symbol/'+from_coin+'/'+against_coin, function(response){
                        if(response.success == 'true'){
                            let tbp = {
                                _token                      :   $('meta[name="csrf-token"]').attr('content'),
                                date                        :   date.getDate()+" "+months[date.getMonth()]+" "+date.getFullYear(),
                                open_time 				    : 	moment().format("h:mm:ss a"),
                                close_time 				    : 	close_time(interval),
                                type 					    :   'LIVE',
                                trade_pair 					: 	symbols,
                                traded_crypto_amount 	    : 	in_crypto,
                                traded_crypto_usd 	        : 	in_usd.split(' ')[0],
                                trade_interval 				: 	interval,
                                trade_leverage 				:   leverage,
                                initiator 					: 	botName,
                                trade_action  				:   trade_type,
                                traded_amount_in_btc 		:   parseInt( parseFloat(response.fv) * parseFloat(in_crypto.split(' ') [0]) )/parseFloat(response.av),
                            }  

                            $.post("/tps/save/trades", tbp, function(response){
                            });
                        }
                    });  
                }
            }),
        
        ).then(function() {
            let timeframe = $('#trade_signals').val().split(/\n/).length;
            var counter = 0;
            var tinterval = setInterval(function() {
                counter++;
                // Display 'counter' wherever you want to display it.
                if (counter == timeframe + 1) {
                    $('#trade_signals').val('');
                    if($('#load_screen').addClass('d-none')){
                        alert('All Trades Inserted Successfully!');
                        location.reload();
                    }
                    clearInterval(tinterval);
                }
            }, 1000);
        });

        function close_time(interval) {
            if (interval == '1 min') {
                return moment().add(1, 'minutes').format("h:mm:ss a");
            }
            else if (interval == '3 mins') {
                return moment().add(3, 'minutes').format("h:mm:ss a");
            }
            else if (interval == '5 mins') {
                return moment().add(5, 'minutes').format("h:mm:ss a");
            }
            else if (interval == '30 mins') {
                return moment().add(30, 'minutes').format("h:mm:ss a");
            }
            else if (interval == '1 hr') {
                return moment().add(1, 'hours').format("h:mm:ss a");
            }
        }
    }
});

$('#autoTradeButton').on('click', function(){
    $('#load_screen').removeClass('d-none');
    run_trade();
});

function run_trade() {
    var date            =   new Date();
    var months          =   ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

    let tbp = {
        _token                      :   $('meta[name="csrf-token"]').attr('content'),
        date                        :   date.getDate()+" "+months[date.getMonth()]+" "+date.getFullYear(),
        open_time 				    : 	moment().format("h:mm:ss a"),
        one_min 				    : 	moment().add(1, 'minutes').format("h:mm:ss a"),
        three_mins 					:   moment().add(3, 'minutes').format("h:mm:ss a"),
        five_mins 					: 	moment().add(5, 'minutes').format("h:mm:ss a"),
        thirty_mins 	            : 	moment().add(30, 'minutes').format("h:mm:ss a"),
        one_hour 	                : 	moment().add(1, 'hours').format("h:mm:ss a"),
    }  

    $.post("/tps/start/trades", tbp, function(response){
        $('#promptModal p').attr('trades', 0);
        $('#promptModal').modal('hide');
        $('#html5-extension002 td.dataTables_empty').parent().addClass('d-none');
        $('#load_screen, #html5-extension002_wrapper > div.row > div[class^="col-"]:last-child, #html5-extension002_filter').addClass('d-none');
        alert('All saved trades have been started successfully!');
        $.each($('.tbDisplayed'), function(){
            if($(this).attr('visible') == 'yes'){
                $(this).attr('visible', 'no');
                $(this).addClass('d-none');
            }
        });

        $('.openOrders').attr('visible', 'yes');
        $('.openOrders').removeClass('d-none');

        // i++;      
        //         console.log(i);              //  increment the counter
        //         if (i < response.length) {  
        //             console.log(i, 'less than');         //  if the counter < 10, call the loop function
        //             myLoop();             //  ..  again which will trigger another 
        //         }     
        //         else{
        //             console.log(i, 'greater than');         //  if the counter < 10, call the loop function
        //         }

        
        var i = 1;                  //  set your counter to 1
        loco(i);

        function myLoop() {  
            i++;       //  create a loop function
            setTimeout(function() {   //  call a 3s setTimeout when the loop is called
                loco(i);  //  your code here
                myLoop();            //  ..  setTimeout()
            }, 3000)
        }

           
        function loco(i) {
            
            $('.openOrders tbody').prepend(
                '<tr>'+
                    '<td class="text-center tdkey"></td>'+
                    '<td class="text-center">'+response[i].transaction_id+'</td>'+
                    '<td class="text-center">'+response[i].date+'</td>'+
                    '<td class="text-center">'+response[i].open_time+'</td>'+
                    '<td class="text-center">'+response[i].pair+'</td>'+
                    '<td class="text-center">'+response[i].amount_traded_btc+'</td>'+
                    '<td class="text-center">'+response[i].trade_interval+'</td>'+
                    '<td class="text-center py-2 px-4" id="trade_progress'+response[i].transaction_id+'">'+
                        '<div style="height : 10px; border-radius : 30px"></div>'+
                        '<p class="text-center" style="font-weight: 700;"></p>'+
                    '</td>'+
                    '<td id="trade_status'+response[i].transaction_id+'" class="py-2 text-center">'+
                        '<svg version="1.1" id="L5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve" style="width: 40px;height: 40px;">'+
                            '<circle fill="#fff" stroke="none" cx="6" cy="50" r="6">'+
                                '<animateTransform attributeName="transform" dur="1s" type="translate" values="0 15 ; 0 -15; 0 15" repeatCount="indefinite" begin="0.1"></animateTransform>'+
                            '</circle>'+
                            '<circle fill="#fff" stroke="none" cx="30" cy="50" r="6">'+
                                '<animateTransform attributeName="transform" dur="1s" type="translate" values="0 10 ; 0 -10; 0 10" repeatCount="indefinite" begin="0.2"></animateTransform>'+
                            '</circle>'+
                            '<circle fill="#fff" stroke="none" cx="54" cy="50" r="6">'+
                                '<animateTransform attributeName="transform" dur="1s" type="translate" values="0 5 ; 0 -5; 0 5" repeatCount="indefinite" begin="0.3"></animateTransform>'+
                            '</circle>'+
                        '</svg>'+
                    '</td>'+
                '</tr>'
            );
    
            let width   = 0;
            let minute  = '';
            let seconds = '';
            switch (response[i].trade_interval) {
                case '1 min':
                    minute  = '1';
                    seconds = '02';
                    progress_bar(width, minute, seconds, 0, response[i].trade_interval, response[i].transaction_id);
                break;
                    
                case '3 mins':
                    minute  = '3';
                    seconds = '02';
                    progress_bar(width, minute, seconds, 0, response[i].trade_interval, response[i].transaction_id);
                break;
    
                case '5 mins':
                    minute  = '5';
                    seconds = '02';
                    progress_bar(width, minute, seconds, 0, response[i].trade_interval, response[i].transaction_id);
                break;
    
                case '30 mins':
                    minute  = '30';
                    seconds = '02';
                    progress_bar(width, minute, seconds, 0, response[i].trade_interval, response[i].transaction_id);
                break;
    
                case '1 hr':
                    minute  = '59';
                    seconds = '59';
                    progress_bar(width, minute, seconds, 0, response[i].trade_interval, response[i].transaction_id);
                break;
            
                default:
                break;
            }      
    
            $.each($('.openOrders tbody tr'), function(i, v){
                $(v).find('td.tdkey').text(i+1);
            });
        }

        myLoop();

        function progress_bar(width, minute, seconds, hours, trade_interval, transaction_id) {
            $('#trade_progress'+transaction_id+' > div').css(
                {
                    'background' : '#21bf73'
                }
            );

            let duration = moment.duration({
                'hours' : hours,
                'minutes' : minute,
                'seconds' : seconds
            });

            var interval = 1;
            var timer = setInterval(function() {
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

                var min = duration.minutes();
                var sec = duration.seconds();
                var hr = duration.hours();

                // sec -= 1;
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
                    trade_status(transaction_id);
                }

            }, 1000);
        }

        function trade_status(transaction_id){
            $.get('/market/'+transaction_id+'/status', function(response){
                console.log(response);
                if(response.success == 'true'){
                    $('.theBtcBalance').text(response.earning.balance);
                    $('.available-btc').text(response.earning.balance + ' BTC');
                    $('.theBtcBalance, .acc-amount, .available-btc, .available-usd').attr('value', response.earning.balance);

                    $('.theUsdBalance, .acc-amount, .available-usd').text(response.earning.usd_balance);
                    $('.theUsdBalance').attr('value', response.earning.usd_balance);

                    if(response.status == 'LOSS'){
                        $('#trade_progress'+transaction_id+' > p').addClass('d-none');
                        $('#trade_progress'+transaction_id+' > div').css(
                            {
                                'background' : 'red'
                            }
                        );
                        $('#trade_status'+transaction_id).empty();
                        $('#trade_status'+transaction_id).append(
                            '<button class="btn btn-sm text-white" style="border-color: red;background: red;font-weight: bold;">LOSS</button>'
                        );
                    }
                    else{
                        $('#trade_progress'+transaction_id+' > p').addClass('d-none');
                        $('#trade_progress'+transaction_id+' > div').css(
                            {
                                'background' : '#57ad34'
                            }
                        );
                        $('#trade_status'+transaction_id).empty();
                        $('#trade_status'+transaction_id).append(
                            '<button class="btn btn-sm text-white" style="border-color: #57ad34;background: #57ad34;font-weight: bold;">PROFIT</button>'
                        );
                    }
                }
            });
        }
    });
}