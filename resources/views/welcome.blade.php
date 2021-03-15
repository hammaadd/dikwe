<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('user.inc.header')
    <body class="antialiased">
@yield('content')
    </body>

<script src="{{asset('js/app.js')}}"></script>
</html>
