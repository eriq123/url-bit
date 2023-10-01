<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset('assets/url-bit-logo-dark.png') }}">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    @yield('header')
    @include('partials.header')
    @include('partials.alert')
    @yield('content')
    @yield('js')
</body>

</html>
