@extends('layouts.app3')

@section('content')
<div id="wrapper">
    <div id="content-wrapper">
        <div class="container-fluid pb-0">
            <div class="">
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="main-title mt-0">
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <h5 style="font-weight:bold;">Conversation
                        <span class="ml-3 badge px-4 py-1 <?php echo($all->status == 'OPEN') ? 'badge-primary' : 'badge-danger' ?>" >{{$all->status}}</span>
                    </h5>
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="">
                                <h5>
                                    <i class="fas fa-fw fa-folder text-white"></i>&nbsp;  Subject: 
                                    <span class="h6" ><?php echo $all->subject; ?></span>
                                </h5>
                                <h5>
                                    <i class="fas fa-fw fa-folder text-white"></i> &nbsp; Category:
                                    <span class="h6" ><?php echo $all->category; ?></span>
                                </h5>
                                <h5>
                                    <i class="fas fa-fw fa-folder text-white"></i> &nbsp; Description:
                                    <span class="h6" ><?php echo $all->description; ?></span>
                                </h5>
                                <h5>
                                    <i class="fas fa-fw fa-folder text-white"></i> &nbsp; Date Created:
                                    <span class="h6" ><?php echo $all->created_at; ?></span>
                                </h5>
                                
                                <div id="ticketRepliesContainer">
                                    <?php
                                        foreach($all->conversations as $key => $conversation){
                                            if($conversation['role'] == 'User'){
                                                ?>
                                                        <div class="col-md-9 video-card px-4 box mt-5 bg-dark rounded">
                                                            <div class="single-video-author p-3">
                                                                <div class="d-flex">
                                                   
                                                                    <img class="img-fluid rounded-circle" src="/assets/admin/img/s4.png" alt="" style="width: 50px;">
                                                                    
                                                                    <div class="">
                                                                        <p>
                                                                            <a href="javascript:void(0);">
                                                                                <strong class="text-white">{{Auth::user()->name}}</strong>
                                                                            </a>
                                                                            <i class="fas fa-check-circle text-primary"></i>                                                            </p>
                                                                        <small class="text-white mt-0">Published on <?php echo $conversation['created_at'] ?></small>
                                                                    </div>
                                                                </div>
                  
            
                                                                <p class="p-4 text-white"><?php echo $conversation['message']; ?></p>
            
                                                            </div>
                                                        </div>
                                                <?php
                                            }
                                            elseif($conversation['role'] == 'Admin'){
                                                ?>
                                                   <div class="col-md-9 offset-md-3 video-card px-4 box mt-5 bg-dark rounded">
                                                    <div class="single-video-author p-3">
                                                        <div class="d-flex justify-content-end">
                                           
                                                            <img class="img-fluid rounded-circle" src="/assets/admin/img/s4.png" alt="" style="width: 50px;">
                                                            
                                                            <div class="">
                                                                <p>
                                                                    <a href="javascript:void(0);">
                                                                        <strong class="text-white">Coinshape Admin</strong>
                                                                    </a>
                                                                    <i class="fas fa-check-circle text-primary"></i>                                                            </p>
                                                                <small class="text-white">Published on <?php echo $conversation['created_at'] ?></small>
                                                            </div>
                                                        </div>
          
    
                                                        <p class="p-4 text-white"><?php echo $conversation['message']; ?></p>
    
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>

                                <?php   
                                    if($all->status == 'OPEN'){
                                        ?>
                                     <div class="card m-4 col-md-10 offset-md-2">
                                        <form action="{{route('support.tickets.reply')}}" method="POST">
                                            @csrf
                                            <div class=" m-3 p-2">
                                                <div class="form-group">
                                                    <input type="hidden" name="ddd" value="<?php echo $all->id; ?>">
                                                    <input type="hidden" name="tiD" value="<?php echo $all->ticket_id; ?>">
                                                    <label class="control-label">Reply</label>
                                                    <textarea id="topic_brief"
                                                        class="form-control border-form-control text-white " rows="9" name="description"></textarea>
                                                </div>
                                                <button id="submit_reply" type="submit" class="btn btn-success border-none"> Reply
                                                </button>
                                            </div>
                                        </form>
                                     </div>
                                            
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <p class="mt-5 text-center bg-danger w-75 mx-auto py-3" style="border-radius: 15px;">This ticket was closed on <?php echo $all->updated_at; ?></p>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>

</div>
</div>
@endsection
