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
                                <th>TRANSACTION ID</th>
                                <th>METHOD</th>
                                <th>SENT TO</th>
                                <th>AMOUNT</th>
                                <th>STATUS</th>
                                <th>TIME</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($withdrawals as $key => $withdrawal){
                                    ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $withdrawal->transaction_id ; ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                        <img alt="avatar" class="img-fluid rounded-circle" src="https://s2.coinmarketcap.com/static/img/coins/200x200/1.png">
                                                    </div>
                                                    <p class="mt-2 ml-2">BTC</p>
                                                </div>
                                            </td>
                                            <td><?php echo $withdrawal->wallet_address ; ?></td>
                                            <td><?php echo $withdrawal->amount ; ?></td>
                                            <td>
                                                <?php 
                                                    if($withdrawal->approved == 'NO'){
                                                        ?>
                                                            <span class="badge badge-danger"> Cancelled </span></td>
                                                        <?php
                                                    }
                                                    elseif($withdrawal->approved == 'PENDING'){
                                                        ?>
                                                            <span class="badge badge-warning"> Pending </span></td>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                            <span class="badge badge-success"> Approved </span></td>
                                                        <?php
                                                    }
                                                ?>
                                            <td><?php echo $withdrawal->created_at ; ?></td>
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
