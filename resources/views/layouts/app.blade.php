<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ url('img/logos/tektik.png') }}">
    <script src="https://kit.fontawesome.com/149d101bcd.js" crossorigin="anonymous"></script>
    <title>@yield('title') {{ config('app.name') }}</title>
    
    @include('includes.style')

</head>

<body class="g-sidenav-show bg-gray-100">

    @include('sweetalert::alert')
    @yield('content')
    @include('includes.argon-config')
    @include('includes.script')

    @stack('after-script')
</body>

</html>