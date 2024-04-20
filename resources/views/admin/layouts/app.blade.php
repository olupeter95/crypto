<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel | {{$page_name}} </title>
    <link rel="icon" href="/main/images/favicon.png" type="image/png">
    <link href="{{ asset('/assets/admin/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('/assets/admin/js/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/admin/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        #sidebar *{
            color: #888ea8;
        }
    </style>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <?php
        $pageName = Route::currentRouteName();
        switch($pageName){
            case 'admin.deposit.all':
                ?>
                    <link href="{{ asset('/assets/admin/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css">
                <?php
            break;

            case 'admin.deposit.approved':
                ?>
                    <link href="{{ asset('/assets/admin/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css">
                <?php
            break;

            case 'admin.deposit.cancelled':
                ?>
                    <link href="{{ asset('/assets/admin/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css">
                <?php
            break;

            case 'admin.withdrawal.all':
                ?>
                    <link href="{{ asset('/plugins/table/datatable/datatables.css') }}" rel="stylesheet" type="text/css">
                    <link href="{{ asset('/assets/admin/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet" type="text/css">
                    <link href="{{ asset('/plugins/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css">
                    <link href="{{ asset('/plugins/table/datatable/custom_dt_custom.css') }}" rel="stylesheet" type="text/css">
                <?php
            break;

            case 'admin.withdrawal.approved':
                ?>
                    <link href="{{ asset('/plugins/table/datatable/datatables.css') }}" rel="stylesheet" type="text/css">
                    <link href="{{ asset('/assets/admin/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet" type="text/css">
                    <link href="{{ asset('/plugins/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css">
                    <link href="{{ asset('/plugins/table/datatable/custom_dt_custom.css') }}" rel="stylesheet" type="text/css">
                <?php
            break;

            case 'admin.withdrawal.cancelled':
                ?>
                    <link href="{{ asset('/plugins/table/datatable/datatables.css') }}" rel="stylesheet" type="text/css">
                    <link href="{{ asset('/assets/admin/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet" type="text/css">
                    <link href="{{ asset('/plugins/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css">
                    <link href="{{ asset('/plugins/table/datatable/custom_dt_custom.css') }}" rel="stylesheet" type="text/css">
                <?php
            break;

            case 'admin.users.all':
                ?>
                    <link href="{{ asset('/plugins/table/datatable/datatables.css') }}" rel="stylesheet" type="text/css">
                    <link href="{{ asset('/assets/admin/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet" type="text/css">
                    <link href="{{ asset('/plugins/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css">
                    <link href="{{ asset('/plugins/table/datatable/custom_dt_custom.css') }}" rel="stylesheet" type="text/css">
                <?php
            break;

            case 'admin.multiple.trade.signals';
                ?>
                    <link href="{{ asset('/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
                <?php
            break;

            case 'admin.single.trade.signals':
                ?>
                    <link href="{{ asset('/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
                <?php
            break;

            case 'admin.users.edit':
                ?>
                    <link href="{{ asset('/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css">
                    <link href="{{ asset('/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
                    <script src="{{ asset('/plugins/sweetalerts/promise-polyfill.js') }}"></script>
                    <link href="{{ asset('/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
                    <link href="{{ asset('/plugins/sweetalerts/sweetalert.css" rel="stylesheet') }}" type="text/css" />
                <?php
            break;

            case 'admin.trade.earnings':
                ?>
                    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/datatables.css') }}">
                    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/custom_dt_html5.css') }}">
                    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/dt-global_style.css') }}">
                <?php
            break;

            case 'admin.trade.history':
                ?>
                    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/datatables.css') }}">
                    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/custom_dt_html5.css') }}">
                    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/dt-global_style.css') }}">
                <?php
            break;

            case 'admin.open.orders':
                ?>
                    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/datatables.css') }}">
                    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/custom_dt_html5.css') }}">
                    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/dt-global_style.css') }}">
                <?php
            break;

            case 'admin.plans.create' :
                ?>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
                <?php
            break;
            
            default:
                ?>
                    <link href="{{ asset('/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
                <?php
        }
    ?>

