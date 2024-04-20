window.getAccLim = async () => {
    try {
        const {data} = await axios.get('/trade/limit');
        return data;
    } catch (err) {
        console.log(err.message);
    }
}