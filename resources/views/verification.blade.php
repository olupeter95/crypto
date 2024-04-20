@extends('layouts.app')
@section('content')
    <div class="row layout-top-spacing" style="justify-content: center;">
        <div class="col-lg-8">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h6 class="pt-4 pl-3">General Information</h6>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div id="">
                        <h3></h3>
                        <section class="section general-info pl-lg-0 pt-0">
                            <div class="info">
                                <div class="row">
                                    <div class="col-lg-12 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="firstName">First Name</label>
                                                                <input type="text" class="form-control mb-4" id="firstName" placeholder="Full Name" value="{{ Auth::user()->name }}" disabled="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="email">Email Address</label>
                                                                <input type="text" class="form-control mb-4" id="email" placeholder="louisaatutu@yandex.com" value="{{ Auth::user()->email }}" disabled="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="country">Country</label>
                                                                <input type="text" class="form-control mb-4" id="country" placeholder="Full Name" value="{{ Auth::user()->country }}" disabled="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="state">State</label>
                                                                <input type="text" class="form-control mb-4" id="state" placeholder="Full Name" value="{{ Auth::user()->state }}" disabled="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group mr-1">
                                                        <div class="form-group">
                                                            <label for="degree3">Date of birth</label>
                                                            <input type="date" name="date_of_birth" class="form-control mb-4" id="degree3" value="{{ Auth::user()->date_of_birth }}" disabled="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3></h3>
                        <section class="general-info pl-lg-0 pt-0">
                            <div class="info">
                                <div class="row">
                                    <div class="col-lg-12 mx-auto">
                                        <form method="POST" action="/verification" enctype="multipart/form-data" id="verificationForm">
                                            @csrf
                                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                                <label>Upload Verification ID (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                <label class="custom-file-container__custom-file" >
                                                    <input id="verification_image" name="verification_image" type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" required>
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <div class="custom-file-container__image-preview"></div>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-secondary" type="button" id="verification_form">Upload Verification</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
