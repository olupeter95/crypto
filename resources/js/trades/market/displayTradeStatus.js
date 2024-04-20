window.displayTradeStatus = (transaction_id) => {
    axios.get('/market/'+transaction_id+'/status')
    .then((response) => {
        if (response.status == 200) {
            $('#trade_progress'+transaction_id).empty();
            let btnCol = (response.data.status == 'LOSS') ? 'btn-danger': 'btn-success';
         
            $('#trade_progress'+transaction_id).append(
                '<button class="btn btn-sm '+btnCol+'">'+response.data.status+'</button>'
            );
        }
        else {
            alert('An error occured in completing your trade! Please contact the admin');
        }
    }).catch(function (error) {
        console.log(error);
    });
}

