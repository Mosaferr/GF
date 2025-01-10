<!-- resources/views/layout/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- <html lang="pl"> --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Nazwa Strony')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/logo_green.svg') }}">

    @yield('head-scripts')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body id="top">
    @include('components.header')
    <div>
        @yield('content')
    </div>
    @include('components.footer')

    @yield('scripts')
</body>
</html>
