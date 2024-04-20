@extends('admin.layouts.app')

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Approved Deposits</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-4">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Transaction ID</th>
                                        <th>Coin Type</th>
                                        <th>Amount Deposited (USD)</th>
                                        <th>In Coin</th>
                                        <th>Network</th>
                                        <th class="text-center">Status</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($deposits as $key => $deposit){
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="usr-img-frame mr-2 rounded-circle bg-transparent">
                                                                <img alt="avatar" class="img-fluid rounded-circle" src="/assets/img/90x90.jpg">
                                                            </div>
                                                            <p class="align-self-center mb-0">{{ $deposit->name }}</p>
                                                        </div>
                                                    </td>
                                                    <td>{{ $deposit->transaction_id }}</td>
                                                    <td>{{ $deposit->coin_type}}</td>


                                                    <td class="text-center">{{ $deposit->amount_deposited }}</td>
                                                    <td>{{ $deposit->amount_in_btc }}</td>
                                                    <td>{{ $deposit->network }}</td>

                                                    <td>
                                                        <?php
                                                            if($deposit->approved == 'PENDING'){
                                                                ?>
                                                                    <button class="btn btn-sm btn-warning">Pending</button>
                                                                <?php
                                                            }
                                                            elseif($deposit->approved== 'YES'){
                                                                ?>
                                                                    <button class="btn btn-sm btn-success">Approved</button>
                                                                <?php
                                                            }
                                                            else{
                                                                ?>
                                                                    <button class="btn btn-sm btn-danger">Cancelled</button>
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>{{ $deposit->created_at }}</td>
                                                    <td class="text-center">
                                                        <div class="dropdown custom-dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
                                                                <a  class="dropdown-item  mb-2 mr-2 view_slip" data-toggle="modal" slip-src="<?php echo $deposit->image_name ; ?>" details="<?php echo $deposit->details ; ?>">
                                                                    View Slip
                                                                </a>                                                          
                                                              </div>
                                                        </div>
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
                            <h4 class="mt-2 h5"></h4>
                        </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>    
    $('.view_slip').on('click', function(){
        console.log('hi')
        $('#slipModal img').attr('src', '/storage/deposits/'+$(this).attr('slip-src'));
        $('#slipModal h4').text($(this).attr('details'));
        
        $('#slipModal').modal();
    });
</script>
@endsection