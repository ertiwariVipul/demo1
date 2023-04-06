@extends('layouts.admin.admin')
@section('title')
    {{ env('APP_NAME') }} | Users
@endsection
@section('css')
    <link href="{{ asset(env('ADMIN_ASSETS_URL') . '/css/page/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Users</h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('admin.user.list')
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- Change Status for Models -->
    <div class="col-sm-6 col-md-6 col-xl-3">
        <div class="modal fade edit-user" id="change-event-status-event" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">Change Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <form id="change-event-status-form" class="form-horizontal form-wizard-wrapper" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="eventId" id="change-status-event-id" value=""/>
                                    <label>Change Status</label>
                                    <select class="form-control" name="status" id="change-status-select">
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>     
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Change Status for Models  -->

    {{-- delete model  start --}}
    <div class="modal fade text-left edit-user" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="edit-user"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="RditProduct">Edit User</label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="errors" style="color: red;"></div>
                               <form method="post" id="editUserForm">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <label>Name</label>
                                    <div class="form-group">
                                        <input type="text"  class="form-control"
                                            name="editUserId" id="editUserId" hidden>
                                        <input type="text" placeholder="Enter Your Name" class="form-control"
                                            name="editUserName" id="editUserName">
                                    </div>
                                    <label>Email</label>
                                    <div class="form-group">
                                        <input type="email" placeholder="Enter your email" class="form-control" name="editUserEmail"
                                            id="editUserEmail">
                                    </div>
                                    <label>Phone</label>
                                    <div class="form-group">
                                        <input type="number" placeholder="Enter your Phone Number" class="form-control" name="editUserPhone"
                                            id="editUserPhone">
                                    </div>
                                    <label>Country</label>
                                    <div class="form-group">
                                        <select name="editUserCountry" id="editUserCountry" class="form-control">
                                            <option value="">Select Your Country</option>
                                            @foreach($country as $countryList)

                                            <option value="{{$countryList->id}}">{{$countryList->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label>City</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter your city name" class="form-control" name="editUserCity"
                                            id="editUserCity">
                                    </div>
                                    <label>Subscription Plan</label>
                                    <div class="form-group">
                                        <select name="editUserProfile" id="editUserProfile" class="form-control">
                                            <option value="">Select Select Your Plan</option>
                                            @foreach($profile as $profileList)

                                            <option value="{{$profileList->id}}">{{$profileList->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <label>Image</label>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" name="userImage" id="userImage"  type="file">
                                    </div>
                                    <div id="editUserImage"></div> --}}
                                </div>
                                {{-- <div id="errors"></div> --}}
                                <div class="modal-footer">
                                    <input type="reset" class="btn btn-secondary " data-dismiss="modal"
                                        value="close">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    {{-- delete model  end--}}
@endsection
@section('js')
    @include('admin.user.scripts')
@endsection

