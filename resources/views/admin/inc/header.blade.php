<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - DIKWE CMS</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('adminassets/css/bootstrap.css')}}">
    @yield('summernotecss')
    <link rel="stylesheet" href="{{asset('adminassets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('adminassets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('adminassets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('adminassets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('adminassets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('adminassets/vendors/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminassets/css/custom.css')}}">
  @yield('alpineJs')
    @yield('extraStyles')
    
    @yield('livewireStyles')
    
    
</head>
