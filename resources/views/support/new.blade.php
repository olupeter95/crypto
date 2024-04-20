@extends('layouts.app3')

@section('content')
<div class="settings ">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 my-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New Ticket</h5>
                        <div class="settings-profile">
                            <form method="POST" action="{{route('support.store')}}">
                                @csrf
                                <div class="form-row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Requester <span class="required">*</span></label>
                                            <input class="form-control border-form-control " value="{{Auth::user()->email}}" disabled="" type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label class="control-label">Subject <span class="required">*</span></label>
                                        <input id="" class="form-control border-form-control text-white" value="" type="text" name="subject">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">I have a/an <span class="required">*</span></label>
                                            <select id="ticket_category" class="custom-select text-white" name="category">
                                                <option value="Question">Question</option>
                                                <option value="Incident">Incident</option>
                                                <option value="Problem">Problem</option>
                                                <option value="Future Request">Future Request</option>
                                                <option value="Bug Report">Bug Report</option>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Description <span class="required">*</span></label>
                                            <textarea id="topic_brief"
                                                class="form-control border-form-control text-white" rows="6" name="description"></textarea>
                                        </div>
                                    </div>
                    

                                    <div class="col-md-12">
                                        <input type="submit" value="Submit" class="btn btn-success flex-end">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
