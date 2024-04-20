<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
   
    <title>Coinshape | {{$page_name}} </title>
    <link rel="icon" href="/main/images/favicon.png" type="image/png">
    <link href="{{ asset('/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('/assets/js/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL /PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
    <!-- toastr -->
    <link href="{{ asset('/plugins/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/forms/custom-clipboard.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/forms/switches.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL /PLUGINS/CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/custom_dt_html5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/dt-global_style.css') }}">
    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .vertical-pill .nav-pills .nav-link.active, .vertical-pill .nav-pills .show > .nav-link {
            background-color: #21bf73;
            background-color: transparent;
            color: #000000;
            background: #21bf73;
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
            padding: 10px 12px 10px 14px;
        }

        .nav-pills .nav-link {
            color: #888ea8;
            -webkit-transition: all 0.35s ease;
            transition: all 0.35s ease;
        }

        .widget-content-area{
            font-size:1.4rem;
        }
    </style>
    <?php 
        if(Route::currentRouteName() == 'wallets'){
            ?>
                <style>
                    #html5-extension_wrapper > div > div:nth-child(1) > div > div:nth-child(1) > div{
                        display: none;
                    }
                    #html5-extension_wrapper .page-link{
                        font-size: 12px;
                    }
                    .table > tbody:before{
                        display: none;
                    }
                </style>
            <?php 
        }
        elseif (Route::currentRouteName() == 'trader.deposit.make') {
            # code...
            ?> 
                <link href="{{ asset('/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
                <style>
                    /* 
                        ##Device = Most of the Smartphones Mobiles (Portrait)
                        ##Screen = B/w 320px to 479px
                    */

                    @media (min-width: 320px) and (max-width: 480px) {
                    
                        /* CSS */
                        #tabsWithIcons > div > div.widget-header > div{
                            width: 80% !important;
                        }

                    }
                </style>
            <?php 
        }
    ?>
</head>

