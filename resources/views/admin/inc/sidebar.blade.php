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
            
                @foreach (Session::get('services') as $service)
            
                @if(($service->module=="Content") && ($service->status=="A")) 
            
                
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
                @endif
                @endforeach
                @foreach (Session::get('services') as $service)
            
                @if(($service->module=="Slides") && ($service->status=="A")) 
            
                <li class="sidebar-item has-sub {{Request::is('admin/manage-slides')||Request::is('admin/edit-slide/*') ? 'active' : ''}}">
                    <a href="#" class="sidebar-link ">
                        <i class="bi bi-file-easel"></i>
                        <span>Slide</span>
                    </a>
                    <ul class="submenu" style="{{Request::is('admin/manage-slides')||Request::is('admin/edit-slide/*') ? 'display:block;' : ''}}" >
                        <li class="submenu-item {{Request::is('admin/manage-slides') ? 'active' : ''}}">
                            <a href="{{route('admin.slides')}}">Manage Slides</a>
                        </li>

                    </ul>
                </li>
                @endif
                @endforeach
                @foreach (Session::get('services') as $service)
            
                @if(($service->module=="Features") && ($service->status=="A")) 
            
                <li class="sidebar-item has-sub {{Request::is('admin/manage-features')||Request::is('admin/edit-feature/*') ? 'active' : ''}}">
                    <a href="#" class="sidebar-link ">
                        <i class="bi bi-brush"></i>
                        <span>Feature</span>
                    </a>
                    <ul class="submenu" style="{{Request::is('admin/manage-features')||Request::is('admin/edit-feature/*') ? 'display:block;' : ''}}" >
                        <li class="submenu-item {{Request::is('admin/manage-features') ? 'active' : ''}}">
                            <a href="{{route('admin.features')}}">Manage Features</a>
                        </li>

                    </ul>
                </li>
                @endif
                @endforeach
                @foreach (Session::get('services') as $service)
            
                @if(($service->module=="Faq") && ($service->status=="A")) 
                <li class="sidebar-item has-sub {{Request::is('admin/manage-faqs')||Request::is('admin/edit-faq/*') ? 'active' : ''}}">
                    <a href="#" class="sidebar-link ">
                        <i class="bi bi-patch-question"></i>
                        <span>FAQ</span>
                    </a>
                    <ul class="submenu" style="{{Request::is('admin/manage-faqs')||Request::is('admin/edit-faq/*') ? 'display:block;' : ''}}" >
                        <li class="submenu-item {{Request::is('admin/manage-faqs') ? 'active' : ''}}">
                            <a href="{{route('admin.faqs')}}">Manage FAQ's</a>
                        </li>

                    </ul>
                </li>
                
                @endif
                @endforeach
                @foreach (Session::get('services') as $service)
                @if(($service->module=="Subscriber") && ($service->status=="A")) 
                <li class="sidebar-item has-sub {{Request::is('admin/subscriber/all') || Request::is('admin/short-code/all')? 'active' : ''}}">
                    <a href="#" class="sidebar-link ">
                        <i class="bi bi-envelope"></i>
                        <span>Subscriber</span>
                    </a>
                    <ul class="submenu" style="{{Request::is('admin/subscriber/all') || Request::is('admin/short-code/all')? 'display:block;' : ''}}" >
                        <li class="submenu-item {{Request::is('admin/subscriber/all') ? 'active' : ''}}">
                            <a href="{{route('admin.subscriber.all')}}">Subscribers</a>
                        </li>
                        <li class="submenu-item {{Request::is('admin/subscriber/send-mail') ? 'active' : ''}}">
                            <a href="{{route('admin.subscriber.sendmail')}}">Send Mail </a>
                        </li>
                        

                    </ul>
                </li>
                @endif
                @endforeach
                @foreach (Session::get('services') as $service)
                @if(($service->module=="ShortCodes") && ($service->status=="A"))
                <li class="sidebar-item has-sub{{Request::is('admin/short-code/all')? 'active' : ''}}">
                    <a href="#" class="sidebar-link ">
                        <i class="bi bi-file-easel"></i>
                        <span>Short Codes</span>
                    </a>
                    <ul class="submenu" style=" Request::is('admin/short-code/all')? 'display:block;' : ''}}" >
                        <li class="submenu-item {{Request::is('admin/short-code/all') ? 'active' : ''}}">
                            <a href="{{route('admin.shortcode.all')}}">Short Codes</a>
                        </li>
                    </ul>
                </li>
                @endif
                @endforeach
                @foreach (Session::get('services') as $service)
                @if(($service->module=="Users") && ($service->status=="A"))
                <li class="sidebar-item has-sub {{Request::is('admin/users/all')|| Request::is('admin/deleted-users') ? 'active' : ''}}">
                    <a href="#" class="sidebar-link ">
                        <i class="bi bi-people"></i>
                        <span>Users </span>
                    </a>
                    <ul class="submenu" style="{{Request::is('admin/users/all')||Request::is('admin/deleted-users') ? 'display:block;' : ''}}" >
                        
                        <li class="submenu-item {{Request::is('admin/users/all') ? 'active' : ''}}">
                            <a href="{{route('admin.users.all')}}">Users</a>
                        </li>
                        <li class="submenu-item {{Request::is('admin/deleted-users') ? 'active' : ''}}">
                            <a href="{{route('admin.deleted.user')}}">Deleted Users</a>
                        </li>

                    </ul>
                </li>
                @endif
                @endforeach
              @if(Auth::user()->hasRole('superadministrator'))
                <li class="sidebar-item has-sub {{Request::is('admin/services/all') ? 'active' : ''}}">
                    <a href="#" class="sidebar-link ">
                        <i class="bi bi-credit-card"></i>
                        <span>Payment Plans </span>
                    </a>
                    <ul class="submenu" style="{{Request::is('admin/services/all') ? 'display:block;' : ''}}" >   
                        <li class="submenu-item {{Request::is('admin/services/all') ? 'active' : ''}}">
                            <a href="{{route('admin.services.all')}}">Services</a>
                        </li>
                    </ul>
                </li>
            @endif
            @foreach (Session::get('services') as $service)
            
                @if(($service->module=="Payment") && ($service->status=="A")) 
                    <li class="sidebar-item has-sub {{Request::is('admin/payment-plans') ? 'active' : ''}}">
                        <a href="#" class="sidebar-link ">
                            <i class="bi bi-file-easel"></i>
                            <span>Payment Plans </span>
                        </a>
                        <ul class="submenu" style="{{Request::is('admin/payment-plans') ? 'display:block;' : ''}}" >
                            
                            <li class="submenu-item {{Request::is('admin/payment-plans') ? 'active' : ''}}">
                                <a href="{{route('admin.payment.plans')}}">Payment Plans</a>
                            </li>
                        

                        </ul>
                    </li>
                @endif
                @endforeach
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
