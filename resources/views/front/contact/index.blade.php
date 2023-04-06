@extends('layouts.front.front')
@section('title')
    Contact
@endsection
@section('css')
@endsection
@section('content')
    <section class="contact rm-section">
        <div class="container">
            <div class="contact-wrapper text-center">
                <div class="contact-title">
                    <h2 class="small mb-3 secondary-font fw-600 text-white text-shadow-color">Contact</h2>
                    <p class="mb-0 text-white fw-400 small">Want to work with us 💰 or access our Database of Girls 🎉?
                    </p>
                </div>
                <div class="contact-content">
                    <p class="h5 text-white fw-400">Contact us today using one of the following methods: </p>
                    <div class="d-flex  contact-links-wrap text-start flex-wrap flex-md-nowrap">
                        <div class="contact-links">
                            <div class="social-icons">
                                <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/email.png') }}"
                                    alt="email">
                            </div>
                            <span class="d-block mt-4 small-content text-white">Email</span>
                            <a href="mailto:xsu@rixer.com" class="pink-link text-center text-decoration-none">-</a>
                        </div>
                        <div class="contact-links">
                            <div class="social-icons">
                                <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/telegram.png') }}"
                                    alt="email">
                            </div>
                            <span class="d-block mt-4 small-content text-white">Telegram</span>
                            <a href="mailto:@rixer1" class="pink-link text-center text-decoration-none">-</a>
                        </div>
                        <div class="contact-links">
                            <div class="social-icons">
                                <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/whatsapp.png') }}"
                                    alt="email">
                            </div>
                            <span class="d-block mt-4 small-content text-white">Whatsapp</span>
                            <a href="tel:xsu@rixer.com" class="pink-link text-center text-decoration-none">-</a>
                        </div>
                    </div>
                    <p class="text-white mb-0 fw-400 small-content">We value your privacy, all communication is
                        confidential.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
