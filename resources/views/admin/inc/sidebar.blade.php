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

                <li class="sidebar-title">Content Management</li>

                <li class="sidebar-item has-sub {{Request::is('admin/manage-content') ? 'active' : ''}}">
                    <a href="#" class="sidebar-link ">
                        <i class="bi bi-paragraph"></i>
                        <span>Content</span>
                    </a>
                    <ul class="submenu" style="{{Request::is('admin/manage-content') ? 'display:block;' : ''}}">
                        <li class="submenu-item {{Request::is('admin/manage-content') ? 'active' : ''}}">
                            <a href="{{route('admin.manage.content')}}">Manage Content</a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link ">
                        <i class="bi bi-paragraph"></i>
                        <span>Slider</span>
                    </a>
                    <ul class="submenu " >
                        <li class="submenu-item">
                            <a href="{{route('admin.slider')}}">Slider Content</a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-title">Account</li>

                <li class="sidebar-item has-sub {{Request::is('admin/update-profile')||Request::is('admin/change-avatar')||Request::is('admin/profile') ? 'active' : ''}}">
                    <a href="#" class="sidebar-link ">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                    <ul class="submenu " style="{{Request::is('admin/update-profile')||Request::is('admin/change-avatar')||Request::is('admin/profile') ? 'display:block;' : ''}}">
                        <li class="submenu-item {{Request::is('admin/profile') ? 'active' : ''}}">
                            <a href="{{route('admin.profile')}}">Visit Profile</a>
                        </li>
                        <li class="submenu-item {{Request::is('admin/update-profile') ? 'active' : ''}}">
                            <a href="{{route('admin.update.profile')}}">Update Profile</a>
                        </li>
                        <li class="submenu-item {{Request::is('admin/change-avatar') ? 'active' : ''}}">
                            <a href="{{route('admin.change.avatar')}}">Change Avatar</a>
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
