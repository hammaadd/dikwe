<nav class="user-nav hidden md:block relative px-5 py-2 h-20 shadow items-center">
    <div class="flex flex-wrap">

        <div class="w-full overflow-hidden md:w-1/4">
            <!-- Column Content -->
            <div class="dash-title px-3 lg:px-6 py-4 text-xl lg:text-2xl">
                <h2 class="font-bold">@yield('page-title')</h2>
            </div>
        </div>

        <div class="w-full overflow-hidden md:w-2/4 items-center">
            <!-- Column Content -->
            <form action="" class="flex flex-col mx-auto text-center mt-2 lg:px-5">
                <div class="relative rounded-xl shadow-md">
                    <input type="text" name="name" class="input-search" placeholder="Search For Any Knowledge Asset"/>
                    <button class="absolute inset-y-0 right-0 px-5 flex items-center bg-green-550 rounded-xl">
                        <span class="text-xl">
                            <i class="text-white fas fa-search"></i>
                        </span>
                    </button>
                </div>
            </form>
        </div>

        <div class="w-full md:w-1/4 px-3">
            <!-- Column Content -->
            <div class="flex mt-2 justify-end">
                <div class="relative" x-data="{ isNotify: false }">
                    <button class="notification-icon" @click=" isNotify = !isNotify ">
                        <i class="fas fa-bell"></i>
                    </button>
                    <div
                        x-show="isNotify"
                        @click.away="isNotify = false"
                        x-transition:enter="transition transform origin-top-right ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition transform origin-top-right ease-out duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75"
                        class="absolute bg-white shadow overflow-hidden rounded-xl w-96 mt-2 pt-3 right-0 top-full z-20"
                        >
                        <div class="w-full mx-auto">
                            <div class="w-full flex items-center">
                                <div class="w-2/12 inline-block">
                                    <a href="#" class="flex pl-1">
                                        <img src="{{ asset('images/Ellipse 179.png') }}" alt="" class="w-10 h-10 rounded-full object-cover inline-block mx-auto">
                                    </a>
                                </div>
                                <div class="w-8/12 inline-block">
                                    <p> <a href="#" class="">Alexander Simmons</a> <span class="ml-1 text-green-550"> followed you</span></p>
                                </div>
                                <div class="w-2/12 inline-block">
                                    <div class="w-2 h-2 mx-auto bg-green-550 rounded-full"></div>
                                </div>
                            </div>
                            <div class="mb-3 mt-2 border-b-2 border-green-150"></div>
                            <div class="w-full flex items-center">
                                <div class="w-2/12 inline-block">
                                    <a href="#" class="flex pl-1">
                                        <img src="{{ asset('images/Ellipse 179.png') }}" alt="" class="w-10 h-10 rounded-full object-cover inline-block mx-auto">
                                    </a>
                                </div>
                                <div class="w-8/12 inline-block">
                                    <p> <a href="#" class="">Alexander Simmons</a> <span class="ml-1 text-green-550"> added a new Tag</span></p>
                                </div>
                                <div class="w-2/12 inline-block">
                                    <div class="w-2 h-2 mx-auto bg-green-550 rounded-full"></div>
                                </div>
                            </div>
                            <div class="mb-3 mt-2 border-b-2 border-green-150"></div>
                            <div class="w-full flex items-center">
                                <div class="w-2/12 inline-block">
                                    <a href="#" class="flex pl-1">
                                        <img src="{{ asset('images/Ellipse 179.png') }}" alt="" class="w-10 h-10 rounded-full object-cover inline-block mx-auto">
                                    </a>
                                </div>
                                <div class="w-8/12 inline-block">
                                    <p> <a href="#" class="">Alexander Simmons</a> <span class="ml-1 text-green-550"> subscribed to a new Workspace</span></p>
                                </div>
                                <div class="w-2/12 inline-block">
                                    <div class="w-2 h-2 mx-auto bg-green-550 rounded-full"></div>
                                </div>
                            </div>
                            <div class="mb-3 mt-2 border-b-2 border-green-150"></div>
                            <div class="w-full flex items-center">
                                <div class="w-2/12 inline-block">
                                    <a href="#" class="flex pl-1">
                                        <img src="{{ asset('images/Ellipse 179.png') }}" alt="" class="w-10 h-10 rounded-full object-cover inline-block mx-auto">
                                    </a>
                                </div>
                                <div class="w-8/12 inline-block">
                                    <p> <a href="#" class="">Alexander Simmons</a> <span class="ml-1 text-green-550"> subscribed to a new Workspace</span></p>
                                </div>
                                <div class="w-2/12 inline-block">
                                    <div class="w-2 h-2 mx-auto bg-green-550 rounded-full"></div>
                                </div>
                            </div>
                            <div class="mt-2 border-b-2 border-green-150"></div>
                        </div>
                        <div class="w-full bg-green-550 px-3 py-3 flex flex-wrap overflow-hidden">
                            <div class=" w-1/2 inline-block border-r border-white">
                                <p class=" text-center text-white"><a href="#"><i class="fas fa-eye-slash"></i> Mark All Read</a></p>
                            </div>
                            <div class=" w-1/2 inline-block border-l border-white">
                                <p class=" text-center text-white"><a href="#">Mark All Read <i class="fas fa-arrow-right"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-2 relative" x-data="{ isOpen: false }">
                    <div class="hidden lg:flex flex-col pl-4 text-right" @click=" isOpen = !isOpen ">
                        <label class="cursor-pointer w-max flex flex-col align-items-center">
                            <span>Hello</span>

                            @guest
                                <span class="font-bold ml-1 cursor-pointer" title="Guest">
                                    Guest
                                </span>
                            @endguest
                            {{-- Display name of Logged in person --}}
                            @auth
                                <span class="font-bold ml-1 cursor-pointer" title="{{Auth::user()->name}}">
                                    {{Auth::user()->name}}
                                </span>
                            @endauth
                        </label>
                    </div>
                    <button class="block ml-2 flex-shrink-0 focus:outline-none" @click=" isOpen = !isOpen ">
                        <img alt="User Image"
                        src="
                        @auth
                        @if(Auth::user()->profile_img == null)
                            https://ui-avatars.com/api/?background=EAF7F0&name={{ str_replace(' ','+' ,Auth::user()->name) }}
                        @else
                            {{asset('user_profile_images/'.Auth::user()->profile_img)}}
                        @endif
                        @endauth
                        @guest
                            https://ui-avatars.com/api/?background=EAF7F0&name=Guest
                        @endguest
                        " class="mx-auto object-cover rounded-full h-10 w-10 border-2 border-green-550"/>
                    </button>
                    <ul
                        x-show="isOpen"
                        @click.away="isOpen = false"
                        x-transition:enter="transition transform origin-top-right ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition transform origin-top-right ease-out duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75"
                        class="absolute bg-white shadow overflow-hidden rounded-xl w-60 mt-2 py-1 right-0 top-full z-20"
                    >
                        <li class="border-b border-green-150">
                            <a href="{{ route('user-profile') }}" class="dropdown-item">
                                <i class="fas fa-user dropdown-item-icon"></i>
                                <span class="ml-2">Profile</span>
                            </a>
                        </li>
                        <li class="border-b border-green-150">
                            <a href="{{ route('dashboard') }}" class="dropdown-item">
                                <i class="fas fa-home dropdown-item-icon"></i>
                                <span class="ml-2">Dashboard</span>
                            </a>
                        </li>
                        <li class="border-b border-green-150">
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-info-circle dropdown-item-icon"></i>
                                <span class="ml-2">Preferences</span>
                            </a>
                        </li>
                        <li class="border-b border-green-150">
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-question-circle dropdown-item-icon"></i>
                                <span class="ml-2">Need Help?</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item">
                                <i class="fas fa-sign-out-alt dropdown-item-icon"></i>
                                <span class="ml-2">Logout</span>
                            </a>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

    </div>
