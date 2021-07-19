<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Titolo App -->
    <title>{{ config('app.name', 'Boolbards') }}</title>

    <!-- TODO: favicon solo di test -->
    <link rel="shortcut icon" href="{{ asset('img/boolbards-logo-black-green.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('header-scripts')

</head>

<body>
    {{-- HEADER --}}
    @include('partials.header')
    {{-- FOOTER --}}
    @include('partials.footer')
    @yield('footer-scripts')
</body>

</html>
