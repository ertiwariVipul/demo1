   <!-- // _begin > Header < AVN // -->
   <header>
       <div class="container">
           <div class="header-navbar d-flex align-items-center justify-content-between">
               <div class="header-logo">
                   <a href="{{ route('front') }}" class="d-block"><img
                           src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/logo/rixer-logo.svg') }}" alt="logo"
                           class="img-fluid"></a>
               </div>
               <div class="header-navigation  ms-auto" id="navigation">
                   <ul class="list-unstyled header-navitem d-flex  mb-0" id="myDIV">
                       <li><a href="{{ route('front') }}" class="header-nav active">
                               <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                   <path
                                       d="M1 6.5C0.447715 6.5 0 6.94772 0 7.5C0 8.05228 0.447715 8.5 1 8.5V6.5ZM21.7071 8.20711C22.0976 7.81658 22.0976 7.18342 21.7071 6.79289L15.3431 0.428932C14.9526 0.0384078 14.3195 0.0384078 13.9289 0.428932C13.5384 0.819457 13.5384 1.45262 13.9289 1.84315L19.5858 7.5L13.9289 13.1569C13.5384 13.5474 13.5384 14.1805 13.9289 14.5711C14.3195 14.9616 14.9526 14.9616 15.3431 14.5711L21.7071 8.20711ZM1 8.5H21V6.5H1V8.5Z"
                                       fill="currentColor" />
                               </svg>Home</a></li>
                       <li><a href="{{ route('atmosphere-girls') }}" class="header-nav header-nav-links">
                               <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                   <path
                                       d="M1 6.5C0.447715 6.5 0 6.94772 0 7.5C0 8.05228 0.447715 8.5 1 8.5V6.5ZM21.7071 8.20711C22.0976 7.81658 22.0976 7.18342 21.7071 6.79289L15.3431 0.428932C14.9526 0.0384078 14.3195 0.0384078 13.9289 0.428932C13.5384 0.819457 13.5384 1.45262 13.9289 1.84315L19.5858 7.5L13.9289 13.1569C13.5384 13.5474 13.5384 14.1805 13.9289 14.5711C14.3195 14.9616 14.9526 14.9616 15.3431 14.5711L21.7071 8.20711ZM1 8.5H21V6.5H1V8.5Z"
                                       fill="currentColor" />
                               </svg>Rixer Girls</a>
                       </li>
                       <li><a href="{{ route('front.model') }}" class="header-nav header-nav-links">
                               <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                   <path
                                       d="M1 6.5C0.447715 6.5 0 6.94772 0 7.5C0 8.05228 0.447715 8.5 1 8.5V6.5ZM21.7071 8.20711C22.0976 7.81658 22.0976 7.18342 21.7071 6.79289L15.3431 0.428932C14.9526 0.0384078 14.3195 0.0384078 13.9289 0.428932C13.5384 0.819457 13.5384 1.45262 13.9289 1.84315L19.5858 7.5L13.9289 13.1569C13.5384 13.5474 13.5384 14.1805 13.9289 14.5711C14.3195 14.9616 14.9526 14.9616 15.3431 14.5711L21.7071 8.20711ZM1 8.5H21V6.5H1V8.5Z"
                                       fill="currentColor" />
                               </svg>Become Rixer Girls</a></li>
                       <li><a href="{{ route('rates') }}" class="header-nav header-nav-links">
                               <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                   <path
                                       d="M1 6.5C0.447715 6.5 0 6.94772 0 7.5C0 8.05228 0.447715 8.5 1 8.5V6.5ZM21.7071 8.20711C22.0976 7.81658 22.0976 7.18342 21.7071 6.79289L15.3431 0.428932C14.9526 0.0384078 14.3195 0.0384078 13.9289 0.428932C13.5384 0.819457 13.5384 1.45262 13.9289 1.84315L19.5858 7.5L13.9289 13.1569C13.5384 13.5474 13.5384 14.1805 13.9289 14.5711C14.3195 14.9616 14.9526 14.9616 15.3431 14.5711L21.7071 8.20711ZM1 8.5H21V6.5H1V8.5Z"
                                       fill="currentColor" />
                               </svg>Rates</a></li>
                       <li><a href="{{ route('contact') }}" class="header-nav header-nav-links">
                               <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                   <path
                                       d="M1 6.5C0.447715 6.5 0 6.94772 0 7.5C0 8.05228 0.447715 8.5 1 8.5V6.5ZM21.7071 8.20711C22.0976 7.81658 22.0976 7.18342 21.7071 6.79289L15.3431 0.428932C14.9526 0.0384078 14.3195 0.0384078 13.9289 0.428932C13.5384 0.819457 13.5384 1.45262 13.9289 1.84315L19.5858 7.5L13.9289 13.1569C13.5384 13.5474 13.5384 14.1805 13.9289 14.5711C14.3195 14.9616 14.9526 14.9616 15.3431 14.5711L21.7071 8.20711ZM1 8.5H21V6.5H1V8.5Z"
                                       fill="currentColor" />
                               </svg>Contact</a></li>
                   </ul>
               </div>
               <div class="d-flex align-items-center">                                        
 
                    @role('user')
                        <div><a href="{{ route('user.index') }}" class="btn signin-btn">My Account</a></div>
                    @else
                        <div><a href="{{ route('user.login') }}" class="btn signin-btn">Sign In</a></div>
                    @endrole
                   <div class="hamburger toggle-btn" id="hamburger">
                       <span class="text-white close-label fw-600 h5 small mb-0">Close</span>
                       <span class="line"></span>
                   </div>
               </div>
           </div>
       </div>
   </header>
   <!-- // _ends > Header < AVN // -->
