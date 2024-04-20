@extends('admin.layouts.app')

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="row">
                    <div class="col-md-7 col-lg-7 mx-auto">
                        <div class="form-group text-center">
                            <button id="generate_license_key" type="button" class="btn btn-danger py-5 px-5 w-75 my-5">Generate License Key</button>
                        </div>
                    </div>
                </div>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover order-column" id="">
                            <thead>
                                <tr>
                                    <th class="text-yellow">ID</th>
                                    <th class="text-yellow">License Key</th>
                                    <th class="text-yellow">Status</th>
                                    <th class="text-yellow">Date Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($license_keys as $key => $license_key){
                                        ?>
                                            <tr>
                                                <th class="text-white">{{ $key+1 }}</th>
                                                <th class="text-white">{{ $license_key->license_key }}</th>
                                                <th class="text-white">{{ $license_key->status }}</th>
                                                <th class="text-white">{{ $license_key->created_at }}</th>
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
@endsection