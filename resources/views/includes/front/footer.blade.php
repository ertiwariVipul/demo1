   <!-- // _begin > Footer < AVN // -->
   <footer>
       <div class="container">
           <div class="footer-container">
               <div class="row g-5">
                   <div class="col-xl-3">
                       <div class="footer-logo">
                           <a href="{{ route('front') }}">
                               <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/logo/rixer-logo.svg') }}"
                                   alt="logo" class="img-fluid">
                           </a>
                       </div>
                   </div>
                   <div class="col-xl-9">
                       <div class="row">
                           <div class="col-xl-3  col-md-4 col-sm-6 col-12">
                               <div class="footer-links">
                                   <h6 class="text-uppercase text-heather fw-400 small-head">RIXER MODELS</h6>
                                   <a href="javasript:void(0)" class="text-capitalize">Party Girls</a>
                                   <a href="{{ route('atmosphere-girls') }}" class="text-capitalize">Atomosphere
                                       Girls</a>
                                   <a href="javasript:void(0)" class="text-capitalize">Exhibition Girls</a>
                                   <a href="javasript:void(0)" class="text-capitalize">Traditional Models</a>
                               </div>
                           </div>
                           <div class="col-xl-3  col-md-4 col-sm-6 col-12">
                               <div class="footer-links">
                                   <h6 class="text-uppercase text-heather fw-400 small-head">WORK WITH US</h6>
                                   <a href="{{ route('front.model') }}" class="text-capitalize">Become a model</a>
                                   <a href="{{ route('rates') }}" class="text-capitalize">Rates</a>
                               </div>
                           </div>
                           <div class="col-xl-3  col-md-4 col-sm-6 col-12">
                               <div class="footer-links">
                                   <h6 class="text-uppercase text-heather fw-400 small-head">ABOUT</h6>
                                   <a href="{{ route('contact') }}" class="text-capitalize">Contact</a>
                                   <a href="javasript:void(0)" class="text-capitalize">About Us</a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="footer-copyright text-center">
           <div class="container">
               <div
                   class="d-flex justify-content-md-between justify-content-center align-items-center flex-wrap flex-lg-nowrap">
                   <p class="footer-text mb-0 text-gull-gray small-content">Copyright © 2022 Rixer Agency. All rights
                       reserved.</p>
                   <div class="footer-copyright-links">
                       <a href="javascript:void(0)" class="small-head">Policy Privacy</a>
                       <a href="javascript:void(0)" class="small-head">Terms & Condition</a>
                   </div>
               </div>
           </div>
       </div>
   </footer>
   <!-- // _ends > Footer < AVN // -->
