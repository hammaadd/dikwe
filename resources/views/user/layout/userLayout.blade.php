<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('user.inc.header')
    <body class="antialiased overflow-x-hidden">
        <div class="w-full relative">
            @include('user.inc.sidebar')
            <div class="md:pl-24">
                @include('user.inc.topNav')
                @yield('content')
            </div>
        </div>
    </body>

<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
@yield('bodyExtra')
</html>
