<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset(env('USER_ASSETS_URL') . '/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset(env('USER_ASSETS_URL') . '/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset(env('USER_ASSETS_URL') . '/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset(env('USER_ASSETS_URL') . '/css/app.min.css') }}" id="app-style" rel="stylesheet"
        type="text/css" />
    <!-- App Css-->
    <link href="{{ asset(env('USER_ASSETS_URL') . '/css/style.css') }}" id="app-style" rel="stylesheet"
        type="text/css" />
    <!-- toastr css  -->
    <link href="{{ asset(env('USER_ASSETS_URL') . '/css/toastr.css') }}" id="app-style" rel="stylesheet"
        type="text/css" />

    <!-- Extra Css-->
    @yield('css')
</head>
