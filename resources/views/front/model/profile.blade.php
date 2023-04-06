@extends('layouts.front.front')
@section('title')
    Model Profile
@endsection
@section('css')
@endsection
@section('content')
    <!-- // _begin > Atmosphere Girls < AVN // -->
    <section class="modal-profile">
        @if ($models)
            <div class="modal-profile-header">
                <div class="container">
                    <div class="d-block d-lg-none">
                        <a href="{{ route('atmosphere-girls') }}" class="modal-lists d-flex align-items-center mb-5">
                            <svg width="12" height="9" viewBox="0 0 12 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 5C11.2761 5 11.5 4.77614 11.5 4.5C11.5 4.22386 11.2761 4 11 4V5ZM0.646447 4.14645C0.451184 4.34171 0.451184 4.65829 0.646447 4.85355L3.82843 8.03553C4.02369 8.2308 4.34027 8.2308 4.53553 8.03553C4.7308 7.84027 4.7308 7.52369 4.53553 7.32843L1.70711 4.5L4.53553 1.67157C4.7308 1.47631 4.7308 1.15973 4.53553 0.964466C4.34027 0.769204 4.02369 0.769204 3.82843 0.964466L0.646447 4.14645ZM11 4H1V5H11V4Z"
                                    fill="currentColor" />
                            </svg>
                            <span class="text-white ms-3">All models</span>
                        </a>
                    </div>
                    <div class="modal-profile-wrap position-relative">
                        <div class="pb-5 order-2">
                            <div class="profile-content-wrap">
                                <div class="d-none d-lg-block">
                                    <a href="{{ route('atmosphere-girls') }}"
                                        class="modal-lists d-flex align-items-center mb-5">
                                        <svg width="12" height="9" viewBox="0 0 12 9" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11 5C11.2761 5 11.5 4.77614 11.5 4.5C11.5 4.22386 11.2761 4 11 4V5ZM0.646447 4.14645C0.451184 4.34171 0.451184 4.65829 0.646447 4.85355L3.82843 8.03553C4.02369 8.2308 4.34027 8.2308 4.53553 8.03553C4.7308 7.84027 4.7308 7.52369 4.53553 7.32843L1.70711 4.5L4.53553 1.67157C4.7308 1.47631 4.7308 1.15973 4.53553 0.964466C4.34027 0.769204 4.02369 0.769204 3.82843 0.964466L0.646447 4.14645ZM11 4H1V5H11V4Z"
                                                fill="currentColor" />
                                        </svg>
                                        <span class="text-white ms-3">All models</span>
                                    </a>
                                </div>
                                <div class="d-lg-block d-none">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <span
                                                class="gold-label text-uppercase small-content">{{ @$models->model_details->profile_level->name }}</span>
                                        </div>
                                        <!-- <div class="popup-icon">
                                                                        <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/document-list-icon.png') }}"
                                                                            alt="popup" data-bs-container="body" data-bs-toggle="popover" class="add-to-list"
                                                                            data-id="{{ $models->id }}"
                                                                            data-bs-trigger="hover" data-bs-placement="Bottom"
                                                                            data-bs-content="Add to the list">
                                                                    </div> -->
                                        <!-- Button trigger modal -->

                                        @role('user')
                                            <div class="popup-icon">
                                                <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/document-list-icon.png') }}"
                                                    alt="popup" data-bs-container="body" data-bs-toggle="popover"
                                                    class="add-to-list" data-id="{{ $models->id }}" id="frontEventListBtn"
                                                    data-bs-trigger="hover" data-bs-placement="Bottom" data-toggle="modal"
                                                    data-target="#addEventModel" data-userid="{{ Auth::user()->id }}"
                                                    data-bs-content="Add to the list">
                                                <div id="eventName"></div>
                                            </div>
                                        @endrole
                                    </div>
                                </div>
                                <h2 class="text-white small mb-4 secondary-font fw-600 text-shadow-color">
                                    {{ $models->fullName }}</h2>
                                <div class="rixer-model-profile-spacing">
                                    <span
                                        class="d-inline-block text-gull-gray  small-content text-uppercase fw-400 mb-3">Languages</span>
                                    <div
                                        class="d-flex align-items-center rixer-right-spacing language-list-wrap custom-scrollbar">
                                        <ul class="ps-0 w-100 mb-0 gap-3">
                                            @foreach ($modelLanguage as $lang)
                                                <li class="d-align text-white justify-content-start mb-0">
                                                    {{ $lang->model_language[0]->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="rixer-model-profile-spacing">
                                    <span
                                        class="d-inline-block text-gull-gray  small-content text-uppercase fw-400 mb-3">Services</span>
                                    <div class="measurements-items rixer-right-spacing flex-wrap custom-scrollbar">
                                        @foreach ($model_category as $cat)
                                            <div class="d-inline-flex align-items-center">
                                                <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/tick-circle.svg') }}"
                                                    alt="">
                                                <span
                                                    class="text-white fw-500 d-inline-block  ms-3 ">{{ $cat->model_service[0]->name }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="visa-wrap">
                                    <span
                                        class="d-inline-block text-gull-gray  small-content text-uppercase fw-400 mb-3">VISA</span>
                                    @foreach ($model_visas as $visa)
                                        <div class="visa-wrap-inner custom-scrollbar mb-md-3 mb-4">
                                            <div class="d-flex align-items-center">
                                                <div class="d-inline-flex align-items-center w-50">
                                                    <div class="d-align flag-icon">
                                                        <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/USA-flag.png') }}"
                                                            class="cover-img" alt="country-flag">
                                                    </div>
                                                    <span
                                                        class="text-white fw-500 d-inline-block small-head  ms-3 text-break">{{ $visa->countryName }}</span>
                                                </div>
                                                <div class="w-50 text-center">
                                                    <span
                                                        class="d-inline-block text-white fw-500 small-head">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $visa->expiryDate)->format('d/m/Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="body-dimension-wrap order-3">
                            <div class="visa-wrap body-measurements custom-scrollbar">
                                <div class="body-measurements-lists">
                                    <div class="d-flex flex-column">
                                        <span class="secondary-font fw-400 text-gull-gray mb-2 text-break">Height</span>
                                        <span class="text-white fw-600">{{ $models->model_details->height }}</span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="secondary-font fw-400 text-gull-gray mb-2 text-break">Weight</span>
                                        <span class="text-white fw-600">{{ $models->model_details->weight }}</span>
                                    </div>
                                </div>
                                <div class="body-measurements-lists measurements-items">
                                    <div class="d-flex flex-column">
                                        <span class="secondary-font fw-400 text-gull-gray mb-2 text-break">Hair</span>
                                        <span
                                            class="text-white fw-600 text-break">{{ $models->model_details->hair }}</span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="secondary-font fw-400 text-gull-gray mb-2 text-break">Eye Color</span>
                                        <span
                                            class="text-white fw-600 text-break">{{ $models->model_details->eyecolor }}</span>
                                    </div>
                                </div>
                                <div class="body-measurements-lists">
                                    <div class="d-flex flex-column">
                                        <span class="secondary-font fw-400 text-gull-gray mb-2 text-break">Waist</span>
                                        <span class="text-white fw-600">{{ $models->model_details->waist }}</span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="secondary-font fw-400 text-gull-gray mb-2 text-break">Hips</span>
                                        <span class="text-white fw-600">{{ $models->model_details->hips }}</span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="secondary-font fw-400 text-gull-gray mb-2 text-break">Bust</span>
                                        <span class="text-white fw-600">{{ $models->model_details->bust }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="profile-img-wrap order-1">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($ModelImage as $key => $image)
                                        <div class="carousel-item @if ($key == 0) active @endif">
                                            <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/uploads/models/' . $image->image) }}"
                                                alt="modal">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-lg-none d-block">
                                    <div class="d-flex justify-content-between lable-popover">
                                        <div>
                                            <span
                                                class="gold-label text-uppercase small-content mb-0">{{ @$models->model_details->profile_level->name }}</span>
                                        </div>
                                        <div>
                                            <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/document-list-icon.png') }}"
                                                alt="" data-bs-container="body" data-bs-toggle="popover"
                                                data-bs-placement="Bottom" data-bs-trigger="hover"
                                                data-bs-content="Add to the list">
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path d="M10.828 12l4.95 4.95-1.414 1.414L8 12l6.364-6.364 1.414 1.414z"
                                                fill="currentColor" />
                                        </svg></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z"
                                                fill="currentColor" />
                                        </svg></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-profile-footer">
                <div class="container">
                    <h3 class="text-white small mb-4 secondary-font fw-600 text-shadow-color">Girls you may like</h3>
                    <div class="atomosphere-girls-images-wrap">
                        @foreach ($modelProfile as $modelList)
                            <div class="atomosphere-girls-images">
                                <div class="models-profile-gallery-img d-align">
                                    <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/uploads/models/' . @$modelList->user->model_images->image) }}"
                                        class="cover-img" alt="models">
                                </div>
                                <div class="card-overlay text-white">
                                    <h4 class="h4 mb-3 secondary-font fw-600 text-break">{{ @$modelList->user->fullName }}
                                    </h4>
                                    <div class="d-flex flex-wrap modal-body-content-items">
                                        <div class="d-flex flex-column card-overlay-text">
                                            <span class="small-content mb-1 opacity-7">Height</span>
                                            <span class="text-white">{{ @$modelList->height }}</span>
                                        </div>
                                        <div class="d-flex flex-column card-overlay-text">
                                            <span class="small-content mb-1 opacity-7">Weight</span>
                                            <span class="text-white">{{ @$modelList->weight }}</span>
                                        </div>
                                        <div class="d-flex flex-column card-overlay-text">
                                            <span class="small-content mb-1 opacity-7">Hair</span>
                                            <span class="text-white">{{ @$modelList->hair }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </section>

    <div class="modal fade rixer-custom-modal" id="frontEventList" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="staticBackdropLabel">Add Models</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errors" style="color: red;"></div>
                    <h6 class="events-title mb-4">Events<h6>
                            <form method="post" class="addModelEventForm">
                                {{ csrf_field() }}

                                <ul class="ps-0 mb-0 rixer-modal-listitem list-unstyled">
                                    @foreach (@$event as $eventList)
                                        @if (@Auth::user()->id == $eventList->userId)
                                            <input type="hidden" name="eventId" id=""
                                                value="{{ $eventList->id }}">
                                            <input type="hidden" name="modelId" id=""
                                                value="{{ $models->id }}">
                                            <input type="hidden" name="categoryId" id=""
                                                value="{{ @$model_category[0]->categoryId }}">

                                            <li class="mb-3">
                                                <div class="d-flex  justify-content-between align-items-center">
                                                    <div class="pe-3">
                                                        <h6 class="text-break mb-0">{{ $eventList->name }}<h6>
                                                    </div>
                                                    <div class="">
                                                        <button type="submit" class="btn btn-primary">Add</button>
                                                    </div>
                                                </div>

                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <div>
                                    <div id="success" class="text-success success"></div>
                                    <div id="error" class="error"></div>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>

    <!-- // _ends > Atmosphere Girls < AVN // -->
@endsection
@section('script')
    @include('front.model.scripts')
@endsection
