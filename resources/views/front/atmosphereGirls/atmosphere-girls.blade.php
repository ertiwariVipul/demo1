@extends('layouts.front.front')
@section('title')
    Atmosphere Girls
@endsection
@section('css')
@endsection
@section('content')
    <!-- // _begin > Atmosphere Girls < AVN // -->
    
    <section class="atomosphere-girls-wrapper atomosphere-rixergirls-wrapper">
        <div class="container">
            <div class="contact-title text-center">
                <h2 class="small mb-3 secondary-font fw-600 text-white">Rixer Girls</h2>
                <p class="mb-0 text-white fw-400 small">Naturally, some models have more experience than others, however at a glance, the rates here apply.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-12">
                    <form class="form-wrapper">
                        <div class="custom-select">
                            <label class="custom-input-label">Category</label>
                            <select class="my-select modelValue" name="profileLevel"  data-container="body" id="modelCategory">
                                <option value="" disabled selected>Select Category</option>
                                @foreach ($profileLevelList as $profileLevel)
                                    <option value="{{ $profileLevel->id }}">{{ $profileLevel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="custom-select">
                            <label class="custom-input-label">Location</label>
                            <select class="my-select modelValue" data-container="body" name="country" id="modelCountry">
                                <option disabled selected>Country</option>
                                @foreach ($countryList as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="custom-input-label">Age Range</label>
                            <div class="rangepicker">
                                <input type="text" class="js-range-slider" id="AgeRangeSlider" name="my_range" value="" data-hide-min-max='true' />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- {{$models}} --}}
        <div class="atomosphere-girls-images-wrap" id="model_image">
        {{-- <div id="model_image"></div> --}}
        </div>
        <div class="atomosphere-girls-images-wrap model-profile-image">
            @foreach($models as $model)          
                <a href="{{ route('modelProfile',['id'=> $model->id]) }}" class="atomosphere-girls-images model-Profile">
                    <div class="models-profile-gallery-img d-align">
                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/uploads/models/'. @$model->model_images->image) }}"
                            class="cover-img" alt="models">
                    </div>
                    <div class="card-overlay text-white">
                        <h4 class="h4 mb-3 secondary-font fw-600 text-break">{{@$model->fullName}}</h4>
                        <div class="d-flex flex-wrap modal-body-content-items">
                            <div class="d-flex flex-column card-overlay-text">
                                <span class="small-content mb-1 opacity-7">Height</span>
                                <span class="text-white">{{@$model->model_details->height}}</span>
                            </div>
                            <div class="d-flex flex-column card-overlay-text">
                                <span class="small-content mb-1 opacity-7">Weight</span>
                                <span class="text-white">{{@$model->model_details->weight}}</span>
                            </div>
                            <div class="d-flex flex-column card-overlay-text">
                                <span class="small-content mb-1 opacity-7">Hair</span>
                                <span class="text-white">{{@$model->model_details->hair}}</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
         
            <!-- <a href="{{ route('modelProfile') }}" class="atomosphere-girls-images">
                <div class="models-profile-gallery-img d-align">
                    <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/atmosphere-girls/model1.jpg') }}"
                        class="cover-img" alt="models">
                </div>
                <div class="card-overlay text-white">
                    <h4 class="h4 mb-3 secondary-font fw-600 text-break">Erika</h4>
                    <div class="d-flex flex-wrap modal-body-content-items">
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Height</span>
                            <span class="text-white">185</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Weight</span>
                            <span class="text-white">57</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Hair</span>
                            <span class="text-white">Blonde</span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('modelProfile') }}" class="atomosphere-girls-images">
                <div class="models-profile-gallery-img d-align">
                    <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/atmosphere-girls/model2.jpg') }}"
                        class="cover-img" alt="models">
                </div>
                <div class="card-overlay text-white">
                    <h4 class="h4 mb-3 secondary-font fw-600 text-break">Erika</h4>
                    <div class="d-flex flex-wrap modal-body-content-items">
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Height</span>
                            <span class="text-white">185</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Weight</span>
                            <span class="text-white">57</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Hair</span>
                            <span class="text-white">Blonde</span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('modelProfile') }}" class="atomosphere-girls-images">
                <div class="models-profile-gallery-img d-align">
                    <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/atmosphere-girls/model3.jpg') }}"
                        class="cover-img" alt="models">
                </div>
                <div class="card-overlay text-white">
                    <h4 class="h4 mb-3 secondary-font fw-600 text-break">Erika</h4>
                    <div class="d-flex flex-wrap modal-body-content-items">
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Height</span>
                            <span class="text-white">185</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Weight</span>
                            <span class="text-white">57</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Hair</span>
                            <span class="text-white">Blonde</span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('modelProfile') }}" class="atomosphere-girls-images">
                <div class="models-profile-gallery-img d-align">
                    <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/atmosphere-girls/model4.jpg') }}"
                        class="cover-img" alt="models">
                </div>
                <div class="card-overlay text-white">
                    <h4 class="h4 mb-3 secondary-font fw-600 text-break">Erika</h4>
                    <div class="d-flex flex-wrap modal-body-content-items">
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Height</span>
                            <span class="text-white">185</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Weight</span>
                            <span class="text-white">57</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Hair</span>
                            <span class="text-white">Blonde</span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('modelProfile') }}" class="atomosphere-girls-images">
                <div class="models-profile-gallery-img d-align">
                    <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/atmosphere-girls/model1.jpg') }}"
                        class="cover-img" alt="models">
                </div>
                <div class="card-overlay text-white">
                    <h4 class="h4 mb-3 secondary-font fw-600 text-break">Erika</h4>
                    <div class="d-flex flex-wrap modal-body-content-items">
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Height</span>
                            <span class="text-white">185</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Weight</span>
                            <span class="text-white">57</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Hair</span>
                            <span class="text-white">Blonde</span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('modelProfile') }}" class="atomosphere-girls-images">
                <div class="models-profile-gallery-img d-align">
                    <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/atmosphere-girls/model2.jpg') }}"
                        class="cover-img" alt="models">
                </div>
                <div class="card-overlay text-white">
                    <h4 class="h4 mb-3 secondary-font fw-600 text-break">Erika</h4>
                    <div class="d-flex flex-wrap modal-body-content-items">
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Height</span>
                            <span class="text-white">185</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Weight</span>
                            <span class="text-white">57</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Hair</span>
                            <span class="text-white">Blonde</span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('modelProfile') }}" class="atomosphere-girls-images">
                <div class="models-profile-gallery-img d-align">
                    <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/atmosphere-girls/model1.jpg') }}"
                        class="cover-img" alt="models">
                </div>
                <div class="card-overlay text-white">
                    <h4 class="h4 mb-3 secondary-font fw-600 text-break">Erika</h4>
                    <div class="d-flex flex-wrap modal-body-content-items">
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Height</span>
                            <span class="text-white">185</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Weight</span>
                            <span class="text-white">57</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Hair</span>
                            <span class="text-white">Blonde</span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('modelProfile') }}" class="atomosphere-girls-images">
                <div class="models-profile-gallery-img d-align">
                    <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/atmosphere-girls/model2.jpg') }}"
                        class="cover-img" alt="models">
                </div>
                <div class="card-overlay text-white">
                    <h4 class="h4 mb-3 secondary-font fw-600 text-break">Erika</h4>
                    <div class="d-flex flex-wrap modal-body-content-items">
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Height</span>
                            <span class="text-white">185</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Weight</span>
                            <span class="text-white">57</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Hair</span>
                            <span class="text-white">Blonde</span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('modelProfile') }}" class="atomosphere-girls-images">
                <div class="models-profile-gallery-img d-align">
                    <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/atmosphere-girls/model1.jpg') }}"
                        class="cover-img" alt="models">
                </div>
                <div class="card-overlay text-white">
                    <h4 class="h4 mb-3 secondary-font fw-600 text-break">Erika</h4>
                    <div class="d-flex flex-wrap modal-body-content-items">
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Height</span>
                            <span class="text-white">185</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Weight</span>
                            <span class="text-white">57</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Hair</span>
                            <span class="text-white">Blonde</span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('modelProfile') }}" class="atomosphere-girls-images">
                <div class="models-profile-gallery-img d-align">
                    <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/atmosphere-girls/model2.jpg') }}"
                        class="cover-img" alt="models">
                </div>
                <div class="card-overlay text-white">
                    <h4 class="h4 mb-3 secondary-font fw-600 text-break">Erika</h4>
                    <div class="d-flex flex-wrap modal-body-content-items">
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Height</span>
                            <span class="text-white">185</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Weight</span>
                            <span class="text-white">57</span>
                        </div>
                        <div class="d-flex flex-column card-overlay-text">
                            <span class="small-content mb-1 opacity-7">Hair</span>
                            <span class="text-white">Blonde</span>
                        </div>
                    </div>
                </div>
            </a> -->
        </div>
        <button class="btn btn-big load-more-btn d-none">Load More Girls</button>
    </section>
    <!-- // _ends > Atmosphere Girls < AVN // -->
@endsection
@section('script')
    @include('front.atmosphereGirls.scripts')
@endsection
