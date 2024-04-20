@extends('layouts.app3')

@section('content')
<style>
    .card{
        height: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .filter-white{
        filter: brightness(0) invert(1);
    }
</style>

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="settings ">
                    <div class="container">
                        <div class="row mt-5 pt-3">
                            
                            <div class="col-md-5  card">
                                <a href="{{route('support.new')}}"  class="text-white d-flex">
                                    <img src="{{ asset('assets/img/stroge.svg')}}" alt="" height="50" class="filter-white mr-3">

                                        <h3 class="font-weight-bold">
                                            New Ticket
                                            </h3> 
                              
                                </a>
                
                            </div>
                            <div class="col-md-5 offset-md-1 card">
                                <a href="{{route('support.tickets')}}"  class="text-white d-flex ">
                                    <img src="{{ asset('assets/img/backup.svg')}}" alt="" height="50" class="filter-white mr-4">

                                        <h3 class="font-weight-bold">
                                         Check Ticket Status
                                            </h3> 
                              
                                </a>
                
                            </div>
                   
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
