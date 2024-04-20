@extends('layouts.app')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            @if(Session::has('message'))
                <script>
                    Swal.fire({
                            title: '',
                            text: {{ Session::get('message') }},
                            icon: 'success',
                            padding: '2em'
                        });
                </script>
            @endif
            <form class="submit-profile-information" method="POST" action="/profile" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4></h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-lg-7 mx-auto mb-5 pb-lg-3">
                                <?php
                                    if(is_null(Auth::user()->profile_img)){
                                        ?>
                                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                                <label>Click The Image Below To Upload your profile image (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                <label class="custom-file-container__custom-file" >
                                                    <input name="proof_of_deposit" type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <div class="custom-file-container__image-preview"></div>
                                            </div>
                                        <?php
                                    }
                                    else{
                                        ?>
                                           

                                            <div class="storage_img_section text-center user-info" style="position:relative">
                                                <img src={{ asset('/storage/profile/'. Auth::user()->profile_img) }} alt="avatar" style="border-radius: 20px;width: 100px;height:100px;box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14), 0 1px 18px 0 rgba(0, 0, 0, 0.12), 0 3px 5px -1px rgba(0, 0, 0, 0.2);">
                                            </div>
                                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                                <label>Update Profile Image <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                <label class="custom-file-container__custom-file" >
                                                    <input name="proof_of_deposit" type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                            </div>
                                        <?php
                                    }
                                ?>
                                
                            </div>
                            <div class="col-lg-7 mx-auto">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="degree3">Full Name</label>
                                                    <input type="text" name="full_name" class="form-control mb-4" id="degree3" value="{{ Auth::user()->name }}" disabled="">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please fill your full name!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="degree4">Email Address</label>
                                                    <input type="text" name="profile_email" class="form-control mb-4" id="wes-from1" value="{{ Auth::user()->email }}" disabled="">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please fill your gender!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3">Date of birth</label>
                                                    <input type="date" name="date_of_birth" class="form-control mb-4" id="degree3" value="{{ Auth::user()->date_of_birth }}" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please fill your date of birth!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree4">Gender</label>
                                                    <select name="gender" class="form-control mb-4" id="wes-from1" required>
                                                        <?php
                                                            if(Auth::user()->gender == 'Male'){
                                                                ?>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    <option value="Null">I'd rather not say</option>
                                                                <?php
                                                            }
                                                            elseif(Auth::user()->gender == 'Female'){
                                                                ?>
                                                                    <option value="Female">Female</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Null">I'd rather not say</option>
                                                                <?php
                                                            }
                                                            elseif(Auth::user()->gender == 'Null'){
                                                                ?>
                                                                    <option value="Null">I'd rather not say</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                <?php
                                                            }
                                                            else{
                                                                ?>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    <option value="Null">I'd rather not say</option>
                                                                <?php
                                                            }
                                                        ?>
                                                        
                                                    </select>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please fill your gender!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree4">Currency <span class="text-danger">*</span></label>
                                                    <select name="currency" class="form-control mb-4" id="wes-from1" required>
                                                        <option value="USD">USD</option>
                                                        <option value="CAD">CAD</option>
                                                        <option value="EUR">EUR</option>
                                                        <option value="AUD">AUD</option>
                                                        <option value="CNY">CNY</option>
                                                        <option value="GBP">GBP</option>
                                                    </select>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please fill your currency!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>City <span class="text-danger">*</span></label>
                                                    <input type="text" name="city" class="form-control" value="{{Auth::user()->city }}" required />
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please fill your city!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>State <span class="text-danger">*</span></label>
                                                    <input type="text" name="state" class="form-control" value="{{Auth::user()->state}}" required />
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please fill your state!
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="autocomplete-dynamic">Country <span class="text-danger">*</span></label>
                                                    <input type="text" name="country" class="form-control" id="autocomplete-dynamic" value="{{Auth::user()->country}}" required >
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please fill your country!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="address" placeholder="Please input your address" rows="2" required>{{Auth::user()->address}}</textarea>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please fill your address!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary mb-2" type="submit">Upload Profile Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        swal('hello')
    </script>
@endsection
