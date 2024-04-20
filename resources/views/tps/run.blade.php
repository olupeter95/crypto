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
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="/assets/css/elements/search.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="/plugins/table/datatable/dt-global_style.css">
    <link href="/assets/css/components/custom-media_object.css" rel="stylesheet" type="text/css">
    <!--  END CUSTOM STYLE FILE  -->

    <style>
        #formValidate .wizard > .content {min-height: 25em;}
        #example-vertical.wizard > .content {min-height: 24.5em;}
        #tradingview_35f2bc iframe{
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

                <div class="row layout-top-spacing">

                    <div id="mediaObjectNotationIcon" class="col-lg-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area notation-text-icon">
                                <div class="media">
                                    <img class=" rounded" src="/assets/img/90x90.jpg" alt="pic1">
                                    <div class="media-body">
                                        <h4 class="media-heading" botName="{{$bot_name}}">Auto Trader - {{$bot_name}}</h4>
                                        <p class="media-text">Auto trade your saved trades</p>
                                        <div class="media-notation">
                                            <a id="startTrading" href="javascript:void(0);" class="btn" style="background: white;color: #000000;font-weight: bold;">Start Trading</a>
                                            <a id="insertTrades" href="javascript:void(0);" class="btn" style="background: #21bf73;color: white;font-weight: bold;">Insert Trades</a>
                                            <a id="openOrders" href="javascript:void(0);" class="btn" style="background: #e2a03f;color: white;font-weight: bold;">Open Orders</a>
                                            <a id="goToHistory" href="javascript:void(0);" class="btn" style="background: red;color: white;font-weight: bold;">Goto History</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tbDisplayed col-xl-12 col-lg-12 col-sm-12 layout-spacing startTrading" visible="yes">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension001" class="table table-hover non-hover displayTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">S/N</th>
                                            <th class="text-center">ASSET</th>
                                            <th class="text-center">INTERVAL</th>
                                            <th class="text-center">AMOUNT</th>
                                            <th class="text-center">LIMIT</th>
                                            <th class="text-center">TRADE ACTION</th>
                                            <th class="text-center">ODDS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($saved_trades as $key => $saved_trade) {
                                                # code...
                                                ?>
                                                   <tr>
                                                    <td class="text-center"><?php echo $key + 1; ?></td>
                                                    <td class="text-center"><?php echo $saved_trade->symbol_traded ; ?></td>
                                                    <td class="text-center"><?php echo $saved_trade->trade_interval ; ?></td>
                                                    <td class="text-center"><?php echo $saved_trade->traded_crypto_amount ; ?></td>
                                                    <td class="text-center"><?php echo $saved_trade->trade_leverage ; ?></td> 
                                                    <td class="text-center">
                                                        <?php 
                                                            if($saved_trade->action == 'Buy'){
                                                                ?>
                                                                    <span class="badge badge-success text-center">Buy</span>
                                                                <?php
                                                            }
                                                            else{
                                                                ?>
                                                                    <span class="badge badge-danger text-center">Sell</span>
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="text-center">{{$saved_trade->odds}}%</td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tbDisplayed col-lg-12 col-12 layout-spacing d-none insertTrades" visible="no">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <form class="text-center">
                                    <div class="form-group mb-0" style="text-align: left;">
                                        <label for="trade_signals">Insert Trades Here:</label>
                                        <textarea class="form-control" id="trade_signals" rows="15"></textarea>
                                    </div>
                                    
                                    <button type="button" class="mt-4 mb-4 btn w-50" style="color: white;font-weight: bold;background: red;">Insert</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tbDisplayed col-xl-12 col-lg-12 col-sm-12 layout-spacing d-none openOrders" visible="no">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension002" class="table table-hover non-hover displayTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>TRANSACTION ID</th>
                                            <th>DATE</th>
                                            <th>OPEN TIME</th>
                                            <th>PAIR</th>
                                            <th>AMOUNT</th>
                                            <th>TIMEFRAME</th>
                                            <th>TRADE PROGRESS</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($open_orders as $key => $open_order) {
                                                # code...
                                                ?>
                                                    <tr>
                                                        <td><?php echo $key + 1; ?></td>
                                                        <td><?php echo $open_order->transaction_id ; ?></td>
                                                        <td><?php echo $open_order->date ; ?></td>
                                                        <td><?php echo $open_order->open_time ; ?></td>
                                                        <td class="text-center"><?php echo $open_order->symbol_traded ; ?></td>
                                                        <td class="text-center"><?php echo $open_order->amount_traded_btc ; ?></td>
                                                        <td>
                                                            <?php echo $open_order->trade_interval ; ?>
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tbDisplayed col-xl-12 col-lg-12 col-sm-12 layout-spacing d-none goToHistory" visible="no">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension003" class="table table-hover non-hover displayTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>TRANSACTION ID</th>
                                            <th>DATE</th>
                                            <th>OPEN TIME</th>
                                            <th>CLOSE TIME</th>
                                            <th>SYMBOL TRADED</th>
                                            <th>AMOUNT TRADED (BTC)</th>
                                            <th>ASSETS</th>
                                            <th>INTERVAL</th>
                                            <th>TRADE TYPE</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($trades_history as $key => $trade_history) {
                                                # code...
                                                ?>
                                                    <tr>
                                                        <td><?php echo $key + 1; ?></td>
                                                        <td><?php echo $trade_history->transaction_id ; ?></td>
                                                        <td><?php echo $trade_history->date ; ?></td>
                                                        <td><?php echo $trade_history->open_time ; ?></td>
                                                        <td><?php echo $trade_history->close_time ; ?></td>
                                                        <td class="text-center"><?php echo $trade_history->pair ; ?></td>
                                                        <td class="text-center"><?php echo $trade_history->amount_in_btc ; ?></td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                                    <img alt="avatar" class="img-fluid rounded-circle" src="https://s2.coinmarketcap.com/static/img/coins/200x200/1.png">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php echo $trade_history->trade_interval ; ?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if($trade_history->b_or_s == 'BUY'){
                                                                    ?>
                                                                        <span class="badge badge-success text-center">Buy</span>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                        <span class="badge badge-danger text-center">Sell</span>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if($trade_history->status == 'PROFIT'){
                                                                    ?>
                                                                        <span class="badge badge-success text-center">PROFIT</span>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                        <span class="badge badge-danger text-center">LOSS</span>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade login-modal" id="promptModal" tabindex="-1" role="dialog" aria-labelledby="promptModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="promptModalLabel">
                        <h5 class="modal-title">Call to action</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-0">
                            <div class="form-group">
                                <p trades="{{count($saved_trades)}}">Auto trade all {{count($saved_trades)}} saved trades?</p>
                            </div>
                            <button id="autoTradeButton" type="button" class="btn btn-primary mt-2 mb-2 btn-block">YES</button>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <div class="forgot login-footer">
                            <span>Auto trade <a href="javascript:void(0);">all</a>?</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  END CONTENT PART  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- Scripts -->
    <script id="current_route" src="{{ asset('js/app.js') }}" route_name="{{Route::currentRouteName()}}"></script>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- toastr -->
    <script src="{{ asset('/plugins/notification/snackbar/snackbar.min.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS -->


    <!-- BEGIN PAGE LEVEL /PLUGINS/CUSTOM SCRIPTS -->
    {{-- <script src="{{ asset('/plugins/apex/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('/assets/js/dashboard/dash_1.js') }}"></script>
    <script src="/assets/js/elements/custom-search.js"></script>
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="/plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script>
        $('#html5-extension001').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'd-none' },
                    { extend: 'csv', className: 'd-none' },
                    { extend: 'excel', className: 'd-none' },
                    { extend: 'print', className: 'd-none' }
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
        });

        $('#html5-extension002').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'd-none' },
                    { extend: 'csv', className: 'd-none' },
                    { extend: 'excel', className: 'd-none' },
                    { extend: 'print', className: 'd-none' }
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
        });

        $('#html5-extension003').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'd-none' },
                    { extend: 'csv', className: 'd-none' },
                    { extend: 'excel', className: 'd-none' },
                    { extend: 'print', className: 'd-none' }
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
        });
    </script>
    <script>
        window.theme = 'dark';
        $('#switch_mode').on('click', function() {   
            $('#load_screen').removeClass('d-none');

            $(this).val(this.checked ? 1 : 0);

            let crn = '{{Route::currentRouteName()}}';

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
                    $('head').append('<link href="/assets/css/dashboard/light_dash_2.css" rel="stylesheet">');
                    $('head').append('<link href="/assets/css/dashboard/light_dash_1.css" rel="stylesheet">');
                    $('head').append('<link href="/assets/css/mode.css" rel="stylesheet">');
                }
                else{
                    theme = 'dark';
                    if((crn == 'home') || (crn == 'demo')){
                        change_the_chart();
                    }

                    $('link[href="/assets/css/light-plugins.css"]').remove();
                    $('link[href="/assets/css/dashboard/light_dash_2.css"]').remove();
                    $('link[href="/assets/css/dashboard/light_dash_1.css"]').remove();
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
    <script>
        $('#insertTrades, #startTrading, #openOrders, #goToHistory').on('click', function(){
            $.each($('.tbDisplayed'), function(){
                if($(this).attr('visible') == 'yes'){
                    $(this).attr('visible', 'no');
                    $(this).addClass('d-none');
                }
            });

            let elId = $(this).attr('id');

            $('.'+elId).attr('visible', 'yes');
            $('.'+elId).removeClass('d-none');

            if (elId == 'startTrading') {
                let trades = $('#promptModal p').attr('trades');
                if (trades < 1) {
                    alert('You have no saved trades!');
                } 
                else if(trades > 0){
                    $('#promptModal').modal();
                }
            }
        });
    </script>
</body>
</html>