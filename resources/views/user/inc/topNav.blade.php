<nav class="user-nav relative px-5 py-2 h-20 shadow items-center">
    <div class="flex flex-wrap">

        <div class="w-full overflow-hidden lg:w-1/4">
            <!-- Column Content -->
            <div class="dash-title px-6 py-4 text-2xl">
                <h2 class="font-bold">@yield('page-title')</h2>
            </div>
        </div>

        <div class="w-full overflow-hidden lg:w-2/4 items-center">
            <!-- Column Content -->
            <form action="" class="flex flex-col mx-auto text-center mt-2 px-5">
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

        <div class="w-full lg:w-1/4 px-5">
            <!-- Column Content -->
            <div class="flex mt-2 justify-end">
                <a href="#" class="notification-icon"><i class="fas fa-bell"></i></a>
                <div class="flex items-center space-x-2 relative" x-data="{ isOpen: false }">
                    <div class="flex flex-col pl-4" @click=" isOpen = !isOpen ">
                        <label class="cursor-pointer">Hello
                            <span class="font-bold ml-1 cursor-pointer">
                                Julia
                            </span>
                        </label>
                    </div>
                    <button class="block focus:outline-none" @click=" isOpen = !isOpen ">
                        <img alt="User Image" src="{{ asset('images/Ellipse 179.png') }}" class="mx-auto object-cover rounded-full h-12 w-12 border-2 border-green-550"/>
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

    </div>
</nav>
