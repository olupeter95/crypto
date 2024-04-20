@extends('layouts.app3')

@section('content')
    <div class="row layout-top-spacing">
        <div id="tabsVertical" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Vertical Pills</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area vertical-pill">
                    <div class="row mb-4 mt-3">
                        <div class="col-sm-3 col-12">
                            <div class="nav flex-column nav-pills mb-sm-0 mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link mb-2 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Notification Settings</a>
                                <a class="nav-link mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Security Settings</a>
                                <a class="nav-link" id="" href="/verification" aria-selected="false">Verify Account</a>
                            </div>
                        </div>

                        <div class="col-sm-9 col-12">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <div class="form">
                                        <h3>Notify me when:</h3> 
                                        <div class="notifications-repeater">
                                            <div class="row"> 
                                                <div class="col-lg-3">Alerts</div> 
                                                <div class="col-lg-7">
                                                    <div class="notifications-check">
                                                        <label class="switch s-icons s-outline s-outline-danger mr-2">
                                                            <input type="checkbox" checked>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="notifications-repeater">
                                            <div class="row"> 
                                                <div class="col-lg-3">Announcements</div> 
                                                <div class="col-lg-7">
                                                    <div class="notifications-check">
                                                        <label class="switch s-icons s-outline s-outline-danger mr-2">
                                                            <input type="checkbox" checked>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <div class="row" style="border-bottom-style: solid;border-bottom-width: 1px;">
                                        <div class="col-lg-8">
                                            <p>Login Notification </p>
                                        </div>
                                        <div class="col-lg-2">
                                            <p>Disabled</p>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" class="btn btn-warning mb-2 mr-2" data-toggle="modal" data-target="#standardModal"> Standard</button>
                                        </div>
                                    </div>
                                    <div class="modal fade modal-notification" id="standardModal" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" role="document" id="standardModalLabel">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <div class="icon-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                                                    </div>
                                                    <p class="modal-text">Vivamus vitae hendrerit neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi consequat auctor turpis, vitae dictum augue efficitur vitae. Vestibulum a risus ipsum. Quisque nec lacus dolor. Quisque ornare tempor orci id rutrum.</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                    <button type="button" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="border-bottom-style: solid;border-bottom-width: 1px;">
                                        <div class="col-lg-8">
                                            <p>Two Factor Authentication </p>
                                        </div>
                                        <div class="col-lg-2">
                                            <p>Disabled</p>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" class="btn btn-warning mb-2 mr-2" data-toggle="modal" data-target="#editModal"> Edit</button>
                                        </div>
                                    </div>
                                    <div class="modal fade modal-notification" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" role="document" id="editModalLabel">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <div class="icon-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                                                    </div>
                                                    <p class="modal-text">Vivamus vitae hendrerit neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi consequat auctor turpis, vitae dictum augue efficitur vitae. Vestibulum a risus ipsum. Quisque nec lacus dolor. Quisque ornare tempor orci id rutrum.</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                    <button type="button" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>              
@endsection
