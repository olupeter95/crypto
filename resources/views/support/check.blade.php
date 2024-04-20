@extends('layouts.app3')

@section('content')
<div class="container-fluid my-5 settings">

    <div class="row layout-top-spacing">
        @foreach ($tickets as $key => $ticket)

          <div class="col-md-3">
                    <a href="/support/tickets/<?php echo $ticket->id;?>"  class="text-white">
                    <div class="landing-feature-item card">
                        <i class="fas fa-fw fa-2x fa-folder support-icon"></i>
                        <div class="card-body">
                            <i class="icon ion-md-folder-open"></i>

                            <div class=" h4">
                                {{$ticket->subject}}
                            </div>                
                        <div>   
                            
                            <div class="text-white">
                                <strong>Date:</strong> <?php echo $ticket->created_at->diffForHumans(); ?>
                            </div>
                        </div>
                        <div style="position: absolute;top: 0px;right: 0px;">
                            <span class="badge <?php echo($ticket->status == 'OPEN') ? 'btn-primary' : 'btn-danger' ?> px-3 py-1">Status: {{$ticket->status}}</span>
                        </div>  
                        <div class="d-flex justify-content-end">
                            <a href="/support/tickets/<?php echo $ticket->id; ?>" class="text-white font-weight-bold">View
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>           
                        </div>
                    </div>
                  
                     </a>
    
            </div>
        
               
        @endforeach

    </div>
</div>
@endsection
