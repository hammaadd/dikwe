<div class="sidebar" x-data="{ isOpen:false}">
    <div class="sidebar-mini fixed bg-green-550 w-24 h-full lg:h-screen py-8" x-show="!isOpen">
        <div class="text-center">
            <a href="#" class="block relative">
                <img alt="User Image" src="{{ asset('images/Ellipse 179.png') }}" class="mx-auto object-cover rounded-full h-12 w-12 border-2 border-white shadow-xl"/>
            </a>
            <a href="#" class="block w-min mx-auto mt-5">
                <i class="fas fa-plus-circle rounded-3xl shadow-xl text-3xl text-green-550 p-2 bg-green-150 bg-opacity-75 hover:bg-opacity-100"></i>
            </a>
            <ul class="mt-8 mx-auto pr-4">
                <li class="nav--tabs {{Request::is('u/dashboard') ? 'tab-active' : ''}}"><a href="{{route('u.dashboard')}}"><i class="fas fa-home"></i></a></li>
                <li class="nav--tabs {{Request::is('tags') ? 'tab-active' : ''}}"><a href="{{route('tags')}}"><i class="fas fa-tags fa-flip-horizontal"></i></a></li>
                <li class="nav--tabs {{Request::is('workspaces') ? 'tab-active' : ''}}"><a href="{{route('workspaces')}}"><i class="fas fa-folder"></i></a></li>
                <li class="nav--tabs"><a href="#"><i class="fas fa-clipboard"></i></a></li>
                <li class="nav--tabs"><a href="#"><i class="fas fa-star"></i></a></li>
                <li class="nav--tabs"><a href="#"><i class="fas fa-link"></i></a></li>
                <li class="nav--tabs"><a href="#"><i class="fas fa-users"></i></a></li>
                <li class="nav--tabs"><a href="#"><i class="fas fa-cog"></i></a></li>
            </ul>
            <button class="focus:outline-none" @click="isOpen = true">
                <img src="{{ asset('images/Mask Group 60.svg') }}" alt="Sidebar Open Button" class="w-6">
            </button>
        </div>
    </div>
    <div class="sidebar-large absolute bg-white py-8 w-64 h-full lg:h-screen shadow-lg z-10"
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
                <a href="#" class="block relative">
                    <img alt="User Image" src="{{ asset('images/Ellipse 179.png') }}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                </a>
                <div class="flex flex-col">
                    <span>Hello
                        <a href="#" class="font-bold ml-1 link-hover">
                            Julia
                        </a>
                    </span>
                </div>
            </div>
            <div class="my-8 text-center">
                <a href="#" class="btn-outline"><i class="fas fa-plus-circle"></i> ADD NEW</a>
            </div>
            <ul class="border-b-2 border-gray-300">
                <li class="nav---tabs {{Request::is('u/dashboard') ? 'tab--active' : ''}} ">
                    <div>
                        <a href="{{route('u.dashboard')}}"><i class="pr-2 fas fa-home"></i> Home</a>
                    </div>
                </li>
                <li class="nav---tabs {{Request::is('tags') ? 'tab--active' : ''}}">
                    <div>
                        <a href="{{route('tags')}}"><i class="pl-2 fas fa-tags fa-flip-horizontal"></i> Tags</a>
                        <span class="span-count">120</span>
                    </div>
                </li>
                <li class="nav---tabs">
                    <div>
                        <a href="{{route('workspaces')}}"><i class="pr-2 fas fa-folder"></i> Workspaces</a>
                        <span class="span-count">3</span>
                    </div>
                </li>
            </ul>
            <ul class="border-b-2 border-gray-300">
                <li class="nav---tabs">
                    <div>
                        <a href="#"><i class="pr-2 fas fa-clipboard"></i> Notes</a>
                        <span class="span-count">5</span>
                    </div>
                </li>
                <li class="nav---tabs">
                    <div>
                        <a href="#"><i class="pr-2 fas fa-star"></i> Bookmarks</a>
                        <span class="span-count">80</span>
                    </div>
                </li>
                <li class="nav---tabs">
                    <div>
                        <a href="#"><i class="pr-2 fas fa-link"></i> Short URLs</a>
                        <span class="span-count">20</span>
                    </div>
                </li>
            </ul>
            <ul class="border-b-2 border-gray-300">
                <li class="nav---tabs">
                    <div>
                        <a href="#"><i class="pr-2 fas fa-users"></i> Network</a>
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
