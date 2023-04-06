<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex" />

    <link rel="icon" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/favicon.png') }}" />
    <link rel="shortcut icon" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/ion.rangeSlider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/smart_wizard_all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/style.css') }}" />
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/responsive.css') }}" />
    <link href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/toastr.css') }}" id="app-style" rel="stylesheet"
        type="text/css" />/>

    <title>{{ config('app.name', 'Laravel') }} | Login</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="header-navbar d-flex align-items-center justify-content-between">
                <div class="header-logo">
                    <a href="{{ route('front') }}" class="d-block"><img
                            src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/logo/rixer-logo.svg') }}"
                            alt="logo" class="img-fluid" /></a>
                </div>
            </div>
        </div>
    </header>

    <section class="authentication-page">
        <div class="container">
            <div class="authentication-form-wrap">
                <div class="auth-title text-center">
                    <h2 class="mb-0 small secondary-font fw-600 text-white">Login</h2>
                    <a href="javascipt:void(0)" class="custom-input auth-social-links d-align">
                        <span class="d-align social-icons-img">
                            <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/google-icon.png') }}"
                                class="cover-img" alt="google-icon" />
                        </span>
                        <span class="d-inline-block ms-lg-4 ms-5 p">Log in with Google</span>
                    </a>
                    <span class="d-inline-block text-white or-label">Or</span>
                </div>
                <form class="authentication-form" method="POST" id="user_login_form">
                    @csrf
                    <div class="d-flex flex-column auth-form-spacing">
                        <div>
                            <label class="custom-input-label">Email</label>
                            <input type="email" name="user_email" class="custom-input" placeholder="Email address" />
                        </div>
                        <div>
                            <label class="custom-input-label">Password</label>
                            <input type="password" name="password" class="custom-input" placeholder="Password" />
                        </div>
                        <div class="d-flex align-items-center justify-content-between checkbox-content-wrap flex-wrap">
                            <a href="javascript:void(0)"
                                class="checkbox-wrap d-flex align-items-center text-decoration-none mt-0">
                                <input type="checkbox" id="checkboxbtn" />
                                <label for="checkboxbtn" class="mb-0 fw-500 text-break">Remember for 30 days</label>
                            </a>
                            <a href="javascript:void(0)" class="auth-link">Forgot password?</a>
                        </div>
                    </div>
                    <button class="btn w-100">Login</button>
                </form>
                <div id="error" class="text-danger"></div>
                <div class="auth-text-footer text-center">
                    <p class="mb-0 text-white fw-500 small-head">
                        Don’t have an account?
                        <a href="{{ route('user.register') }}" class="auth-link">Sign up for free</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/jquery.validate.min.js') }}"></script>
    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/jquery.smartWizard.min.js') }}"></script>
    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/bootstrap.bundle.min.js') }}"></script>
    <!-- <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/bootstrap.min.js') }}"></script> -->
    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/bootstrap-select.min.js') }}"></script>
    <!-- {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js') }}"></script> --}} -->
    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/custom.js') }}"></script>
    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/toastr.min.js') }}"></script>

    <script>
        // user login

        $('#user_login_form').validate({
            rules: {
                user_email: {
                    required: true,
                    // user_email: true,
                },
                password: {
                    required: true,
                },

            },
            messages: {
                user_email: {
                    required: "This field is required.",
                    // user_email: "Invalid email you entered."
                },
                password: {
                    required: "This field is required.",
                },

            },
        });

        $(function() {

            $('#user_login_form').on('submit', function(e) {
                e.preventDefault();
                if ($('#user_login_form').valid()) {

                    var formdata = new FormData(this);
                    var url = '{{ URL::to('user-login') }}';
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            // alert(data.ResponseCode);
                            if (data.ResponseCode == 1) {
                                var home_url = '{{ route('front') }}';
                                window.location = home_url;
                                // toastr.success(data.ResponseText, "Success", {
                                //     timeOut: 1500
                                // });
                            } else {
                                toastr.error(data.ResponseText, "Error", {
                                    timeOut: 1000
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
