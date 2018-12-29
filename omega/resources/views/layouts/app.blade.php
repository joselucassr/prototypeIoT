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
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">

    @yield('styles')

    <title>{{ config('app.name', 'IoT Prototype') }}</title>

    @yield('scripts')
</head>
<body>
    @yield('navbar')
    @include('inc.messages')
    @yield('content')

    <!-- Scripts bootstrap -->
    <!--<script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>-->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script> --}}
    <script src="{{asset('js/app.js')}}"></script>
    @yield('script')
</body>
</html>