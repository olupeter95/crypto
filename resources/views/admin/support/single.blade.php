<style>
    .submit-btn {
        background-color: #2dd3aa !important;
        padding: 5px 10px !important;
        border-radius: 5px !important;
    }
    textarea {
        width: 100%;
        height: 200px;
        background-color: #9c9c9c;
    }
    .close {
        background-color: red !important;
        padding: 15px !important;
        border-radius: 5px !important;
        color: white !important;
        font-size: 18px !important;
    }
    </style>
@extends('admin.layouts.app')

@section('content')



    <div class="container-fluid mt-5">
      
    
        <div class="">
          
            <div class="support-content mt-3 ">
                <h6 class="support-subhead mb-0"></h6>
                <h6 style="font-weight:bold;">Conversation
                    <?php   
                        if($all[0]->status == 'OPEN'){
                            ?>
                                <button class="btn btn-success btn-sm  ml-2">OPEN</button>
                            <?php
                        }
                        else{
                            ?>
                                <button class="btn btn-danger btn-sm ml-2">CLOSED</button>
                            <?php
                        }
                    ?>
                </h6>
                <?php   
                    if($all[0]->status == 'OPEN'){
                        ?>
                        <form action="{{route('admin.support.close')}}" method="POST">
                            @csrf
                            <input type="hidden" name="ticket_id" value="{{$all[0]->ticket_id}}">
                            <button type="submit" id="close_ticket_button" class="close float-right bg-danger"><i class="fas fa-times"></i> Close ticket </button>

                        </form>
                        <?php
                    }
                    else{
                        
                    }
                ?>
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="support-content-body box">
                            <h6>
                                <i class="fas fa-fw fa-folder support-icon"></i> Subject:
                                <span class="support-span" style="color:rgb(156, 154, 154) !important"><?php echo $all[0]->subject; ?></span>
                            </h6>
                            <h6>
                                <i class="fas fa-fw fa-folder support-icon"></i> Category:
                                <span class="support-span" style="color:rgb(156, 154, 154) !important"><?php echo $all[0]->category; ?></span>
                            </h6>
                            <h6>
                                <i class="fas fa-fw fa-folder support-icon"></i> Description:
                                <span class="support-span" style="color:rgb(156, 154, 154) !important"><?php echo $all[0]->description; ?></span>
                            </h6>
                            <h6>
                                <i class="fas fa-fw fa-folder support-icon"></i> Date Created:
                                <span class="support-span" style="color:rgb(156, 154, 154) !important"><?php echo $all[0]->created_at; ?></span>
                            </h6>

                          <div class="ticketRepliesContainer col-md-12">
                            <?php
                            foreach($all[0]->conversations as $key => $conversation){
                                if($conversation['role'] == 'Admin'){
                                    ?>
                                        <div class="col-md-9 video-card px-4 box mt-5 bg-dark rounded">
                                            <div class="single-video-author p-3">
                                                <div class="d-flex">
                                   
                                                    <img class="img-fluid rounded-circle" src="/assets/admin/img/s4.png" alt="" style="width: 50px;">
                                                    
                                                    <div class="">
                                                        <p>
                                                            <a href="javascript:void(0);">
                                                                <strong class="text-white">Coinshape Admin</strong>
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
                                else{
                                    ?>
                                         <div class="col-md-9 offset-md-3 video-card px-4 box mt-5 bg-dark rounded">
                                            <div class="single-video-author p-3">
                                                <div class="d-flex justify-content-end">
                                   
                                                    <img class="img-fluid rounded-circle" src="/assets/admin/img/s4.png" alt="" style="width: 50px;">
                                                    
                                                    <div class="">
                                                        <p>
                                                            <a href="javascript:void(0);">
                                                                <strong class="text-white">{{$full_name}}</strong>
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

                        <?php   
                            if($all[0]->status == 'OPEN'){
                                ?>
                           <div class="m-4 card ">

                                <form action="{{route('admin.support.reply')}}" method="post">
                                    @csrf
                                    <div class=" m-3 p-2">

                                        <div class="form-group">
                                            <input type="hidden" name="ddd" value="{{$all[0]->id}}">
                                            <label class="control-label ">Reply</label>
                                            <textarea id="topic_brief" class="form-control border-form-control text-white" name="description" rows="9"></textarea>
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
                                    <p class="text-center mt-3 bg-danger w-75 mx-auto py-3" style="border-radius: 15px;">This ticket was closed on <?php echo $all[0]->updated_at; ?></p>
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
    @endsection
    

