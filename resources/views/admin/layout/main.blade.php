<!DOCTYPE html>
<html lang="en">
    @include('admin.inc.header')
<body>
    <div class="preloader" id="preloader">
        <img src="{{asset('adminassets/vendors/svg-loaders/grid.svg')}}" class="me-4" style="width: 5rem;" alt="loader">
    </div>
    <div id="app">
        @include('admin.inc.sidebar')
        <div id="main" class="layout-navbar">
            <header class="mb-3">
                @include('admin.inc.navbar')
            </header>
            <div id="main-content">
                <div class="page-heading">
                    @include('admin.inc.breadcrumb')

                    <div class="page-content">
                        @yield('content')
                    </div>
                </div>
                @include('admin.inc.footer')
            </div>
        </div>
        <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
            @csrf
        </form>

    </div>

        @include('admin.inc.scripts')
        @yield('scriptCode')
        @include('admin.inc.toastify')
        <script>
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
                });
        </script>
        <script>
            $(window).on('load',function () {
                $(function () {
                    $("#preloader").fadeOut("slow");
                });
            });
    
          </script>
</body>
</html>
