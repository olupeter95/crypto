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
    <link href="assets/css/elements/search.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages/faq/faq.css" rel="stylesheet" type="text/css" /> 
    <!--  END CUSTOM STYLE FILE  -->

    <style>
        #formValidate .wizard > .content {min-height: 25em;}
        #example-vertical.wizard > .content {min-height: 24.5em;}
        #tradingview_35f2bc iframe{
            height:370px !important;
        }
        .faq .faq-layouting .fq-article-section .card img{
            height:300px;
            object-fit:cover;
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
        <div id="content" class="main-content faq container">
            <div class="layout-px-spacing faq-layouting layout-spacing">

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
                <div class="fq-article-section">
                    <div class="row layout-top-spacing">
                        <div class="col-lg-3 col-md-6 mb-lg-5 mb-4">
                            <div class="card">
                                <img src="assets/img/bots/gunbot.png" class="card-img-top" alt="faq-video-tutorials">
                                <div class="card-body">
                                    <div class="fq-rating">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    </div>
                                    <h5 class="card-title">Gunbot</h5>
                                    <p class="card-text">Select the action which you want to carry out on Gunbot</p>
                                    <div>
                                        <button class="btn mb-3 tps_trade_history" style="background: white;color: #000000;font-weight: bold;">Trade History</button>
                                                                      
                                        <?php
                                            if(array_search("Gunbot",$bots) !== false){
                                                ?>
                                                    <button class="btn mb-3 tps_auto_trader_bot" verified="YES" style="background: #e2a03f;color: white;font-weight: bold;">Auto Trader</button>                              
                                                <?php
                                            }
                                            else{
                                                ?>
                                                    <button class="btn mb-3 tps_auto_trader_bot" verified="NO" style="background: #e2a03f;color: white;font-weight: bold;">Auto Trader</button>                              
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-lg-5 mb-4">
                            <div class="card">
                                <img src="assets/img/bots/haasbot.png" class="card-img-top" alt="faq-video-tutorials">
                                <div class="card-body">
                                    <div class="fq-rating">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    </div>
                                    <h5 class="card-title">Haasbot</h5>
                                    <p class="card-text">Select the action which you want to carry out on Haasbot</p>
                                    <div>
                                        <button class="btn mb-3 tps_trade_history" style="background: white;color: #000000;font-weight: bold;">Trade History</button>
                                         
                                        <?php
                                            if(array_search("Haasbot",$bots) !== false){
                                                ?>
                                                    <button class="btn mb-3 tps_auto_trader_bot" verified="YES" style="background: #e2a03f;color: white;font-weight: bold;">Auto Trader</button>                              
                                                <?php
                                            }
                                            else{
                                                ?>
                                                    <button class="btn mb-3 tps_auto_trader_bot" verified="NO" style="background: #e2a03f;color: white;font-weight: bold;">Auto Trader</button>                              
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-lg-5 mb-4">
                            <div class="card">
                                <img src="assets/img/bots/cryptohopper.webp" class="card-img-top" alt="faq-video-tutorials">
                                <div class="card-body">
                                    <div class="fq-rating">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    </div>
                                    <h5 class="card-title">Cryptohopper</h5>
                                    <p class="card-text">Select the action which you want to carry out on Cryptohopper</p>
                                    <div>
                                        <button class="btn mb-3 tps_trade_history" style="background: white;color: #000000;font-weight: bold;">Trade History</button>
                                         
                                        <?php
                                            if(array_search("Cryptohopper",$bots) !== false){
                                                ?>
                                                    <button class="btn mb-3 tps_auto_trader_bot" verified="YES" style="background: #e2a03f;color: white;font-weight: bold;">Auto Trader</button>                              
                                                <?php
                                            }
                                            else{
                                                ?>
                                                    <button class="btn mb-3 tps_auto_trader_bot" verified="NO" style="background: #e2a03f;color: white;font-weight: bold;">Auto Trader</button>                              
                                                <?php
                                            }
                                        ?>                          
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-lg-5 mb-4">
                            <div class="card">
                                <img src="assets/img/bots/3commas.png" class="card-img-top" alt="faq-video-tutorials">
                                <div class="card-body">
                                    <div class="fq-rating">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    </div>
                                    <h5 class="card-title">3commas</h5>
                                    <p class="card-text">Select the action which you want to carry out on 3commas</p>
                                    <div>
                                        <button class="btn mb-3 tps_trade_history" style="background: white;color: #000000;font-weight: bold;">Trade History</button>
                                                                      
                                        <?php
                                            if(array_search("3commas",$bots) !== false){
                                                ?>
                                                    <button class="btn mb-3 tps_auto_trader_bot" verified="YES" style="background: #e2a03f;color: white;font-weight: bold;">Auto Trader</button>                              
                                                <?php
                                            }
                                            else{
                                                ?>
                                                    <button class="btn mb-3 tps_auto_trader_bot" verified="NO" style="background: #e2a03f;color: white;font-weight: bold;">Auto Trader</button>                              
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-lg-5 mb-4">
                            <div class="card">
                                <img src="assets/img/bots/canary.png" class="card-img-top" alt="faq-video-tutorials">
                                <div class="card-body">
                                    <div class="fq-rating">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star checked"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    </div>
                                    <h5 class="card-title">Canary</h5>
                                    <p class="card-text">Select the action which you want to carry out on Canary</p>
                                    <div>
                                        <button class="btn mb-3 tps_trade_history" style="background: white;color: #000000;font-weight: bold;">Trade History</button>
                                                                      
                                        <?php
                                            if(array_search("Canary",$bots) !== false){
                                                ?>
                                                    <button class="btn mb-3 tps_auto_trader_bot" verified="YES" style="background: #e2a03f;color: white;font-weight: bold;">Auto Trader</button>                              
                                                <?php
                                            }
                                            else{
                                                ?>
                                                    <button class="btn mb-3 tps_auto_trader_bot" verified="NO" style="background: #e2a03f;color: white;font-weight: bold;">Auto Trader</button>                              
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal -->
            <div class="modal fade login-modal" id="licenseKeyModal" tabindex="-1" role="dialog" aria-labelledby="licenseKeyModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" id="licenseKeyModalLabel">
                            <h4 class="modal-title">Input License Key</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                        </div>
                        <div class="modal-body">
                            <form class="mt-0">
                                <div class="form-group">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input type="text" class="form-control mb-2" id="licenseKey" placeholder="License Key">
                                    <input type="hidden" id="botName" value="" >
                                </div>
                                <button id="verifyLicenseKey" type="button" class="btn btn-primary mt-2 mb-2 btn-block">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <div class="forgot login-footer">
                                <span>Input Your License Key in the field <a href="javascript:void(0);">above</a></span>
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
    <script src="assets/js/pages/faq/faq.js"></script>
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
    <script src="assets/js/elements/custom-search.js"></script>

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
        $('.tps_auto_trader_bot').on('click', function(){
            let botName  = $(this).closest('.card').find('.card-title').text();
            let verified = $(this).attr('verified');
            if(verified == 'YES'){
                $.get('/tps/'+botName+'/redirect', function(response){
                    if (response.success == 'true') {
                        window.location.replace("/tps/run");
                    } 
                    else {
                        $('#licenseKeyModal').find('#botName').val(botName);
                        $('#licenseKeyModal').modal();
                    }
                });
            }
            else{
                $('#licenseKeyModal').find('#botName').val(botName);
                $('#licenseKeyModal').modal();
            }            
        });
        $('#licenseKeyModal #verifyLicenseKey').on('click', function(){
            let botName         = $(this).closest('div.modal-body').find('#botName').val();
            let licenseKey      = $(this).closest('div.modal-body').find('#licenseKey').val();
            $.post('/tps/'+botName+'/license/key/verify',{
                _token  :   $('meta[name="csrf-token"]').attr('content'),
                key     :   licenseKey
            },
            function(response){
                if(response.success == 'false'){
                    //location.reload();
                    if($('#licenseKeyModal .form-group').find('div').length == 1){
                    }
                    else if($('#licenseKeyModal .form-group').find('div').length == 0){
                        $('#licenseKeyModal .form-group').append(
                            '<div class="text-danger" style="font-size: 14px;font-weight: bold;">Incorrect License Key</div>'
                        );
                    }
                }
                else if(response.success == 'true'){
                    window.location.replace("/tps/run");
                }
            });
        });
    </script>
</body>
</html>