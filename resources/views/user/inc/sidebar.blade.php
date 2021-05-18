<div class="sidebar" x-data="{ isOpen:false}">
    <div class="sidebar-mini hidden md:block fixed bg-green-550 w-24 h-full lg:h-screen py-8" x-show="!isOpen">
        <div class="text-center">
            <a href="{{route('user-profile')}}" class="block relative">
                <img alt="User Image" src="{{ asset('images/Ellipse 179.png') }}" class="mx-auto object-cover rounded-full h-12 w-12 border-2 border-white shadow-xl"/>
            </a>
            <div class="relative" x-data="{ isOpen: false }">
                <button class="block w-min mx-auto mt-5 focus:outline-none" @click=" isOpen = !isOpen ">
                    <i class="fas fa-plus-circle rounded-3xl shadow-xl text-3xl text-green-550 p-2 bg-green-150 bg-opacity-75 hover:bg-opacity-100"></i>
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
                    class="absolute bg-white shadow overflow-hidden rounded-xl w-60 mt-2 py-1 left-10 top-full z-50"
                >
                    <li class="border-b border-green-150">
                        <a href="{{ route('add-tag')}}" class="dropdown-item">
                            <i class="fas fa-tags fa-flip-horizontal dropdown-item-icon"></i>
                            <span class="ml-2">New Tag</span>
                        </a>
                    </li>
                    <li class="border-b border-green-150">
                        <a href="{{ route('add-workspace') }}" class="dropdown-item">
                            <i class="fas fa-folder dropdown-item-icon"></i>
                            <span class="ml-2">New Workspace</span>
                        </a>
                    </li>
                    <li class="border-b border-green-150">
                        <a href="{{ route('add-bookmark')}}" class="dropdown-item">
                            <i class="fas fa-star dropdown-item-icon"></i>
                            <span class="ml-2">New Bookmark</span>
                        </a>
                    </li>
                    <li class="border-b border-green-150">
                        <a href="{{ route('add-note') }}" class="dropdown-item">
                            <i class="fas fa-clipboard dropdown-item-icon"></i>
                            <span class="ml-2">New Note</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('add-short-url') }}" class="dropdown-item">
                            <i class="fas fa-link dropdown-item-icon"></i>
                            <span class="ml-2">New Short URL</span>
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="mt-8 mx-auto pr-4">
                <li class="nav--tabs {{Request::is('u/dashboard') ? 'tab-active' : ''}}"><a href="{{route('dashboard')}}"><i class="fas fa-home"></i></a></li>
                <li class="nav--tabs {{Request::is('tags') ? 'tab-active' : ''}}"><a href="{{route('tags')}}"><i class="fas fa-tags fa-flip-horizontal"></i></a></li>
                <li class="nav--tabs {{Request::is('workspaces') ? 'tab-active' : ''}}"><a href="{{route('workspaces')}}"><i class="fas fa-folder"></i></a></li>
                <li class="nav--tabs {{Request::is('notes') ? 'tab-active' : ''}}"><a href="{{route('notes')}}"><i class="fas fa-clipboard"></i></a></li>
                <li class="nav--tabs {{Request::is('bookmarks') ? 'tab-active' : ''}}"><a href="{{route('bookmarks')}}"><i class="fas fa-star"></i></a></li>
                <li class="nav--tabs {{Request::is('short-urls') ? 'tab-active' : ''}}"><a href="{{route('short-urls')}}"><i class="fas fa-link"></i></a></li>
                <li class="nav--tabs {{Request::is('network') ? 'tab-active' : ''}}"><a href="{{route('network')}}"><i class="fas fa-users"></i></a></li>
                <li class="nav--tabs"><a href="#"><i class="fas fa-cog"></i></a></li>
            </ul>
            <button class="focus:outline-none" @click="isOpen = true">
                <img src="{{ asset('images/Mask Group 60.svg') }}" alt="Sidebar Open Button" class="w-6">
            </button>
        </div>
    </div>
    <div class="sidebar-large hidden md:block absolute bg-white py-8 w-64 h-full lg:h-screen shadow-lg z-10"
        x-show="isOpen"
        x-transition:enter="transition-all transform ease-out"
        x-transition:enter-start="-translate-x-1/2 opacity-0"
        x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transition-all transform ease-in"
        x-transition:leave-start="translate-x-0 opacity-100"
        x-transition:leave-end="-translate-x-1/2 opacity-0"
        @click.away="isOpen = false"
        >
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
                    class="absolute bg-white shadow overflow-hidden rounded-xl w-60 mt-2 py-1 left-10 top-full z-50"
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
                <li class="nav---tabs {{Request::is('u/dashboard') ? 'tab--active' : ''}} ">
                    <div>
                        <a href="{{route('dashboard')}}"><i class="pr-2 fas fa-home"></i> Home</a>
                    </div>
                </li>
                <li class="nav---tabs {{Request::is('tags') ? 'tab--active' : ''}}">
                    <div>
                        <a href="{{route('tags')}}"><i class="pl-2 fas fa-tags fa-flip-horizontal"></i> Tags</a>
                        <span class="span-count">120</span>
                    </div>
                </li>
                <li class="nav---tabs {{Request::is('workspaces') ? 'tab--active' : ''}}">
                    <div>
                        <a href="{{route('workspaces')}}"><i class="pr-2 fas fa-folder"></i> Workspaces</a>
                        <span class="span-count">3</span>
                    </div>
                </li>
            </ul>
            <ul class="border-b-2 border-gray-300">
                <li class="nav---tabs {{Request::is('notes') ? 'tab--active' : ''}}">
                    <div>
                        <a href="{{route('notes')}}"><i class="pr-2 fas fa-clipboard"></i> Notes</a>
                        <span class="span-count">5</span>
                    </div>
                </li>
                <li class="nav---tabs {{Request::is('bookmarks') ? 'tab--active' : ''}}">
                    <div>
                        <a href="{{route('bookmarks')}}"><i class="pr-2 fas fa-star"></i> Bookmarks</a>
                        <span class="span-count">80</span>
                    </div>
                </li>
                <li class="nav---tabs {{Request::is('short-urls') ? 'tab--active' : ''}}">
                    <div>
                        <a href="{{route('short-urls')}}"><i class="pr-2 fas fa-link"></i> Short URLs</a>
                        <span class="span-count">20</span>
                    </div>
                </li>
            </ul>
            <ul class="border-b-2 border-gray-300">
                <li class="nav---tabs {{Request::is('network') ? 'tab--active' : ''}}">
                    <div>
                        <a href="{{route('network')}}"><i class="pr-2 fas fa-users"></i> Network</a>
                    </div>
                </li>
            </ul>
            <ul class="pb-8">
                <li class="nav---tabs">
                    <div>
                        <a href="#"><i class="pr-2 fas fa-cog"></i> Settings</a>
                    </div>
                </li>
            </ul>
            <div class="text-right pr-10">
                <button class="focus:outline-none" @click="isOpen = false">
                    <img src="{{ asset('images/Mask Group 59.svg') }}" alt="Sidebar Close Button" class="w-6">
                </button>
            </div>
        </div>
    </div>
</div>
