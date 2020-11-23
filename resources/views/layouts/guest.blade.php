
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('tittle', 'Authentication') | {{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                {{ config('app.name') }}
            </div>

            @yield('content')
        </div>

        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
