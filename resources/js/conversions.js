
const addCommas = (amount, price) => {
    let str = ((amount * price).toFixed(2)).split('.');
    (str[0].length >= 4) ? str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,'): null;
    return str.join('.');
};

const getCoinRate = (currency) => {
    $.get('https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref='+currency+'&symbol=BTC', function(response){
        $.each($('.info-detail-1'), function(){
            let el = $(this).find('data');
            $(this).find('data').text(addCommas(parseFloat($(el).attr('value')), response.price) + " " +currency);
        });
        
        $('.acc-amount').text( addCommas(parseFloat(user_balance), response.price ) + " " +currency);
    });
};


$('#switch_currency').on('change', function(){
    getCoinRate($(this).val());
});

// $(function() {
//     getCoinRate('USD');
// });