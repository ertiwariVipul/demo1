@extends('layouts.front.front')
@section('title')
    Rixer-Models
@endsection
@section('css')
@endsection
@section('content')

    <!-- _begin > hero section > AVN  -->
    <section class="hero">
        <div class="container">
        <div class="hero-wrap text-center">
            <div class="hero-title">
            <h1 class="h1 mb-5 text-white secondary-font">
                <span class="d-inline-block">Beautiful</span> bookable babes
            </h1>
            <p class="h5 mb-0 text-primary-color fw-400">
                Book Rixer promotional and party girls to make your event the hottest ticket in town. And feel like a
                rockstar with a stunning model on your arm.
            </p>
            </div>
            <div class="hero-page-links d-flex justify-content-md-center flex-wrap">
            <a href="javascript:void(0)" class="d-flex d-md-block align-items-center">
                <div class="d-align rixer-model-icon">
                <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/models.svg') }}" class="cover-img" alt="" />
                </div>
                <span class="fw-500 h6 mb-0 d-block mt-md-2 ms-md-0 ms-4 mt-0 text-break">Atmosphere girls</span>
            </a>
            <a href="javascript:void(0)" class="d-flex d-md-block align-items-center">
                <div class="d-align rixer-model-icon">
                <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/models.svg') }}" alt="" />
                </div>
                <span class="fw-500 h6 mb-0 d-block mt-md-2 ms-md-0 ms-4 mt-0 text-break">Exhibition girls</span>
            </a>
            <a href="javascript:void(0)" class="d-flex d-md-block align-items-center">
                <div class="d-align rixer-model-icon">
                <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/models.svg') }}" alt="" />
                </div>
                <span class="fw-500 h6 mb-0 d-block mt-md-2 ms-md-0 ms-4 mt-0 text-break">Party girls</span>
            </a>
            <a href="javascript:void(0)" class="d-flex d-md-block align-items-center">
                <div class="d-align rixer-model-icon">
                <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/models.svg') }}" alt="" />
                </div>
                <span class="fw-500 h6 mb-0 d-block mt-md-2 ms-md-0 ms-4 mt-0 text-break">Traditional models</span>
            </a>
            </div>
        </div>
        </div>
    </section>
    <!-- _ends > hero section > AVN  -->


    <!-- // _begin > Events Girls < AVN // -->

    <section class="events-girls-wrapper">
        <div class="container">
        <div class="d-flex align-items-end flex-wrap flex-lg-nowrap">
            <div class="gradient-box-wrapper">
            <div id="scene" class="position-relative">
                <div class="gradient-title position-relative d-flex align-items-start">
                <h3 class="small secondary-font text-white mb-0">
                    <span class="gradient-text"><span class="rapper"><span
                        class="text-gradient d-inline-block shine">Sexy</span></span></span>
                    still sells
                </h3>
                </div>
                <div data-depth="0.50" class="events-girls-img bg_parallax">
                <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/events-girls2.png') }}" alt="events-girl" class="img-fluid" />
                </div>
            </div>
            </div>
            <div class="events-girls-content events-girls-box-wrap">
            <div class="header-title">
                <h2 class="h2 text-white text-shadow-color secondary-font mb-5">Exhibition and event girls/hostesses</h2>
            </div>
            <div class="text-primary-color girls-content-wrap">
                <p class="h5 fw-400">
                Whether it’s a conference, trade show, exhibition or special promotion,
                <strong>bring your event to life with our beautiful girls.</strong> Need bubbly bikini bodies to enhance
                your classic cars? No problem. Want sharply dressed girls to attract people to your exhibition stand?
                You’ve got it. Need a few stunners to hand out samples? Simple.
                </p>

                <p class="h5 fw-400">
                Whatever your needs, you’ll get experienced and outgoing professionals who will help you market your
                products in a positive, friendly and engaging way.
                </p>
            </div>
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
                <a href="javascript:void(0)" class="btn btn-big button button--bubble">Get event girls</a>
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
        </div>
        </div>
    </section>
    <!-- // _ends > Events Girls < AVN // -->


    <!-- // _begin > atomosphere Girls < AVN // -->
    
    <section class="atomosphere-girls-wrapper hot-girls-wrappr">
        <div class="container">
        <div class="d-flex align-items-end flex-wrap flex-lg-nowrap flex-lg-row flex-column-reverse">
            <div class="events-girls-content events-girls-box-wrap">
            <div class="header-title">
                <h2 class="h2 text-white text-shadow-color secondary-font mb-5 ms-lg-auto text-lg-end">
                Engaging atmosphere girls
                </h2>
            </div>
            <div class="text-primary-color girls-content-wrap">
                <p class="h5 fw-400">
                Book our <strong>atmosphere girls to add energy, beauty and prestige to any night or event</strong> you
                have planned. Our girls don’t just stand around looking pretty, they mingle and engage with your guests,
                charming both men and women alike.
                </p>
                <p class="h5 fw-400">
                The fact is, the more hot girls you have, the more people want to come. With Rixer party girls you’ll
                get a reputation for throwing the best events.
                </p>
            </div>
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
                <a href="javascript:void(0)" class="btn btn-big button button--bubble">Get sexy atmosphere</a>
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
            <!-- <a href="javascript:void(0)" class="btn btn-big">Get sexy atmosphere</a> -->
            </div>
            <div class="gradient-box-wrapper">
            <div id="engage-girls" class="position-relative">
                <div class="gradient-title position-relative d-flex align-items-start">
                <h3 class="small secondary-font text-white mb-0">
                    <span class="text-gradient d-inline-block">More hot girls.</span> More happy guests
                </h3>
                </div>
                <div data-depth="0.50" class="events-girls-img engaging-girls-img">
                <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/events-girls1.png') }}" alt="events-girl" class="img-fluid" />
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- // _ends > atomosphere Girls < AVN // -->


    <!-- // _begin > Fun-time party Girls < AVN // -->
    <section class="fun-time-girls-wrapper">
        <div class="container">
        <div class="d-flex align-items-end flex-wrap flex-lg-nowrap">
            <div class="gradient-box-wrapper">
            <div class="position-relative" id="fun-girls">
                <div class="gradient-title position-relative d-flex align-items-start">
                <h3 class="small secondary-font text-white mb-0">
                    <span class="text-gradient d-inline-block">Party girls</span> for perfect parties
                </h3>
                </div>
                <div class="events-girls-img" data-depth="0.50">
                <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/events-girls3.png') }}" alt="events-girl" class="img-fluid" />
                </div>
            </div>
            </div>
            <div class="events-girls-content events-girls-box-wrap">
            <div class="header-title">
                <h2 class="h2 text-white text-shadow-color secondary-font mb-5">Fun-time party girls</h2>
            </div>
            <div class="text-primary-color girls-content-wrap">
                <p class="h5 fw-400">
                Who likes a party with zero hot girls? No one. From beach and pool parties to your next big celebration,
                turn up the heat with our fun-time Rixer girls.
                <strong>These sexy party girls know how to make the good times happen,</strong> and create a party that
                no one will forget.
                </p>

                <p class="h5 fw-400">
                Or if you’re trying to get into the most exclusive clubs and parties, book a beautiful wing-woman and
                you’ll sail past even the most formidable bouncers.
                </p>
            </div>
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
                <a href="javascript:void(0)" class="btn btn-big button button--bubble">Get the party started</a>
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
        </div>
        </div>
    </section>
    <!-- // _ends > Fun-time party Girls < AVN // -->


    <!-- // _begin > atomosphere Girls < AVN // -->
    <section class="atomosphere-girls-wrapper atomosphere-girls-models-wrapper">
        <div class="container">
        <div class="d-flex align-items-end flex-wrap flex-lg-nowrap flex-column-reverse flex-lg-row">
            <div class="events-girls-content events-girls-box-wrap">
            <div class="header-title">
                <h2 class="h2 text-white secondary-font mb-5 ms-lg-auto text-lg-end text-shadow-color">
                Traditional models
                </h2>
            </div>
            <div class="text-primary-color girls-content-wrap">
                <p class="h5 fw-400">
                From fashion shoots, to print photography, to product and explainer videos, whatever you need a model
                for, we have the right girls for you. You’ll find all our
                <strong>Traditional models to be friendly, hard-working professionals</strong> with experience in
                high-profile luxury shoots. Expect our girls to turn up on time looking their best, ready to get the job
                done.
                </p>
            </div>
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
                <a href="javascript:void(0)" class="btn btn-big button button--bubble">Get beautiful models</a>
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
            <div class="gradient-box-wrapper">
            <div class="position-relative" id="traditional-models">
                <div class="gradient-title position-relative d-flex align-items-start">
                <h3 class="small secondary-font text-white mb-0">
                    <span class="text-gradient d-inline-block">Camera loves</span> our girls
                </h3>
                </div>
                <div class="events-girls-img engaging-girls-img" data-depth="0.50">
                <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/events-girls4.png') }}" alt="events-girl" class="img-fluid" />
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- // _ends > atomosphere Girls < AVN // -->

    <!-- // _begin > gorgeous Girls < AVN // -->
    <section class="gorgeous-girls-wrapper">
        <div class="container">
        <div class="d-flex align-items-end flex-wrap flex-lg-nowrap">
            <div class="gradient-box-wrapper">
            <div class="position-relative" id="gorgeous-girls">
                <div class="gradient-title position-relative d-flex align-items-start">
                <h3 class="small secondary-font text-white mb-0">
                    <span class="text-gradient d-inline-block">A girl</span> for your arm?
                </h3>
                </div>
                <div class="events-girls-img" data-depth="0.50">
                <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/events-girls5.png') }}" alt="events-girl" class="img-fluid" />
                </div>
            </div>
            </div>
            <div class="events-girls-content events-girls-box-wrap">
            <div class="header-title">
                <h2 class="h2 text-white secondary-font mb-5 text-shadow-color">Your own gorgeous girl</h2>
            </div>
            <div class="text-primary-color girls-content-wrap">
                <p class="h5 fw-400">
                Been invited to a school reunion, wedding, or other celebration and wish you had a stunning model as
                your plus one? Then you’re in luck, you can
                <strong>book one of our girls to accompany you to any occasion,</strong> whether it’s for a few hours, a
                few days, or even longer.
                </p>

                <p class="h5 fw-400">
                Our girls are fun to be with, great in social situations, and highly discreet. So you can confidently
                walk into any room with a Rixer girl on your arm.
                </p>
            </div>
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
                <a href="javascript:void(0)" class="btn btn-big button button--bubble">Get your own girl</a>
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
        </div>
        </div>
    </section>
    <!-- // _ends > gorgeous Girls < AVN // -->

    <!-- // _begin > Girls Slider < AVN // -->
    <section class="slider-wrapper">
        <div class="container">
            <div class="girls-slider-titlle">
                <h2 class="h2 mb-4 secondary-font text-white text-center">Beautiful. Bubbly. Babes</h2>
                <p class="mb-0 h5 text-white fw-400">We’ve interviewed and onboarded every model. Only the nicest, most
                    interesting, most beautiful women make it to become Rixer girls.
                </p>
            </div>
        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/slider-img1.jpg') }}"
                        alt=""></div>
                <div class="swiper-slide"><img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/slider-img2.jpg') }}"
                        alt=""></div>
                <div class="swiper-slide"><img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/slider-img3.jpg') }}"
                        alt=""></div>
                <div class="swiper-slide"><img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/slider-img4.jpg') }}"
                        alt=""></div>
                <div class="swiper-slide"><img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/slider-img5.jpg') }}"
                        alt=""></div>
                <div class="swiper-slide"><img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/slider-img1.jpg') }}"
                        alt=""></div>
                <div class="swiper-slide"><img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/slider-img2.jpg') }}"
                        alt=""></div>
                <div class="swiper-slide"><img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/slider-img3.jpg') }}"
                        alt=""></div>
                <div class="swiper-slide"><img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/slider-img4.jpg') }}"
                        alt=""></div>
                <div class="swiper-slide"><img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/slider-img5.jpg') }}"
                        alt=""></div>
                <div class="swiper-slide"><img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/slider-img3.jpg') }}"
                        alt=""></div>
                <div class="swiper-slide"><img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/slider-img2.jpg') }}"
                        alt=""></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-scrollbar"></div>
        </div>
    </section>
    <!-- // _ends >  Girls Slider < AVN // -->


    <!-- // _begin > Subscription Cards < AVN // -->
    <section class="subscription">
        <div class="container">
            <div class="subscription-header">
                <h3 class="h3 mb-4 secondary-font text-white">Subscribe for the girls of your dreams</h3>
                <p class="mb-0 h5 text-white fw-400">Every girl is high class. Every girl is beautiful. <br>
                    But some premium girls only show their faces to the premium man.</p>
            </div>
            <div class="subscription-cardbox">
                <div class="subscription-card text-center">
                    <div class="subscription-card-header">
                        <h5 class="h5 text-uppercase fw-600 text-white">starter</h5>
                        <h3 class="h3 text-white fw-600 secondary-font">$0</h3>
                        <span class="d-inline-block text-uppercase text-white letter-spacing">FREE ACCOUNT</span>
                    </div>
                    <div class="subscription-card-content">
                        <ul class="list-unstyled m-0 p-0">
                            <li>
                                <span>Access main database</span>
                            </li>
                            <li>
                                <span>Girls for any occasion</span>
                            </li>
                        </ul>
                    </div>
                    <div class="subscription-card-footer">
                        <a href="javascript:void(0)" class="btn">Get Started
                            <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1 6.5C0.447715 6.5 0 6.94772 0 7.5C0 8.05228 0.447715 8.5 1 8.5V6.5ZM21.7071 8.20711C22.0976 7.81658 22.0976 7.18342 21.7071 6.79289L15.3431 0.428932C14.9526 0.0384078 14.3195 0.0384078 13.9289 0.428932C13.5384 0.819457 13.5384 1.45262 13.9289 1.84315L19.5858 7.5L13.9289 13.1569C13.5384 13.5474 13.5384 14.1805 13.9289 14.5711C14.3195 14.9616 14.9526 14.9616 15.3431 14.5711L21.7071 8.20711ZM1 8.5H21V6.5H1V8.5Z"
                                    fill="currentColor" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="subscription-card text-center">
                    <div class="subscription-card-header">
                        <h5 class="h5 text-uppercase fw-600 text-white">SILVER</h5>
                        <h3 class="h3 text-white fw-600 secondary-font">$75</h3>
                        <span class="d-inline-block text-uppercase text-white letter-spacing">MONHTLY</span>
                    </div>
                    <div class="subscription-card-content">
                        <ul class="list-unstyled m-0 p-0">
                            <li>
                                <span>Access main database</span>
                            </li>
                            <li>
                                <span>Girls for any occasion</span>
                            </li>
                            <li>
                                <span>250+ Rixer Girls</span>
                            </li>
                        </ul>
                    </div>
                    <div class="subscription-card-footer">
                        <a href="javascript:void(0)" class="btn">Get Started
                            <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1 6.5C0.447715 6.5 0 6.94772 0 7.5C0 8.05228 0.447715 8.5 1 8.5V6.5ZM21.7071 8.20711C22.0976 7.81658 22.0976 7.18342 21.7071 6.79289L15.3431 0.428932C14.9526 0.0384078 14.3195 0.0384078 13.9289 0.428932C13.5384 0.819457 13.5384 1.45262 13.9289 1.84315L19.5858 7.5L13.9289 13.1569C13.5384 13.5474 13.5384 14.1805 13.9289 14.5711C14.3195 14.9616 14.9526 14.9616 15.3431 14.5711L21.7071 8.20711ZM1 8.5H21V6.5H1V8.5Z"
                                    fill="currentColor" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="subscription-card text-center">
                    <div class="subscription-card-header">
                        <h5 class="h5 text-uppercase fw-600 text-white">GOLD</h5>
                        <h3 class="h3 text-white fw-600 secondary-font">$125</h3>
                        <span class="d-inline-block text-uppercase text-white letter-spacing">MONHTLY</span>
                    </div>
                    <div class="subscription-card-content">
                        <ul class="list-unstyled m-0 p-0">
                            <li>
                                <span>Access main database</span>
                            </li>
                            <li>
                                <span>Girls for any occasion</span>
                            </li>
                            <li>
                                <span>700+ Rixer Girls</span>
                            </li>
                        </ul>
                    </div>
                    <div class="subscription-card-footer">
                        <a href="javascript:void(0)" class="btn">Get Started
                            <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1 6.5C0.447715 6.5 0 6.94772 0 7.5C0 8.05228 0.447715 8.5 1 8.5V6.5ZM21.7071 8.20711C22.0976 7.81658 22.0976 7.18342 21.7071 6.79289L15.3431 0.428932C14.9526 0.0384078 14.3195 0.0384078 13.9289 0.428932C13.5384 0.819457 13.5384 1.45262 13.9289 1.84315L19.5858 7.5L13.9289 13.1569C13.5384 13.5474 13.5384 14.1805 13.9289 14.5711C14.3195 14.9616 14.9526 14.9616 15.3431 14.5711L21.7071 8.20711ZM1 8.5H21V6.5H1V8.5Z"
                                    fill="currentColor" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="subscription-card text-center">
                    <div class="subscription-card-header">
                        <h5 class="h5 text-uppercase fw-600 text-white">PLATINUM</h5>
                        <h3 class="h3 text-white fw-600 secondary-font">$250</h3>
                        <span class="d-inline-block text-uppercase text-white letter-spacing">MONHTLY</span>
                    </div>
                    <div class="subscription-card-content">
                        <ul class="list-unstyled m-0 p-0">
                            <li>
                                <span>Access main database</span>
                            </li>
                            <li>
                                <span>Girls for any occasion</span>
                            </li>
                            <li>
                                <span class="fw-700">Access secret library</span>
                            </li>
                        </ul>
                    </div>
                    <div class="subscription-card-footer">
                        <a href="javascript:void(0)" class="btn">Get Started
                            <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1 6.5C0.447715 6.5 0 6.94772 0 7.5C0 8.05228 0.447715 8.5 1 8.5V6.5ZM21.7071 8.20711C22.0976 7.81658 22.0976 7.18342 21.7071 6.79289L15.3431 0.428932C14.9526 0.0384078 14.3195 0.0384078 13.9289 0.428932C13.5384 0.819457 13.5384 1.45262 13.9289 1.84315L19.5858 7.5L13.9289 13.1569C13.5384 13.5474 13.5384 14.1805 13.9289 14.5711C14.3195 14.9616 14.9526 14.9616 15.3431 14.5711L21.7071 8.20711ZM1 8.5H21V6.5H1V8.5Z"
                                    fill="currentColor" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // _ends > Subscription Cards < AVN // -->

    <!-- // _begin > Description < AVN // -->
    <section class="decription">
        <div class="container">
            <div class="description-wrapper">
                <div class="info-wrapper text-white">
                    <h4 class="secondary-font">Don’t be a d*ck. Respect our girls</h4>
                    <p class="mb-0 h5 text-break fw-400">Our girls are professionals here to make your day or night a
                        special
                        one. They’re
                        here to do a great
                        job and make you happy. So please, be a gentleman and treat them with respect. We have a zero
                        tolerance policy toward abusive, dangerous, or criminal behaviour.</p>
                </div>
                <div class="info-wrapper text-white">
                    <h4 class="secondary-font">There isn’t an “extras” menu</h4>
                    <p class="mb-0 h5 text-break fw-400">Booking a Rixer girl does not entitle you to sexual activity.
                        So don't expect that to happen. You’re not hiring a hooker, you’re booing a friendly and
                        beautiful girl to make your party or event come to life. Of course, what happens between two
                        consenting adults is up to those two consenting adults – who are we to get in the way of love.
                    </p>
                </div>
                <div class="info-wrapper text-white">
                    <h4 class="secondary-font">Want to become a Rixer Girl?</h4>
                    <p class="mb-0 h5 text-break fw-400">Beautiful, friendly and confident? Love to get paid while you
                        have fun? Then we want to hear from you. Send an email to <a href="javascript:void(0)"
                            class="pink-link">models@rixeragency.com</a> and tell us
                        about yourself. Please include a recent headshot and full-body photo.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- // _begin > Description < AVN // -->
@endsection
@section('script')
    <script>
        var scene = document.getElementById('scene');
        var scene1 = document.getElementById('engage-girls');
        var scene2 = document.getElementById('fun-girls');
        var scene3 = document.getElementById('traditional-models');
        var scene4 = document.getElementById('gorgeous-girls');
        var parallaxInstance = new Parallax(scene, {
        hoverOnly: true,
        });
        var parallaxInstance = new Parallax(scene1, {
        hoverOnly: true,
        });
        var parallaxInstance = new Parallax(scene2, {
        hoverOnly: true,
        });
        var parallaxInstance = new Parallax(scene3, {
        hoverOnly: true,
        });
        var parallaxInstance = new Parallax(scene4, {
        hoverOnly: true,
        });
        parallaxInstance.friction(0.2, 0.2);
    </script>
@endsection
