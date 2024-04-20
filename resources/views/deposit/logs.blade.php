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
                                <th>AMOUNT DEPOSITED</th>
                                <th>AMOUNT IN COIN</th>
                                <th>COIN TYPE</th>
                                <th>NETWORK</th>
                                <th>TIME</th>
                                <th>APPROVED</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($deposits as $key => $deposit){
                                    ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $deposit->transaction_id ; ?></td>
                                            <td><?php echo $deposit->amount_deposited ; ?></td>
                                            <td><?php echo $deposit->amount_in_btc ; ?></td>
                                         <td>{{ $deposit->coin_type}}</td>
                                         <td>{{ $deposit->network}}</td>

                                            <td><?php echo $deposit->created_at ; ?></td>
                                            <td>
                                                <?php 
                                                    if($deposit->approved == 'YES'){
                                                        ?>
                                                            <span class="badge badge-success">YES</span>
                                                        <?php
                                                    }
                                                    elseif($deposit->approved == 'PENDING'){
                                                        ?>
                                                            <span class="badge badge-warning">PENDING</span>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                            <span class="badge badge-danger">NO</span>
                                                        <?php
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary mb-2 mr-2 view_slip" data-toggle="modal" slip-src="<?php echo $deposit->image_name ; ?>"  details="<?php echo $deposit->details ; ?>">
                                                    View Slip
                                                </button>
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

    <!-- Modal -->
    <div class="modal fade" id="slipModal" tabindex="-1" role="dialog" aria-labelledby="slipModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="slipModalLabel">Deposit Slip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <p class="modal-text">
                        <div>
                            <img class="slip_img img-fluid" src="" />
                        </div>
                        <div>
                            <h4 class="mt-2 h5 text-white"></h4>
                        </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
