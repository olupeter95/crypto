@extends('admin.layouts.app')

@section('content')
    <div class="layout-px-spacing">
        <div class="account-settings-container layout-top-spacing">
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="general-info" class="section general-info" method="POST" action="/admin/users/update/{{$user[0]->id}}/plan">
                                @csrf
                                <div class="info">
                                    <div class="d-flex">
                                        <h6 class="col-9">General Information</h6>
                                        <div class="col-3">
                                            <button id="update-general-info" class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        <?php
                                                            if(is_null($user[0]->profile_img)){
                                                                ?>
                                                                    <img src="/assets/img/200x200.jpg" class="img-fluid" alt="{{$user[0]->name}}-profile-picture">
                                                                <?php
                                                            }
                                                            else{
                                                                ?>
                                                                    <img src={{ asset('/storage/profile/'. $user[0]->profile_img) }} class="img-fluid" alt="{{$user[0]->name}}-profile-picture" style="object-fit: cover;">
                                                                <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">Full Name</label>
                                                                    <input type="text" class="form-control mb-4" id="fullName" value="{{$user[0]->name}}" disabled="">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="dob-input">Gender</label>
                                                                <div class="d-block">
                                                                    <div class="form-group mr-1">
                                                                        <?php
                                                                            if(is_null($user[0]->gender)){
                                                                                ?>
                                                                                    <input class="form-control" id="exampleFormControlSelect1" value="Not filled yet" disabled="">
                                                                                <?php
                                                                            }
                                                                            else{
                                                                                ?>
                                                                                    <input class="form-control" id="exampleFormControlSelect1" value="{{$user[0]->gender}}" disabled="">
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <label for="profession">Email Address</label>
                                                                    <input type="text" class="form-control mb-4" id="profession" value="{{$user[0]->email}}" disabled="">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="plan">Plan</label>
                                                                    <select class="form-control mb-4" id="plan" name="plan">
                                                                        <option value="{{$user[0]->plan}}">{{$user[0]->plan}}</option>
                                                                        @foreach($plans as $plan)
                                                                        <option value="{{$plan->plan_title}}">{{$plan->plan_title}}</option>
                                                                       @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="about" class="section about" method="POST" action="/admin/users/update/{{$user[0]->id}}/verification">
                                @csrf
                                <div class="info">
                                    <div class="d-flex">
                                        <h5 class="col-9">Verification</h5>
                                        <div class="col-3">
                                            <?php
                                                if($user[0]->verification_submission == 'NO'){
                                                    ?>
                                                        <button class="btn bg-primary" type="submit">Verify this image</span>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div for="aboutBio" class="col-11 text-center mb-3">
                                            <?php
                                                if($user[0]->identification_verification == 'NO'){
                                                    ?>
                                                        <span class="badge bg-danger w-25">Not Uploaded Yet</span>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="col-md-11 mx-auto text-center">
                                            <?php
                                                if($user[0]->identification_verification == 'NO'){
                                                    ?>
                                                        <img class="img-fluid" src="{{ asset('/assets/img/id.png')}}" />
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                        <img src={{ asset('/storage/verification/'. $user[0]->identification_verification) }} class="img-fluid" alt="{{$user[0]->name}}-verification-image" style="object-fit: cover;">
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                          <!--payment-->
                          <form id="payment-details" class="section payment-details" method="POST" action="/admin/users/update/{{$user[0]->id}}/payment" style="background: #3131315e;border-radius: 6px;">
                            <div class="info" style="padding: 20px;">
                                <h5 class="">Payment Details</h5>
                                <div class="row">
                                    <div class="col-md-12 text-right mb-5">
                                        <button id="add-payment-details" class="btn btn-primary" type="button">Update</button>
                                    </div>
                                    <div class="col-md-11 mx-auto">
                                        <div class="platform-div">
                                            <div class="form-group">
                                                <label for="bitcoin_address">Bitcoin Address</label>
                                                <input type="text" class="form-control mb-4" id="bitcoin_address" name="bitcoin_address" value="{{ $addresses['BTC'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="ethereum_address">Ethereum Address</label>
                                                <input class="form-control mb-4" id="ethereum_address" name="ethereum_address" value="{{ $addresses['ETH'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="ripple_address">Ripple Address</label>
                                                <input class="form-control mb-4" id="ripple_address" name="ripple_address" value="{{ $addresses['XRP'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="bnb_address">Binance Coin Address</label>
                                                <input class="form-control mb-4" id="bnb_address" name="bnb_address" value="{{ $addresses['BNB'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="tether_address">Tether Address</label>
                                                <input type="text" class="form-control mb-4" id="tether_address" name="tether_address" value="{{ $addresses['USDT'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="usd_coin_address">USD Coin Address</label>
                                                <input class="form-control mb-4" id="usd_coin_address" name="usd_coin_address" value="{{ $addresses['USDC'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="ltc_address">Litecoin Address</label>
                                                <input class="form-control mb-4" id="ltc_address" name="ltc_address" value="{{ $addresses['LTC'] }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="contact" class="section contact">
                                <div class="info">
                                    <h5 class="">Contact</h5>
                                    <div class="row">
                                        <div class="col-md-11 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="country">Country</label>
                                                        <input class="form-control" id="country" value="{{$user[0]->country}}" disabled="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control mb-4" id="address" value="{{$user[0]->address}}" disabled="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <input type="text" class="form-control mb-4" id="city" value="{{ $user[0]->city }}" disabled="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="state">State</label>
                                                        <input type="text" class="form-control mb-4" id="state" value="{{ $user[0]->state }}" disabled="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="social" class="section social">
                                <div class="info">
                                    <h5 class="">Quick Links</h5>
                                    <div class="row">
                                        <div class="col-md-11 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group social-linkedin mb-3">
                                                        <div class="input-group-prepend mr-3">
                                                            <span class="input-group-text">
                                                                <a href="/admin/trade/earnings/user/{{$user[0]->id}}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                                        <polyline points="16 17 21 12 16 7"></polyline>
                                                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                                                    </svg>
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" value="Transactions History" disabled="">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="input-group social-tweet mb-3">
                                                        <div class="input-group-prepend mr-3">
                                                            <span class="input-group-text" id="">
                                                                <a href="/admin/deposit/user/{{$user[0]->id}}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                                        <polyline points="16 17 21 12 16 7"></polyline>
                                                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                                                    </svg>
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" value="Deposits History" disabled="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-11 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group social-fb mb-3">
                                                        <div class="input-group-prepend mr-3">
                                                            <span class="input-group-text" id="">
                                                                <a href="/admin/withdrawal/user/{{$user[0]->id}}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                                        <polyline points="16 17 21 12 16 7"></polyline>
                                                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                                                    </svg>
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" value="Withdrawals History" disabled="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="" class="section" method="POST" action="/admin/users/update/{{$user[0]->id}}/main_balance" acct-type="live">
                                <div id="skill" class="section skill">
                                    <div class="info">
                                        <h5 class="">Main Balance</h5>
                                        <div class="row progress-bar-section">
                                            <div class="col-md-12 mx-auto">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-11 mx-auto px-0">
                                                            <label class="d-block" style="color: #888ea8;font-size: 13px;text-transform: capitalize;letter-spacing: 1px;">Current Balance </label>
                                                            <div class="input-form w-100">
                                                                <input type="text" class="form-control current_balance" id="skills" value="{{ $user[0]->main_balance }}" disabled="">
                                                                <button id="add-skills" type="button" class="btn btn-primary">BTC</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 mx-auto" style="padding-left: 1.7rem;">
                                                <label class="d-block" style="color: #888ea8;font-size: 13px;text-transform: capitalize;letter-spacing: 1px;">Name </label>
                                                <button class="btn btn-primary w-100 btn-lg add_or_subtract" type="button" action="add">
                                                    <i class="fa fa-plus mr-2"></i>
                                                    <span>Add Money</span>
                                                </button>
                                            </div>
                                            <div class="col-md-6 mx-auto" style="padding-right: 1.7rem;">
                                                <label class="d-block" style="color: #888ea8;font-size: 13px;text-transform: capitalize;letter-spacing: 1px;">Amount </label>
                                                <div class="input-form mb-0 w-100">
                                                    <input type="text" class="form-control to_new_balance" id="" placeholder="Add Amount Here" value="">
                                                    <button id="" type="button" class="btn btn-primary">BTC</button>
                                                </div>
                                            </div>
                                            <div class="col-md-11 mx-auto px-0 mt-5">
                                                <label class="d-block" style="color: #888ea8;font-size: 13px;text-transform: capitalize;letter-spacing: 1px;">Message </label>
                                                <textarea class="form-control" placeholder="Message" rows="4"></textarea>
                                            </div>
                                            <div class="col-md-12 text-center mb-3 mt-5">
                                                <button id="" class="btn btn-primary w-25 btn-lg update_balance" type="button">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="" class="section" method="POST" action="/admin/users/update/{{$user[0]->id}}/demo_balance" acct-type="demo">
                                <div id="" class="section skill">
                                    <div class="info">
                                        <h5 class="">Demo Balance</h5>
                                        <div class="row progress-bar-section">
                                            <div class="col-md-12 mx-auto">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-11 mx-auto px-0">
                                                            <label class="d-block" style="color: #888ea8;font-size: 13px;text-transform: capitalize;letter-spacing: 1px;">Current Balance </label>
                                                            <div class="input-form w-100">
                                                                <input type="text" class="form-control current_balance" id="skills" value="{{ $user[0]->demo_balance }}" disabled="">
                                                                <button id="" type="button" class="btn btn-primary">BTC</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 mx-auto" style="padding-left: 1.7rem;">
                                                <label class="d-block" style="color: #888ea8;font-size: 13px;text-transform: capitalize;letter-spacing: 1px;">Name </label>
                                                <button class="btn btn-primary w-100 btn-lg add_or_subtract" type="button" action="add">
                                                    <i class="fa fa-plus mr-2"></i>
                                                    <span>Add Money</span>
                                                </button>
                                            </div>
                                            <div class="col-md-6 mx-auto" style="padding-right: 1.7rem;">
                                                <label class="d-block" style="color: #888ea8;font-size: 13px;text-transform: capitalize;letter-spacing: 1px;">Amount </label>
                                                <div class="input-form mb-0 w-100">
                                                    <input type="text" class="form-control to_new_balance" id="" placeholder="Add Amount Here" value="">
                                                    <button id="" type="button" class="btn btn-primary">BTC</button>
                                                </div>
                                            </div>
                                            <div class="col-md-11 mx-auto px-0 mt-5">
                                                <label class="d-block" style="color: #888ea8;font-size: 13px;text-transform: capitalize;letter-spacing: 1px;">Message </label>
                                                <textarea class="form-control" placeholder="Message" rows="4"></textarea>
                                            </div>
                                            <div class="col-md-12 text-center mb-3 mt-5">
                                                <button id="" class="btn btn-primary w-25 btn-lg update_balance" type="button">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="edu-experience" class="section edu-experience">
                                <div class="info">
                                    <h5 class="">Others</h5>
                                    <div class="row">
                                        <div class="col-md-11 mx-auto">
                                            <div class="edu-section">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <a href="/admin/single/trade/signals/{{$user[0]->id}}" class="btn btn-primary w-100">Generate Predictions</a>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <button class="btn btn-primary w-100 reset_trading_limit" type="button" data-url="/admin/users/update/{{$user[0]->id}}/account" status="0">Reset Trading Limit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-4">
                                                                            <?php
                                                                                if($user[0]->active == 'NO'){
                                                                                    ?>
                                                                                        <button class="btn btn-dark w-100 pend_user" type="button" data-url="/admin/users/update/{{$user[0]->id}}/account" status="Yes">Unpend User</button>
                                                                                    <?php
                                                                                }
                                                                                else{
                                                                                    ?>
                                                                                        <button class="btn btn-success w-100 pend_user" type="button" data-url="/admin/users/update/{{$user[0]->id}}/account" status="No">Pend User</button>
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <?php
                                                                                if($user[0]->mailing_status == 'INACTIVE'){
                                                                                    ?>
                                                                                        <button class="btn btn-dark w-100 disable_email" type="button" data-url="/admin/users/update/{{$user[0]->id}}/account" status="Yes">Enable Email</button>
                                                                                    <?php
                                                                                }
                                                                                else{
                                                                                    ?>
                                                                                        <button class="btn btn-success w-100 disable_email" type="button" data-url="/admin/users/update/{{$user[0]->id}}/account" status="No">Disable Email</button>
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>User Status</label>
                                                                    <?php
                                                                        if($user[0]->active == 'NO'){
                                                                            ?>
                                                                                <button class="btn btn-dark w-100 a_user_status" type="button" data-url="/admin/users/update/{{$user[0]->id}}/account" status="Yes">Inactive</button>
                                                                            <?php
                                                                        }
                                                                        else{
                                                                            ?>
                                                                                <button class="btn btn-success w-100 a_user_status" type="button" data-url="/admin/users/update/{{$user[0]->id}}/account" status="No">Active</button>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>2FA Status</label>
                                                                    <?php
                                                                        if($user[0]->two_fa_status == 'ACTIVE'){
                                                                            ?>
                                                                                <button class="btn btn-success w-100 two_fa_status" type="button" data-url="/admin/users/update/{{$user[0]->id}}/account" status="No">Active</button>
                                                                            <?php
                                                                        }
                                                                        else{
                                                                            ?>
                                                                                <button class="btn btn-danger w-100 two_fa_status" type="button" data-url="/admin/users/update/{{$user[0]->id}}/account" status="Yes">Inactive</button>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Email Verification</label>
                                                                    <?php
                                                                        if(is_null($user[0]->email_verified_at)){
                                                                            ?>
                                                                                <button class="btn btn-danger w-100">No</button>
                                                                            <?php
                                                                        }
                                                                        else{
                                                                            ?>
                                                                                <button class="btn btn-dark w-100">Yes</button>
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
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="account-settings-footer">
                <div class="as-footer-container">
                    <button id="multiple-messages" type="button" class="btn btn-primary">Hello Admin!</button>
                </div>
            </div>
        </div>
    </div>
@endsection