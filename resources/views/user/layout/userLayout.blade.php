<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('user.inc.header')
    <body class="antialiased overflow-x-hidden">
        <div class="preloader" id="preloader">
            <img src="{{asset('assets/loader/puff.svg')}}" style="width: 10rem;" alt="loader">
        </div>
        
        {{-- Notification Components Start Here --}}
        <div x-data="{ shownotification : true }" x-init="setTimeout(() => shownotification = false, 4000)">
            @if(session()->get('success'))
                <x-success-notify :message="session()->get('success')"/>
            @elseif(session()->get('error'))
                <x-error-notify :message="session()->get('error')"/>
            @endif
        </div>
        {{-- Notification component Ends Here --}}

        <div class="w-full relative">
            @include('user.inc.sidebar')
            <div class="md:pl-24">
                @include('user.inc.topNav')
                @yield('content')
            </div>
        </div>
        <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
        <script>
            $(window).on('load',function () {
                $(function () {
                    $("#preloader").fadeOut("slow");
                });
            });
    
          </script>
          @yield('scripts')
          @stack('script_s')
    </body>

{{-- <script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script> --}}
@yield('bodyExtra')
</html>
