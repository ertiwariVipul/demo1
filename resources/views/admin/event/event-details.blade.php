@extends('layouts.admin.admin')
@section('title')
    {{ env('APP_NAME') }} | Events Details
@endsection
@section('css')
    <link href="{{ asset(env('ADMIN_ASSETS_URL') . '/css/page/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 text-capitalize">Events</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Event</a></li>
                                <li class="breadcrumb-item active">Event Detail</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row mt-6">
                <div class="col-lg-12">
                    <div>
                        <div class="events-tabbing-wrap">
                            <div class="events-tabbing-content-wrap">
                                <div class="tabbing-cards">
                                    <div class="model-img-wrap">
                                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/model2.jpg') }}"
                                            alt="" class="img-fluid">
                                    </div>
                                    <div class="events-girls-content-wrap">
                                        <div class="events-girls-schedule">
                                            @if (@$eventDetails->status == 0)
                                                <span class="status-label-wrap badge-soft-warning">Pending</span>
                                            @elseif(@$eventDetails->status == 1)
                                                <span class="status-label-wrap badge-soft-success">Approved</span>
                                            @elseif(@$eventDetails->status == 2)
                                                <span class="status-label-wrap badge-soft-success">Completed</span>
                                            @elseif(@$eventDetails->status == 3)
                                                <span class="status-label-wrap badge-soft-danger">Rejectd</span>
                                            @endif
                                            <span class="d-block schedule-date-time">{{ @$eventDetails->date }} ,
                                                {{ @$eventDetails->startTime }}{{ intval($eventDetails->startTime) < 12 ? 'AM' : 'PM' }}
                                                ,
                                                {{ @$eventDetails->endTime }}{{ intval($eventDetails->endTime) < 12 ? 'AM' : 'PM' }}</span>
                                            <h5>{{ @$eventDetails->name }}</h5>
                                            <p class="mb-0">
                                                {{ @$eventDetails->description }}
                                            </p>
                                        </div>
                                        <div class="nav flex-column nav-pills vertical-tabs" id="v-pills-tab" role="tablist"
                                            aria-orientation="vertical">
                                            <button class="nav-link active" id="v-pills-location-tab" data-toggle="pill"
                                                data-target="#v-pills-location" type="button" role="tab"
                                                aria-controls="v-pills-location" aria-selected="true">Location</button>
                                            <button class="nav-link" id="v-pills-model-tab" data-toggle="pill"
                                                data-target="#v-pills-model" type="button" role="tab"
                                                aria-controls="v-pills-model" aria-selected="false">Model</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="events-tabbing-map-wrap">
                                <div class="tabbing-cards loation-wrap-box">
                                    <div class="loation-wrap-body">
                                        <div class="events-page-tabs-body">
                                            <div class="tab-content events-location-tab" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active events-page-tabs"
                                                    id="v-pills-location" role="tabpanel"
                                                    aria-labelledby="v-pills-location-tab">
                                                    <div class="map-title">
                                                        <h3>Event Location</h3>
                                                        <span class="d-block mb-1 gray-text-color">On Map</span>
                                                        <span
                                                            class="d-block location-address">{{ @$eventDetails->location }}</span>
                                                    </div>
                                                    <div class="location-map-wrap">
                                                        <iframe
                                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119066.41270041028!2d72.7520844199209!3d21.159345761749574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e59411d1563%3A0xfe4558290938b042!2sSurat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1676522058844!5m2!1sen!2sin"
                                                            class="location-map" style="border:0;" allowfullscreen=""
                                                            loading="lazy"
                                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade events-page-tabs" id="v-pills-model"
                                                    role="tabpanel" aria-labelledby="v-pills-model-tab">
                                                    <h3>Girls</h3>
                                                    <ul class="nav nav-pills horizontal-tabs" id="pills-tab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="pills-all-girls-tab"
                                                                data-toggle="pill" data-target="#pills-all-girls"
                                                                type="button" role="tab"
                                                                aria-controls="pills-all-girls" aria-selected="true">All
                                                                Girls</button>
                                                        </li>
                                                        @foreach ($eventDetails->eventCategories as $eventCategoryItem)
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link eventModelCategory"
                                                                    id="pills-exhibition-girls-tab-{{ $eventCategoryItem->id }}"
                                                                    data-toggle="pill"
                                                                    data-target="#pills-{{ $eventCategoryItem->id }}"
                                                                    type="button" role="tab"
                                                                    data-eventId="{{ @$eventCategoryItem->id }}"
                                                                    aria-controls="pills-{{ $eventCategoryItem->id }}"
                                                                    aria-selected="false"
                                                                    data-categoryId="{{ @$eventCategoryItem['category']->id }}">{{ @$eventCategoryItem['category']->name }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content model-girls-tabs" id="pills-tabContent">
                                                        <div class="tab-pane fade show active" id="pills-all-girls"
                                                            role="tabpanel" aria-labelledby="pills-all-girls-tab">
                                                            <div class="atomosphere-girls-images-wrap">
                                                                @foreach ($allModelsEvent as $key => $allModelsEventItem)
                                                                    <div class="atomosphere-girls-images">
                                                                        <div class="models-profile-gallery-img d-align">
                                                                            <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/uploads/models/') . '/' . @$allModelsEventItem->users->model_images->image }}"
                                                                                class="cover-img"
                                                                                alt="{{ @$allModelsEventItem->users->fullName }}">
                                                                        </div>
                                                                        <div class="card-overlay text-white">
                                                                            <h4 class="mb-1 text-break text-white">
                                                                                {{ @$allModelsEventItem->users->fullName }}
                                                                            </h4>
                                                                            <div class="modal-body-content-items">

                                                                                <div class="card-overlay-text">
                                                                                    <span
                                                                                        class="small-content mb-1">Height</span>
                                                                                    <span
                                                                                        class="text-white">{{ @$allModelsEventItem->model_details->height ? $allModelsEventItem->model_details->height : '-' }}</span>
                                                                                </div>
                                                                                <div class="card-overlay-text">
                                                                                    <span
                                                                                        class="small-content mb-1">Weight</span>
                                                                                    <span
                                                                                        class="text-white">{{ @$allModelsEventItem->model_details->weight ? $allModelsEventItem->model_details->weight : '-' }}</span>
                                                                                </div>
                                                                                <div class="card-overlay-text">
                                                                                    <span
                                                                                        class="small-content mb-1">Hair</span>
                                                                                    <span
                                                                                        class="text-white">{{ @$allModelsEventItem->model_details->hair ? $allModelsEventItem->model_details->hair : '-' }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        @foreach ($eventDetails->eventCategories as $eventCategoryItem)
                                                            <div class="tab-pane fade"
                                                                id="pills-{{ $eventCategoryItem->id }}" role="tabpanel"
                                                                aria-labelledby="pills-exhibition-girls-tab">
                                                                <div class="atomosphere-girls-images-wrap">
                                                                    @foreach ($allModelsEvent as $key => $allModelsEventItem)
                                                                        @if (@$eventCategoryItem->category->id === $allModelsEventItem->categoryId)
                                                                            <div class="atomosphere-girls-images">
                                                                                <div
                                                                                    class="models-profile-gallery-img d-align">
                                                                                    <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/uploads/models/') . '/' . @$allModelsEventItem->users->model_images->image }}"
                                                                                        class="cover-img"
                                                                                        alt="{{ @$allModelsEventItem->users->fullName }}">
                                                                                </div>
                                                                                <div class="card-overlay text-white">
                                                                                    <h4 class="mb-1 text-break text-white">
                                                                                        {{ @$allModelsEventItem->users->fullName }}
                                                                                    </h4>
                                                                                    <div class="modal-body-content-items">

                                                                                        <div class="card-overlay-text">
                                                                                            <span
                                                                                                class="small-content mb-1">Height</span>
                                                                                            <span
                                                                                                class="text-white">{{ @$allModelsEventItem->model_details->height ? $allModelsEventItem->model_details->height : '-' }}</span>
                                                                                        </div>
                                                                                        <div class="card-overlay-text">
                                                                                            <span
                                                                                                class="small-content mb-1">Weight</span>
                                                                                            <span
                                                                                                class="text-white">{{ @$allModelsEventItem->model_details->weight ? $allModelsEventItem->model_details->weight : '-' }}</span>
                                                                                        </div>
                                                                                        <div class="card-overlay-text">
                                                                                            <span
                                                                                                class="small-content mb-1">Hair</span>
                                                                                            <span
                                                                                                class="text-white">{{ @$allModelsEventItem->model_details->hair ? $allModelsEventItem->model_details->hair : '-' }}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
@section('js')
    @include('admin.event.scripts')
@endsection
