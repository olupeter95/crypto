//When you click on the buy or sell button at the top of the market box.
$('#market_trade .trade_action > button').on('click', function(){
    if($(this).attr('visible') != 'yes'){
        $.each($('#market_trade .trade_action > button'), function(){
            ($(this).attr('visible') == 'yes') ? $(this).attr('visible', 'no') : $(this).attr('visible', 'yes');
            $(this).toggleClass('btn-primary');
        });
        $('#market_trade .selected_trade_action').text($(this).text().toUpperCase());
    }
});

//when you click on a disable leverage button
$('.market_limit_buttons button[disabled]').on('click', function () {
    Swal.fire({
        title: 'Oops!',
        text: "Trade limit Exceeded. Upgrade Plan!",
        icon: 'warning',
        padding: '2em',
        confirmButtonText: "Upgrade Plan"
    }).then( () => {
        // Redirect to user/wallet
        window.location.href = '/plans';
    });
});

//When you select a trade limit be it 2x, 5x, 10x or 20x.
$('.market_limit_buttons > button').on('click', function(){
    $.each($('.market_limit_buttons > button'), function(){
        ($(this).attr('visible') == 'yes') ? $(this).attr('visible', 'no') && $(this).removeClass('btn-primary') : null;
    });

    if($(this).attr('visible') == 'no'){
        $(this).attr('visible', 'yes');
        $(this).addClass('btn-primary'); 
        window.leverage = $(this).text();
    }
    else{
        $(this).attr('visible', 'no');
        $(this).removeClass('btn-primary');
    }
});

//When you select a trade time interval be it 1min, 3mins, 5mins, 30mins, 1hr.
$('.market_interval_buttons > button').on('click', function(){
    $.each($('.market_interval_buttons > button'), function(){
        ($(this).attr('visible') == 'yes') ? $(this).attr('visible', 'no') && $(this).removeClass('btn-primary') : null;
    });

    if($(this).attr('visible') == 'no'){
        $(this).attr('visible', 'yes');
        $(this).addClass('btn-primary'); 
        window.interval = $(this).text();

        if (interval == '1 min') {
            window.close_time = moment().add(1, 'minutes').format("h:mm:ss a");
        }
        else if (interval == '3 mins') {
            window.close_time = moment().add(3, 'minutes').format("h:mm:ss a");
        }
        else if (interval == '5 mins') {
            window.close_time = moment().add(5, 'minutes').format("h:mm:ss a");
        }
        else if (interval == '30 mins') {
            window.close_time = moment().add(30, 'minutes').format("h:mm:ss a");
        }
        else if (interval == '1 hr') {
            window.close_time = moment().add(1, 'hours').format("h:mm:ss a");
        }
    }
});

$('#market_trade_amount').on('input', function(){
    let fv              = parseFloat($('span.from_coin').attr('value'));
    let cv              = parseFloat($('label.against_coin').attr('value'));
    let trade_amount    = $(this).val();
    let from_amount     = parseInt(fv * parseFloat(trade_amount));
    let against_amount  = from_amount/cv;
    let dam             = 0.00;

    /*
        dam stands for default against amount
    */

    if(!$(this).val()){
        $('.from_amount > span').text(dam);
        $('.against_amount').val('');
    }
    else{
        $('.from_amount > span').text(from_amount.toFixed(4));
        $('.against_amount').val(against_amount.toFixed(4));
    }

    if(from_amount < 200){
        $('.radio_amount').text('200');
        $('.alert_operator').text('lesser');

        ($('#market_input_box > .alert').attr('visible') == 'no') ? $('#market_input_box > .alert').attr('visible', 'yes') && $('#market_input_box > .alert').removeClass('d-none') : null;
        $('#market_trade .selected_trade_action').addClass('disabled');
    }
    else if(from_amount > 10000){
        $('.radio_amount').text('10000');
        $('.alert_operator').text('greater');

        ($('#market_input_box > .alert').attr('visible') == 'no') ? $('#market_input_box > .alert').attr('visible', 'yes') && $('#market_input_box > .alert').removeClass('d-none') : null;
        $('#market_trade .selected_trade_action').addClass('disabled');
    }
    else{
        ($('#market_input_box > .alert').attr('visible') == 'yes') ? $('#market_input_box > .alert').attr('visible', 'no') && $('#market_input_box > .alert').addClass('d-none') : null;
        $('#market_trade .selected_trade_action').removeClass('disabled');
    }
});

//When you finally decide to place a trade.
$('#market_trade .selected_trade_action').on('click', function(){
    tradeAction();
});

/*
    =============================================================
        Get the live value of a coin as rendered in the system
    =============================================================
*/
const getCurrencyValue = (symbol, elem) => {
    $(elem).text(symbol);
    $.get('/api/currency/'+symbol, function(response){
        (response.success == 'true') ? $(elem).attr('value', response.value) : console.log('An error occured!')
    });
};

getCurrencyValue('ETH', 'span.from_coin');
getCurrencyValue('BTC', 'label.against_coin');

$('.clickable-row').on('click', function () {
    $('#market_trade_amount, .against_amount').val('');
    $('span.from_amount > span').text('0.00');

    getCurrencyValue($(this).find('span.t_from').text(), '#market_trade .from_coin');
    getCurrencyValue($(this).find('span.t_to').text(), '#market_trade .against_coin');
    
    new TradingView.widget(
        {
            "autosize": true,
            //"width": 980,
            //"height": 350,
            "symbol": $(this).find('span.t_from').text() + $(this).find('span.t_to').text(),
            "interval": "D",
            "timezone": "Etc/UTC",
            "theme": theme,
            "style": "5",
            "locale": "en",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "allow_symbol_change": true,
            "save_image": false,
            "hotlist": true,
            "container_id": "tradingview_35f2bc"
        }
    );

});