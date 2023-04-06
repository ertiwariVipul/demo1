<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Admin {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="{{ env('APP_NAME') }}" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset(env('ADMIN_ASSETS_URL') . '/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset(env('ADMIN_ASSETS_URL') . '/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset(env('ADMIN_ASSETS_URL') . '/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset(env('ADMIN_ASSETS_URL') . '/css/app.min.css') }}" id="app-style" rel="stylesheet"
        type="text/css" />

</head>

<body>

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-8">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue to {{ env('APP_NAME') }}.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="index.html">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/images/logo-rixer.png') }}"
                                                alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-dismissable margin5">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        {{ $message }}
                                    </div>
                                @endif
                                <form class="form-horizontal" action="#" method="POST" novalidate>
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            required placeholder="Your Email Address" autocomplete="off"
                                            value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="error messages">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="passowrd">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            required placeholder="Password" autocomplete="off">
                                        @if ($errors->has('password'))
                                            <span class="error messages">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit" name="submit">Log In</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <a href="{{route('admin.forget_password')}}" class="text-muted"><i
                                                class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="text-center">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Rixeragency <i class="mdi mdi-heart text-danger"></i>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/jquery.min.js') }}"></script>
    <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/bootstrap.bundle.min.js') }}"></script>
</body>


</html>