</nav>

{{-- Mobile Navigation --}}
<nav class="user-nav block md:hidden relative px-4 py-1 h-16 shadow">
    <div class="flex flex-wrap overflow-hidden items-center justify-between h-full">
        <span x-data="{ mShow: false }">
            <i @click=" mShow = !mShow " class="fas fa-bars text-xl text-green-550" :class="{ 'block':!mShow, 'hidden-imp':mShow }"></i>
            <i @click=" mShow = !mShow " class="fas fa-times text-xl text-green-550" :class="{ 'block':mShow, 'hidden-imp':!mShow }"></i>
            <div class=" absolute overflow-hidden w-full shadow z-20 top-full right-0 left-0 p-4 bg-white"
                x-show="mShow"
                @click.away="mShow = false"
                x-transition:enter="transition transform origin-top-left ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-75"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition transform origin-top-left ease-out duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-75">
                <div>
                    <div class="flex items-center justify-center space-x-2">
                        <a href="{{route('user-profile')}}" class="block relative">
                            <img alt="User Image" src="{{ asset('images/Ellipse 179.png') }}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                        </a>
                        <div class="flex flex-col">
                            <span>Hello
                                <a href="{{route('user-profile')}}" class="font-bold ml-1 link-hover">
                                    Julia
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="my-8 text-center relative" x-data="{ isOpen: false }">
                        <button class="btn-outline focus:outline-none" @click=" isOpen = !isOpen "><i class="fas fa-plus-circle"></i> ADD NEW</button>
                        <ul
                            x-show="isOpen"
                            @click.away="isOpen = false"
                            x-transition:enter="transition transform origin-top-right ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-75"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition transform origin-top-right ease-out duration-200"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-75"
                            class="absolute bg-white shadow overflow-hidden rounded-xl w-60 mt-2 py-1 left-auto top-full z-50"
                        >
                            <li class="border-b border-green-150">
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-tags fa-flip-horizontal dropdown-item-icon"></i>
                                    <span class="ml-2">New Tag</span>
                                </a>
                            </li>
                            <li class="border-b border-green-150">
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-folder dropdown-item-icon"></i>
                                    <span class="ml-2">New Workspace</span>
                                </a>
                            </li>
                            <li class="border-b border-green-150">
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-star dropdown-item-icon"></i>
                                    <span class="ml-2">New Bookmark</span>
                                </a>
                            </li>
                            <li class="border-b border-green-150">
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-clipboard dropdown-item-icon"></i>
                                    <span class="ml-2">New Note</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-link dropdown-item-icon"></i>
                                    <span class="ml-2">New Short URL</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="border-b-2 border-gray-300">
                        <li class="nav---tabs {{Request::is('u/dashboard') ? 'tab---active' : ''}} ">
                            <div>
                                <a href="{{route('dashboard')}}"><i class="pr-2 fas fa-home"></i> Home</a>
                            </div>
                        </li>
                        <li class="nav---tabs {{Request::is('tags') ? 'tab---active' : ''}}">
                            <div>
                                <a href="{{route('tags')}}"><i class="pl-2 fas fa-tags fa-flip-horizontal"></i> Tags</a>
                                <span class="span-count">120</span>
                            </div>
                        </li>
                        <li class="nav---tabs {{Request::is('workspaces') ? 'tab---active' : ''}}">
                            <div>
                                <a href="{{route('workspaces')}}"><i class="pr-2 fas fa-folder"></i> Workspaces</a>
                                <span class="span-count">3</span>
                            </div>
                        </li>
                    </ul>
                    <ul class="border-b-2 border-gray-300">
                        <li class="nav---tabs {{Request::is('notes') ? 'tab---active' : ''}}">
                            <div>
                                <a href="{{route('notes')}}"><i class="pr-2 fas fa-clipboard"></i> Notes</a>
                                <span class="span-count">5</span>
                            </div>
                        </li>
                        <li class="nav---tabs {{Request::is('bookmarks') ? 'tab---active' : ''}}">
                            <div>
                                <a href="{{route('bookmarks')}}"><i class="pr-2 fas fa-star"></i> Bookmarks</a>
                                <span class="span-count">80</span>
                            </div>
                        </li>
                        <li class="nav---tabs {{Request::is('short-urls') ? 'tab---active' : ''}}">
                            <div>
                                <a href="{{route('short-urls')}}"><i class="pr-2 fas fa-link"></i> Short URLs</a>
                                <span class="span-count">20</span>
                            </div>
                        </li>
                    </ul>
                    <ul class="border-b-2 border-gray-300">
                        <li class="nav---tabs {{Request::is('network') ? 'tab---active' : ''}}">
                            <div>
                                <a href="{{route('network')}}"><i class="pr-2 fas fa-users"></i> Network</a>
                            </div>
                        </li>
                    </ul>
                    <ul>
                        <li class="nav---tabs">
                            <div>
                                <a href="#"><i class="pr-2 fas fa-cog"></i> Settings</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </span>
        <h3 class="dash-title text-base font-bold">@yield('page-title')</h3>
        <div class=" flex flex-row items-center">
            <div x-data="{ sShow: false }">
                <i @click=" sShow = !sShow " class="fas fa-search text-xl text-green-550 mx-2"></i>
                <div class="absolute overflow-hidden w-full shadow z-20 top-full right-0 left-0 p-4 bg-white"
                    x-show="sShow"
                    @click.away="sShow = false"
                    x-transition:enter="transition transform origin-top-right ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-75"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition transform origin-top-right ease-out duration-200"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-75">
                    <form action="" class="flex flex-col mx-auto text-center mt-2 lg:px-5">
                        <div class="relative rounded-xl shadow-md">
                            <input type="text" name="name" class="input-search" placeholder="Search For Any Knowledge Asset"/>
                            <button class="absolute inset-y-0 right-0 px-4 flex items-center bg-green-550 rounded-xl">
                                <span class="text-xl">
                                    <i class="text-white fas fa-search"></i>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div x-data="{ mNotify: false }">
                <i class="fas fa-bell text-xl text-green-550 mx-2" @click=" mNotify = !mNotify "></i>
                <div
                    x-show="mNotify"
                    @click.away="mNotify = false"
                    x-transition:enter="transition transform origin-top-right ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-75"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition transform origin-top-right ease-out duration-200"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-75"
                    class="absolute bg-white shadow overflow-hidden rounded-xl w-full sm:w-96 mt-2 pt-3 right-0 top-full z-20"
                    >
                    <div class="w-full mx-auto">
                        <div class="w-full flex items-center">
                            <div class="w-2/12 inline-block">
                                <a href="#" class="flex pl-1">
                                    <img src="{{ asset('images/Ellipse 179.png') }}" alt="" class="w-10 h-10 rounded-full object-cover inline-block mx-auto">
                                </a>
                            </div>
                            <div class="w-8/12 inline-block">
                                <p> <a href="#" class="">Alexander Simmons</a> <span class="ml-1 text-green-550"> followed you</span></p>
                            </div>
                            <div class="w-2/12 inline-block">
                                <div class="w-2 h-2 mx-auto bg-green-550 rounded-full"></div>
                            </div>
                        </div>
                        <div class="mb-3 mt-2 border-b-2 border-green-150"></div>
                        <div class="w-full flex items-center">
                            <div class="w-2/12 inline-block">
                                <a href="#" class="flex pl-1">
                                    <img src="{{ asset('images/Ellipse 179.png') }}" alt="" class="w-10 h-10 rounded-full object-cover inline-block mx-auto">
                                </a>
                            </div>
                            <div class="w-8/12 inline-block">
                                <p> <a href="#" class="">Alexander Simmons</a> <span class="ml-1 text-green-550"> added a new Tag</span></p>
                            </div>
                            <div class="w-2/12 inline-block">
                                <div class="w-2 h-2 mx-auto bg-green-550 rounded-full"></div>
                            </div>
                        </div>
                        <div class="mb-3 mt-2 border-b-2 border-green-150"></div>
                        <div class="w-full flex items-center">
                            <div class="w-2/12 inline-block">
                                <a href="#" class="flex pl-1">
                                    <img src="{{ asset('images/Ellipse 179.png') }}" alt="" class="w-10 h-10 rounded-full object-cover inline-block mx-auto">
                                </a>
                            </div>
                            <div class="w-8/12 inline-block">
                                <p> <a href="#" class="">Alexander Simmons</a> <span class="ml-1 text-green-550"> subscribed to a new Workspace</span></p>
                            </div>
                            <div class="w-2/12 inline-block">
                                <div class="w-2 h-2 mx-auto bg-green-550 rounded-full"></div>
                            </div>
                        </div>
                        <div class="mb-3 mt-2 border-b-2 border-green-150"></div>
                        <div class="w-full flex items-center">
                            <div class="w-2/12 inline-block">
                                <a href="#" class="flex pl-1">
                                    <img src="{{ asset('images/Ellipse 179.png') }}" alt="" class="w-10 h-10 rounded-full object-cover inline-block mx-auto">
                                </a>
                            </div>
                            <div class="w-8/12 inline-block">
                                <p> <a href="#" class="">Alexander Simmons</a> <span class="ml-1 text-green-550"> subscribed to a new Workspace</span></p>
                            </div>
                            <div class="w-2/12 inline-block">
                                <div class="w-2 h-2 mx-auto bg-green-550 rounded-full"></div>
                            </div>
                        </div>
                        <div class="mt-2 border-b-2 border-green-150"></div>
                    </div>
                    <div class="w-full bg-green-550 px-3 py-3 flex flex-wrap overflow-hidden">
                        <div class=" w-1/2 inline-block border-r border-white">
                            <p class=" text-center text-white"><a href="#"><i class="fas fa-eye-slash"></i> Mark All Read</a></p>
                        </div>
                        <div class=" w-1/2 inline-block border-l border-white">
                            <p class=" text-center text-white"><a href="#">Mark All Read <i class="fas fa-arrow-right"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div x-data="{ pShow: false }">
                <button class="block ml-2 focus:outline-none" @click=" pShow = !pShow ">
                    <img alt="User Image"
                    src="
                    @auth
                    @if(Auth::user()->profile_img == null)
                        https://ui-avatars.com/api/?background=EAF7F0&name={{ str_replace(' ','+' ,Auth::user()->name) }}
                    @else
                        {{asset('user_profile_images/'.Auth::user()->profile_img)}}
                    @endif
                    @endauth
                    @guest
                        https://ui-avatars.com/api/?background=EAF7F0&name=Guest
                    @endguest
                      " class="mx-auto object-cover rounded-full h-8 w-8 border-2 border-green-550"/>
                </button>
                <ul
                    x-show="pShow"
                    @click.away="pShow = false"
                    x-transition:enter="transition transform origin-top-right ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-75"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition transform origin-top-right ease-out duration-200"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-75"
                    class="absolute bg-white shadow overflow-hidden rounded-xl w-60 mt-2 py-1 right-4 top-full z-20"
                >
                    <li class="border-b border-green-150">
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user dropdown-item-icon"></i>
                            <span class="ml-2">Profile</span>
                        </a>
                    </li>
                    <li class="border-b border-green-150">
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-home dropdown-item-icon"></i>
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    <li class="border-b border-green-150">
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-info-circle dropdown-item-icon"></i>
                            <span class="ml-2">Preferences</span>
                        </a>
                    </li>
                    <li class="border-b border-green-150">
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-question-circle dropdown-item-icon"></i>
                            <span class="ml-2">Need Help?</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="dropdown-item">
                            <i class="fas fa-sign-out-alt dropdown-item-icon"></i>
                            <span class="ml-2">Logout</span>
                        </a>
                    </li>
                </ul>
                <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>
