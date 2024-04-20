
<style>
    a {
        color: white !important;
    }
    .support-content-body h6 {
        color: #2dd3aa !important;
    }
    ul {
        list-style: none !important;
    }
    .support-content-body {
        height: 100% !important;
    }
    .support-content {
        margin: 0 15px !important;
    }
    .support-overview {
        background-color: #27292c;
        border-radius: 5px;
        padding: 10px;
    }
    .user-advertiser {
        color: #2dd3aa;
        font-size: 14px;
    }
    .user-welian {
        color: #3e2bce;
        font-size: 14px;
    }
    .closed {
        background-color: red;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 5px;
    }
    .open {
        background-color: #2dd3aa;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 5px;
    }
    .show-btn {
        background-color: #3e2bce;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 5px;
    }
    </style>
@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid mt-5">
       
        <div class="">
    
            <div class="row mt-2">
                <?php
                    foreach($tickets as $key => $ticket){
                        ?>
                            <div class="col-md-4 col-sm-12 mb-5">
                                <div class="support-overview ">
                                    <div class=" ">
                                        <div class="justify-content-end p-2">
                                            <small class="answer-date text-white mb-2" style="float:right"> {{$ticket->created_at}}</small>

                                        </div>
    
                                        <div class="" style="display:flex; align-items:center; color:white;">
                                          
                                            <h6 class="m-0 ml-2 text-white"> Email : <small class="text-white">  {{$ticket->email}}</small></h6>
                                        </div>
                                        <div>
                                            <h6 class="m-0 ml-2 text-white"> Category : <small class="text-white">{{$ticket->category}} </small> </h6>

                                        </div>
    
                                        <div>
                                            <h6 class="m-0 ml-2 text-white"> Subject : <small class="text-white">{{$ticket->subject}} </small> </h6>

                                        </div>
                                    </p>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <a class="btn btn-sm btn-show text-dark mr-2" href="/admin/support/ticket/{{$ticket->id}}">SHOW</a>
                                        <?php
                                            if($ticket->status == 'OPEN'){
                                                ?>
                                                    <button class=" btn btn-sm btn-success">OPEN</button>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                    <button class=" btn btn-sm  btn-danger">CLOSED</button>
                                                <?php
                                            }
                                        ?>
                                        
                                    </div>
    
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    
    </div>
    
    @endsection

