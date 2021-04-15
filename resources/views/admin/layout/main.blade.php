<!DOCTYPE html>
<html lang="en">
    @include('admin.inc.header')
<body>
    <div class="preloader"></div>
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
</body>
</html>
