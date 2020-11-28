<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Home') | {{ config('app.name') }}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/datatables.min.css"/>
        @stack('css')

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper" id="app">

            @include('layouts.partials._nav')
            @include('layouts.aside._basic')

            <div class="content-wrapper">

                <section class="content">
                    <div class="my-2">
                        @yield('content')
                    </div>
                </section>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

            <footer class="main-footer">
                <strong>Copyright &copy; {{ date('Y') }} <a href="#">Noria Telecoms</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.0
                </div>
            </footer>

        </div>

        <!-- JS -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/datatables.min.js"></script>
        <script>
            $(function () {
                // logout
                $(document).on('click', '.logout-link', function (e) {
                    e.preventDefault();
                    document.getElementById('logout-form').submit();
                });
            });
        </script>

        @stack('js')
    </body>
</html>
