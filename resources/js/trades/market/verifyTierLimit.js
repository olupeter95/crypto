window.verifyTierLimit = async (limitData) => {
    if (page_type == 'LIVE') {
        switch(limitData.plan) {
            case 'TIER 1':
                // code block
                if (limitData.limit >= 15) {
                    ($('#overlay-x').attr('visibility') == 'yes') ? $('#overlay-x').addClass('d-none') && $('#overlay-x').attr('visibility', 'no') : null;
                    alert("Trade Limit Exceeded!");
                    return false;
                } 
                else {
                    return true;
                }
            break;
            case 'TIER 2':
                // code block
                if (limitData.limit >= 25) {
                    ($('#overlay-x').attr('visibility') == 'yes') ? $('#overlay-x').addClass('d-none') && $('#overlay-x').attr('visibility', 'no') : null;
                    alert("Trade Limit Exceeded!");
                    return false;
                } 
                else {
                    return true;
                }
            break;
            case 'TIER 3':
                // code block
                if (limitData.limit >= 35) {
                    ($('#overlay-x').attr('visibility') == 'yes') ? $('#overlay-x').addClass('d-none') && $('#overlay-x').attr('visibility', 'no') : null;
                    alert("Trade Limit Exceeded!");
                    return false;
                } 
                else {
                    return true;
                }
            break;
            case 'TIER 4':
                // code block
                return true;
            break;

            default:
            // code block
        }
    }
    else{
        return true;
    }
};