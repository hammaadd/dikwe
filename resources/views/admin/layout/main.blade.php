<!DOCTYPE html>
<html lang="en">
    @include('admin.inc.header')
<body>
    <div id="app">
        @include('admin.inc.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3>@yield('heading')</h3>
            </div>
            <div class="page-content">
                @yield('content')
            </div>
            @include('admin.inc.footer')
        </div>
        <form id="logout-form" action="#" method="POST" class="d-none">
            @csrf
        </form>

    </div>

        @include('admin.inc.scripts')
        @yield('scriptCode')
        @include('admin.inc.toastify')
</body>
</html>
