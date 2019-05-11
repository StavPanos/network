<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Social Network for Developers') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <div id="app">
        @include('components.navbar')
        @include('components.flash-message')
        <main class="mb-5">
            @yield('content')
        </main>
        @include('components.footer')
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')
</body>
</html>
