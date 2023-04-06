@extends('layouts.user.user')
@section('title')
    {{ env('APP_NAME') }} | User
@endsection

@section('css')
    <link href="{{ asset(env('ADMIN_ASSETS_URL') . '/css/pages/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset(env('USER_ASSETS_URL') . '/css/ion.rangeSlider.min.css') }}">
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Events</h4>
                    <div class="page-title-right d-flex align-items-center justify-content-between">
                        <button class="btn btn-primary waves-effect waves-light" id="create-event-btn">+ Create
                            Event</button>
                        <ol class="breadcrumb m-2">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item active">Event</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @include('user.event.list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Event -->
<div class="col-sm-6 col-md-4 col-xl-3">
    <div class="modal fade create-event" id="create-event-user" tabindex="-1" role="dialog" aria-labelledby="create-event" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex flex-column">
                        <h4 class="modal-title mt-0 mb-1" id="create-title-event">Create Event</h4>
                        <span>If you would like to Crate Event here at Rixer Agency , fill in the form here. And enjoy
                            your great time with other models as well.</span>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="event-edit">
                    @include('user.event.create')
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
@section('js')
    @include('user.event.scripts')
@endsection