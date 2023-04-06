@extends('layouts.front.front')
@section('title')
    Become Model
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/smart_wizard_all.min.css') }}">
@endsection
@section('content')
   
    <section class="become-model-wrap atomosphere-girls-wrapper">
        <div class="container">
            <div class="contact-title text-center" id="ModelTitle">
                <h2 class="small mb-3 secondary-font fw-600 text-white text-shadow-color">Become a Rixer Girl</h2>
                <p class="mb-0 text-white fw-400 small">If you would like to join us here at Rixer Agency, fill in the
                    form here. One of our agent will contact you with more details and you'll be able to forward your
                    picture by email or WhatsApp/Telegram</p>
            </div>
            <div class="form-stepwizard">
                <form  id="modelApplyForm" method="post">
                    <div id="smartwizard">
                        <ul class="nav nav-progress">
                            <li class="nav-item">
                                <a class="nav-link" href="#step-1">
                                    <div class="num">1</div>
                                    Personal Information
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#step-2">
                                    <span class="num">2</span>
                                    Body Details
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">    
                                    <div class="form-spacing">
                                        <label class="custom-input-label">Full Name</label>
                                        <input type="text" name="fullName" class="custom-input custom-input-md" placeholder="Your Full Name" id="full_name">
                                    </div>
                                    <div class="form-spacing">
                                        <label class="custom-input-label">Email Address</label>
                                        <input type="email" class="custom-input custom-input-md" placeholder="Email Address" name="email" id="email">
                                    </div>
                                    <div class="form-spacing">
                                        <label class="custom-input-label">Mobile Phone</label>
                                        <input type="text" class="custom-input custom-input-md" name="mobile" placeholder="Whatsapp/Telegram">
                                    </div>
                                    <div class="form-spacing" class="custom-select">
                                        <label class="custom-input-label">Country</label>
                                        <select class="my-select" data-container="body"  name="country">
                                            <option  disabled selected>Select your country</option>
                                            @foreach ($countryList as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-spacing" class="custom-select">
                                        <label class="custom-input-label">Languages</label>
                                        <select class="my-select " data-container="body" name="language[]" multiple="multiple" data-placeholder="Select your Languages">
                                            <optgroup label="Select your Languages">
                                            @foreach ($languageList as $language)
                                                <option value="{{ $language->id }}">{{ $language->name }}</option>
                                            @endforeach
                                        </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-spacing">
                                        <label class="custom-input-label">City</label>
                                        <input type="text" class="custom-input custom-input-md" placeholder="City" name="city" id="city" />
                                    </div>
                                    <div class="d-flex justify-content-between wizardBtnWrap">
                                    <div class="position-relative button-bubble-wrap">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="goo">
                                            <defs>
                                            <filter id="goo">
                                                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                                                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9"
                                                result="goo" />
                                                <feComposite in="SourceGraphic" in2="goo" />
                                            </filter>
                                            </defs>
                                        </svg>
                                        <span class="button--bubble__container">
                                            <button class="btn ms-auto smartWizardNext button button--bubble">Go to body details</button>
                                            <span class="button--bubble__effect-container">
                                            <span class="circle top-left"></span>
                                            <span class="circle top-left"></span>
                                            <span class="circle top-left"></span>

                                            <span class="button effect-button"></span>

                                            <span class="circle bottom-right"></span>
                                            <span class="circle bottom-right"></span>
                                            <span class="circle bottom-right"></span>
                                            </span>
                                        </span>
                                        </div>
                                    </div>
                                
                                <!-- <div class="d-flex justify-content-between wizardBtnWrap">
                                    <button class="btn ms-auto smartWizardNext">Go to body details</button>
                                </div> -->
                            </div>
                            <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">                              
                                    <div class="measurements-items">
                                        <div>
                                            <label class="custom-input-label">Height</label>
                                            <input type="number" class="custom-input custom-input-md" placeholder="Your Height" name="height" placeholder="Height (ft)">
                                        </div>
                                        <div>
                                            <label class="custom-input-label">Hair color</label>
                                            <input type="text" class="custom-input custom-input-md" placeholder="Hair color" name="hair" placeholder="Hair">
                                        </div>
                                    </div>
                                    <div class="measurements-items">
                                        <div class="custom-select w-100">
                                            <label class="custom-input-label">Eye Color</label>
                                            <input type="text" class="custom-input custom-input-md" name="eyecolor" placeholder="Eye color" />
                                        </div>                                        
                                        <div>
                                            <label class="custom-input-label">Hip Size</label>
                                            <input type="number" class="custom-input custom-input-md" placeholder="Hip size, cm" />
                                        </div>                                       
                                    </div>
                                    <div class="measurements-items">
                                        <div>
                                            <label class="custom-input-label">Cup Size</label>
                                            <input type="number" name="bust" class="custom-input custom-input-md" placeholder="Cup size, cm">
                                        </div>
                                        <div>
                                            <label class="custom-input-label">Waist size</label>
                                            <input type="number" name="waist" class="custom-input custom-input-md" placeholder="Waist size, cm">
                                        </div>
                                    </div>
                                    <div class="measurements-items">
                                        <div class="custom-select w-100">
                                            <label class="custom-input-label">Dress size</label>
                                            <select class="my-select" data-container="body" name="dress_size">
                                                <option value="small">Small</option>
                                                <option value="medium">Medium</option>
                                                <option value="large">Large</option>
                                            </select>
                                        </div>
                                    </div>                                
                                <div class="documents-wrap">
                                    <div class="documents-title">
                                        <h5 class="mb-lg-1 mb-2 text-uppercase text-white fw-600">DOCUMENTS</h5>
                                        <p class="text-white fw-400 small mb-0">Please make sure that you downloaded all attachements from below.</p>
                                    </div>
                                    <div class="model-contract-wrap mb-3">
                                        <div class="model-contract d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="document-icon">
                                                    <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/document-text.png') }}" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <p class="h6 text-white fw-600 mb-1 text-break">Model Contract</p>
                                                    <span class="d-inline-block text-alto-tint small-content text-uppercase">PDF 1.4 Mb</span>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button"
                                                    class="d-inline-block mb-0 h6 download-btn pdfDownload">Download</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="model-contract-wrap">
                                        <div class="model-contract d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="document-icon">
                                                    <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/document-text.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <p class="h6 text-white fw-600 mb-1 text-break">Model Contract</p>
                                                    <span
                                                        class="d-inline-block text-alto-tint small-content text-uppercase">PDF 1.4 Mb</span>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button"
                                                    class="d-inline-block mb-0 h6 download-btn">Download</button>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div>
                                        <a href="javascript:void(0)" class="checkbox-wrap d-flex align-items-center text-decoration-none">
                                            <input type="checkbox" id="checkboxbtn" required>
                                            <label for="checkboxbtn" class="mb-0 fw-500" required>I agree with.....</label>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between wizardBtnWrap flex-wrap flex-md-nowrap">
                                    <button class="btn btn-big border-btn" id="smartwizardPrev">Go back</button>
                                    <div class="position-relative button-bubble-wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="goo">
                                        <defs>
                                        <filter id="goo">
                                            <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                                            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9"
                                            result="goo" />
                                            <feComposite in="SourceGraphic" in2="goo" />
                                        </filter>
                                        </defs>
                                    </svg>
                                    <span class="button--bubble__container">
                                        <!-- <button class="btn ms-auto smartWizardNext button button--bubble">Go to body details</button> -->
                                        <button class="btn btn-big SendApplicationBtn smartWizardNext button button--bubble"
                                        id="sendApplication">
                                        Send application
                                        </button>
                                        <span class="button--bubble__effect-container">
                                        <span class="circle top-left"></span>
                                        <span class="circle top-left"></span>
                                        <span class="circle top-left"></span>

                                        <span class="button effect-button"></span>

                                        <span class="circle bottom-right"></span>
                                        <span class="circle bottom-right"></span>
                                        <span class="circle bottom-right"></span>
                                        </span>
                                    </span>
                                    </div>
                                </div>
                                <!-- <div class="d-flex align-items-center justify-content-between wizardBtnWrap flex-wrap flex-md-nowrap">
                                    <button class="btn btn-big border-btn" id="smartwizardPrev">Go back</button>
                                    <button type="Submit" class="btn btn-big SendApplicationBtn smartWizardNext" id="sendApplication" >Send application</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    </form>
                    <div id="successPage">
                        <div class="text-center">
                            <div class="check-mark-img mb-3">
                                <img
                                    src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/tick-circle.png') }}"alt="checkmark-img">
                            </div>
                            <div>
                                <h2 class="small secondary-font fw-600 text-white">Congratulations</h2>
                                <p class="small text-white mb-0">Your application has been sent. We will notify you
                                    about process by email.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center wizardBtnWrap">
                            <a href="{{ route('front') }}" class="btn btn-big border-btn" id="smartwizardPrev">Go
                                back</a>
                        </div>
                    </div>
                
            </div>
        </div>
    </section>
    <!-- // _ends > Become Model < AVN // -->
@endsection
@section('script')
    @include('front.model.scripts')
@endsection
