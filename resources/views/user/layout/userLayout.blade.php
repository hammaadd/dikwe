<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('user.inc.header')
    <body class="antialiased overflow-x-hidden">
        @yield('content')
    </body>

<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
@yield('bodyExtra')
</html>