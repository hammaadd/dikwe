<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - DIKWE CMS</title>
    <link rel="icon" href="{{asset('assets/images/favicon/dd.ico')}}" type="image/gif" sizes="16x16">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('adminassets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('adminassets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('adminassets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('adminassets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('adminassets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('adminassets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('adminassets/vendors/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminassets/css/custom.css')}}">
    @yield('alpineJs')
    @yield('extraStyles')
    <script src="{{asset('adminassets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('adminassets/js/bootstrap.bundle.min.js')}}" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    @yield('livewireStyles')
    @yield('summernote')
    
</head>
