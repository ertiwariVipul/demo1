@extends('layouts.admin.admin')
@section('title')
    {{ env('APP_NAME') }} | Admin
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Dashboard</h4>
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                        <div class="media-body card-media-body">
                                            <h4 class="mb-1">{{ $event }}</h4>
                                            <p class="text-muted font-weight-medium">Total Events</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-archive-in font-size-24"></i>
                                            </span>
                                        </div>
                                        <div class="media-body card-media-body">
                                            <h4 class="mb-1">{{ count($models) }}</h4>
                                            <p class="text-muted font-weight-medium">Total Models</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                        <div class="media-body card-media-body">
                                            <h4 class="mb-1">{{ count($users) }}</h4>
                                            <p class="text-muted font-weight-medium">Total Users</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('admin.dashboard.recent-event')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-4">
                                <div>
                                    <h4 class="card-title mb-0">Models</h4>
                                </div>
                                <div>
                                    <a href="{{route('admin.model')}}">
                                    <h4 class="card-title mb-0">View all</h4></a>
                                </div>
                            </div>
                            @foreach ($models as $key => $model)
                                @if ($key <= 4)
                                    <div class="d-flex align-items-center justify-content-between flex-wrap mb-1">
                                        <div class="d-flex align-items-center">
                                            @php
                                                $name = explode(' ', $model->fullName);
                                            @endphp
                                            <div>
                                                <span class="models-shortname">
                                                    @if (count($name) > 1)
                                                        {{ ucfirst(substr($name[0], 0, 1)) }}{{ ucfirst(substr($name[1], 0, 1)) }}
                                                    @else
                                                        {{ substr($name[0], 0, 1) }}
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="ml-3">
                                                <span class="d-block">{{ $model->fullName }}</span>
                                                @if (@$model['countries']->name)
                                                    <span class="d-block">Country : {{ @$model['countries']->name }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            @if ($model->status == 0)
                                                <span
                                                    class="badge badge-soft-warning font-size-12 p-2 cursor-pointer changeStatus">
                                                    <i class=""></i>
                                                     Pending
                                                </span>
                                            @elseif($model->status == 1)
                                                <span
                                                    class="badge badge-soft-success font-size-12 p-2 cursor-pointer changeStatus">
                                                    <i class=""></i>
                                                     Accepted
                                                </span>
                                            @elseif($model->status == 2)
                                                <span
                                                    class="badge badge-soft-danger font-size-12 p-2 cursor-pointer changeStatus">
                                                    <i class=""></i>
                                                     Rejected
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <div>
                                        <h4 class="card-title mb-0">Users</h4>
                                    </div>
                                    <div>
                                        <a href="{{route('admin.user')}}">
                                        <h4 class="card-title mb-0">View all</h4></a>
                                    </div>
                                </div>
                                @foreach ($users as $key => $user)
                                    @if ($key <= 4)
                                    @php
                                        $name = explode(' ', $user->fullName);
                                    @endphp
                                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <span class="models-shortname">
                                                        @if (count($name) > 1)
                                                        {{ ucfirst(substr($name[0], 0, 1)) }}{{ ucfirst(substr($name[1], 0, 1)) }}
                                                    @else
                                                        {{ substr($name[0], 0, 1) }}
                                                    @endif    
                                                    </span>
                                                </div>
                                                <div class="ml-3">
                                                    <span class="d-block">{{ @$user->fullName }}</span>
                                                    @if (@$user['countries']->name)
                                                        <span class="d-block">Country :
                                                            {{ @$user['countries']->name }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0">
                                                @if (@$user['profiles']->name)
                                                    <span
                                                        class="badge badge-soft-success font-size-12 p-2 cursor-pointer changeStatus">
                                                        <i class=""></i>
                                                        {{ @$user['profiles']->name }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('admin.dashboard.scripts')
@endsection
