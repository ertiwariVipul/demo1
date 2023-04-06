@extends('layouts.admin.admin')
@section('title')
    {{ env('APP_NAME') }} | Model
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
                            <h4 class="mb-0 font-size-18">Model</h4>
                            <ol class="breadcrumb m-2">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Model</li>
                            </ol>
                        </div>
                        <div class="page-title-right ml-auto">
                            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".create-model">+ Create Model</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('admin.model.list')
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- Add Model -->
    <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="modal fade create-model" id="create-model" tabindex="-1" role="dialog" aria-labelledby="create-model" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-flex flex-column">
                            <h4 class="modal-title mt-0 mb-1" id="create-model">Become a Rixer Girl</h4>
                            <span>If you would like to join us here at Rixer Agency, fill in the form here. One of our agent
                                will
                                contact you with more details
                                and you'll be able to forward your picture by email or WhatsApp/Telegram</span>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form id="form-model" class="form-horizontal form-wizard-wrapper" method="post" enctype="multipart/form-data">
                                    <h3>Personal Information</h3>
                                    <fieldset class="position-relative">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" class="form-control" name="fullName" id="full-name" placeholder="Your Full Name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" placeholder="Email Address" name="email" id="email" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Mobile Phone</label>
                                                    <input type="text" class="form-control" name="mobile" placeholder="Mobile Phone" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Model Category</label>
                                                    <select class="select2 form-control select2-multiple" name="category[]" id="category" multiple="multiple" data-placeholder="Choose ..">
                                                        <optgroup label="Model Category">
                                                            @foreach ($categoryList as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Profile Level</label>
                                                    <select class="form-control" name="profileLevel" id="profile-level">
                                                        <option value="" disabled selected>Profile Level</option>
                                                        @foreach ($profileLevelList as $profileLevel)
                                                            <option value="{{ $profileLevel->id }}">{{ $profileLevel->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control" name="country">
                                                        <option disabled selected>Country</option>
                                                        @foreach ($countryList as $country)
                                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" placeholder="City" name="city" id="city" />
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Languages</label>
                                                    <select class="select2 form-control select2-multiple" name="language[]" multiple="multiple" data-placeholder="Choose ...">
                                                        <optgroup label="Language">
                                                            @foreach ($languageList as $language)
                                                                <option value="{{ $language->id }}">{{ $language->name }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Notes / Comments</label>
                                                    <textarea type="text" class="form-control" placeholder="Write Notes / Comments here" rows="5" cols="5" name="comments"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Visa Details</label>
                                                    <div class="border rounded p-2">
                                                        <div class="row" id="visa_detail_0">
                                                            <div class="col-md-4" >
                                                                <div class="form-group">
                                                                    <label>Visa</label>
                                                                    <input type="text" class="form-control" name="visa[]" id="visa_0" placeholder="Country" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Expiry Date</label>
                                                                    <input type="date" class="form-control visa_date" name="visa_date[]" id="visa_date_0" placeholder="Expiry Date" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <button class="btn btn-primary mt-4 d-block w-100" id="add-visa" data-id="0" type="button">Add</button>
                                                            </div>
                                                        </div>
                                                        <div class="add-visa-event"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h3>Body Details</h3>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input type="number" class="form-control" name="age" placeholder="Age" max="100" min="10" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Height (cm)</label>
                                                    <input type="number" class="form-control" name="height" placeholder="Height (ft)" max="999" min="10" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Weight (kg)</label>
                                                    <input type="number" class="form-control" name="weight" placeholder="Weight (lbs)" max="500" min="10" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Hair</label>
                                                    <input type="text" class="form-control" name="hair" placeholder="Hair" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Eye Color</label>
                                                    <input type="text" class="form-control" name="eyecolor" placeholder="Eye color" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Waist</label>
                                                    <input type="number" class="form-control" name="waist" placeholder="Waist (cm)" max="999" min="10"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Hips</label>
                                                    <input type="number" class="form-control" name="hips" placeholder="Hips (cm)" max="999" min="10" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Bust</label>
                                                    <input type="number" class="form-control" name="bust" placeholder="Bust (cm)" max="999" min="10" />
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>                                   
                                    <h3>Add Image</h3>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group modal-images-gallary-wrap" id="parant">
                                                    <div class="model-menu-images-wrap" id="model-image"> 
                                                        <div class="upload-input-wrap">
                                                            <input type='file' class="form-control model_image" id="upload" name="modelImage[]" multiple hidden/>
                                                            <label for="upload" id="upload-span" class="upload-input a-btn a-btn-theme-border">
                                                                <span class="d-inline-block mb-2">
                                                                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M23.0222 35.9991H12.9762C3.88448 35.9991 0 32.1146 0 23.023V12.9769C0 3.88521 3.88448 0.000732422 12.9762 0.000732422H19.6735C20.36 0.000732422 20.9293 0.570009 20.9293 1.25649C20.9293 1.94297 20.36 2.51225 19.6735 2.51225H12.9762C5.25744 2.51225 2.51152 5.25817 2.51152 12.9769V23.023C2.51152 24.8542 2.66608 26.4056 3.00494 27.7068L9.9311 23.0565C11.7394 21.851 14.2342 21.985 15.875 23.3747L16.4275 23.8602C17.2647 24.5802 18.6879 24.5802 19.5083 23.8602L26.4736 17.8828C28.2652 16.3592 31.0446 16.3592 32.8361 17.8828L33.4869 18.4418V14.6512C33.4869 13.9648 34.0561 13.3955 34.7426 13.3955C35.4291 13.3955 35.9984 13.9648 35.9984 14.6512V21.112C36.001 21.1587 36.001 21.2055 35.9984 21.2523V23.023C35.9984 32.1146 32.1139 35.9991 23.0222 35.9991ZM33.4869 21.7598V23.023C33.4869 30.7417 30.7409 33.4876 23.0222 33.4876H12.9762C8.37314 33.4876 5.53859 32.5111 4.00022 30.0858L11.3375 25.1495C12.1915 24.5635 13.464 24.6304 14.2342 25.2834L14.7867 25.769C16.5782 27.2926 19.3744 27.2926 21.1492 25.769L28.1145 19.7916C28.9349 19.0716 30.3581 19.0716 31.1953 19.7916L33.4869 21.7598ZM12.9782 15.907C10.4332 15.907 8.37376 13.8476 8.37376 11.3026C8.37376 8.75755 10.4332 6.69811 12.9782 6.69811C15.5232 6.69811 17.5826 8.75755 17.5826 11.3026C17.5826 13.8476 15.5232 15.907 12.9782 15.907ZM12.9782 9.20962C11.8229 9.20962 10.8853 10.1473 10.8853 11.3026C10.8853 12.4578 11.8229 13.3955 12.9782 13.3955C14.1335 13.3955 15.0711 12.4578 15.0711 11.3026C15.0711 10.1473 14.1335 9.20962 12.9782 9.20962ZM24.2794 7.53533H27.6257V10.8841C27.6257 11.5706 28.195 12.1399 28.8815 12.1399C29.5679 12.1399 30.1372 11.5706 30.1372 10.8841V7.53533H33.4883C34.1748 7.53533 34.7441 6.96605 34.7441 6.27957C34.7441 5.59309 34.1748 5.02382 33.4883 5.02382H30.1372V1.67522C30.1372 0.988739 29.5679 0.419462 28.8815 0.419462C28.195 0.419462 27.6257 0.988739 27.6257 1.67522V5.02382H24.2794C23.5929 5.02382 23.0236 5.59309 23.0236 6.27957C23.0236 6.96605 23.5929 7.53533 24.2794 7.53533Z" fill="currentColor"/>
                                                                    </svg>
                                                                </span>
                                                                Add Photo
                                                            </label>
                                                            <div class="removeValue"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Model -->

    <!-- Edit model --> 
    <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="modal fade edit-model-modal" id="edit-model-modal" tabindex="-1" role="dialog" aria-labelledby="edit-model-modal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-flex flex-column">
                            <h4 class="modal-title mt-0 mb-1" id="edit-model">Edit Your Details</h4>
                            <!-- <span>If you would like to join us here at Rixer Agency, fill in the form here. One of our agent
                                will
                                contact you with more details
                                and you'll be able to forward your picture by email or WhatsApp/Telegram</span> -->
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                               <div id="model_edit_form"></div> 
                               {{-- @include('admin.model.edit_model') --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit model --> 

    <!-- Change Status for Models  -->
    <div class="col-sm-6 col-md-6 col-xl-3">
        <div class="modal fade change-model-status-modal" id="change-model-status-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                            <form id="change-model-status-form" class="form-horizontal form-wizard-wrapper" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="userId" id="change-status-model-id" value=""/>
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

    
@endsection
@section('js')
    @include('admin.model.scripts')
@endsection

