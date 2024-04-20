@extends('admin.layouts.app')

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col">
                <div class="card shadow bg-darker px-5">
                    <div class="card-header border-0 bg-darker">
                        <div class="row align-items-center">
                            <div class="col"></div>
                            <div class="col text-right">
                                <a href="/admin/plans/create" class="bg-success text-white btn">Add New Plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-darker">
                                <tr>
                                    <th class="text-yellow" scope="col">S/N</th>
                                    <th class="text-yellow" scope="col">Title</th>
                                    <th class="text-yellow" scope="col">Price</th>
                                    <th class="text-yellow" scope="col">Status</th>
                                    <th class="text-yellow" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($plans as $key => $plan){
                                        ?>
                                            <tr>
                                                <td class="text-white">{{ $key + 1 }}</td>
                                                <td class="text-yellow">{{ $plan->plan_title }}</td>
                                                <td class="text-white" style="font-weight: bold;">{{ $plan->rate }}</td>
                                                <td class="text-white" style="font-weight: bold;">{{ $plan->status }}</td>
                                                <td class="text-white">
                                                    <a href="javascript:void(0);" class="bg-primary text-white btn edit_plan" data-id="{{ $plan->id }}" data-toggle="modal" data-target="#edit_plan<?php echo $plan->id; ?>">Edit Plan</a>
                                                    <a href="javascript:void(0);" class="bg-danger text-white btn delete_plan" data-id="{{ $plan->id }}">Delete Plan</a>
                                                </td>
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

    <div class="modal fade" id="delete_plan" tabindex="-1" role="dialog" aria-labelledby="delete_planLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="delete_planLabel"><i class="fa fa-dashboard"></i> WARNING</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <p>Before you proceed, Are you sure you want to delete this plan? <strong class="text-danger">Please note that this action cannot be undone.</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn col-lg-6 btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary col-lg-6 delete_plan_btn">Yes, Delete It</button>
                    </div>
                </form>
			</div>
		</div>
	</div>

    <?php
        foreach($plans as $keyy => $plann){
            ?>
                <div class="modal fade" id="edit_plan<?php echo $plann->id; ?>" tabindex="-1" role="dialog" aria-labelledby="edit_plan<?php echo $plann->id; ?>Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <input type="hidden" name="plan_id" class="plan_id" value="<?php echo $plann->id; ?>">
                                <h3 class="modal-title" id="edit_plan<?php echo $plann->id; ?>Label"><i class="fa fa-dashboard"></i> UPDATE PLAN</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="basic-form">
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <h4 class="card-title mb-2 text-white">Plan Title</h4>
                                            <div class="input-group mb-3">
                                                <input id="plan_title" type="text" class="form-control plan_title" value="{{$plann->plan_title}}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text text-white bg-yellow">A</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <h4 class="card-title mb-2 text-white">Rate</h4>
                                            <div class="input-group mb-3">
                                                <input id="plan_rate" type="text" class="form-control plan_rate" value="{{$plann->rate}}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text text-white bg-yellow">USD</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <h4 class="card-title text-white mb-2">Status</h4>
                                            <?php
                                                if($plann->status === 'Off'){
                                                    ?>
                                                        <a id="plan_status" href="javascript:void(0);" class="plan-status bg-danger text-white btn" style="width: 100%;">Off</a>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                        <a id="plan_status" href="javascript:void(0);" class="plan-status bg-success text-white btn" style="width: 100%;">On</a>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-8 description_col">
                                            <h4 class="card-title text-white mb-2">Details</h4>
                                            <?php
                                                $count = 0;
                                                foreach($plann->description as $desc){
                                                    $count++;
                                                    ?>
                                                        <div class="input-group mb-3">
                                                            <input id="" type="text" class="plan_desc form-control" placeholder="Plan Description" value="{{$desc}}">
                                                            <div class="input-group-append">
                                                                <?php
                                                                    if($count == 1){
                                                                        ?>
                                                                            <span class="input-group-text text-white bg-success add_description">
                                                                                <i class="fa fa-plus"></i>
                                                                            </span>
                                                                        <?php
                                                                    }
                                                                    else{
                                                                        ?>
                                                                            <span class="input-group-text text-white bg-danger delete_description">
                                                                                <i class="fa fa-trash"></i>
                                                                            </span>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    <?php
                                                }
                                            ?>                                                
                                        </div>
                                        <div class="col-lg-4">
                                            <h4 class="card-title text-white mb-2">Trade Limit</h4>
                                            <div class="input-group mb-3">
                                                <input id="trade_limit" type="text" class="form-control trade_limit" placeholder="" value="{{$plann->trade_limit}}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text text-white bg-yellow">Per Day</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn col-lg-6 btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary col-lg-6 update_plan_btn">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    ?>
@endsection