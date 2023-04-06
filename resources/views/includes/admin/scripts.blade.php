 <!-- JAVASCRIPT -->
 <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/jquery.min.js') }}"></script>
 <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/metisMenu.min.js') }}"></script>
 <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/simplebar.min.js') }}"></script>
 <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/waves.min.js') }}"></script>

 <!-- Form Advanced Js -->
 <!-- <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/pages/form-advanced.init.js') }}"></script> -->
 <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/jquery.validate.min.js') }}"></script>

 <!-- Required datatable js -->
 <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}">
 </script>

 <!-- Responsive examples -->
 <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
 </script>
 <script
     src="{{ asset(env('ADMIN_ASSETS_URL') . '/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
 </script>


 <!-- Jquery Validate -->
 <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/additional-methods.min.js') }}"></script>
 <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/app.js') }}"></script>

 {{-- sweetalert2 --}}
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>

 {{-- toaster --}}
 <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/toastr.min.js') }}"></script>


 @yield('js')
