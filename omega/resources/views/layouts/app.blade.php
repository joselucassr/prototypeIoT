<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- CSS Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    <title>{{ config('app.name', 'IoT Prototype') }}</title>

    @yield('scripts')
</head>
<body>
    @yield('navbar')
    @include('inc.messages')
    @yield('content')

    <!-- Scripts bootstrap -->
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>