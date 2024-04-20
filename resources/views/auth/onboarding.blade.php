@extends('layouts.app')

@section('content')
    <div class="layout-px-spacing">  
        <div class="account-settings-container layout-top-spacing">
            <div class="account-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="work-experience" class="complete-profile-form" method="POST" action="/onboarding" novalidate>
                            @csrf
                            <div class="info">
                                <div class="row">
                                    <div class="col-md-12 text-right mb-5">
                                        <button id="add-work-exp" class="btn btn-success" type="submit">Save Profile</button>
                                    </div>
                                    <div class="col-md-11 mx-auto">
                                        <div class="work-section">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="degree3">Date of birth</label>
                                                                <input type="date" name="date_of_birth" class="form-control mb-4" id="degree3" value="{{ Auth::user()->date_of_birth }}" required>
                                                                <input type="hidden" name="previous_url" value="<?php echo $intended; ?>" />
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
                                                                <input type="text" name="city" class="form-control" required />
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
                                                                <input type="text" name="state" class="form-control" required />
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
                                                                <input type="text" name="country" class="form-control" id="autocomplete-dynamic" required >
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
                                                        <textarea class="form-control" name="address" placeholder="Please input your address" rows="2" required></textarea>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Please fill your address!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
