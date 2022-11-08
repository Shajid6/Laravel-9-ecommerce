
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title'){{config('','eBazar')}} </title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script rel="stylesheet" src=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  
    <!-- font awosome -->
    <script src="https://kit.fontawesome.com/810b0a00cf.js" crossorigin="anonymous"></script>

    
    
    
   
   @livewireStyles
</head>

<body>

    <div class="container-scroller">
        @include('layouts.inc.admin.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.admin.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
<!-- font awosome -->
    <script src="https://kit.fontawesome.com/810b0a00cf.js" crossorigin="anonymous"></script>

    <script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>
    <!-- Custom js for this page -->
    <script src="{{ asset('admin/js/dashboard.js') }}"></script>
    <script src="{{ asset(' admin/js/data-table.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.bootstrap4.js') }}"></script>
    <!-- End custom js for this page -->

    @yield('scripts')
    @livewireScripts
    @stack('script')
</body>

</html>
