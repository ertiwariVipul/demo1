<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex" />

    <link rel="icon" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/favicon.png') }}">


    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/smart_wizard_all.min.css') }}">
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/style.css') }}">
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/responsive.css') }}">
    <link href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/toastr.css') }}"rel="stylesheet" type="text/css" />
    <title>{{ config('app.name', 'Laravel') }} | Register</title>
</head>

<body>

    <header>
        <div class="container">
            <div class="header-navbar d-flex align-items-center justify-content-between">
                <div class="header-logo">
                    <a href={{ route('front') }} class="d-block"><img
                            src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/logo/rixer-logo.svg') }}"
                            alt="logo" class="img-fluid"></a>
                </div>
            </div>
        </div>
    </header>

    <section class="authentication-page">
        <div class="container">
            <div class="authentication-form-wrap">
                <div class="auth-title text-center">
                    <h2 class="mb-0 small secondary-font fw-600 text-white">Sign up</h2>
                </div>
                <form class="authentication-form signup-form" method="post" id="user_register_form">
                    @csrf
                    <div class="d-flex flex-column auth-form-spacing">
                        <div>
                            <label class="custom-input-label">Full Name</label>
                            <input type="text" name="user_name" class="custom-input" placeholder="Enter your name">
                        </div>
                        <div>
                            <label class="custom-input-label">Email</label>
                            <input type="email" name="user_email" class="custom-input" placeholder="Email address">
                        </div>
                        <div>
                            <label class="custom-input-label">Password</label>
                            <input type="password" name="password" class="custom-input" placeholder="Create a password" id="password">
                        </div>
                        <div>
                            <label class="custom-input-label">Confirm Password</label>
                            <input type="password" name="confirmPassword" class="custom-input"
                                placeholder="Enter your password">
                            {{-- <span class="d-inline-block text-white fw-500 mt-3">Note : Password must be at least 8 characters</span> --}}
                        </div>
                    </div>
                    <button class="btn w-100">Create account</button>
                </form>
                <div class="signup-text-footer text-center">
                    <a href="javascipt:void(0)" class="custom-input auth-social-links d-align">
                        <span class="d-align social-icons-img">
                            <img src="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/google-icon.png') }}"
                                class="cover-img" alt="google-icon">
                        </span>
                        <span class="d-inline-block ms-lg-4 ms-5 p">Sign up with Google</span>
                    </a>
                    <p class="mb-0 text-white fw-500 small-head">Already have an account? <a
                            href={{ route('user.login') }} class="auth-link">Log in</a></p>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/jquery.smartWizard.min.js') }}"></script>
    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/bootstrap.bundle.min.js') }}"></script>
    <!-- <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/bootstrap.min.js') }}"></script> -->
    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/bootstrap-select.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select.min.js') }}"></script> -->
    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/custom.js') }}"></script>
    <script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/toastr.min.js') }}"></script>
    {{-- user register  --}}
    <script>
        // validation form 
        jQuery.validator.addMethod("user_email", function(value, element) {
            if (/^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value)) {
                return true;
            } else {
                return false;
            };
        });

        jQuery.validator.addMethod("user_name", function(value, element) {
            if (/^([a-zA-Z]{2,}\s[a-zA-z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/.test(value)) {
                return true;
            } else {
                return false;
            };
        });

        $('#user_register_form').validate({
            rules: {
                user_name: {
                    required: true,
                    user_name: true,
                },
                user_email: {
                    required: true,
                    user_email: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                confirmPassword: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                },

            },
            messages: {
                user_name: {
                    required: "This field is required.",
                    user_name: "Please enter full name."
                },
                user_email: {
                    required: "This field is required.",
                    user_email: "Invalid email you entered."
                },
                password: {
                    required: "This field is required.",
                    minlength: "Your password must be at least 8 characters long",
                },
                confirmPassword:{
                    required: "This field is required.",
                    minlength: "Your password must be at least 8 characters long",
                    equalTo: "Please enter the same password as above"
                }

            },
        });

        // submit form 
        $(document).on('submit', '#user_register_form', function(event) {
            event.preventDefault();
            var formdata = new FormData(this);
            var url = '{{ URL::to('/signup') }}';
            $.ajax({
                url: url,
                type: 'post',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.ResponseCode == 1) {
                        toastr.success(data.ResponseText, "Success", {
                            timeOut: 1000
                        });
                        console.log(data.ResponseText);
                        var home_url = '{{ URL::to('/user') }}';
                        // alert(home_url);
                        window.location = home_url;
                    } else {
                        toastr.error(data.ResponseText, "Error", {
                            timeOut: 1000
                        });
                    }
                }
            });
        });
    </script>

</body>

</html>
