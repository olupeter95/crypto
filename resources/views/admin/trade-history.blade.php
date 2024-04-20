@extends('admin.layouts.app')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
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
                                            <td class="trade_date" visible="no">
                                                <p><?php echo $trade_history->date ; ?></p>
                                                <div class="d-none">
                                                    <form method="POST" action="/admin/trade/history/{{$trade_history->transaction_id}}/edit" class="d-flex">
                                                        @csrf
                                                        <input type="date" name="trade_date" class="form-control mt-0 pr-0 col-9" value="<?php echo $trade_history->date ; ?>" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;">
                                                        <button class="input-group-append btn col-3 text-white" type="submit" style="border-top-left-radius: 0px;border-bottom-left-radius: 0px; background:#000000;">
                                                            <i class="fa fa-check pt-2"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
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
@endsection