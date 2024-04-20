@extends('admin.layouts.app')

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>All Users</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive mb-4 style-1">
                            <table id="style-1" class="table style-1 table-hover non-hover">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column"> Record no. </th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($users as $key => $user){
                                            ?>
                                                <tr>
                                                    <td class="checkbox-column"> {{ $key+1 }} </td>
                                                    <td class="user-name">
                                                        <a href="/admin/users/edit/{{$user->id}}">{{ $user->name }}</a>
                                                    </td>
                                                    <td class="">
                                                        <a class="profile-img" href="javascript: void(0);">
                                                            <?php
                                                                if(is_null($user->profile_img)){
                                                                    ?>
                                                                        <img src="/assets/img/90x90.jpg" class="img-fluid" alt="{{$user->name}}-profile-picture">
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                        <img src={{ asset('/storage/profile/'. $user->profile_img) }} class="img-fluid" alt="{{$user->name}}-profile-picture" style="object-fit: cover;">
                                                                    <?php
                                                                }
                                                            ?>
                                                        </a>
                                                    </td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->show_password }}</td>
                                                    <td class="text-center">
                                                        <div class="dropdown custom-dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                                <a class="dropdown-item" href="/admin/users/edit/{{$user->id}}">Edit</a>
                                                                <a class="dropdown-item deactivate_a_user" u_id = "{{$user->id}}" href="javascript:void(0);">Deactivate</a>
                                                                <a class="dropdown-item delete_a_user" u_id="{{$user->id}}" href="javascript:void(0);">Delete</a>
                                                            </div>
                                                        </div>
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
    </div>
@endsection