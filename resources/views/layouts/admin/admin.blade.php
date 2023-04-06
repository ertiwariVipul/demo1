<!DOCTYPE html>
<html>

{{-- Head Start --}}

@include('includes.admin.head')

{{-- Head End --}}

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        {{-- Header Start --}}

        @include('includes.admin.header')

        {{-- Head End --}}

        {{-- Sidebar Start --}}

        @include('includes.admin.sidebar')

        {{-- Sidebar End --}}

        {{-- Content Start --}}
        <div class="main-content">
            @yield('content')
        </div>

        {{-- Content End --}}

        {{-- Footer Start --}}

        @include('includes.admin.footer')

        {{-- Footer End --}}

        {{-- Scripts Start --}}

        @include('includes.admin.scripts')

        {{-- Scripts End --}}
    </div>

</body>

</html>
