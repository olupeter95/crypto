<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coinshape | {{$page_name}} </title>
    <!-- Scripts -->

    <link rel="icon" href="/main/images/favicon.png" type="image/png">
    <link href="{{ asset('/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('/assets/js/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/autocomplete/autocomplete.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Include SweetAlert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    


    <!-- BEGIN PAGE LEVEL /PLUGINS/CUSTOM STYLES -->
    <?php
        $route_name = \Illuminate\Support\Facades\Route::currentRouteName();
        switch($route_name){
            case 'demo':
                ?>
                    <link href="{{ asset('/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
                    <link href="{{ asset('/assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
                    <link href="{{ asset('/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />

                    <link href="{{ asset('/assets/css/elements/alert.css') }}" rel="stylesheet" type="text/css" />
                    <link href="/plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
                    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/forms/switches.css') }}">
                    <style>
                        /* 
                            ##Device = Low Resolution Tablets, Mobiles (Landscape)
                            ##Screen = B/w 481px to 767px
                        */

                        @media (min-width: 481px) and (max-width: 767px) {
                        
                            /* CSS */
                            #tradingview_45f2bc iframe, #tradingview_85f2bg iframe, #tradingview_85f2bg{
                                width:100% !important;
                            }
                        
                        }

                        /* 
                            ##Device = Most of the Smartphones Mobiles (Portrait)
                            ##Screen = B/w 320px to 479px
                        */

                        @media (min-width: 320px) and (max-width: 480px) {
                        
                            /* CSS */
                            #tradingview_45f2bc iframe, #tradingview_85f2bg iframe, #tradingview_85f2bg{
                                width:100% !important;
                            }
                            
                        }

                        @media (min-width: 992px){
                            #empty_earnings{
                                width: 60%;
                                margin: auto;
                            }
                        }

                        .form-control{
                            padding: 0px !important;
                            height: 30px;
                            font-size: 12px;
                        }
                        .widget-table-two .table > tbody > tr > td{
                            font-size:11px !important;
                        }

                        .fixed_pair_table_height{
                            height:350px !important;
                        }

                        .widget-card-four .w-info h6{
                            font-size:20px !important;
                        }

                        .widget-card-four .w-info p{
                            font-size:13px !important;
                        }

                        #overlay-x {
                            position: fixed;
                            width: 100%;
                            height: 100%;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            background-color: rgba(0,0,0,0.5);
                            z-index: 2;
                            cursor: pointer;
                        }

                        .dot-elastic{
                            top: 95%;
                            left: 45%;
                        }

                        #overlay-x-loader{
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            font-size: 20px;
                            color: white;
                            transform: translate(-50%,-50%);
                            -ms-transform: translate(-50%,-50%);
                        }

                    </style>
                <?php
            break;

            case 'home':
                ?>
                    <link href="{{ asset('/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
                    <link href="{{ asset('/assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
                    <link href="{{ asset('/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />

                    <link href="{{ asset('/assets/css/elements/alert.css') }}" rel="stylesheet" type="text/css" />
                    <link href="/plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
                    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/forms/switches.css') }}">
                    <link href="{{ asset('/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css">
                    <style>
                        /* 
                            ##Device = Low Resolution Tablets, Mobiles (Landscape)
                            ##Screen = B/w 481px to 767px
                        */

                        @media (min-width: 481px) and (max-width: 767px) {
                        
                            /* CSS */
                            #tradingview_45f2bc iframe, #tradingview_85f2bg iframe, #tradingview_85f2bg{
                                width:100% !important;
                            }
                        
                        }

                        /* 
                            ##Device = Most of the Smartphones Mobiles (Portrait)
                            ##Screen = B/w 320px to 479px
                        */

                        @media (min-width: 320px) and (max-width: 480px) {
                        
                            /* CSS */
                            #tradingview_45f2bc iframe, #tradingview_85f2bg iframe, #tradingview_85f2bg{
                                width:100% !important;
                            }

                        }

                        @media (min-width: 992px){
                            #empty_earnings{
                                width: 60%;
                                margin: auto;
                            }
                        }
                        
                        .form-control{
                            padding: 0px !important;
                            height: 30px;
                            font-size: 12px;
                        }
                        .widget-table-two .table > tbody > tr > td{
                            font-size:11px !important;
                        }

                        .fixed_pair_table_height{
                            height:350px !important;
                        }

                        .widget-card-four .w-info h6{
                            font-size:20px !important;
                        }

                        .widget-card-four .w-info p{
                            font-size:13px !important;
                        }

                        #overlay-x {
                            position: fixed;
                            width: 100%;
                            height: 100%;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            background-color: rgba(0,0,0,0.5);
                            z-index: 2;
                            cursor: pointer;
                        }

                        .dot-elastic{
                            top: 95%;
                            left: 45%;
                        }

                        #overlay-x-loader{
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            font-size: 20px;
                            color: white;
                            transform: translate(-50%,-50%);
                            -ms-transform: translate(-50%,-50%);
                        }

                    </style>
                <?php
            break;

            case 'profile':
                ?>
                    <link href="/plugins/autocomplete/autocomplete.css" rel="stylesheet" type="text/css" />
                    <link href="/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
                <?php
            break;

            case 'deposit.proof':
                ?>
                    <link href="/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
                <?php
            break;

            case 'verification':
                ?>
                    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/jquery-step/jquery.steps.css') }}">
                    <link href="/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
                    <link href="/plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
                <?php
            break;

            case 'trader.plans':
                ?>
                    <link href="{{ asset('/plugins/pricing-table/css/component.css') }}" rel="stylesheet" type="text/css" />
                    <style>
                        /* 
                            ##Device = Low Resolution Tablets, Mobiles (Landscape)
                            ##Screen = B/w 481px to 767px
                        */

                        @media (min-width: 481px) and (max-width: 767px) {
                        
                            /* CSS */
                            .pricing--norbu .pricing__item{
                                flex: 0 1 380px !important;
                            }   
                        }

                        /* 
                            ##Device = Most of the Smartphones Mobiles (Portrait)
                            ##Screen = B/w 320px to 479px
                        */

                        @media (min-width: 320px) and (max-width: 480px) {
                        
                            /* CSS */
                            .pricing--norbu .pricing__item{
                                flex: 0 1 380px !important;
                            }
                        }
                    </style>
                <?php
            break;

            case 'swap':
                ?>
                    <link href="{{ asset('/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
                    <link href="{{ asset('/assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
                    <link href="{{ asset('/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />

                    <link href="{{ asset('/assets/css/elements/alert.css') }}" rel="stylesheet" type="text/css" />
                    <link href="/plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
                    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/forms/switches.css') }}">
                    <link href="{{ asset('/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css"> 
                    <link href="{{ asset('/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
                     
                    <style>
                        .select2-container{
                            margin-bottom: 0px !important;
                        }

                        .select2-container .select2-selection--single .select2-selection__rendered{                          
                            border-top-left-radius: 0px;
                            border-bottom-left-radius: 0px;
                            background: #000000;
                        }

                        /* 
                            ##Device = Most of the Smartphones Mobiles (Portrait)
                            ##Screen = B/w 320px to 479px
                        */

                        @media (min-width: 320px) and (max-width: 480px) {
                        
                            /* CSS */
                            #content > div > div.row.layout-top-spacing > div.col-xl-8.col-lg-8.col-md-8.col-sm-12.col-12.layout-spacing{
                                order: 2;
                            }
                            
                            #content > div > div.row.layout-top-spacing > div.col-xl-4.col-lg-4.col-md-4.col-sm-12.col-12.layout-spacing{
                                text-align: center;
                            }

                            #content > div > div.row.layout-top-spacing > div.col-xl-4.col-lg-4.col-md-4.col-sm-12.col-12.layout-spacing > div > div > div > div.media.mb-3{
                                justify-content: center;
                            }
                        }

                    </style>
                <?php 
            break;
                
            default:
               
        }
    ?>

    <style>
        #formValidate .wizard > .content {min-height: 25em;}
        #example-vertical.wizard > .content {min-height: 24.5em;}
        #tradingview_35f2bc iframe, #tradingview_45f2bc iframe{
            height:370px !important;
        }
    </style>
    <!-- END PAGE LEVEL /PLUGINS/CUSTOM STYLES -->

