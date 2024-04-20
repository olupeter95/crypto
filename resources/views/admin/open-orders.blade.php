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
                                <th>NAME</th>
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
                            <?php
                                foreach($open_orders as $key => $open_order){
                                    ?>
                                        <tr>
                                            <td class="py-1">{{$key + 1}}</td>
                                            <td class="py-1">{{$open_order->name}}</td>
                                            <td class="py-1">{{$open_order->transaction_id}}</td>
                                            <td class="py-1">{{$open_order->date}}</td>
                                            <td class="py-1">{{$open_order->open_time}}</td>
                                            <td class="py-1">{{$open_order->close_time}}</td>
                                            <td class="py-1">{{$open_order->symbol_traded}}</td>
                                            <td class="py-1">{{$open_order->amount_traded_btc}}</td>
                                            <td class="py-1">BTC</td>
                                            <td class="py-1">{{$open_order->trade_interval}}</td>
                                            <td class="py-1">{{$open_order->action}}</td>
                                            <td id="trade_progress{{$open_order->transaction_id}}" class="py-1">   
                                                <div style="height : 10px; border-radius : 30px"></div>
                                                <p class="text-center" style="font-weight: 700;"></p>
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