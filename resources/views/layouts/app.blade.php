<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <title>@yield('title') | Alpine application</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex items-center justify-center min-h-screen antialiased bg-gradient-to-br from-blue-200 via-blue-100 to-blue-300">
    <div>
        @yield('content')
        @include('partials.flash')
    </div>
</body>

</html>
