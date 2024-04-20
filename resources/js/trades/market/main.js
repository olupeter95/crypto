
window.Swal     = require('sweetalert2');
window.Pusher   = require('pusher-js');
window.axios    = require('axios');
window.moment   = require('moment');
window.uniqid   = require('uniqid');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token       = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} 

window.pusher = new Pusher(process.env.MIX_PUSHER_APP_KEY, {
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    authEndpoint: '/api/broadcast/auth',
    forceTLS: true,
    auth: {
        headers: {
            'X-CSRF-Token': token.content
        }
    }
});

// Pusher.logToConsole = true;

require('./getAccBal');
require('./getAccLim');
require('./verifyTierLimit');
require('./makeATrade');
require('./displayOpenOrders');
require('./displayTradeStatus');
require('./displayUserBalance');
require('./displayRunningOrdersAfterRefresh');


window.tradeAction = async () => {
    let userData = await getAccBal();
    if(userData.value <= 0){
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

        window.user_balance     = userData.value;
        let limitData           = await getAccLim();
        let verifyTierLimitData = await verifyTierLimit(limitData);
        if (verifyTierLimitData == true) {
            //let transactionId       = await subscribeToOpenOrdersChannel();
            await makeATrade();   
        }
    }
}



$(function(){
    setTimeout(() => {
        if (window.open_orders.length > 0) {
            axios.get('/ret/Opr/'+page_type)
            .then((response) => {
                if (response.status == 200) {
                }
            }).catch(function (error) {
                console.log(error);
            });
        }
    }, 4000);
    
});

 /*
    Steps:
    1. Get the user's account balance
    2. Run a check to see if the balance is enough to make a trade or not
    3. If its not enough return an error message
    4. If its enough, get the user's account limit for the day.
    5. Then check if the limit for the day has been exceeded or not.
    6. If the limit has been exceeded, then return an error message and do not proceed to make a trade
    7. Else proceed to make the trade
*/



