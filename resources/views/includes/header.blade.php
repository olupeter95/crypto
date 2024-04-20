<div class="header-container">
    <header class="header navbar navbar-expand-sm">

        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>

        <div class="nav-logo align-self-center">
            <a class="navbar-brand" href="javascript:void(0);">
                <img src="/cf/Coinshape-Logo.png" class="navbar-logo" alt="logo" style="width: auto;height: auto;">
            </a>
        </div>

        <ul class="navbar-item flex-row ml-auto d-lg-block d-none">
            <li class="nav-item align-self-center">
                <!-- Primary -->
                <?php
                    if(Route::currentRouteName() == 'demo'){
                        ?>
                            <a href="/home" class="btn btn-danger" style="font-weight: 600;">SWITCH TO LIVE TRADE</a>
                        <?php
                    }
                    else{
                        ?>
                            <a href="/demo" class="btn btn-danger" style="font-weight: 600;">SWITCH TO DEMO TRADE</a>
                        <?php
                    }
                ?>
            </li>
        </ul>

        <ul class="navbar-item flex-row nav-dropdowns">
            <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media">
                        {{-- <img src="https://s2.coinmarketcap.com/static/img/coins/200x200/1.png" class="img-fluid" alt="admin-profile"> --}}
                        <div class="media-body align-self-center">
                            <?php
                                if(Route::currentRouteName() == 'demo'){
                                    ?>
                                        <h6>DEMO: <span class="theBtcBalance" value="{{ Auth::user()->demo_balance }}"> {{ Auth::user()->demo_balance }}</span> BTC</h6>
                                    <?php
                                }
                                else{
                                    ?>
                                        <h6>LIVE: <span class="theBtcBalance" value="{{ Auth::user()->main_balance }}"> {{ Auth::user()->main_balance }}</span> BTC</h6>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="user-profile-dropdown">
                    <div class="">
                        <div class="dropdown-item">
                            <a class="" href="javascript:void(0);">
                                <span class="badge badge-secondary"> Bitcoin </span>
                                <?php
                                    if(Route::currentRouteName() == 'demo'){
                                        ?>
                                            <p class="theBtcBalance" value="{{ Auth::user()->demo_balance }}">{{ Auth::user()->demo_balance }}</p>
                                        <?php
                                    }
                                    else{
                                        ?>
                                            <p class="theBtcBalance" value="{{ Auth::user()->main_balance }}">{{ Auth::user()->main_balance }}</p>
                                        <?php
                                    }
                                ?>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="javascript:void(0);">
                                <span class="badge badge-success"> US Dollar </span>
                                <?php
                                    if(Route::currentRouteName() == 'demo'){
                                        ?>
                                            <p><span class="theUsdBalance" value="{{ Auth::user()->demo_balance * $usd }}">{{ Auth::user()->demo_balance * $usd }}</span> USD</p>
                                        <?php
                                    }
                                    else{
                                        ?>
                                            <p><span class="theUsdBalance" value="{{ Auth::user()->main_balance * $usd }}">{{ Auth::user()->main_balance * $usd }}</span> USD</p>
                                        <?php
                                    }
                                ?>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="/deposit">
                                <span class="badge badge-danger"> Make Deposit </span>
                            </a>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media">
                        <?php
                            if(is_null(Auth::user()->profile_img)){
                                ?>
                                    <img src="/assets/img/90x90.jpg" class="img-fluid" alt="admin-profile">
                                <?php
                            }
                            else{
                                ?>
                                    <img src={{ asset('/storage/profile/'. Auth::user()->profile_img) }} class="img-fluid" alt="admin-profile" style="object-fit: cover;">
                                <?php
                            }
                        ?>
                        <div class="media-body align-self-center">
                            <h6><span>Hi,</span> {{ Auth::user()->name }}</h6>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="user-profile-dropdown">
                    <div class="">
                        <div class="dropdown-item">
                            <a class="" href="/profile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg> Account 
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="/verification">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox">
                                    <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                    <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                                </svg> Verification
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="{{route('support')}}">
                                <i class="fas fa-headset text-white mr-3"></i>
                                Support
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg> Sign Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>

            </li>
        </ul>
    </header>
</div>