<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/images/icons/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/smart_wizard_all.min.css') }}">
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset(env('ADMIN_ASSETS_URL') . '/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/style.css') }}">
    <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/responsive.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset(env('FRONTEND_ASSETS_URL') . '/stylesheets/bootstrap.min.css') }}"> --}}

    <title>{{ config('app.name', 'Laravel') }} | Register</title>
</head>