</head>
<body class="alt-menu sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> 
        <div class="loader"> 
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>

    <!--  BEGIN NAVBAR  -->
    @include('includes.header')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        @include('includes.top-bar')
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="page-header">
                    <div class="page-title">
                        <h5>{{$page_name}}</h5>
                    </div>
                    
                    <div class="toggle-switch">
                        <label class="switch s-icons s-outline  s-outline-secondary">
                            <input id="switch_mode" type="checkbox" class="theme-shifter">
                            <span class="slider round">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun">
                                    <circle cx="12" cy="12" r="5"></circle>
                                    <line x1="12" y1="1" x2="12" y2="3"></line>
                                    <line x1="12" y1="21" x2="12" y2="23"></line>
                                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64">
                                    </line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78">
                                    </line><line x1="1" y1="12" x2="3" y2="12">
                                    </line><line x1="21" y1="12" x2="23" y2="12">
                                    </line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36">
                                    </line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon">
                                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                </svg>
                            </span>
                        </label>
                    </div>
                </div>

                @yield('content')

            </div>

            


        </div>
        <!--  END CONTENT PART  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- toastr -->
    <script src="{{ asset('/plugins/notification/snackbar/snackbar.min.js') }}"></script>
    <!-- END PAGE LEVEL /PLUGINS -->

    @if (session('login'))
        <script>
            Snackbar.show({
                text: 'Login Successful!',
                pos: 'top-right'
            });
        </script>        
    @endif

    <script>
        window.theme = 'dark';
        $('#switch_mode').on('click', function() {   
            $('#load_screen').removeClass('d-none');
            $(this).val(this.checked ? 1 : 0);

            let crn = '{{Route::currentRouteName()}}';

            if((crn == 'trader.orders') || (crn == 'trader.deposit.make') || (crn == 'trader.deposit.logs') || (crn == 'trader.withdrawal.logs') || (crn == 'trader.earnings') ){
                if ($(this).val() == 1) {
                    theme = 'light';
                
                    $('link[href="/assets/css/plugins.css"]').remove();
                    $('link[href="/assets/css/dashboard/dash_2.css"]').remove();
                    $('head').append('<link href="/assets/css/light-plugins.css" rel="stylesheet">');
                    $('head').append('<link href="assets/css/dashboard/light_dash_2.css" rel="stylesheet">');
                    $('head').append('<link href="/assets/css/mode.css" rel="stylesheet">');
                }
                else{
                    theme = 'dark';

                    $('link[href="/assets/css/light-plugins.css"]').remove();
                    $('link[href="assets/css/dashboard/light_dash_2.css"]').remove();
                    $('link[href="/assets/css/mode.css"]').remove();
                    $('head').append('<link href="/assets/css/plugins.css" rel="stylesheet">');
                    $('head').append('<link href="/assets/css/dashboard/dash_2.css" rel="stylesheet">');
                }
            }

            var counter = 0;
            var interval = setInterval(function() {
                counter++;
                // Display 'counter' wherever you want to display it.
                if (counter == 3) {
                    // Display a login box
                    $('#load_screen').addClass('d-none');
                    clearInterval(interval);
                }
            }, 1000);
        });
    </script>

    <!-- BEGIN PAGE LEVEL /PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dash_2.js') }}"></script>
    <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/forms/custom-clipboard.js') }}"></script>
    <script src="//code.tidio.co/u0hz3022l7ebwh378fas0emxxlxqemza.js" async></script>

    <!-- BEGIN PAGE LEVEL /PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="/plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <?php 
        if(Route::currentRouteName() == 'wallets'){
            ?>
               <script>
                $('#html5-extension').DataTable( {
                    dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
                    "oLanguage": {
                        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                        "sInfo": "Showing page _PAGE_ of _PAGES_",
                        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                        "sSearchPlaceholder": "Search...",
                       "sLengthMenu": "Results :  _MENU_",
                    },
                    "stripeClasses": [],
                    "lengthMenu": [20, 25],
                    "pageLength": 20 
                } );
            </script>
            <?php
        }
        elseif (Route::currentRouteName() == 'trader.deposit.make') {
            # code...
            ?>
                <script src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
                <script>
                    window.theBalance = {{Auth::user()->main_balance}};
                    let currentDomain = window.location.origin;
                    let apiUrl = currentDomain + '/proxy?url=' + encodeURIComponent('https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref=USD&symbol=BTC';
                    
                    $.get(apiUrl, function (response) {
                        window.btcPrice = parseFloat(response.price);
                    });
                    // $.get('https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref=USD&symbol=BTC', function(response){
                    //     window.btcPrice = parseFloat(response.price);
                    // });

                    $('#switch_coin').select2({
                        tags: true
                    });

                    $('#switch_coin').on('change',function(){
                        let amount = parseFloat($(this).val());     
                        let coin =    $('#switch_coin option:selected').attr('coin');
                        let title = $('#switch_coin option:selected').attr('title');
                        let currentDomain = window.location.origin;
                        let apiUrl = currentDomain + '/proxy?url=' + encodeURIComponent('https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref=USD&symbol=' + coin);
                        
                        $.get(apiUrl, function (response) {
                            let price = parseFloat(response.price);
                            $('#toBeBTC').text((amount / price) + ' ' + coin);
                        });
                            
                            if ($('#switch_coin option:selected').attr('coin') == "BTC")
                            {
                                let option = $('<option></option>').attr("value", "Bitcoin").text("BTC (Bitcoin)");
                                $("#network").empty().append(option);
                            } else if ($('#switch_coin option:selected').attr('coin') == 'USDT'){
                                let option = $('<option></option>').attr("value", "ERC20").text("ETH (ERC20)");
                                let option2 = $('<option></option>').attr("value", "TRC20").text("TRC (TRC20)");

                                $("#network").empty().append(option).append(option2);
                            } else if ($('#switch_coin option:selected').attr('coin') == 'BNB'){
                                let option = $('<option></option>').attr("value", "BEP20").text("BNB (BEP20)");
                                $("#network").empty().append(option);
                                            
                            }  else if($('#switch_coin option:selected').attr('coin') == 'ETH'){
                                let option = $('<option></option>').attr("value", "ETH").text("ETH (ERC20)");
                                $("#network").empty().append(option);
                            }   else {
                                let option = $('<option></option>').attr("value", coin).text(coin + ' ('+title+')');
                                $("#network").empty().append(option);
                            }
                            
                    });

                    // $('#btc_amount_field').on('mouseout',function(){
                    //     let amount = parseFloat($(this).val());     
                    //     let coin =    $('#switch_coin option:selected').attr('coin');
                    //     $.get('https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref=USD&symbol='+coin, function(response){
                    //    let price = parseFloat(response.price);
                    //    $('#toBeBTC').text((amount / price) +' '+ coin);                    

                    // });
                   

                    // $('#toBeBTC').text((amount / price) +' '+ coin);                    
                            
                    // });

                    $('#btc_amount_field').on('mouseout', function () {
                        let amount = parseFloat($(this).val());
                        let coin = $('#switch_coin option:selected').attr('coin');
                        let currentDomain = window.location.origin;
                        let apiUrl = currentDomain + '/proxy?url=' + encodeURIComponent('https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref=USD&symbol=' + coin);

                        $.get(apiUrl, function (response) {
                            let price = parseFloat(response.price);
                            $('#toBeBTC').text((amount / price) + ' ' + coin);
                        });
                    });
              

                    // $('#switch_coin').on('change', function(){
                    //     if($(this).val() == 'Bitcoin'){
                    //         $('#fundsDepositForm').attr('action', '/deposit/details');
                    //         //$('#proofOfPaymentLink').text('Make Payment');
                    //         // $('#btcAmountRow').removeClass('d-none');
                    //         // $('#viewQRCode, #walletAddressRow, #whenYouSure').addClass('d-none');
                    //     }
                    //     else{
                    //         $('#fundsDepositForm').attr('action', '/make-coinpayment');
                    //         // $('#proofOfPaymentLink').text('Submit Proof Of Payment');
                    //         // $('#btcAmountRow').addClass('d-none');
                    //         // $('#viewQRCode, #walletAddressRow, #whenYouSure').removeClass('d-none');
                    //     }
                    //     // $('#proofOfPaymentLink').attr('windowhref', '/deposit/proof/'+$(this).val());
                    //     // window.location.href = deposit/proof/';
                    //     // let address = $(this).find(':selected').attr('address');
                    //     // $('#QrCodeDIV img').attr('src', 'https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl='+address+'&choe=UTF-8');           
                    //     // $('#wallet_address_field').val(address);
                    // });

                    // $('#proofOfPaymentLink').on('click', function(){
                    //     let coin    = $('#switch_coin').val();
                    //     let amount  = parseFloat($('#btc_amount_field').val());

                    //     if (coin == 'Bitcoin') {
                    //         if(amount <= 0){
                    //             $('#invalidErrorDIV').text('Invalid Amount!');
                    //         }
                    //         else{
                    //             $('#invalidErrorDIV').text('');
                    //             $('#fundsDepositForm').submit();
                    //         }
                    //     } 
                    //     else {
                    //         window.location.href = $(this).attr('windowhref');
                    //     }
                    // });

                </script>
            <?php 
        }
        else{
            ?>
                <script>
                    $('#html5-extension').DataTable( {
                        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
                        buttons: {
                            buttons: [
                                { extend: 'copy', className: 'btn' },
                                { extend: 'csv', className: 'btn' },
                                { extend: 'excel', className: 'btn' },
                                { extend: 'print', className: 'btn' }
                            ]
                        },
                        "oLanguage": {
                            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                            "sInfo": "Showing page _PAGE_ of _PAGES_",
                            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                            "sSearchPlaceholder": "Search...",
                           "sLengthMenu": "Results :  _MENU_",
                        },
                        "stripeClasses": [],
                        "lengthMenu": [7, 10, 20, 50],
                        "pageLength": 7 
                    } );
                </script>
            <?php
        }
    ?>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->

    <?php
        $currentRouteName = Route::currentRouteName();

        switch($currentRouteName){
            case 'trader.deposit.logs':
                ?>
                    <script>    
                        $('.view_slip').on('click', function(){
                            $('#slipModal img').attr('src', '/storage/deposits/'+$(this).attr('slip-src'));
                            $('#slipModal h4').text($(this).attr('details'));

                            $('#slipModal').modal();
                        });
                    </script>
                <?php
            break;

            default;
        }
    ?>

</body>
</html>