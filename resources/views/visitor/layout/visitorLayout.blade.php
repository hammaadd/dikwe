<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('visitor.inc.header')
    <body class="antialiased overflow-x-hidden">
        @include('visitor.inc.defaultNav')
        @yield('content')
        @include('visitor.inc.footer')
    </body>

<script src="{{asset('js/main.js')}}"></script>
@yield('bodyExtra')
</html>
