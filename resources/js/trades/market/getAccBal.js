window.getAccBal = async () => {
    try {
        const {data} = await axios.get('/api/account/balance/'+page_type+'/'+user_id);
        return data;
    } catch (err) {
        console.log(err.message);
    }
}