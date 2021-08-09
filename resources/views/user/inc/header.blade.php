<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="fb:app_id" content="995443947955637"/>
    @yield('openGraph_fb')
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@dikwe" />
    <meta name="twitter:creator" content="@dikwe" />
    <title>@yield('title') - DIKWE</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user.min.css') }}" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    @include('user.inc.styles.fonts')
    @yield('headerExtra')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>
