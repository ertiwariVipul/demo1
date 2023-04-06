@extends('layouts.admin.admin')
@section('title')
    {{ env('APP_NAME') }} | Profile Level
@endsection
@section('css')
    <link href="{{ asset(env('ADMIN_ASSETS_URL') . '/css/pages/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="mb-0 font-size-18">Profile Level</h4>
                            <ol class="breadcrumb m-2">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a></li>
                                   <li class="breadcrumb-item active">Profile Level</li>
                               </ol>
                        </div>
                        <div class="page-title-right d-flex align-items-center justify-content-between ">
                            <button class="btn btn-primary waves-effect waves-light add_profile" data-toggle="modal"
                               >+ Add Profile Level</button>
                              
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('admin.setting.profilelevel.list')
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
  
@endsection
@section('js')
    @include('admin.setting.profilelevel.scripts')
@endsection

