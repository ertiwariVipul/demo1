@extends('layouts.user.user')
@section('title')
    {{ env('APP_NAME') }} | Admin
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
                        <h4 class="mb-0 font-size-18">Product Detail</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Product Detail</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            {{-- <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="product-detai-imgs">
                                    <div class="row">
                                        <div class="col-md-2 col-3">
                                            <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="product-1-tab" data-toggle="pill" href="#product-1" role="tab" aria-controls="product-1" aria-selected="true">
                                                    <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/product/img-7.png') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                                </a>
                                                <a class="nav-link" id="product-2-tab" data-toggle="pill" href="#product-2" role="tab" aria-controls="product-2" aria-selected="false">
                                                    <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/product/img-8.png') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                                </a>
                                                <a class="nav-link" id="product-3-tab" data-toggle="pill" href="#product-3" role="tab" aria-controls="product-3" aria-selected="false">
                                                    <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/product/img-7.png') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                                </a>
                                                <a class="nav-link" id="product-4-tab" data-toggle="pill" href="#product-4" role="tab" aria-controls="product-4" aria-selected="false">
                                                    <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/product/img-8.png') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-7 offset-md-1 col-9">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                                    <div>
                                                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/product/img-7.png') }}" alt="" class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="product-2" role="tabpanel" aria-labelledby="product-2-tab">
                                                    <div>
                                                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/product/img-8.png') }}" alt="" class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="product-3" role="tabpanel" aria-labelledby="product-3-tab">
                                                    <div>
                                                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/product/img-7.png') }}" alt="" class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="product-4" role="tabpanel" aria-labelledby="product-4-tab">
                                                    <div>
                                                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/product/img-8.png') }}" alt="" class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="button" class="btn btn-primary waves-effect waves-light mt-2 mr-1">
                                                    <i class="bx bx-cart mr-2"></i> Add to cart
                                                </button>
                                                <button type="button" class="btn btn-success waves-effect  mt-2 waves-light">
                                                    <i class="bx bx-shopping-bag mr-2"></i>Buy now
                                                </button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-6">
                                <div class="mt-4 mt-xl-3">
                                    <a href="#" class="text-primary">Headphone</a>
                                    <h4 class="mt-1 mb-3">Wireless Headphone (Black)</h4>

                                    <p class="text-muted float-left mr-3">
                                        <span class="bx bx-star text-warning"></span>
                                        <span class="bx bx-star text-warning"></span>
                                        <span class="bx bx-star text-warning"></span>
                                        <span class="bx bx-star text-warning"></span>
                                        <span class="bx bx-star"></span>
                                    </p>
                                    <p class="text-muted mb-4">( 152 Customers Review )</p>

                                    <h6 class="text-success text-uppercase">20 % Off</h6>
                                    <h5 class="mb-4">Price : <span class="text-muted mr-2"><del>$240 USD</del></span> <b>$225 USD</b></h5>
                                    <p class="text-muted mb-4">To achieve this, it would be necessary to have uniform grammar pronunciation and more common words If several languages coalesce</p>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div>
                                                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary mr-1"></i> Wireless</p>
                                                <p class="text-muted"><i class="bx bx-shape-triangle font-size-16 align-middle text-primary mr-1"></i> Wireless Range : 10m</p>
                                                <p class="text-muted"><i class="bx bx-battery font-size-16 align-middle text-primary mr-1"></i> Battery life : 6hrs</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <p class="text-muted"><i class="bx bx-user-voice font-size-16 align-middle text-primary mr-1"></i> Bass</p>
                                                <p class="text-muted"><i class="bx bx-cog font-size-16 align-middle text-primary mr-1"></i> Warranty : 1 Year</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-color">
                                        <h5 class="font-size-15">Color :</h5>
                                        <a href="#" class="active">
                                            <div class="product-color-item border rounded">
                                                <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/product/img-7.png') }}" alt="" class="avatar-md">
                                            </div>
                                            <p>Black</p>
                                        </a>
                                        <a href="#">
                                            <div class="product-color-item border rounded">
                                                <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/product/img-7.png') }}" alt="" class="avatar-md">
                                            </div>
                                            <p>Blue</p>
                                        </a>
                                        <a href="#">
                                            <div class="product-color-item border rounded">
                                                <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/product/img-7.png') }}" alt="" class="avatar-md">
                                            </div>
                                            <p>Gray</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="mt-5">
                            <h5 class="mb-3">Specifications :</h5>

                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="row" style="width: 400px;">Category</th>
                                            <td>Headphone</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Brand</th>
                                            <td>JBL</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Color</th>
                                            <td>Black</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Connectivity</th>
                                            <td>Bluetooth</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Warranty Summary</th>
                                            <td>1 Year</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end Specifications -->

                        <div class="mt-5">
                            <h5 class="mb-4">Reviews :</h5>

                            <div class="media border-bottom">
                                <img src="assets/images/users/avatar-2.jpg" class="avatar-xs mr-3 rounded-circle" alt="img" />
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-size-15">Brian</h5>
                                    <p class="text-muted">If several languages coalesce, the grammar of the resulting language.</p>
                                    <ul class="list-inline float-sm-right">
                                        <li class="list-inline-item">
                                            <a href="#"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><i class="far fa-comment-dots mr-1"></i> Comment</a>
                                        </li>
                                    </ul>
                                    <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary mr-1"></i> 5 hrs ago</div>
                                </div>
                            </div>
                            <div class="media mt-3 border-bottom">
                                <img src="assets/images/users/avatar-4.jpg" class="avatar-xs mr-3 rounded-circle" alt="img" />
                                <div class="media-body">
                                    <h5 class="mt-0 font-size-15 mb-1">Denver</h5>
                                    <p class="text-muted">To an English person, it will seem like simplified English, as a skeptical Cambridge</p>
                                    <ul class="list-inline float-sm-right">
                                        <li class="list-inline-item">
                                            <a href="#"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><i class="far fa-comment-dots mr-1"></i> Comment</a>
                                        </li>
                                    </ul>
                                    <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary mr-1"></i> 07 Oct, 2019</div>
                                    <div class="media mt-4">
                                        <img src="assets/images/users/avatar-5.jpg" class="avatar-xs mr-3 rounded-circle" alt="img" />
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-size-15">Henry</h5>
                                            <p class="text-muted">Their separate existence is a myth. For science, music, sport, etc.</p>
                                            <ul class="list-inline float-sm-right">
                                                <li class="list-inline-item">
                                                    <a href="#"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#"><i class="far fa-comment-dots mr-1"></i> Comment</a>
                                                </li>
                                            </ul>
                                            <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary mr-1"></i> 08 Oct, 2019</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="media mt-3 border-bottom">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle font-size-16">
                                        N
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-size-15">Neal</h5>
                                    <p class="text-muted">Everyone realizes why a new common language would be desirable.</p>
                                    <ul class="list-inline float-sm-right">
                                        <li class="list-inline-item">
                                            <a href="#"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><i class="far fa-comment-dots mr-1"></i> Comment</a>
                                        </li>
                                    </ul>
                                    <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary mr-1"></i> 05 Oct, 2019</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end card -->
            </div> --}}
            <!-- end row -->

            <div class="row mt-6">
                <div class="col-lg-12">
                    <div>
                        <h5 class="mb-6">Recent product :</h5>

                        <div class="row">
                            <div class="col-xl-3 col-sm-6">
                                <div class="card tabbing-cards">
                                    <div class="card-body">
                                        <div class="row align-items-center">

                                            <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/model2.jpg') }}"
                                                alt="" class="img-fluid mx-auto d-block">
                                            <h5 class=" text-truncate"><a href="#" class="text-dark">Leader Club
                                                    Chair</a></h5>
                                            <p class="text-muted">
                                                Leader Club ChairLeader Club ChairLeader Club ChairLeader Club ChairLeader
                                                Club Chair Leader Club Chair Leader Club ChairLeader Club ChairLeader Club
                                                ChairLeader Club Chair
                                                Leader Club Chair Leader Club ChairLeader Club ChairLeader Club ChairLeader
                                                Club Chair
                                                Leader Club ChairLeader Club ChairLeader Club ChairLeader Club ChairLeader
                                                Club ChairLeader
                                                vLeader Club ChairLeader Club ChairLeader Club ChairLeader Club Chair
                                                Leader Club Chair
                                            </p>
                                            <div class="nav flex-column nav-pills vertical-tabs" id="v-pills-tab"
                                                role="tablist" aria-orientation="vertical">
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
                            </div>
                            <div class="col-xl-9 col-sm-6">
                                <div class="card tabbing-cards">
                                    <div class="card-body">
                                        <div class="events-page-tabs-body">
                                            <div class="tab-content events-location-tab" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active events-page-tabs"
                                                    id="v-pills-location" role="tabpanel"
                                                    aria-labelledby="v-pills-location-tab">
                                                    <div class="map-title">
                                                        <h2>Event Location</h2>
                                                        <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                                            Dolor, illo!</span>
                                                    </div>
                                                    <div class="location-tab">
                                                        <iframe
                                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119066.41270041028!2d72.7520844199209!3d21.159345761749574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e59411d1563%3A0xfe4558290938b042!2sSurat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1676522058844!5m2!1sen!2sin"
                                                            class="location-map" style="border:0;" allowfullscreen=""
                                                            loading="lazy"
                                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade events-page-tabs" id="v-pills-model"
                                                    role="tabpanel" aria-labelledby="v-pills-model-tab">
                                                    <h1>Girls</h1>
                                                    <ul class="nav nav-pills horizontal-tabs" id="pills-tab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="pills-all-girls-tab"
                                                                data-toggle="pill" data-target="#pills-all-girls"
                                                                type="button" role="tab"
                                                                aria-controls="pills-all-girls" aria-selected="true">All
                                                                Girls</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="pills-exhibition-girls-tab"
                                                                data-toggle="pill" data-target="#pills-exhibition-girls"
                                                                type="button" role="tab"
                                                                aria-controls="pills-exhibition-girls"
                                                                aria-selected="false">Exhibition Girls</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="pills-party-girls-tab"
                                                                data-toggle="pill" data-target="#pills-party-girls"
                                                                type="button" role="tab"
                                                                aria-controls="pills-party-girls"
                                                                aria-selected="false">Party Girls</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="pills-traditional-models-tab"
                                                                data-toggle="pill" data-target="#pills-traditional-models"
                                                                type="button" role="tab"
                                                                aria-controls="pills-traditional-models"
                                                                aria-selected="false">traditional models</button>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content model-girls-tabs" id="pills-tabContent">
                                                        <div class="tab-pane fade show active" id="pills-all-girls"
                                                            role="tabpanel" aria-labelledby="pills-all-girls-tab">
                                                            <div class="atomosphere-girls-images-wrap">
                                                                <div class="atomosphere-girls-images">
                                                                    <div class="models-profile-gallery-img d-align">
                                                                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/model2.jpg') }}"
                                                                            class="cover-img" alt="models">
                                                                    </div>
                                                                    <div class="card-overlay text-white primary-font">
                                                                        <h4
                                                                            class="mb-1 secondary-font text-break text-white">
                                                                            Erika</h4>
                                                                        <div class="modal-body-content-items">
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Height</span>
                                                                                <span class="text-white">185</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Weight</span>
                                                                                <span class="text-white">57</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Hair</span>
                                                                                <span class="text-white">Blonde</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="atomosphere-girls-images">
                                                                    <div class="models-profile-gallery-img d-align">
                                                                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/model2.jpg') }}"
                                                                            class="cover-img" alt="models">
                                                                    </div>
                                                                    <div class="card-overlay text-white primary-font">
                                                                        <h4
                                                                            class="mb-1 secondary-font text-break text-white">
                                                                            Erika</h4>
                                                                        <div class="modal-body-content-items">
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Height</span>
                                                                                <span class="text-white">185</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Weight</span>
                                                                                <span class="text-white">57</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Hair</span>
                                                                                <span class="text-white">Blonde</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="atomosphere-girls-images">
                                                                    <div class="models-profile-gallery-img d-align">
                                                                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/model2.jpg') }}"
                                                                            class="cover-img" alt="models">
                                                                    </div>
                                                                    <div class="card-overlay text-white primary-font">
                                                                        <h4
                                                                            class="mb-1 secondary-font text-break text-white">
                                                                            Erika</h4>
                                                                        <div class="modal-body-content-items">
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Height</span>
                                                                                <span class="text-white">185</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Weight</span>
                                                                                <span class="text-white">57</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Hair</span>
                                                                                <span class="text-white">Blonde</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="atomosphere-girls-images">
                                                                    <div class="models-profile-gallery-img d-align">
                                                                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/model2.jpg') }}"
                                                                            class="cover-img" alt="models">
                                                                    </div>
                                                                    <div class="card-overlay text-white primary-font">
                                                                        <h4
                                                                            class="mb-1 secondary-font text-break text-white">
                                                                            Erika</h4>
                                                                        <div class="modal-body-content-items">
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Height</span>
                                                                                <span class="text-white">185</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Weight</span>
                                                                                <span class="text-white">57</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Hair</span>
                                                                                <span class="text-white">Blonde</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="atomosphere-girls-images">
                                                                    <div class="models-profile-gallery-img d-align">
                                                                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/model2.jpg') }}"
                                                                            class="cover-img" alt="models">
                                                                    </div>
                                                                    <div class="card-overlay text-white primary-font">
                                                                        <h4
                                                                            class="mb-1 secondary-font text-break text-white">
                                                                            Erika</h4>
                                                                        <div class="modal-body-content-items">
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Height</span>
                                                                                <span class="text-white">185</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Weight</span>
                                                                                <span class="text-white">57</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Hair</span>
                                                                                <span class="text-white">Blonde</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="atomosphere-girls-images">
                                                                    <div class="models-profile-gallery-img d-align">
                                                                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/model2.jpg') }}"
                                                                            class="cover-img" alt="models">
                                                                    </div>
                                                                    <div class="card-overlay text-white primary-font">
                                                                        <h4
                                                                            class="mb-1 secondary-font text-break text-white">
                                                                            Erika</h4>
                                                                        <div class="modal-body-content-items">
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Height</span>
                                                                                <span class="text-white">185</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Weight</span>
                                                                                <span class="text-white">57</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Hair</span>
                                                                                <span class="text-white">Blonde</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-exhibition-girls"
                                                            role="tabpanel" aria-labelledby="pills-exhibition-girls-tab">
                                                            <div class="atomosphere-girls-images-wrap">
                                                                <div class="atomosphere-girls-images">
                                                                    <div class="models-profile-gallery-img d-align">
                                                                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/model2.jpg') }}"
                                                                            class="cover-img" alt="models">
                                                                    </div>
                                                                    <div class="card-overlay text-white primary-font">
                                                                        <h4
                                                                            class="mb-1 secondary-font text-break text-white">
                                                                            Erika</h4>
                                                                        <div class="modal-body-content-items">
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Height</span>
                                                                                <span class="text-white">185</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Weight</span>
                                                                                <span class="text-white">57</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Hair</span>
                                                                                <span class="text-white">Blonde</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-party-girls" role="tabpanel"
                                                            aria-labelledby="pills-party-girls-tab">
                                                            <div class="atomosphere-girls-images-wrap">
                                                                <div class="atomosphere-girls-images">
                                                                    <div class="models-profile-gallery-img d-align">
                                                                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/model2.jpg') }}"
                                                                            class="cover-img" alt="models">
                                                                    </div>
                                                                    <div class="card-overlay text-white primary-font">
                                                                        <h4
                                                                            class="mb-1 secondary-font text-break text-white">
                                                                            Erika</h4>
                                                                        <div class="modal-body-content-items">
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Height</span>
                                                                                <span class="text-white">185</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Weight</span>
                                                                                <span class="text-white">57</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Hair</span>
                                                                                <span class="text-white">Blonde</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-traditional-models"
                                                            role="tabpanel"
                                                            aria-labelledby="pills-traditional-models-tab">
                                                            <div class="atomosphere-girls-images-wrap">
                                                                <div class="atomosphere-girls-images">
                                                                    <div class="models-profile-gallery-img d-align">
                                                                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/model2.jpg') }}"
                                                                            class="cover-img" alt="models">
                                                                    </div>
                                                                    <div class="card-overlay text-white primary-font">
                                                                        <h4
                                                                            class="mb-1 secondary-font text-break text-white">
                                                                            Erika</h4>
                                                                        <div class="modal-body-content-items">
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Height</span>
                                                                                <span class="text-white">185</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Weight</span>
                                                                                <span class="text-white">57</span>
                                                                            </div>
                                                                            <div class="card-overlay-text">
                                                                                <span
                                                                                    class="small-content mb-1">Hair</span>
                                                                                <span class="text-white">Blonde</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