</head>
<body class="alt-menu sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> 
        <div class="loader"> 
            <div class="loader-content">
                <div class="spinner-grow align-self-center">
                    <img src="/main/images/favicon.png">
                </div>
            </div>
        </div>
    </div>

    <div id="overlay-x" class="d-none" visibility="no">
        <div id="overlay-x-loader">
            <p>Processing..</p>
            <div class="dot-elastic"></div>
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
                    
                    {{-- <div class="toggle-switch">
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
                    </div> --}}
                </div>

                @yield('content')

            </div>

        </div>
        <!--  END CONTENT PART  -->
    </div>
    <!-- END MAIN CONTAINER -->
    <?php
        if(\Illuminate\Support\Facades\Route::currentRouteName() == 'swap'){
            ?>
                <script>
                    window.wls = JSON.parse('<?php echo $wallets; ?>');
                </script>
            <?php
        }
    ?>
    
    <!-- Scripts -->
    {{-- <script id="current_route" src="{{ asset('js/app.js') }}" route_name="{{\Illuminate\Support\Facades\Route::currentRouteName()}}"></script> --}}

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="//code.tidio.co/u0hz3022l7ebwh378fas0emxxlxqemza.js" async></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- toastr -->
    <script src="{{ asset('/plugins/notification/snackbar/snackbar.min.js') }}"></script>
    @yield('javascript')
    <!-- END PAGE LEVEL PLUGINS -->

    @if (session('login'))
        <script>
            Snackbar.show({
                text: 'Login Successful!',
                pos: 'top-right'
            });
        </script>        
    @endif

    <!-- BEGIN PAGE LEVEL /PLUGINS/CUSTOM SCRIPTS -->
    {{-- <script src="{{ asset('/plugins/apex/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('/assets/js/dashboard/dash_1.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        window.theme = 'dark';
        $('#switch_mode').on('click', function() {   
            $('#load_screen').removeClass('d-none');

            $(this).val(this.checked ? 1 : 0);

            let crn = '{{\Illuminate\Support\Facades\Route::currentRouteName()}}';

            if((crn == 'home') || (crn == 'demo')){
                if ($(this).val() == 1) {
                    theme = 'light';
                    if((crn == 'home') || (crn == 'demo')){
                        change_the_chart();
                    }
                    
                    $('link[href="/assets/css/plugins.css"]').remove();
                    $('link[href="/assets/css/dashboard/dash_2.css"]').remove();
                    $('link[href="/assets/css/dashboard/dash_1.css"]').remove();
                    $('head').append('<link href="/assets/css/light-plugins.css" rel="stylesheet">');
                    $('head').append('<link href="assets/css/dashboard/light_dash_2.css" rel="stylesheet">');
                    $('head').append('<link href="assets/css/dashboard/light_dash_1.css" rel="stylesheet">');
                    $('head').append('<link href="/assets/css/mode.css" rel="stylesheet">');
                }
                else{
                    theme = 'dark';
                    if((crn == 'home') || (crn == 'demo')){
                        change_the_chart();
                    }

                    $('link[href="/assets/css/light-plugins.css"]').remove();
                    $('link[href="assets/css/dashboard/light_dash_2.css"]').remove();
                    $('link[href="assets/css/dashboard/light_dash_1.css"]').remove();
                    $('link[href="/assets/css/mode.css"]').remove();
                    $('head').append('<link href="/assets/css/plugins.css" rel="stylesheet">');
                    $('head').append('<link href="/assets/css/dashboard/dash_2.css" rel="stylesheet">');
                    $('head').append('<link href="/assets/css/dashboard/dash_1.css" rel="stylesheet">');
                }
            }
            else if((crn == 'profile') || (crn == 'verification') || (crn == 'deposit.proof') || (crn == 'trader.plans')  || (crn == 'trader.withdrawal')){
                if ($(this).val() == 1) {
                    theme = 'light';
                    
                    $('link[href="/assets/css/plugins.css"]').remove();
                    $('head').append('<link href="/assets/css/light-plugins.css" rel="stylesheet">');
                    $('head').append('<link href="/assets/css/mode.css" rel="stylesheet">');
                }
                else{
                    theme = 'dark';

                    $('link[href="/assets/css/light-plugins.css"]').remove();
                    $('link[href="/assets/css/mode.css"]').remove();
                    $('head').append('<link href="/assets/css/plugins.css" rel="stylesheet">');
                }
            }

            function change_the_chart(){
                let t_from = $('#market_trade .from_coin').text();
                let t_to   = $('#market_trade .against_coin').text();

                new TradingView.widget(
                    {
                        "autosize": true,
                        //"width": 980,
                        //"height": 350,
                        "symbol": t_from+t_to,
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

                new TradingView.widget(
                    {
                        "container_id": "tradingview_45f2bc",
                        //"autosize": true,
                        "width": auto,
                        "height": 370,
                        "symbol": "NASDAQ:AAPL",
                        "interval": "D",
                        "timezone": "exchange",
                        "theme": theme,
                        "style": "0",
                        "toolbar_bg": "#f1f3f6",
                        "withdateranges": true,
                        "allow_symbol_change": true,
                        "save_image": false,
                        "details": true,
                        "hotlist": true,
                        "calendar": true,
                        "locale": "en"
                    }
                );
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
    <?php
        if(\Illuminate\Support\Facades\Route::currentRouteName() == 'home'){ 
            ?>
                <script src="{{ asset('/assets/js/dashboard/dash_2.js') }}"></script>
                <script src="https://s3.tradingview.com/tv.js"></script>
                <script type="text/javascript">
                    window.user_id      = "{{Auth::user()->id}}";
                    window.page_type    = 'LIVE';
                    window.open_orders  =  <?php print($open_orders) ?>;
                    $(".pairSearchInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $(this).parent().parent().find("tbody tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });

                    let my_plan = '{{Auth::user()->plan}}';
                    var the_details = {
                        "autosize": true,
                        //"width": 980,
                        //"height": 350,
                        "symbol": "ETHBTC",
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
                    };

                    function display_this_graph(the_details) {
                        // body...
                        return the_details;
                    }

                    new TradingView.widget(display_this_graph(the_details));
                    new TradingView.widget(
                        {
                            "container_id": "tradingview_45f2bc",
                            "autosize": true,
                            // "width": auto,
                            // "height": 370,
                            "symbol": "NASDAQ:AAPL",
                            "interval": "D",
                            "timezone": "exchange",
                            "theme": theme,
                            "style": "0",
                            "toolbar_bg": "#f1f3f6",
                            "withdateranges": true,
                            "allow_symbol_change": true,
                            "save_image": false,
                            "details": true,
                            "hotlist": true,
                            "calendar": true,
                            "locale": "en"
                        }
                    );
                    
                    if( my_plan == 'ACTIVATE'){
                        $('#activateModal').modal();
                    }

                </script>
            <?php
        }
        elseif(\Illuminate\Support\Facades\Route::currentRouteName() == 'demo'){
            ?>
                <script src="{{ asset('/assets/js/dashboard/dash_2.js') }}"></script>
                <script src="https://s3.tradingview.com/tv.js"></script>
                <script type="text/javascript">
                    window.user_id = "{{Auth::user()->id}}";
                    window.page_type    = 'DEMO';
                    window.open_orders  =  <?php print($open_orders) ?>;
                    $(".pairSearchInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $(this).parent().parent().find("tbody tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                   
                    
                    var the_details = {
                        "autosize": true,
                        //"width": 980,
                        //"height": 350,
                        "symbol": "ETHBTC",
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
                    };

                    function display_this_graph(the_details) {
                        // body...
                        return the_details;
                    }

                    new TradingView.widget(display_this_graph(the_details));
                    new TradingView.widget(
                        {
                            "container_id": "tradingview_45f2bc",
                            "autosize": true,
                            // "width": auto,
                            // "height": 370,
                            "symbol": "NASDAQ:AAPL",
                            "interval": "D",
                            "timezone": "exchange",
                            "theme": theme,
                            "style": "0",
                            "toolbar_bg": "#f1f3f6",
                            "withdateranges": true,
                            "allow_symbol_change": true,
                            "save_image": false,
                            "details": true,
                            "hotlist": true,
                            "calendar": true,
                            "locale": "en"
                        }
                    );
                </script>
            <?php
        }
        elseif(\Illuminate\Support\Facades\Route::currentRouteName() == 'profile'){
            ?>
                <script src="/plugins/file-upload/file-upload-with-preview.min.js"></script>
                <script>
                    //First upload
                    var firstUpload = new FileUploadWithPreview('myFirstImage');

                    // $('#upload_profile_picture').on('click', function(){
                    //     $('.storage_img_section').addClass('d-none');
                    //     $('.custom-file-container').removeClass('d-none');
                    // });
                </script>
                <script src="/plugins/autocomplete/jquery.mockjax.js"></script>
                <script src="/plugins/autocomplete/jquery.autocomplete.js"></script>
                <script src="/plugins/autocomplete/countries.js"></script>
                <script src="/plugins/autocomplete/demo.js"></script>
            <?php
        }
        elseif(\Illuminate\Support\Facades\Route::currentRouteName() == 'verification'){
            ?>
                <script src="/plugins/file-upload/file-upload-with-preview.min.js"></script>
                <script src="{{ asset('/plugins/jquery-step/jquery.steps.min.js') }}"></script>
                <script src="{{ asset('/plugins/jquery-step/custom-jquery.steps.js') }}"></script>
                <script>
                    //First upload
                    var firstUpload = new FileUploadWithPreview('myFirstImage');
                    

                    $("#verification_form").on('click', function(e){ 
                        e.preventDefault() 
                        if($('#verification_image')[0].files.length == 0){
                            alert('File cannot be empty upload your Id')
                        }
                        else if($('#verification_image')[0].files.length == 1){
                            $('#verificationForm').submit();
                            Snackbar.show({
                                text: 'Verification Uploaded Successfully!',
                                pos: 'top-right'
                            });
                        }
                    });
                </script>
            <?php
        }
        elseif (\Illuminate\Support\Facades\Route::currentRouteName() == 'swap') {
            # code...
            ?>
                <script src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
                <script>
                    $('#to_coin, #from_coin').select2({
                        tags: true
                    });

                    $('#from_coin').on('change', function(){
                        $('.from_value').text($(this).val());
                        
                        let balance = $(this).find(':selected').attr('balance');                        
                        $('#fundsInSmall').text(balance);
                    });

                    $('#to_coin').on('change', function(){
                        $('.to_value').text($(this).val());
                    });
                </script>
            <?php 
        }
    ?>

    <?php
        if(\Illuminate\Support\Facades\Route::currentRouteName() == 'deposit.proof'){
            ?>
                <script src="/assets/js/forms/bootstrap_validation/bs_validation_script.js"></script>
                <script src="/plugins/file-upload/file-upload-with-preview.min.js"></script>
                <script>
                    //First upload
                    var firstUpload = new FileUploadWithPreview('myFirstImage');
                    
                </script>
                <script>
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('submit-deposit-proof');
                        var invalid = $('.submit-deposit-proof .invalid-feedback');

                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                    invalid.css('display', 'block');
                                } 
                                else {
                                    invalid.css('display', 'none');
                                    form.classList.add('was-validated');

                                    if(firstUpload.cachedFileArray.length == 0){
                                        event.preventDefault();
                                        event.stopPropagation();
                                        document.getElementById("deposit-proof-warning").classList.remove("d-none");;
                                    }
                                    else{
                                        Snackbar.show({
                                            text: 'Upload Successful!',
                                            pos: 'top-center'
                                        });
                                    }
                                }
                            }, false);
                        });

                    }, false);
                </script>

                <script>
                    var coin_name = '<?php echo $coin_name; ?>';
                    
                    switch(coin_name) {
                        case 'ethereum':
                            // code block
                            $.getJSON('https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref=BTC&symbol=ETH', function(response){
                                $('#base_id').val(response.price);
                            });
                            break;
                        case 'ripple':
                            // code block
                            $.getJSON('https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref=BTC&symbol=XRP', function(response){
                                $('#base_id').val(response.price);
                            });
                            break;
                        case 'bitcoin':
                            // code block
                            $.getJSON('https://coinlib.io/api/v1/coin?key=d8f248bc24e63c89&pref=BTC&symbol=BTC', function(response){
                                $('#base_id').val(response.price);
                            });
                            break;
                        default:
                            // code block
                    }
                </script>
            <?php
        }
        elseif(\Illuminate\Support\Facades\Route::currentRouteName() == 'trader.withdrawal'){
            ?>
                <script>
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('submit-withdrawal-request');
                        var invalid = $('.submit-withdrawal-request .invalid-feedback');

                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                    invalid.css('display', 'block');
                                } 
                                else {
                                    invalid.css('display', 'none');
                                    form.classList.add('was-validated');
                                }
                            }, false);
                        });

                    }, false);
                </script>
            <?php
        }
        elseif(\Illuminate\Support\Facades\Route::currentRouteName() == 'trader.plans'){
            ?>
            <?php
        }

        if($page_name == 'Complete your profile'){
            ?>
                <script>
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('complete-profile-form');
                        var invalid = $('.complete-profile-form .invalid-feedback');

                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                    invalid.css('display', 'block');
                                } 
                                else {
                                    invalid.css('display', 'none');
                                    form.classList.add('was-validated');
                                }
                            }, false);
                        });

                    }, false);
                </script>
                <script src="/plugins/autocomplete/jquery.mockjax.js"></script>
                <script src="/plugins/autocomplete/jquery.autocomplete.js"></script>
                <script src="/plugins/autocomplete/countries.js"></script>
                <script src="/plugins/autocomplete/demo.js"></script>
            <?php
        }
        
    ?>

    <?php
        if((\Illuminate\Support\Facades\Route::currentRouteName() == 'home') || ((\Illuminate\Support\Facades\Route::currentRouteName() == 'demo') ) ){
            ?>
              
            <?php
        }
    ?>
</body>
</html>