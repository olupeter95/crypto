@extends('layouts.app3')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>TRADE ID</th>
                                <th>WALLET AMOUNT (USD)</th>
                                <th>PROFIT/LOSS</th>
                                <th>CURRENT BALANCE (USD)</th>
                                <th>DATE EARNED</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($live_earnings as $key => $live_earning){
                                    ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $live_earning->transaction_id ; ?></td>
                                            <td>{{$live_earning->wallet_amount }}</td>
                                            <td>
                                                <?php
                                                    if($live_earning->status == 'PROFIT'){
                                                        ?>
                                                            <span class="text-success">+{{$live_earning->expected_return}} USD</span></td>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                            <span class="text-danger">-{{$live_earning->expected_return}} USD</span></td>
                                                        <?php
                                                    }
                                                ?>
                                            <td>{{$live_earning->earnings}}</td>
                                            <td>{{$live_earning->created_at}}</td>
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
