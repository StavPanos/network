<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Social Network for Developers') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.3/ace.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    {{--FOR HTTPS HEROKU--}}
    <script src="https://dev-network-assignment.herokuapp.com/js/app.js"></script>
    <link rel="stylesheet" href="https://dev-network-assignment.herokuapp.com/css/app.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-image: url({{ asset('images/background.jpeg') }})">
    <div id="app">
        @include('components.navbar')

        @include('components.flash-message')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