</head>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen" style="background: black;"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center" style="color: transparent !important;">
            <img src="/main/images/favicon.png">
        </div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-item theme-brand flex-row text-left">
                <li class="nav-item theme-logo">
                    <a href="/admin/dashboard">
                        <img src="/main/images/logo.png" class="navbar-logo" alt="logo" style="width: 50%;height: auto;">
                    </a>
                </li>
            </ul>

            {{-- <ul class="navbar-item flex-row ml-md-0 ml-auto">
                <li class="nav-item align-self-center search-animated">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                            <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                        </div>
                    </form>
                </li>
            </ul> --}}

            <ul class="navbar-item flex-row ml-md-auto">

                {{-- <li class="nav-item dropdown language-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('assets/admin/img/ca.png') }}" class="flag-width" alt="flag">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
                        <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="{{ asset('assets/admin/img/de.png') }}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;German</span></a>
                        <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="{{ asset('assets/admin/img/jp.png') }}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;Japanese</span></a>
                        <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="{{ asset('assets/admin/img/fr.png') }}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;French</span></a>
                        <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="{{ asset('assets/admin/img/ca.png') }}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;English</span></a>
                    </div>
                </li> --}}

                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="{{ asset('assets/admin/img/90x90.jpg') }}" alt="avatar">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="">
                            <div class="dropdown-item">
                                {{-- <a href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg> Sign Out
                                </a> --}}
                                <a class="" href="{{ route('admin.logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg> Sign Out
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout.submit') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{$page_name}}</span></li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            
            <nav id="sidebar">
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="/admin/dashboard" data-active="true" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="/admin/users/all" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                                <span>Manage Users</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                                <span>Manage Deposits</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="app" data-parent="#accordionExample">
                            <li>
                                <a href="/admin/deposit/all"> All Deposits </a>
                            </li>
                            <li>
                                <a href="/admin/deposit/approved"> Approved Deposits  </a>
                            </li>
                            <li>
                                <a href="/admin/deposit/cancelled"> Cancelled Deposits </a>
                            </li>                            
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#components" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                <span>Manage Withdrawals</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="components" data-parent="#accordionExample">
                            <li>
                                <a href="/admin/withdrawal/all"> All Withdrawals </a>
                            </li>
                            <li>
                                <a href="/admin/withdrawal/approved"> Approved Withdrawals  </a>
                            </li>
                            <li>
                                <a href="/admin/withdrawal/cancelled"> Cancelled Withdrawals </a>
                            </li>                            
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                <span>Manage Transactions</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="elements" data-parent="#accordionExample">
                            <li>
                                <a href="/admin/trade/earnings/all"> Earnings </a>
                            </li>
                            <li>
                                <a href="/admin/open/orders/all"> Open Orders </a>
                            </li>
                            <li>
                                <a href="/admin/trade/history/all"> Trade History </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#datatables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                <span>Plans</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="datatables" data-parent="#accordionExample">
                            <li>
                                <a href="/admin/plans/create"> Create a Plan </a>
                            </li>
                            <li>
                                <a href="/admin/plans"> All Plans </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="/admin/coin/pairs" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                                <span>Trading Pairs</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="/admin/alt/coins" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                                <span>Alt Coins</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="/admin/cryptocurrency" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                                <span>Cryptocurrency</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="/admin/wallets" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                                <span>Wallets</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="/admin/license-keys" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                                <span>License Keys</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#tradeSignalsDropdown" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                <span>Trade Signals</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="tradeSignalsDropdown" data-parent="#accordionExample">
                            <li>
                                <a href="/admin/multiple/trade/signals">Multiple Trade Signals</a>
                            </li>
                            <li>
                                <a href="/admin/limit/trade/signals"> Limit Trades </a>
                            </li>
                            <li>
                                <a href="/admin/stop/limit/trade/signals"> Stop Limit Trades </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="{{route('admin.support.all')}}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <i class="fas fa-headset mr-3"></i>
                                 <span>Tickets</span>
                            </div>
                        </a>
                    </li>

                    
                </ul>
                <!-- <div class="shadow-bottom"></div> -->
                
            </nav>

        </div>
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            @yield('content')
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('/assets/admin/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('/assets/admin/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/dashboard/dash_1.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

     <?php
        $pageName = Route::currentRouteName();
        switch($pageName){
            case 'admin.withdrawal.all':
                ?>
                    <script src="{{ asset('/plugins/table/datatable/datatables.js') }}"></script>
                    <script>
                        // var e;
                        c1 = $('#style-1').DataTable({
                            headerCallback:function(e, a, t, n, s) {
                                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                            },
                            columnDefs:[ {
                                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                                }
                            }],
                            "oLanguage": {
                                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                                "sInfo": "Showing page _PAGE_ of _PAGES_",
                                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                "sSearchPlaceholder": "Search...",
                            "sLengthMenu": "Results :  _MENU_",
                            },
                            "lengthMenu": [5, 10, 20, 50],
                            "pageLength": 5
                        });

                        multiCheck(c1);

                        c2 = $('#style-2').DataTable({
                            headerCallback:function(e, a, t, n, s) {
                                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                            },
                            columnDefs:[ {
                                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                                }
                            }],
                            "oLanguage": {
                                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                                "sInfo": "Showing page _PAGE_ of _PAGES_",
                                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                "sSearchPlaceholder": "Search...",
                            "sLengthMenu": "Results :  _MENU_",
                            },
                            "lengthMenu": [5, 10, 20, 50],
                            "pageLength": 5 
                        });

                        multiCheck(c2);

                        c3 = $('#style-3').DataTable({
                            "oLanguage": {
                                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                                "sInfo": "Showing page _PAGE_ of _PAGES_",
                                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                "sSearchPlaceholder": "Search...",
                            "sLengthMenu": "Results :  _MENU_",
                            },
                            "stripeClasses": [],
                            "lengthMenu": [5, 10, 20, 50],
                            "pageLength": 5
                        });

                        multiCheck(c3);
                    </script>
                    <script>
                        $('.approve_withdrawal').on('click', function(){
                            let withdrawal_id = $(this).attr('w_id');
                            $.ajax({
                                url: "/admin/withdrawal/approve",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                data: {
                                    'withdrawal_id': withdrawal_id
                                },
                                success: function(response) {
                                    if(response.success == 'true'){
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Withdrawal has been approved successfully!',
                                        });
                                        $(document).on('click', function(){
                                            window.location.reload();
                                        });
                                    }
                                },
                            });
                        });

                        $('.cancel_withdrawal').on('click', function(){
                            let withdrawal_id = $(this).attr('w_id');
                            $.ajax({
                                url: "/admin/withdrawal/cancel",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                data: {
                                    'withdrawal_id': withdrawal_id
                                },
                                success: function(response) {
                                    if(response.success == 'true'){
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Withdrawal has been cancelled successfully!',
                                        });
                                        $(document).on('click', function(){
                                            window.location.reload();
                                        });
                                    }
                                },
                            });
                        });
                    </script>
                <?php
            break;

            case 'admin.plans.create':
                ?>
                   <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/jQuery.tagify.min.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var input = document.querySelector('.tagify');
                            new Tagify(input);
                        });
                    </script>
                    <script>
                        var plan_desc_arr = {};
                        var count         = 0;
                        $('.plan-status').on('click', function() {
                            // body...
                            if ($(this).hasClass('bg-danger')) {
                                $(this).removeClass('bg-danger');
                                $(this).addClass('bg-success');
                                $(this).text('On');
                            }
                            else if ($(this).hasClass('bg-success')) {
                                $(this).removeClass('bg-success');
                                $(this).addClass('bg-danger');
                                $(this).text('Off');
                            }
                        });

                        function data_values() {
                            // body...

                            // $.each($('.plan_desc'), function(){
                            //     count++;
                            //     plan_desc_arr[count] = $(this).val();
                            // });

                            var data = {
                                plan_title   : $('#plan_title').val(),
                                plan_rate    : $('#plan_rate').val(),
                                plan_desc    : $('#plan_desc').val(),
                                plan_status  : $('#plan_status').text(),
                                trade_limit  : $('#trade_limit').val(),
                            }

                            $.ajax({
                                url: "/admin/plans/create",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                data: data,
                                success: function(response) {
                                    if(JSON.parse(response).success == 'true'){
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Trade Plan Created Successfully!',
                                        });
                                        $(document).on('click', function(){
                                            window.location.reload();
                                        });
                                    }
                                },
                            });
                        }

                        $('input').on('keyup', function(){
                            if ($(this).closest('.col-lg-4').find('.error_div').length == 1) {
                                $(this).closest('.col-lg-4').find('.error_div').remove();
                            }
                        });

                        $('#create_plan_btn').on('click', function(){
                            if (!$('#plan_title').val()) {
                                if ($('#plan_title').closest('.col-lg-4').find('.error_div').length == 0) {
                                    $('#plan_title').closest('.col-lg-4').append(
                                        '<div class="error_div text-danger"><strong>This field can\'t be empty</strong></div>'
                                    );
                                }
                            }
                            else{
                                if ($('#plan_title').closest('.col-lg-4').find('.error_div').length == 1) {
                                    $('#plan_title').closest('.col-lg-4').find('.error_div').remove();
                                }
                            }
                            if (!$('#plan_rate').val()) {
                                if ($('#plan_rate').closest('.col-lg-4').find('.error_div').length == 0) {
                                    $('#plan_rate').closest('.col-lg-4').append(
                                        '<div class="error_div text-danger"><strong>This field can\'t be empty</strong></div>'
                                    );
                                }
                            }
                            else{
                                if ($('#plan_rate').closest('.col-lg-4').find('.error_div').length == 1) {
                                    $('#plan_rate').closest('.col-lg-4').find('.error_div').remove();
                                }
                            }
                            if (!$('#plan_desc').val()) {
                                if ($('#plan_desc').closest('.col-lg-4').find('.error_div').length == 0) {
                                    $('#plan_desc').closest('.col-lg-4').append(
                                        '<div class="error_div text-danger"><strong>This field can\'t be empty</strong></div>'
                                    );
                                }
                            }
                            else{
                                if ($('#plan_desc').closest('.col-lg-4').find('.error_div').length == 1) {
                                    $('#plan_desc').closest('.col-lg-4').find('.error_div').remove();
                                }
                            }
                            if (!$('#trade_limit').val()) {
                                if ($('#trade_limit').closest('.col-lg-4').find('.error_div').length == 0) {
                                    $('#trade_limit').closest('.col-lg-4').append(
                                        '<div class="error_div text-danger"><strong>This field can\'t be empty</strong></div>'
                                    );
                                }
                            }
                            else{
                                if ($('#trade_limit').closest('.col-lg-4').find('.error_div').length == 1) {
                                    $('#trade_limit').closest('.col-lg-4').find('.error_div').remove();
                                }
                            }
                            if (!$('#icon').val()) {
                                if ($('#icon').closest('.col-lg-4').find('.error_div').length == 0) {
                                    $('#icon').closest('.col-lg-4').append(
                                        '<div class="error_div text-danger"><strong>This field can\'t be empty</strong></div>'
                                    );
                                }
                            }
                            else{
                                if ($('#icon').closest('.col-lg-4').find('.error_div').length == 1) {
                                    $('#icon').closest('.col-lg-4').find('.error_div').remove();
                                }
                            }
                            if ($('.error_div').length == 0) {
                                data_values();
                            }
                        });

                        $('.add_description').on('click', function(){
                            $('.description_col').append(
                                '<div class="input-group mb-3">'+
                                    '<input id="" type="text" class="form-control plan_desc" placeholder="Plan Description">'+
                                    '<div class="input-group-append delete_description">'+
                                        '<span class="input-group-text text-white bg-success">'+
                                            '<i class="fa fa-trash"></i>'+
                                        '</span>'+
                                    '</div>'+
                                '</div>'
                            );

                            $('.input-group .delete_description').on('click', function(){
                                $(this).closest('.input-group').remove();
                            });
                        });
                    </script>
                <?php
            break;

            case 'admin.plans':
                ?>
                    <script>
                        $('.plan-status').on('click', function() {
                            // body...
                            if ($(this).hasClass('bg-danger')) {
                                $(this).removeClass('bg-danger');
                                $(this).addClass('bg-success');
                                $(this).text('On');
                            }
                            else if ($(this).hasClass('bg-success')) {
                                $(this).removeClass('bg-success');
                                $(this).addClass('bg-danger');
                                $(this).text('Off');
                            }
                        });

                        $('.add_description').on('click', function(){
                            $('.description_col').append(
                                '<div class="input-group mb-3">'+
                                    '<input id="" type="text" class="form-control plan_desc" placeholder="Plan Description">'+
                                    '<div class="input-group-append delete_description">'+
                                        '<span class="input-group-text text-white bg-success">'+
                                            '<i class="fa fa-trash"></i>'+
                                        '</span>'+
                                    '</div>'+
                                '</div>'
                            );

                            $('.input-group .delete_description').on('click', function(){
                                $(this).closest('.input-group').remove();
                            });
                        });

                        $('.input-group .delete_description').on('click', function(){
                            $(this).closest('.input-group').remove();
                        });

                        function data_values(data) {
                            // body...
                        
                            $.ajax({
                                url: "/admin/plans/update",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                data: data,
                                success: function(response) {
                                    if(JSON.parse(response).success == 'true'){
                                        $('input').val('');
                                        $('.modal').modal('hide');
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Trade Plan Updated Successfully!',
                                        });
                                        $(document).on('click', function(){
                                            window.location.reload();
                                        });
                                    }
                                },
                            });
                        
                        }

                        $('.update_plan_btn').on('click', function(){
    
                            var d_div   = $(this).closest('.modal').find('.plan_desc');
                            var d_count = 0;
                            var p_d     = {};
                            $.each(d_div, function(){
                                d_count++;
                                p_d[d_count] = $(this).val();
                            });

                            var data = {
                                plan_id      : $(this).closest('.modal').find('.plan_id').val(),
                                plan_title   : $(this).closest('.modal').find('.plan_title').val(),
                                plan_rate    : $(this).closest('.modal').find('.plan_rate').val(),
                                plan_desc    : p_d,
                                plan_status  : $(this).closest('.modal').find('.plan-status').text(),
                                trade_limit  : $(this).closest('.modal').find('.trade_limit').val(),
                            }
                            data_values(data);        
                        });

                        $('.delete_plan').on('click', function(){
                            let plan_id = $(this).attr('data-id');
                            $('#delete_plan form').attr('action', '/admin/plans/delete/'+plan_id);
                            $('#delete_plan').modal();
                        });

                    </script>
                <?php
            break;

            case 'admin.coin.pairs':
                ?>
                    <script>
                        $('.delete_coin_pair').on('click', function(){
                            let coin_id = $(this).attr('data-id');
                            let pair_name = $(this).attr('data-pair-name');
                            $('#delete_coin_pair form').attr('action', '/admin/coin/pairs/delete/'+coin_id);
                            $('#delete_coin_pair .modal-body > h2 > strong').text(pair_name);
                            $('#delete_coin_pair').modal();
                        });
                    </script>
                <?php
            break;

            case 'admin.alt.coins':
                ?>
                    <script>
                        $('.delete_alt_coin').on('click', function(){
                            let alt_coin_id = $(this).attr('data-id');
                            let pair_name   = $(this).attr('data-pair-name');
                            $('#delete_alt_coin form').attr('action', '/admin/alt/coins/delete/'+alt_coin_id);
                            $('#delete_alt_coin .modal-body > h2 > strong').text(pair_name);
                            $('#delete_alt_coin').modal();
                        });
                    </script>
                <?php
            break;

            case 'admin.withdrawal.approved':
                ?>
                    <script src="{{ asset('/plugins/table/datatable/datatables.js') }}"></script>
                    <script>
                        // var e;
                        c1 = $('#style-1').DataTable({
                            headerCallback:function(e, a, t, n, s) {
                                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                            },
                            columnDefs:[ {
                                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                                }
                            }],
                            "oLanguage": {
                                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                                "sInfo": "Showing page _PAGE_ of _PAGES_",
                                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                "sSearchPlaceholder": "Search...",
                            "sLengthMenu": "Results :  _MENU_",
                            },
                            "lengthMenu": [5, 10, 20, 50],
                            "pageLength": 5
                        });

                        multiCheck(c1);

                        c2 = $('#style-2').DataTable({
                            headerCallback:function(e, a, t, n, s) {
                                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                            },
                            columnDefs:[ {
                                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                                }
                            }],
                            "oLanguage": {
                                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                                "sInfo": "Showing page _PAGE_ of _PAGES_",
                                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                "sSearchPlaceholder": "Search...",
                            "sLengthMenu": "Results :  _MENU_",
                            },
                            "lengthMenu": [5, 10, 20, 50],
                            "pageLength": 5 
                        });

                        multiCheck(c2);

                        c3 = $('#style-3').DataTable({
                            "oLanguage": {
                                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                                "sInfo": "Showing page _PAGE_ of _PAGES_",
                                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                "sSearchPlaceholder": "Search...",
                            "sLengthMenu": "Results :  _MENU_",
                            },
                            "stripeClasses": [],
                            "lengthMenu": [5, 10, 20, 50],
                            "pageLength": 5
                        });

                        multiCheck(c3);
                    </script>
                <?php
            break;

            case 'admin.withdrawal.cancelled':
                ?>
                    <script src="{{ asset('/plugins/table/datatable/datatables.js') }}"></script>
                    <script>
                        // var e;
                        c1 = $('#style-1').DataTable({
                            headerCallback:function(e, a, t, n, s) {
                                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                            },
                            columnDefs:[ {
                                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                                }
                            }],
                            "oLanguage": {
                                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                                "sInfo": "Showing page _PAGE_ of _PAGES_",
                                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                "sSearchPlaceholder": "Search...",
                            "sLengthMenu": "Results :  _MENU_",
                            },
                            "lengthMenu": [5, 10, 20, 50],
                            "pageLength": 5
                        });

                        multiCheck(c1);

                        c2 = $('#style-2').DataTable({
                            headerCallback:function(e, a, t, n, s) {
                                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                            },
                            columnDefs:[ {
                                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                                }
                            }],
                            "oLanguage": {
                                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                                "sInfo": "Showing page _PAGE_ of _PAGES_",
                                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                "sSearchPlaceholder": "Search...",
                            "sLengthMenu": "Results :  _MENU_",
                            },
                            "lengthMenu": [5, 10, 20, 50],
                            "pageLength": 5 
                        });

                        multiCheck(c2);

                        c3 = $('#style-3').DataTable({
                            "oLanguage": {
                                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                                "sInfo": "Showing page _PAGE_ of _PAGES_",
                                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                "sSearchPlaceholder": "Search...",
                            "sLengthMenu": "Results :  _MENU_",
                            },
                            "stripeClasses": [],
                            "lengthMenu": [5, 10, 20, 50],
                            "pageLength": 5
                        });

                        multiCheck(c3);
                    </script>
                <?php
            break;

            case 'admin.users.all':
                ?>
                    <script src="{{ asset('/plugins/table/datatable/datatables.js') }}"></script>
                    <script>
                        // var e;
                        c1 = $('#style-1').DataTable({
                            headerCallback:function(e, a, t, n, s) {
                                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                            },
                            columnDefs:[ {
                                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                                }
                            }],
                            "oLanguage": {
                                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                                "sInfo": "Showing page _PAGE_ of _PAGES_",
                                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                "sSearchPlaceholder": "Search...",
                            "sLengthMenu": "Results :  _MENU_",
                            },
                            "lengthMenu": [5, 10, 20, 50],
                            "pageLength": 5
                        });

                        multiCheck(c1);

                        c2 = $('#style-2').DataTable({
                            headerCallback:function(e, a, t, n, s) {
                                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                            },
                            columnDefs:[ {
                                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                                }
                            }],
                            "oLanguage": {
                                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                                "sInfo": "Showing page _PAGE_ of _PAGES_",
                                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                "sSearchPlaceholder": "Search...",
                            "sLengthMenu": "Results :  _MENU_",
                            },
                            "lengthMenu": [5, 10, 20, 50],
                            "pageLength": 5 
                        });

                        multiCheck(c2);

                        c3 = $('#style-3').DataTable({
                            "oLanguage": {
                                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                                "sInfo": "Showing page _PAGE_ of _PAGES_",
                                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                "sSearchPlaceholder": "Search...",
                            "sLengthMenu": "Results :  _MENU_",
                            },
                            "stripeClasses": [],
                            "lengthMenu": [5, 10, 20, 50],
                            "pageLength": 5
                        });

                        multiCheck(c3);
                    </script>
                    <script>
                        $('.deactivate_a_user').on('click', function(){
                            let user_id = $(this).attr('u_id');
                            $.ajax({
                                url: "/admin/users/deactivate",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                data: {
                                    'user_id' : user_id,
                                },
                                success: function(response) {
                                    if(response.success == 'true'){
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Selected user\'s account has been deactivated successfully!',
                                        });
                                        $(document).on('click', function(){
                                            window.location.reload();
                                        });
                                    }
                                },
                            });
                        });

                        $('.delete_a_user').on('click', function(){
                            let user_id = $(this).attr('u_id');
                            $.ajax({
                                url: "/admin/users/delete",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                data: {
                                    'user_id' : user_id,
                                },
                                success: function(response) {
                                    if(response.success == 'true'){
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Selected user\'s account has been deleted successfully!',
                                        });
                                        $(document).on('click', function(){
                                            window.location.reload();
                                        });
                                    }
                                },
                            });
                        });
                    </script>
                <?php
            break;

            case 'admin.license.keys':
                ?>
                    <script>
                        $('#generate_license_key').on('click', function(){
                            $.ajax({
                                url: "/admin/license-keys/create",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                data: {},
                                success: function(response) {
                                    if(JSON.parse(response).success == 'true'){
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'License key has been created successfully!',
                                        });
                                        $(document).on('click', function(){
                                            window.location.reload();
                                        });
                                    }
                                },
                            });
                        });
                    </script>
                <?php
            break;

            case 'admin.cryptocurrency':
                ?>
                    <script>
                        $('.delete_cryptocurrency').on('click', function(){
                            let currency_id = $(this).attr('data-id');
                            $('#delete_currency form').attr('action', '/admin/cryptocurrency/delete/'+currency_id);
                            $('#delete_currency').modal();
                        });

                        $('.edit_cryptocurrency').on('click', function(){
                            let currency_id = $(this).attr('data-id');
                            let currency_title = $(this).attr('data-name');
                            let currency_symbol = $(this).attr('data-symbol');
                            let amount_in_usd = $(this).attr('data-usd-value');

                            $('#edit_currency .currency_id').val(currency_id);
                            $('#edit_currency .currency_title').val(currency_title);
                            $('#edit_currency .currency_symbol').val(currency_symbol);
                            $('#edit_currency .amount_in_usd').val(amount_in_usd);

                            $('#edit_currency').modal();
                        });
                    </script>
                <?php
            break;

            case 'admin.wallets':
                ?>
                    <script>
                        $('.delete_wallet').on('click', function(){
                            let wallet_id = $(this).attr('data-id');
                            $('#delete_wallet form').attr('action', '/admin/wallet/delete/'+wallet_id);
                            $('#delete_wallet').modal();
                        });

                        $('.edit_wallet').on('click', function(){
                            let wallet_id       = $(this).attr('data-id');
                            let wallet_title    = $(this).attr('data-name');
                            let wallet_symbol   = $(this).attr('data-symbol');
                            let wallet_address  = $(this).attr('data-address');

                            $('#edit_wallet .wallet_id').val(wallet_id);
                            $('#edit_wallet .wallet_title').val(wallet_title);
                            $('#edit_wallet .wallet_symbol').val(wallet_symbol);
                            $('#edit_wallet .wallet_address').val(wallet_address);

                            $('#edit_wallet').modal();
                        });
                    </script>
                <?php
            break;

            case 'admin.deposit.all':
                ?>
                    <script>
                        $('.approve_deposit').on('click', function(){
                            let deposit_id = $(this).attr('d_id');
                            $.ajax({
                                url: "/admin/deposit/approve",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                data: {
                                    'deposit_id': deposit_id
                                },
                                success: function(response) {
                                    if(response.success == 'true'){
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Deposit has been approved successfully!',
                                        });
                                        $(document).on('click', function(){
                                            window.location.reload();
                                        });
                                    }
                                },
                            });
                        });

                        $('.cancel_deposit').on('click', function(){
                            let deposit_id = $(this).attr('d_id');
                            $.ajax({
                                url: "/admin/deposit/cancel",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                data: {
                                    'deposit_id': deposit_id
                                },
                                success: function(response) {
                                    if(response.success == 'true'){
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Deposit has been cancelled successfully!',
                                        });
                                        $(document).on('click', function(){
                                            window.location.reload();
                                        });
                                    }
                                },
                            });
                        });

                        $('.deposit_timestamp').on('click', function(){
                            let visible = $(this).attr('visible');

                            if(visible == 'no'){
                                $(this).attr('visible', 'yes');
                                $(this).find('p').addClass('d-none');
                                $(this).css({
                                    'width':'350px'
                                });
                                $(this).find('div').removeClass('d-none');
                            }
                            else{
                                /*$(this).attr('visible', 'no');
                                $(this).find('p').removeClass('d-none');
                                $(this).find('div').addClass('d-none');*/
                            }
                        });
                        
                    </script>
                <?php
            break;

            case 'admin.multiple.trade.signals';
                ?>
                    <script src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
                    <script>
                        $('#users_value, #leverage_value, #number_of_intervals, #number_of_symbols').select2({
                            tags: true
                        });
                        $('#trade_type').on('click', function(){
                            if($(this).find('span').text() == 'Live Trade'){
                                $(this).removeClass('bg-primary');
                                $(this).addClass('bg-danger');
                                $(this).html('<i class="fa fa-minus mr-2"></i><span>Demo Trade</span>');
                            }
                            else if ($(this).find('span').text() == 'Demo Trade') {
                                $(this).removeClass('bg-danger');
                                $(this).addClass('bg-primary');
                                $(this).html('<i class="fa fa-plus mr-2"></i><span>Live Trade</span>');
                            }
                        });

                        $('#generate_predictions').on('click', function(){
                            var symbols 				  =  {};
                            var intervals       		  =  {};
                            var leverages 				  =  {};
                            var users 				  	  =  {};

                            var buy_or_sell           	  =  {'1' : 'Buy', '2' : 'Sell'};

                            var symbols_data 			  =  $('#number_of_symbols').select2('data');
                            var intervals_data  		  =  $('#number_of_intervals').select2('data');
                            var leverages_data 			  =  $('#leverage_value').select2('data');
                            var users_data 			  	  =  $('#users_value').select2('data');

                            var symbolscounter  		  = 0; 
                            var intervalscounter 		  = 0;
                            var leveragescounter 		  = 0;
                            var userscounter 		  	  = 0;

                            $.each(symbols_data, function(){
                                symbolscounter++;
                                symbols[symbolscounter] = this.id;
                            });

                            $.each(intervals_data, function(){
                                intervalscounter++;
                                intervals[intervalscounter] = this.id;
                            });

                            $.each(leverages_data, function(){
                                leveragescounter++;
                                leverages[leveragescounter] = this.id;
                            });

                            $.each(users_data, function(){
                                userscounter++;
                                users[userscounter] = this.id;
                            });

                            var trade_type 				    =	 $('#trade_type').find('span').text();
                            var amount_range_from 			=	 $('#amount_range_from').val();
                            var amount_range_to 		  	=	 $('#amount_range_to').val();
                            var number_of_trades 		  	=	 $('#number_of_trades').val();

                            var all = {
                                users_id                  : users,
                                trade_type 			      : trade_type,
                                amount_range_from 	      : amount_range_from,
                                amount_range_to 	      : amount_range_to,
                                number_of_trades 	      : number_of_trades,
                                number_of_symbols 	      : symbols,
                                number_of_intervals       : intervals,
                                buy_or_sell 		      : buy_or_sell,
                                leverage_value 		      : leverages,
                            }

                            $.ajax({
                                url: "/admin/multiple/trade/signals",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                data: all,
                                success: function(response) {
                                    var parsedValue = JSON.parse(response);
                                    var prediction  = parsedValue.data;

                                    $.each(prediction, function(i, v){
                                        $('#generated_predictions').find('.row').append(
                                            '<div class="col-12 py-1">'+v.amount+' USD | '+v.interval+' | '+v.leverage+' | '+v.symbol+' | '+v.trade_type+ ' | ' +v.buy_or_sell+'</div>'
                                        );      			
                                    });
                                    $('#amount_range_from, #amount_range_to, #number_of_trades').val('');
                                    $('#number_of_symbols, #number_of_intervals, #leverage_value, #users_value').val('').trigger('change');
                                    $('#generated_predictions').modal();
                                },
                            });
                        });
                    </script>
                <?php
            break;

            case 'admin.single.trade.signals':
                ?>
                    <script src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
                    <script>
                        $('#leverage_value, #number_of_intervals, #number_of_symbols').select2({
                            tags: true
                        });

                        $('#trade_type').on('click', function(){
                            if($(this).find('span').text() == 'Live Trade'){
                                $(this).removeClass('bg-primary');
                                $(this).addClass('bg-danger');
                                $(this).html('<i class="fa fa-minus mr-2"></i><span>Demo Trade</span>');
                            }
                            else if ($(this).find('span').text() == 'Demo Trade') {
                                $(this).removeClass('bg-danger');
                                $(this).addClass('bg-primary');
                                $(this).html('<i class="fa fa-plus mr-2"></i><span>Live Trade</span>');
                            }
                        });

                        $('#generate_predictions').on('click', function(){
                            var symbols 				  =  {};
                            var intervals       		  =  {};
                            var leverages 				  =  {};
                            var users 				  	  =  {
                                '1': {{$user_id}}
                            };

                            var buy_or_sell           	  =  {'1' : 'Buy', '2' : 'Sell'};

                            var symbols_data 			  =  $('#number_of_symbols').select2('data');
                            var intervals_data  		  =  $('#number_of_intervals').select2('data');
                            var leverages_data 			  =  $('#leverage_value').select2('data');
                            var users_data 			  	  =  $('#users_value').select2('data');

                            var symbolscounter  		  = 0; 
                            var intervalscounter 		  = 0;
                            var leveragescounter 		  = 0;
                            var userscounter 		  	  = 0;

                            $.each(symbols_data, function(){
                                symbolscounter++;
                                symbols[symbolscounter] = this.id;
                            });

                            $.each(intervals_data, function(){
                                intervalscounter++;
                                intervals[intervalscounter] = this.id;
                            });

                            $.each(leverages_data, function(){
                                leveragescounter++;
                                leverages[leveragescounter] = this.id;
                            });

                            /*$.each(users_data, function(){
                                userscounter++;
                                users[userscounter] = this.id;
                            });*/

                            var trade_type 				    =	 $('#trade_type').find('span').text();
                            var amount_range_from 			=	 $('#amount_range_from').val();
                            var amount_range_to 		  	=	 $('#amount_range_to').val();
                            var number_of_trades 		  	=	 $('#number_of_trades').val();

                            var all = {
                                users_id                  : users,
                                trade_type 			      : trade_type,
                                amount_range_from 	      : amount_range_from,
                                amount_range_to 	      : amount_range_to,
                                number_of_trades 	      : number_of_trades,
                                number_of_symbols 	      : symbols,
                                number_of_intervals       : intervals,
                                buy_or_sell 		      : buy_or_sell,
                                leverage_value 		      : leverages,
                            }


                            $.ajax({
                                url: "/admin/multiple/trade/signals",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                data: all,
                                success: function(response) {
                                    var parsedValue = JSON.parse(response);
                                    var prediction  = parsedValue.data;
                                    $.each(prediction, function(i, v){
                                        $('#generated_predictions').find('.row').append(
                                            '<div class="col-12 py-1">'+v.amount+' USD | '+v.interval+' | '+v.leverage+' | '+v.symbol+' | '+v.trade_type+ ' | ' +v.buy_or_sell+'</div>'
                                        );      			
                                    });
                                    $('#amount_range_from, #amount_range_to, #number_of_trades').val('');
                                    $('#number_of_symbols, #number_of_intervals, #leverage_value, #users_value').val('').trigger('change');
                                    $('#generated_predictions').modal();
                                },
                            });
                        });
                    </script>
                <?php
            break;

            case 'admin.multiple.trade.signals.live':
                ?>
                    <script>
                        $('.view_users').on('click', function(){
                            let session_id = $(this).attr('data-id');
                            $('#users_modal .modal-body > div').empty();

                            $.get('/admin/trade/signals/'+session_id+'/LIVE', function(response){
                                if(response.success == 'true'){
                                    $.each(response.users, function(key, info){
                                        let name    = info.name;
                                        let email   = info.email;
                                        let user_id = info.id;

                                        $('#users_modal .modal-body > div').append(
                                            '<h4 class="col-12 py-1">'+
							                    info.email + ' | ' + info.name + ' | ' + '<span class="btn bg-transparent text-white view_prediction" data-id="'+info.id+'"><i class="fa fa-eye"></i></span>'+
						                    '</h4>'
                                        );
                                    });

                                    $('#users_modal').modal();
                                    $('.view_prediction').on('click', function(){
                                        let user_id = $(this).attr('data-id');
                                        $('#predictions_modal .modal-body > div').empty();
                                        
                                        $.get('/admin/trade/signal/'+user_id+'/'+session_id+'/LIVE', function(response){
                                            if(response.success == 'true'){
                                                $.each(response.predictions, function(key, info){
                                                    $.each(response.currencies, function(currency_id, currency_info){
                                                        if(info.traded_symbol == currency_info.symbol){
                                                            let converted_rate = parseFloat(info.amount/currency_info.usd_value);

                                                            switch(response.type){
                                                                case 'Market':
                                                                    $('#predictions_modal .modal-body > div').append(
                                                                        '<h5 class="col-12 py-1">'+
                                                                            info.amount + ' USD | ' + info.interval + ' | ' + info.leverage + ' | '+ info.symbol + ' | '+ info.buy_or_sell + ' | ' + '<span class="">'+converted_rate.toFixed(4) + " " + info.traded_symbol+'</span>'+
                                                                        '</h5>'
                                                                    );
                                                                break;

                                                                case 'Limit':
                                                                    $('#predictions_modal .modal-body > div').append(
                                                                        '<h5 class="col-12 py-1">'+
                                                                            info.amount + ' USDT | ' + info.limit  + ' | ' + info.leverage + ' | '+ info.symbol + ' | '+ info.buy_or_sell + ' | ' + '<span class="">'+converted_rate.toFixed(4) + " " + info.traded_symbol+'</span>'+
                                                                        '</h5>'
                                                                    );
                                                                break;

                                                                case 'Stop Limit':
                                                                    $('#predictions_modal .modal-body > div').append(
                                                                        '<h5 class="col-12 py-1">'+
                                                                            info.amount + ' USDT | ' + info.limit + ' | ' + info.stop_limit + ' | ' + info.leverage + ' | '+ info.symbol + ' | '+ info.buy_or_sell + ' | ' + '<span class="">'+converted_rate.toFixed(4) + " " + info.traded_symbol+'</span>'+
                                                                        '</h5>'
                                                                    );
                                                                break;

                                                                default:
                                                            } 

                                                            
                                                        }
                                                    });
                                                });
                                                $('#predictions_modal').modal();
                                            }
                                        }).then();

                                    });
                                }
                            }).then();
                        });

                        $('.delete_trade_signal').on('click', function(){
                            let session_id = $(this).attr('data-id');
                            $('#delete_modal form').attr('action', '/admin/trade/signal/delete/'+session_id+'/LIVE');
                            $('#delete_modal').modal();
                        });
                        
                    </script>
                <?php
            break;

            case 'admin.multiple.trade.signals.demo':
                ?>
                    <script>
                        $('.view_users').on('click', function(){
                            let session_id = $(this).attr('data-id');
                            $('#users_modal .modal-body > div').empty();

                            $.get('/admin/trade/signals/'+session_id+'/DEMO', function(response){
                                if(response.success == 'true'){
                                    $.each(response.users, function(key, info){
                                        let name    = info.name;
                                        let email   = info.email;
                                        let user_id = info.id;

                                        $('#users_modal .modal-body > div').append(
                                            '<h4 class="col-12 py-1">'+
							                    info.email + ' | ' + info.name + ' | ' + '<span class="btn bg-transparent text-white view_prediction" data-id="'+info.id+'"><i class="fa fa-eye"></i></span>'+
						                    '</h4>'
                                        );
                                    });

                                    $('#users_modal').modal();
                                    $('.view_prediction').on('click', function(){
                                        let user_id = $(this).attr('data-id');
                                        $('#predictions_modal .modal-body > div').empty();
                                        
                                        $.get('/admin/trade/signal/'+user_id+'/'+session_id+'/DEMO', function(response){
                                            if(response.success == 'true'){
                                                $.each(response.predictions, function(key, info){
                                                    $.each(response.currencies, function(currency_id, currency_info){
                                                        if(info.traded_symbol == currency_info.symbol){
                                                            let converted_rate = parseFloat(info.amount/currency_info.usd_value);

                                                            $('#predictions_modal .modal-body > div').append(
                                                                '<h5 class="col-12 py-1">'+
                                                                    info.amount + ' USD | ' + info.interval + ' | ' + info.leverage + ' | '+ info.symbol + ' | '+ info.buy_or_sell + ' | ' + '<span class="">'+converted_rate.toFixed(4) + " " + info.traded_symbol+'</span>'+
                                                                '</h5>'
                                                            );
                                                        }
                                                    });
                                                });

                                                $('#predictions_modal').modal();
                                            }
                                        }).then();

                                    });
                                }
                                //var parsedValue = JSON.parse(response);
                                /*var converted_amount = (to_be_converted/(parsedValue.data[0].price_usd)).toFixed(4);
                                $('#'+eqv).text(converted_amount + ' '+ from_symbol);*/
                            }).then();
                        });

                        
                        
                    </script>
                <?php
            break;

            case 'admin.users.edit':
                ?>
                    <script src="{{ asset('/plugins/blockui/jquery.blockUI.min.js') }}"></script> 
                    <script src="{{ asset('/assets/js/users/account-settings.js') }}"></script>
                    <script src="{{ asset('/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
                    <script src="{{ asset('/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
                    <script>
                        $('#add-payment-details').on('click', function(){
                            let url     = $(this).closest('form').attr('action');
                            let form    = $(this).closest('form');

                            $.ajax({
                                url     : url,
                                headers : {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                data: {
                                    'BTC'   : $(form).find('#bitcoin_address').val(),
                                    'ETH'   : $(form).find('#ethereum_address').val(),
                                    'XRP'   : $(form).find('#ripple_address').val(),
                                    'BNB'   : $(form).find('#bnb_address').val(),
                                    'USDT'  : $(form).find('#tether_address').val(),
                                    'USDC'  : $(form).find('#usd_coin_address').val(),
                                    'DOGE'  : $(form).find('#dogecoin_address').val(),
                                    'LTC'   : $(form).find('#ltc_address').val()
                                },
                                success: function(response) {
                                    if(response.success == 'true'){
                                        swal({
                                            title: 'Good job!',
                                            text: "Payment details updated successfully!",
                                            type: 'success',
                                            padding: '2em'
                                        });
                                        $(document).on('click', function(){
                                            window.location.reload();
                                        });
                                    }
                                    else{
                                        alert("An error occured, please try again later");
                                    }
                                }
                            });
                        });

                        $('.add_or_subtract').on('click', function(){
                            if($(this).attr('action') == 'add'){
                                $(this).attr('action', 'subtract');
                                $(this).find('i').removeClass('fa-plus');
                                $(this).find('i').addClass('fa-minus');
                                $(this).removeClass('btn-primary');
                                $(this).addClass('btn-danger');
                            }
                            else{
                                $(this).attr('action', 'add');
                                $(this).find('i').removeClass('fa-minus');
                                $(this).find('i').addClass('fa-plus');
                                $(this).removeClass('btn-danger');
                                $(this).addClass('btn-primary');
                            }
                        });

                        $('.update_balance').on('click', function(){
                            let url                 = $(this).closest('form').attr('action');
                            let accType             = $(this).closest('form').attr('acct-type');
                            let form                = $(this).closest('form');
                            let current_balance     = parseFloat($(form).find('.current_balance').val());

                            if($(form).find('.add_or_subtract').attr('action') == 'subtract'){
                                let new_balance     = current_balance - parseFloat($(form).find('.to_new_balance').val());

                                if(new_balance < 0){
                                    alert("Balance cant be a negative value");
                                }
                                else{
                                    if(accType == 'live'){
                                        update_balance(url, new_balance.toFixed(4), 'main_balance');
                                    }
                                    else{
                                        update_balance(url, new_balance.toFixed(4), 'demo_balance');
                                    }
                                }
                            }
                            else{
                                let new_balance     = current_balance + parseFloat($(form).find('.to_new_balance').val());
                                if(new_balance){
                                    if(accType == 'live'){
                                        update_balance(url, new_balance.toFixed(4), 'main_balance');
                                    }
                                    else{
                                        update_balance(url, new_balance.toFixed(4), 'demo_balance');
                                    }
                                }
                                else{
                                    alert("An error occured, please try again");
                                }
                            }

                            function update_balance(url, new_balance, type){
                                $.ajax({
                                    url     : url,
                                    headers : {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: "POST",
                                    data: {
                                        type   : new_balance,
                                    },
                                    success: function(response) {
                                        if(response.success == 'true'){
                                            swal({
                                                title: 'Good job!',
                                                text: "Account Balance updated successfully!",
                                                type: 'success',
                                                padding: '2em'
                                            });
                                            $(document).on('click', function(){
                                                window.location.reload();
                                            });
                                        }
                                        else{
                                            alert("An error occured, please try again later");
                                        }
                                    }
                                });
                            }
                            
                        });

                        $('.a_user_status, .pend_user').on('click', function(){
                            let status  = $(this).attr('status');
                            let url     = $(this).attr('data-url');

                            if(status == 'Yes'){
                                let name    = 'active';
                                let value   = 'YES';
                                account_action(name, value, url);
                            }
                            else{
                                let name    = 'active';
                                let value   = 'NO';
                                account_action(name, value, url);
                            }
                        });

                        $('.two_fa_status').on('click', function(){
                            let status  = $(this).attr('status');
                            let url     = $(this).attr('data-url');

                            if(status == 'Yes'){
                                let name    = 'two_fa_status';
                                let value   = 'ACTIVE';
                                account_action(name, value, url);
                            }
                            else{
                                let name    = 'two_fa_status';
                                let value   = 'INACTIVE';
                                account_action(name, value, url);
                            }
                        });

                        $('.disable_email').on('click', function(){
                            let status  = $(this).attr('status');
                            let url     = $(this).attr('data-url');

                            if(status == 'Yes'){
                                let name    = 'mailing_status';
                                let value   = 'ACTIVE';
                                account_action(name, value, url);
                            }
                            else{
                                let name    = 'mailing_status';
                                let value   = 'INACTIVE';
                                account_action(name, value, url);
                            }
                        });
                        
                        $('.reset_trading_limit').on('click', function(){
                            let status  = $(this).attr('status');
                            let url     = $(this).attr('data-url');

                            let name    = 'limit';
                            let value   = status;
                            account_action(name, value, url);
                            
                        });

                        function account_action(name, value, url){
                            let data = {};
                            data[name] = value;

                             $.ajax({
                                url     : url,
                                headers : {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                data: data,
                                success: function(response) {
                                    if(response.success == 'true'){
                                        swal({
                                            title: 'Good job!',
                                            text: "Account Details Updated Successfully!",
                                            type: 'success',
                                            padding: '2em'
                                        });
                                        $(document).on('click', function(){
                                            window.location.reload();
                                        });
                                    }
                                    else{
                                        alert("An error occured, please try again later");
                                    }
                                }
                            });
                        }
                        
                    </script>                              
                <?php
            break;

            case 'admin.trade.earnings':
                ?>
                    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
                    <script src="/plugins/table/datatable/datatables.js"></script>
                    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
                    <script src="/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
                    <script src="/plugins/table/datatable/button-ext/jszip.min.js"></script>    
                    <script src="/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
                    <script src="/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
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
                    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
                <?php
            break;

            case 'admin.trade.history':
                ?>
                    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
                    <script src="/plugins/table/datatable/datatables.js"></script>
                    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
                    <script src="/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
                    <script src="/plugins/table/datatable/button-ext/jszip.min.js"></script>    
                    <script src="/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
                    <script src="/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
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

                        $('.trade_date').on('click', function(){
                            let visible = $(this).attr('visible');

                            if(visible == 'no'){
                                $(this).attr('visible', 'yes');
                                $(this).find('p').addClass('d-none');
                                $(this).css({
                                    'width':'350px'
                                });
                                $(this).find('div').removeClass('d-none');
                            }
                            else{
                                /*$(this).attr('visible', 'no');
                                $(this).find('p').removeClass('d-none');
                                $(this).find('div').addClass('d-none');*/
                            }
                        });

                    </script>
                    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
                <?php
            break;

            case 'admin.open.orders':
                ?>
                    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
                    <script src="/plugins/table/datatable/datatables.js"></script>
                    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
                    <script src="/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
                    <script src="/plugins/table/datatable/button-ext/jszip.min.js"></script>    
                    <script src="/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
                    <script src="/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
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
                    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
                <?php
            break;

            default:
            ?>
            <script src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
            <?php
        }
    ?>

    @yield('javascript')

</body>
</html>