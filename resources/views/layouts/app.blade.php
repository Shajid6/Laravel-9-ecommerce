<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>

    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Shajid">



    <!-- Styles -->

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Owl carusal -->
  <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <!-- exzoom -->
    <link href="{{ asset('assets/exzoom/jquery.exzoom.css') }}" rel="stylesheet">

    <!-- fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <!-- alertyfy -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

    <!-- Scripts -->

  
     @stack('css')

      @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        @livewireStyles
</head>

<body>
    <div id="app">

        @include('layouts.frontend.navbar')


        <main>
            @yield('content')

        </main>


        @include('layouts.frontend.footer')

    </div>


    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- JavaScript -->

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        window.addEventListener('message', event => {
            alertify.set('notifier', 'position', 'top-right');
            alertify.notify(event.detail.text, event.detail.type);
        });
    </script>
    <!-- /owl.carousel-->
    <script src="{{ asset('assets/exzoom/jquery.exzoom.js') }}"></script>

    <!-- /owl.carousel-->

    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>


</body>


@stack('scripts')

@yield('script')

@livewireScripts

</body>

</html>
