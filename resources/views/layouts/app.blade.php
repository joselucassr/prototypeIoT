<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>{{ config('app.name', 'IoT Prototype') }}</title>
</head>
<body>
    @yield('content')

    <!-- Scripts bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>