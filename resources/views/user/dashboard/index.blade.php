@extends('layouts.user.user')
@section('title')
    {{ env('APP_NAME') }} | User
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
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
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">My Events</p>
                                            <h4 class="mb-0">{{ $event }}</h4>
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
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Total Model Hired</p>
                                            {{-- <h4 class="mb-0">{{ count($models) }}</h4> --}}
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
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Money Spend</p>
                                            {{-- <h4 class="mb-0">{{ count($users) }}</h4> --}}
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
                                    <h2>Recent Events</h2>
                                    @include('user.dashboard.recent-event')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Notifications</h4>
                            <div class="row">
                                <table id="userListDashboard" class="table" style="width: 100%;">
                                    {{-- <tbody>
                                    @foreach ($models as $key => $model)
                                        @if ($key <= 4)
                                            <tr>
                                                <td>{{ $model->full_name }}</td>
                                                @if ($model->status == 0)
                                                    <td><button class="btn btn-warning waves-effect waves-light change-event-status">
                                                        <i class="bx bx-hourglass bx-spin font-size-16 align-middle mr-2"></i>
                                                            Pending</button></td>
                                                @elseif ($model->status == 1)
                                                    <td><button class="btn btn-success waves-effect waves-light change-event-status">
                                                        <i class="bx bx-check-double font-size-16 align-middle mr-2"></i>
                                                            Accepted</button></td>
                                                @elseif ($model->status == 2)
                                                    <td><button class="btn btn-danger waves-effect waves-light change-event-status">
                                                        <i class="bx bx-block font-size-16 align-middle mr-2"></i>
                                                            Rejected</button></td>
                                                @endif
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody> --}}
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
