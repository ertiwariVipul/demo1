<!DOCTYPE html>
<html>

{{-- Head Start --}}

@include('includes.user.head')

{{-- Head End --}}

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        {{-- Header Start --}}

        @include('includes.user.header')

        {{-- Head End --}}

        {{-- Sidebar Start --}}

        @include('includes.user.sidebar')

        {{-- Sidebar End --}}

        {{-- Content Start --}}
        <div class="main-content">
            @yield('content')
        </div>

        {{-- Content End --}}

        {{-- Footer Start --}}

        @include('includes.user.footer')

        {{-- Footer End --}}

        {{-- Scripts Start --}}

        @include('includes.user.scripts')

        {{-- Scripts End --}}
    </div>

</body>

</html>
