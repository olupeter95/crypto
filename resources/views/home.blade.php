@extends('layouts.app')

@section('content')
    <div class="row layout-top-spacing">

        

        <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-three p-0">
                <div class="widget-content">
                    <!-- Chart -->
                    <div class="">
                    <!-- Chart wrapper -->
                    <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div id="tradingview_35f2bc"></div>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">        
            <div class="widget widget-chart-three p-0">
                <div class="widget-content">
                    <!-- Chart -->
                    <div class="">
                    <!-- Chart wrapper -->
                    <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div id="tradingview_45f2bc"></div>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one px-1" style="height:100%;">
                <div class="w-chart">
                    <div class="w-chart-section w-100">
                        <div class="w-detail" style="position: relative;">
                            <p class="w-title">Buy this month</p>
                            <p id="buy_this_month" class="w-stats" style="color: #28a745 !important">$ {{$usd * $buys}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one px-1" style="height:100%;">
                <div class="w-chart">
                    <div class="w-chart-section w-100">
                        <div class="w-detail" style="position: relative;">
                            <p class="w-title">Sell this month</p>
                            <p id="sell_this_month" class="w-stats">$ {{$usd * $sells}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-card-four" style="height:100%;">
                <div class="widget-content">
                    <div class="w-content">
                        <div class="w-info">
                            <h6 class="value btc_active_orders" value="{{$usd_active_orders}}"><span>{{$usd_active_orders}}</span> BTC</h6>
                            <p class="">Active Orders</p>
                        </div>
                        <div class="">
                            <div class="w-icon">
                                <span style="font-size: 16px;font-weight: 500;" class="no_of_active_orders" value="{{$no_of_active_orders}}"> {{$no_of_active_orders}} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-account-invoice-two" style="height:100%;">
                <div class="widget-content">
                    <div class="account-box">
                        <div class="info mb-0">
                            <h5 class="">Plan</h5>
                            <?php
                                if(Auth::user()->plan == 'TIER 4'){
                                    ?>
                                        <div class="mt-2"></div>
                                    <?php
                                }
                                else{
                                    ?>
                                        <div class="">
                                            <a href="/deposit" class="mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                                </svg>
                                            </a>
                                            <a href="/plans" style="display: inline-block; padding: 8px; border-radius: 6px; color: #e0e6ed; font-weight: 600; box-shadow: 0px 0px 2px 0px #bfc9d4;">Upgrade</a>
                                        </div>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="acc-action mt-0">
                            <?php
                                if(Auth::user()->plan == 'TIER 4'){
                                    ?>
                                        <h5 class="pt-2">{{ Auth::user()->plan }}</h5>
                                    <?php
                                }
                                else{
                                    ?>
                                        <h5 class="">{{ Auth::user()->plan }}</h5>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>        

        <div class="col-lg-4 layout-spacing mb-5">
            <h5 class="">Trade Pairs</h5>
            <div class="widget widget-table-two" style="height: 100%;">
                <div class="widget-content px-0">
                    <div class="">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link text-yellow" id="r-fav-tab" data-toggle="tab" href="#r-fav" role="tab" aria-controls="r-fav" aria-selected="false" style="font-size: 0.8rem;font-weight: bolder;">Fav</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-yellow active" id="r-btc-tab" data-toggle="tab" href="#r-btc" role="tab" aria-controls="r-btc" aria-selected="true" style="font-size: 0.8rem;font-weight: bolder;">BTC</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-yellow" id="r-eth-tab" data-toggle="tab" href="#r-eth" role="tab" aria-controls="r-eth" aria-selected="false" style="font-size: 0.8rem;font-weight: bolder;">ETH</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-yellow" id="r-usdt-tab" data-toggle="tab" href="#r-usdt" role="tab" aria-controls="r-usdt" aria-selected="false" style="font-size: 0.8rem;font-weight: bolder;">ALT</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade table-responsive fixed_pair_table_height" id="r-fav" role="tabpanel" aria-labelledby="r-fav-tab">
                                <table id="right-data-table" class="table row-border right-data-table table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-yellow py-2 text-center" width="120">Pair</th>
                                            <th class="text-yellow py-2 text-center">Price</th>
                                            <th class="text-yellow py-2 text-center">Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade table-responsive fixed_pair_table_height active show" id="r-btc" role="tabpanel" aria-labelledby="r-btc-tab">
                                <div>
                                    <input id="" class="form-control pairSearchInput" placeholder="Search for trade pairs" >
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center py-2">Pair</th>
                                            <th class="text-center py-2">Price</th>
                                            <th class="text-center py-2">Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($trade_coins as $key => $trade_coin) {
                                                # code...                                               
                                                if (($trade_coin->symbol == 'BTC') || ($trade_coin->symbol == 'USDT') || ($trade_coin->symbol == 'BSV') || ($trade_coin->symbol == 'CRO') || ($trade_coin->symbol == 'OKB') || ($trade_coin->symbol == 'LEO') || ($trade_coin->symbol == 'HT') || ($trade_coin->symbol == 'USDC') || ($trade_coin->symbol == 'MIOTA')) {
                                                    # code...
                                                }
                                                else{
                                                    if($trade_coin->symbol == 'XRP'){
                                                        if($trade_coin->id > 50){

                                                        }
                                                        else{
                                                            ?>
                                                                <tr class="clickable-row" data-href="">
                                                                    <td class="text-center trade_pair py-2 d-flex" style="justify-content: space-evenly;align-items: center;">
                                                                        <span class="fa fa-star-o"></span>
                                                                        <span class="text-white to_be_traded_coins_symbol">
                                                                            <span class="t_from"><?php echo $trade_coin->symbol; ?></span>/<span class="t_to">BTC</span>
                                                                        </span>
                                                                    </td>
                                                                    <td class="text-white text-center py-2">
                                                                        <span>
                                                                            <?php 
                                                                                echo(number_format(($trade_coin->price_usd/$trade_coins[0]->bpu), 8)); 
                                                                            ?>
                                                                        </span> 
                                                                    </td>
                                                                    <td class="text-white text-center py-2">
                                                                        <span class="
                                                                        <?php  
                                                                            if(($trade_coin->percent_change_24h/$trade_coins[0]->bpc) < 0){
                                                                                echo "text-danger";
                                                                            }
                                                                            elseif (($trade_coin->percent_change_24h/$trade_coins[0]->bpc) > 0) {
                                                                                # code...
                                                                                echo "text-success";
                                                                            }
                                                                        ?>"><?php echo(number_format(($trade_coin->percent_change_24h/$trade_coins[0]->bpc), 2)); ?>%</span>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    }
                                                    elseif($trade_coin->symbol == 'BNB'){
                                                        if($trade_coin->id > 50){

                                                        }
                                                        else{
                                                            ?>
                                                                <tr class="clickable-row" data-href="">
                                                                    <td class="text-center trade_pair py-2 d-flex" style="justify-content: space-evenly;align-items: center;">
                                                                        <span class="fa fa-star-o"></span>
                                                                        <span class="text-white to_be_traded_coins_symbol">
                                                                            <span class="t_from"><?php echo $trade_coin->symbol; ?></span>/<span class="t_to">BTC</span>
                                                                        </span>
                                                                    </td>
                                                                    <td class="text-white text-center py-2">
                                                                        <span>
                                                                            <?php 
                                                                                echo(number_format(($trade_coin->price_usd/$trade_coins[0]->bpu), 8)); 
                                                                            ?>
                                                                        </span> 
                                                                    </td>
                                                                    <td class="text-white text-center py-2">
                                                                        <span class="
                                                                        <?php  
                                                                            if(($trade_coin->percent_change_24h/$trade_coins[0]->bpc) < 0){
                                                                                echo "text-danger";
                                                                            }
                                                                            elseif (($trade_coin->percent_change_24h/$trade_coins[0]->bpc) > 0) {
                                                                                # code...
                                                                                echo "text-success";
                                                                            }
                                                                        ?>"><?php echo(number_format(($trade_coin->percent_change_24h/$trade_coins[0]->bpc), 2)); ?>%</span>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    }
                                                    else{
                                                        ?>
                                                            <tr class="clickable-row" data-href="">
                                                                <td class="text-center trade_pair py-2 d-flex" style="justify-content: space-evenly;align-items: center;">
                                                                    <span class="fa fa-star-o"></span>
                                                                    <span class="text-white to_be_traded_coins_symbol">
                                                                        <span class="t_from"><?php echo $trade_coin->symbol; ?></span>/
                                                                        <span class="t_to">BTC</span>
                                                                    </span>
                                                                </td>
                                                                <td class="text-white text-center py-2">
                                                                    <span>
                                                                        <?php 
                                                                            echo(number_format(($trade_coin->price_usd/$trade_coins[0]->bpu), 8)); 
                                                                        ?>
                                                                    </span> 
                                                                </td>
                                                                <td class="text-white text-center py-2">
                                                                    <span class="
                                                                    <?php  
                                                                        if(($trade_coin->percent_change_24h/$trade_coins[0]->bpc) < 0){
                                                                            echo "text-danger";
                                                                        }
                                                                        elseif (($trade_coin->percent_change_24h/$trade_coins[0]->bpc) > 0) {
                                                                            # code...
                                                                            echo "text-success";
                                                                        }
                                                                    ?>"><?php echo(number_format(($trade_coin->percent_change_24h/$trade_coins[0]->bpc), 2)); ?>%</span>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                    }
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade table-responsive fixed_pair_table_height" id="r-eth" role="tabpanel" aria-labelledby="r-eth-tab">
                                <div>
                                    <input id="" class="form-control pairSearchInput" placeholder="Search for trade pairs" >
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center py-2">Pair</th>
                                            <th class="text-center py-2">Price</th>
                                            <th class="text-center py-2">Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($trade_coins as $key => $trade_coin) {
                                                # code...                                               
                                                if (($trade_coin->symbol == 'BTC') || ($trade_coin->symbol == 'BTC') || ($trade_coin->symbol == 'USDT') || ($trade_coin->symbol == 'BCH') || ($trade_coin->symbol == 'BSV') || ($trade_coin->symbol == 'XTZ') || ($trade_coin->symbol == 'CRO') || ($trade_coin->symbol == 'OKB') || ($trade_coin->symbol == 'LEO') || ($trade_coin->symbol == 'HT') || ($trade_coin->symbol == 'OKB') || ($trade_coin->symbol == 'USDC') | ($trade_coin->symbol == 'MIOTA')) {
                                                    # code...
                                                }
                                                else{
                                                    if($trade_coin->symbol == 'XRP'){
                                                        if($trade_coin->id > 50){
                                                            
                                                        }
                                                        else{
                                                            ?>
                                                                <tr class="clickable-row" data-href="">
                                                                    <td class="text-center trade_pair py-2 d-flex" style="justify-content: space-evenly;align-items: center;">
                                                                        <span class="fa fa-star-o"></span>
                                                                        <span class="text-white to_be_traded_coins_symbol">
                                                                            <span class="t_from"><?php echo $trade_coin->symbol; ?></span>/
                                                                            <span class="t_to">ETH</span>
                                                                        </span>
                                                                    </td>
                                                                    <td class="text-white text-center py-2"><?php echo(number_format(($trade_coin->price_usd/$trade_coins[0]->epu), 8)); ?></td>
                                                                    <td class="text-white text-center py-2">
                                                                        <span class="
                                                                        <?php  
                                                                            if(($trade_coin->percent_change_24h/$trade_coins[0]->epc) < 0){
                                                                                echo "text-danger";
                                                                            }
                                                                            elseif (($trade_coin->percent_change_24h/$trade_coins[0]->epc) > 0) {
                                                                                # code...
                                                                                echo "text-success";
                                                                            }
                                                                        ?>"><?php echo(number_format(($trade_coin->percent_change_24h/$trade_coins[0]->epc), 2)); ?>%</span>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    }
                                                    elseif($trade_coin->symbol == 'BNB'){
                                                        if($trade_coin->id > 50){

                                                        }
                                                        else{
                                                            ?>
                                                                <tr class="clickable-row" data-href="">
                                                                    <td class="text-center trade_pair py-2 d-flex" style="justify-content: space-evenly;align-items: center;">
                                                                        <span class="fa fa-star-o"></span>
                                                                        <span class="text-white to_be_traded_coins_symbol">
                                                                            <span class="t_from"><?php echo $trade_coin->symbol; ?></span>/
                                                                            <span class="t_to">ETH</span>
                                                                        </span>
                                                                    </td>
                                                                    <td class="text-white text-center py-2"><?php echo(number_format(($trade_coin->price_usd/$trade_coins[0]->epu), 8)); ?></td>
                                                                    <td class="text-white text-center py-2">
                                                                        <span class="
                                                                        <?php  
                                                                            if(($trade_coin->percent_change_24h/$trade_coins[0]->epc) < 0){
                                                                                echo "text-danger";
                                                                            }
                                                                            elseif (($trade_coin->percent_change_24h/$trade_coins[0]->epc) > 0) {
                                                                                # code...
                                                                                echo "text-success";
                                                                            }
                                                                        ?>"><?php echo(number_format(($trade_coin->percent_change_24h/$trade_coins[0]->epc), 2)); ?>%</span>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    }
                                                    else{
                                                        ?>
                                                            <tr class="clickable-row" data-href="">
                                                                <td class="text-center trade_pair py-2 d-flex" style="justify-content: space-evenly;align-items: center;">
                                                                    <span class="fa fa-star-o"></span>
                                                                    <span class="text-white to_be_traded_coins_symbol">
                                                                        <span class="t_from"><?php echo $trade_coin->symbol; ?></span>/
                                                                        <span class="t_to">ETH</span>
                                                                    </span>
                                                                </td>
                                                                <td class="text-white text-center py-2"><?php echo(number_format(($trade_coin->price_usd/$trade_coins[0]->epu), 8)); ?></td>
                                                                <td class="text-white text-center py-2">
                                                                    <span class="
                                                                    <?php  
                                                                        if(($trade_coin->percent_change_24h/$trade_coins[0]->epc) < 0){
                                                                            echo "text-danger";
                                                                        }
                                                                        elseif (($trade_coin->percent_change_24h/$trade_coins[0]->epc) > 0) {
                                                                            # code...
                                                                            echo "text-success";
                                                                        }
                                                                    ?>"><?php echo(number_format(($trade_coin->percent_change_24h/$trade_coins[0]->epc), 2)); ?>%</span>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                    }
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade table-responsive fixed_pair_table_height" id="r-usdt" role="tabpanel" aria-labelledby="r-usdt-tab">
                                <div>
                                    <input id="" class="form-control pairSearchInput" placeholder="Search for trade pairs" >
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center py-2">Pair</th>
                                            <th class="text-center py-2">Price</th>
                                            <th class="text-center py-2">Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($alt_coins as $alt_coin)
                                            <tr class="limit_row" data-href="">
                                                <td class="text-center trade_pair py-2 d-flex" style="justify-content: space-evenly;align-items: center;">
                                                    <span class="fa fa-star-o"></span>
                                                    <span class="text-white to_be_traded_coins_symbol">
                                                        <span class="" price="{{$alt_coin->ratio}}">{{$alt_coin->from_pair}}</span>/
                                                        <span class="">{{$alt_coin->to_pair}}</span>
                                                    </span>
                                                </td>
                                                <td class="text-white text-center py-2">
                                                    <span>{{$alt_coin->price_usd}}</span> 
                                                </td>
                                                <td class="text-white text-center py-2">
                                                    <span class="{{$alt_coin->class}}">{{$alt_coin->percent_change_24h}}%</span>
                                                </td>
                                            </tr>
                                        @empty
                                            
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing mb-5">
            <h5 class="">Market</h5>
            <div class="widget-four">
                <div class="widget-content">
                    <div class="vistorsBrowser">
                        <div id="market_trade" class="">
                            <div class="text-center mb-3 trade_action">
                                <button class="btn btn-primary px-2" visible="yes" style="border-radius:5px; font-size:10px; font-weight: 700;">Buy</button>
                                <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">Sell</button>
                            </div>
                            <div class="">
                                <div id="market_input_box" class="mb-3">
                                    <label class="d-flex mb-0">
                                        <span class="col-6 pl-0 from_coin" value="" style="font-weight: 700;font-size: 12px;">ETH</span>
                                        <span class="col-6 pr-0 from_amount text-right" style="font-weight: 700; font-size: 12px;"><span>0.00</span> USD</span>
                                    </label>
                                    <input id="market_trade_amount" type="text" class="form-control text-center text-white" aria-label="Amount (to the nearest dollar)">
                                    <div class="alert alert-light-danger mt-3 mb-3 pt-0 pb-1 pr-0 d-none" visible="no" role="alert">
                                        <strong style="font-size: 0.875rem;">USD Value can't be <span class="alert_operator"></span> than <span class="radio_amount"></span>!</strong>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="against_coin" value="" style="font-weight: 700; font-size: 12px;">BTC</label>
                                    <input type="text" class="form-control against_amount text-white text-center" readonly="" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="text-center mb-4 market_limit_buttons">
                                    <?php
                                        if(Route::currentRouteName() == 'demo'){
                                            ?>
                                                <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">2x</button>    
                                                <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">5x</button>
                                                <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">10x</button>  
                                                <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">20x</button>
                                            <?php
                                        }
                                        else{
                                            if(Auth::user()->plan == 'TIER 1'){
                                                ?>
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">2x</button>    
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;" disabled="">5x</button>
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;" disabled="">10x</button>  
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;" disabled="">20x</button>
                                                <?php
                                            }
                                            elseif(Auth::user()->plan == 'TIER 2'){
                                                ?>
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">2x</button>    
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">5x</button>
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;" disabled="">10x</button>  
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;" disabled="">20x</button>
                                                <?php
                                            }
                                            elseif(Auth::user()->plan == 'TIER 3'){
                                                ?>
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">2x</button>    
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">5x</button>
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">10x</button>  
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;" disabled="">20x</button>
                                                <?php
                                            }
                                            elseif(Auth::user()->plan == 'TIER 4'){
                                                ?>
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">2x</button>    
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">5x</button>
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">10x</button>  
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">20x</button>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;" disabled="">2x</button>    
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;" disabled="">5x</button>
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;" disabled="">10x</button>  
                                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;" disabled="">20x</button>
                                                <?php
                                            }
                                        }
                                        
                                    ?>
                                    
                                </div>
                                <div class="text-center mb-4 market_interval_buttons">
                                    <button class="btn px-1 py-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">1 min</button>
                                    <button class="btn px-1 py-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">3 mins</button>
                                    <button class="btn px-1 py-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">5 mins</button>
                                    <button class="btn px-1 py-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">30 mins</button>
                                    <button class="btn px-1 py-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">1 hr</button>    
                                </div>
                            </div>
                            
                            <div class="mt-3 text-center">
                                <a class="btn btn-primary col-7 text-white selected_trade_action" style="border-radius:5px; font-size:10px; font-weight: 700;">BUY</a>
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing mb-5">
            <h5 class="">Limit | Stop Limit</h5>
            <div class="statbox widget box box-shadow px-1" style="height: 100%;">
                <div class="widget-content widget-content-area icon-tab px-0 bg-transparent">
                    <div class="d-flex">
                        <div id="limit_box" class="col-lg-6 col-md-6">
                            <div class="text-center mb-3 trade_action">
                                <button class="btn btn-primary" visible="yes" style="border-radius:5px; font-size:10px; font-weight: 700;">Buy</button>
                                <button class="btn" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">Sell</button>
                            </div>
                            <div class="">
                                <div class="mb-3">
                                    <label class="d-flex mb-0">
                                        <span class="col-6 pl-0 from_alt_coin" value="" price="{{$first_alt_coin->ratio}}" style="font-weight: 700;font-size: 12px;">{{$first_alt_coin->from_pair}}</span>
                                        <span class="col-6 pr-0 to_alt_coin text-right" style="font-weight: 700; font-size: 12px;"><span>0.00</span> USDT</span>
                                    </label>
                                    <input id="" type="text" class="form-control text-center text-white coin_price" aria-label="Amount (to the nearest dollar)">
                                    {{-- <div class="alert alert-light-danger mt-3 mb-3 pt-0 pb-1 pr-0 d-none" visible="no" role="alert">
                                        <strong style="font-size: 0.875rem;">USD Value can't be <span class="alert_operator"></span> than <span class="radio_amount"></span>!</strong>
                                    </div> --}}
                                </div>
                               
                                <div class="mb-3">
                                    <label class="d-flex">
                                        <span class="col-8 pl-0" style="font-weight: 700; font-size: 12px;">Limit</span>
                                    </label>
                                    <input type="text" class="form-control text-center text-white py-4 limit_price" aria-label="Amount (to the nearest dollar)">
                                </div>
                                <div class="text-center mb-4 limit_buttons">
                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">25%</button>    
                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">50%</button>
                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">75%</button>  
                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">100%</button>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <a class="btn btn-primary col-7 text-white selected_trade_action" style="border-radius:5px; font-size:10px; font-weight: 700;">Buy</a>
                            </div>
                        </div>
                        <div id="stop_limit_box" class="col-lg-6 col-md-6">
                            <div class="text-center mb-3 trade_action">
                                <button class="btn" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">Buy</button>
                                <button class="btn btn-danger" visible="yes" style="border-radius:5px; font-size:10px; font-weight: 700;">Sell</button>
                            </div>
                            <div class="">
                                <div class="mb-3">
                                    <label class="d-flex mb-0">
                                        <span class="col-6 pl-0 from_alt_coin" value="" price="{{$first_alt_coin->ratio}}" style="font-weight: 700;font-size: 12px;">{{$first_alt_coin->from_pair}}</span>
                                        <span class="col-6 pr-0 to_alt_coin text-right" style="font-weight: 700; font-size: 12px;"><span>0.00</span> USDT</span>
                                    </label>
                                    <input id="" type="text" class="form-control text-center text-white coin_price" aria-label="Amount (to the nearest dollar)">
                                    {{-- <div class="alert alert-light-danger mt-3 mb-3 pt-0 pb-1 pr-0 d-none" visible="no" role="alert">
                                        <strong style="font-size: 0.875rem;">USD Value can't be <span class="alert_operator"></span> than <span class="radio_amount"></span>!</strong>
                                    </div> --}}
                                </div>
                                <div class="mb-3">
                                    <label class="d-flex">
                                        <span class="col-8 pl-0" style="font-weight: 700; font-size: 12px;">Limit</span>
                                    </label>
                                    <input type="text" class="form-control text-center text-white py-4 limit_price" aria-label="Amount (to the nearest dollar)">
                                </div>
                                <div class="mb-3">
                                    <label style="font-weight: 700; font-size: 12px;">Stop</label>
                                    <input type="text" class="form-control text-white text-center stop_limit_price" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="text-center mb-4 leverage_buttons">
                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">25%</button>    
                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">50%</button>
                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">75%</button>  
                                    <button class="btn px-2" visible="no" style="border-radius:5px; font-size:10px; font-weight: 700;">100%</button>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <a class="btn btn-danger col-7 text-white selected_trade_action" style="border-radius:5px; font-size:10px; font-weight: 700;">Sell</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-one" style="height: 100%;">
                <div class="widget-heading">
                    <h5 class="">Most Recent Earnings</h5>
                </div>

                <div class="widget-content" id="earnings_display">
                    <?php
                        if(count($live_earnings) == 0){
                            ?>
                                <div id="empty_earnings" class="text-center">
                                    <img class="w-50" src="{{ asset('/assets/svg/e_a.svg') }}">
                                </div>
                            <?php
                        }
                        elseif(count($live_earnings) > 0){
                            foreach($live_earnings as $key => $live_earning){
                                ?>
                                    <div class="transactions-list">
                                        <div class="t-item">
                                            <div class="t-company-name">
                                                <div class="t-icon">
                                                    <div class="avatar avatar-xl">
                                                        <span class="avatar-title rounded-circle">
                                                            <?php
                                                                if($live_earning->trade_type == 'LIVE'){
                                                                    echo 'LT';
                                                                }
                                                                else{
                                                                    echo 'DT';
                                                                }
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="t-name">
                                                    <h4><?php echo $live_earning->transaction_id; ?></h4>
                                                    <p class="meta-date">
                                                        <?php
                                                            $timestamp          = $live_earning->created_at;
                                                            $datetime           = explode(" ",$timestamp);
                                                            $date               = $datetime[0];

                                                            $exploded_date      = explode("-", $date);
                                                            // print_r($exploded_date);
                                                            switch($exploded_date[1]){
                                                                case '01':
                                                                    $date = $exploded_date[2] . ' Jan';
                                                                break;

                                                                case '02':
                                                                    $date = $exploded_date[2] . ' Feb';
                                                                break;

                                                                case '03':
                                                                    $date = $exploded_date[2] . ' Mar';
                                                                break;

                                                                case '04':
                                                                    $date = $exploded_date[2] . ' Apr';
                                                                break;

                                                                case '05':
                                                                    $date = $exploded_date[2] . ' May';
                                                                break;

                                                                case '06':
                                                                    $date = $exploded_date[2] . ' Jun';
                                                                break;

                                                                case '07':
                                                                    $date = $exploded_date[2] . ' Jul';
                                                                break;

                                                                case '08':
                                                                    $date = $exploded_date[2] . ' Aug';
                                                                break;

                                                                case '09':
                                                                    $date = $exploded_date[2] . ' Sep';
                                                                break;

                                                                case '10':
                                                                    $date = $exploded_date[2] . ' Oct';
                                                                break;

                                                                case '11':
                                                                    $date = $exploded_date[2] . ' Nov';
                                                                break;

                                                                case '12':
                                                                    $date = $exploded_date[2] . ' Dec';
                                                                break;
                                                            }

                                                            $time               = $datetime[1];
                                                            $formatted_time     = explode(":", $time);

                                                            if($formatted_time[0] > 12){
                                                                $meridian   = 'PM';
                                                            }
                                                            else{
                                                                $meridian = 'AM';
                                                            }

                                                            $time       = $formatted_time[0] . ":" . $formatted_time[1] . $meridian;
                                                            echo $date . " " . $time;
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <?php
                                                if($live_earning->status == 'LOSS'){
                                                    ?>
                                                        <div class="t-rate rate-dec">
                                                            <p>
                                                                <span>-$<?php echo $live_earning->expected_return ?></span> 
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down">
                                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                    <polyline points="19 12 12 19 5 12"></polyline>
                                                                </svg>
                                                            </p>
                                                        </div>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                        <div class="t-rate rate-inc">
                                                            <p>
                                                                <span>+$<?php echo $live_earning->expected_return ?></span> 
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up">
                                                                    <line x1="12" y1="19" x2="12" y2="5"></line>
                                                                    <polyline points="5 12 12 5 19 12"></polyline>
                                                                </svg>
                                                            </p>
                                                        </div>
                                                    <?php
                                                }
                                            ?>                                                
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">        
            <div class="widget widget-account-invoice-one">

                <div class="widget-heading">
                    <div class="d-flex">
                        <h5 class="">Account Info</h5>
                    </div>
                </div>

                <div class="widget-content">
                    <div class="invoice-box">
                        
                        <div class="acc-total-info">
                            <h5>Balance</h5>
                            <?php
                                if(Route::currentRouteName() == 'home'){
                                    ?>
                                        <p class="acc-amount" value="{{Auth::user()->main_balance }}">{{$usd * Auth::user()->main_balance }}</p>
                                    <?php
                                }
                                else{
                                    ?>
                                        <p class="acc-amount" value="{{Auth::user()->demo_balance }}">{{$usd * Auth::user()->demo_balance }}</p>
                                    <?php
                                }
                            ?>
                            <div class="">
                                <label style="font-size: 12px;">Switch Currency</label>
                                <select id="switch_currency" class="form-control">
                                    <option value="USD">USD</option>
                                    <option value="GBP">GBP</option>
                                    <option value="EUR">EUR</option>
                                    <option value="JPY">JPY</option>
                                    <option value="CNY">CNY</option>
                                </select>
                            </div>
                        </div>

                        <div class="inv-detail">                                        
                            <div class="info-detail-x">
                                <p>Available BTC</p>
                                <?php
                                    if(Route::currentRouteName() == 'home'){
                                        ?>
                                            <data class="available-btc" type="available-btc" value="{{Auth::user()->main_balance }}">{{Auth::user()->main_balance }} BTC</data>
                                        <?php
                                    }
                                    else{
                                        ?>
                                            <data class="available-btc" type="available-btc" value="{{Auth::user()->demo_balance }}">{{Auth::user()->demo_balance }} BTC</data>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="info-detail-1">
                                <p>Available Margin</p>
                                <?php
                                    if(Route::currentRouteName() == 'home'){
                                        ?>
                                            <data class="available-usd" type="available-usd" value="{{Auth::user()->main_balance }}"> {{$usd * Auth::user()->main_balance }}</data>
                                        <?php
                                    }
                                    else{
                                        ?>
                                            <data class="available-usd" type="available-usd" value="{{Auth::user()->demo_balance }}"> {{$usd * Auth::user()->demo_balance }}</data>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="info-detail-1">
                                <p>Maintenance Fee</p>
                                <data type="maintenance-fee" value="0.00005"> {{$usd * 0.00005}}</data>
                            </div>
                        </div>

                        <div class="inv-action">
                            <a href="/deposit" class="btn btn-dark">Deposit</a>
                            <a href="/withdraw" class="btn btn-danger">Withdraw</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">        
            <div class="widget widget-account-invoice-one p-0">
                <div class="widget-content">
                    <div id="tradingview_85f2bg" class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script src="https://cointelegraph.com/news-widget" data-ct-widget-limit="10" data-ct-widget-theme="dark" data-ct-widget-images="true" data-ct-widget-currency="USD" data-ct-widget-language="en" data-ct-widget-height="366" ></script>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">
                <div class="widget-content">
                    <div class="">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link text-yellow active" id="r-or-tab" data-toggle="tab" href="#r-or" role="tab" aria-controls="r-or" aria-selected="true">Open Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-yellow" id="r-th-tab" data-toggle="tab" href="#r-th" role="tab" aria-controls="r-th" aria-selected="false">Trade History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-yellow" id="r-l-tab" data-toggle="tab" href="#r-l" role="tab" aria-controls="r-l" aria-selected="false">Limit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-yellow" id="r-sl-tab" data-toggle="tab" href="#r-sl" role="tab" aria-controls="r-sl" aria-selected="false">Stop Limit</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="r-or" role="tabpanel" aria-labelledby="r-or-tab">
                                <div class="table-responsive">
                                    <table class="table">
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
                                        <tbody id="open_orders_tbody">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="r-th" role="tabpanel" aria-labelledby="r-th-tab">
                                <div class="table-responsive" style="height: 300px;">
                                    <table class="table">
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
                                                foreach($trades_history as $key => $trade_history){
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
                            <div class="tab-pane fade" id="r-l" role="tabpanel" aria-labelledby="r-l-tab">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>TRANSACTION ID</th>
                                                <th>DATE</th>
                                                <th>OPEN TIME</th>
                                                <th>TRADE LIMIT</th>
                                                <th>SYMBOL TRADED</th>
                                                <th>CRYPTO TRADED</th>
                                                <th>ASSETS</th>
                                                <th>LEVERAGE</th>
                                                <th>TRADE TYPE</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody id="limit_tbody">
                                            <?php
                                                foreach($limit_trades as $key => $limit_trade){
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $key + 1; ?></td>
                                                            <td><?php echo $limit_trade->transaction_id ; ?></td>
                                                            <td><?php echo $limit_trade->date ; ?></td>
                                                            <td><?php echo $limit_trade->open_time ; ?></td>
                                                            <td><?php echo $limit_trade->trade_limit ; ?></td>
                                                            <td class="text-center"><?php echo $limit_trade->symbol_traded ; ?></td>
                                                            <td class="text-center"><?php echo $limit_trade->traded_crypto_amount ; ?></td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                                        <img alt="avatar" class="img-fluid rounded-circle" src="https://s2.coinmarketcap.com/static/img/coins/200x200/1.png">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?php echo $limit_trade->initiator ; ?>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                    if($limit_trade->action == 'Buy'){
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
                                                                    if($limit_trade->status == 'PROFIT'){
                                                                        ?>
                                                                            <span class="badge badge-success text-center">PROFIT</span>
                                                                        <?php
                                                                    }
                                                                    elseif ($limit_trade->status == 'PENDING') {
                                                                        # code...
                                                                        ?>
                                                                            <span class="badge badge-warning text-center">PENDING</span>
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
                            <div class="tab-pane fade" id="r-sl" role="tabpanel" aria-labelledby="r-sl-tab">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>TRANSACTION ID</th>
                                                <th>DATE</th>
                                                <th>OPEN TIME</th>
                                                <th>TRADE LIMIT</th>
                                                <th>TRADE STOP LIMIT</th>
                                                <th>SYMBOL TRADED</th>
                                                <th>CRYPTO TRADED</th>
                                                <th>ASSETS</th>
                                                <th>LEVERAGE</th>
                                                <th>TRADE TYPE</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody id="stop_limit_tbody">
                                            <?php
                                                foreach($stop_limit_trades as $key => $stop_limit_trade){
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $key + 1; ?></td>
                                                            <td><?php echo $stop_limit_trade->transaction_id ; ?></td>
                                                            <td><?php echo $stop_limit_trade->date ; ?></td>
                                                            <td><?php echo $stop_limit_trade->open_time ; ?></td>
                                                            <td><?php echo $stop_limit_trade->trade_limit ; ?></td>
                                                            <td><?php echo $stop_limit_trade->trade_stop_limit ; ?></td>
                                                            <td class="text-center"><?php echo $stop_limit_trade->symbol_traded ; ?></td>
                                                            <td class="text-center"><?php echo $stop_limit_trade->traded_crypto_amount ; ?></td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                                        <img alt="avatar" class="img-fluid rounded-circle" src="https://s2.coinmarketcap.com/static/img/coins/200x200/1.png">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?php echo $stop_limit_trade->leverage ; ?>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                    if($stop_limit_trade->action == 'Buy'){
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
                                                                    if($stop_limit_trade->status == 'PROFIT'){
                                                                        ?>
                                                                            <span class="badge badge-success text-center">PROFIT</span>
                                                                        <?php
                                                                    }
                                                                    elseif ($stop_limit_trade->status == 'PENDING') {
                                                                        # code...
                                                                        ?>
                                                                            <span class="badge badge-warning text-center">PENDING</span>
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
        </div>

    </div>

    <?php
        if(Auth::user()->plan == 'ACTIVATE'){
            ?>
                <!-- Modal -->
                <div class="modal fade modal-notification" id="activateModal" tabindex="-1" role="dialog" aria-labelledby="activateModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" id="activateModalLabel">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <div class="icon-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                                </div>
                                <p class="modal-text">You can't make any live trades because you are yet to <span class="text-primary" style="font-weight:bold;">ACTIVATE PLAN</span>. Please take steps to activate your account by clicking on the button below to begin trading on the platform.</p>
                                <a href="/plans" class="btn btn-primary">Activate Plan</a>
                                <a href="/demo" class="btn btn-danger">Try Demo</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    ?>

@endsection

@section('javascript')
    <script src="/js/home.js"></script>
@endsection
