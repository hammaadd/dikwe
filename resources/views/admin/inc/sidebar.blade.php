<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{route('admin.dashboard')}}"><img src="{{asset('adminassets/images/logo/dikwe-logo.png')}}" alt="Logo" srcset="" style="height:4rem !important;"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{Request::is('/') ? 'active' : ''}} {{Request::is('home') ? 'active' : ''}}">
                    <a href="{{route('admin.dashboard')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{Request::is('customer/*') ? 'active' : ''}} has-sub">
                    <a href="#" class="sidebar-link ">
                        <i class="bi bi-people"></i>
                        <span>Customers</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="#">Add Customer</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="#">All Customers</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a  href="#"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"  class='sidebar-link'>
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
