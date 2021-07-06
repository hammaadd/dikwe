@extends('user.layout.userLayout')
@section('title','New Note Detail View')
@section('page-title','New Note Detail View')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('content')
    <div class="p-2 md:p-5 lg:p-2 xl:p-5">
        <div class="bg-green-150 rounded-xl p-2 md:p-8 lg:p-2 xl:p-8">
            <div class="lg:px-4 lg:mb-8">
                <div class="flex flex-wrap lg:-mx-4 xl:-mx-4 bg-white rounded-xl py-2 md:py-4">
                    <div class="w-full overflow-hidden md:px-4 lg:px-4 lg:w-1/3 xl:px-4 xl:w-4/12">
                        <div class="w-full px-2 md:px-0">
                            <form action="" class="flex flex-col text-center">
                                <div class="relative rounded-xl">
                                    <input type="text" name="name" class="input-search" placeholder="Search Notes"/>
                                    <button class="absolute inset-y-0 right-0 px-5 flex items-center bg-green-550 rounded-xl">
                                        <span class="text-xl">
                                            <i class="text-white fas fa-search"></i>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-2 md:pl-4 md:pr-0 pt-2 md:pt-4 lg:pt-0 overflow-hidden lg:px-0 xl:px-4 lg:w-1/3 xl:w-5/12 flex flex-wrap">
                        <div class="w-1/2 pr-2">
                            <div class="relative h-full" x-data="{ nOpen: false }">
                                <button @click=" nOpen = !nOpen " class="w-full h-full bg-green-150 px-5 py-2 rounded-xl font-bold text-left focus:outline-none hover:text-white hover:bg-green-550">
                                    Notes <i class="fas fa-angle-down float-right mt-1"></i>
                                </button>
                                <ul
                                x-show="nOpen"
                                @click.away="nOpen = false"
                                x-transition:enter="transition transform origin-top ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-75"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition transform origin-top ease-out duration-200"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-75"
                                class="absolute bg-white shadow overflow-hidden rounded-xl mt-2 py-1 left-0 right-0 top-0 z-20"
                                >
                                    <li class="border-b border-green-150">
                                        <a href="#" class="tag-filter-item">
                                            <span class="ml-2">My Notes</span>
                                        </a>
                                    </li>
                                    <li class="border-b border-green-150">
                                        <a href="#" class="tag-filter-item">
                                            <span class="ml-2">Subscribed Notes</span>
                                        </a>
                                    </li>
                                    <li class="border-b border-green-150">
                                        <a href="#" class="tag-filter-item">
                                            <span class="ml-2">Service Notes</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="w-1/2 pl-2">
                            <div class="relative h-full" x-data="{ nVisible: false }">
                                <button @click=" nVisible = !nVisible " class="w-full h-full bg-green-150 px-5 py-2 rounded-xl font-bold text-left focus:outline-none hover:text-white hover:bg-green-550">
                                    Visibility <i class="fas fa-angle-down float-right mt-1"></i>
                                </button>
                                <ul
                                x-show="nVisible"
                                @click.away="nVisible = false"
                                x-transition:enter="transition transform origin-top ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-75"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition transform origin-top ease-out duration-200"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-75"
                                class="absolute bg-white shadow overflow-hidden rounded-xl mt-2 py-1 left-0 right-0 top-0 z-20"
                                >
                                    <li class="border-b border-green-150">
                                        <a href="#" class="tag-filter-item">
                                            <span class="ml-2">All</span>
                                        </a>
                                    </li>
                                    <li class="border-b border-green-150">
                                        <a href="#" class="tag-filter-item">
                                            <span class="ml-2">Public</span>
                                        </a>
                                    </li>
                                    <li class="border-b border-green-150">
                                        <a href="#" class="tag-filter-item">
                                            <span class="ml-2">Private</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 md:pr-4 pt-2 md:pt-4 lg:pt-0 lg:px-4 lg:w-1/3 xl:px-4 xl:w-3/12">
                        <div class="flex justify-center md:justify-end lg:justify-between xl:justify-end relative h-full" x-data="{ nColor: false, nForm: false }">
                            <button @click=" nColor = !nColor " class="bg-green-150 focus:outline-none rounded-lg p-1 mx-2 h-12 w-12 flex items-center">
                                <div class="w-5 h-5 rounded-full bg-indigo-700 inline-block mx-auto"></div>
                                {{-- <i class="fas fa-angle-down float-right ml-2 align-middle"></i> --}}
                            </button>
                            <button @click=" nForm = !nForm " class="bg-green-150 text-green-550 focus:outline-none rounded-lg mx-2 px-2 h-12 w-12 hover:bg-green-550 hover:text-white">
                                <i class="fas fa-sliders-h text-xl align-middle"></i>
                            </button>
                            <button class="bg-green-150 text-green-550 focus:outline-none rounded-lg mx-2 px-2 h-12 w-12 hover:bg-green-550 hover:text-white">
                                <i class="fas fa-sort-alpha-down text-xl align-middle"></i>
                            </button>
                            <button class="bg-green-150 text-green-550 focus:outline-none rounded-lg mx-2 md:ml-2 md:mr-0 lg:mx-2 px-2 h-12 w-12 hover:bg-green-550 hover:text-white">
                                <i class="fas fa-sort-numeric-down text-xl align-middle"></i>
                            </button>
                            <ul
                                x-show="nColor"
                                @click.away="nColor = false"
                                x-transition:enter="transition transform origin-top ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-75"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition transform origin-top ease-out duration-200"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-75"
                                class="w-12 absolute text-center border border-gray-500 rounded-lg top-full bg-white px-1 z-20">
                                <li class="border-b border-gray-400">
                                    <a href="#">
                                        <span class="my-1">All</span>
                                    </a>
                                </li>
                                <li class="border-b border-gray-400">
                                    <a href="#">
                                        <div class="w-5 h-5 rounded-full bg-indigo-700 inline-block my-1 align-middle"></div>
                                    </a>
                                </li>
                                <li class="border-b border-gray-400">
                                    <a href="#">
                                        <div class="w-5 h-5 rounded-full bg-green-550 inline-block my-1 align-middle"></div>
                                    </a>
                                </li>
                                <li class="border-b border-gray-400">
                                    <a href="#">
                                        <div class="w-5 h-5 rounded-full bg-purple-900 inline-block my-1 align-middle"></div>
                                    </a>
                                </li>
                                <li class="border-b border-gray-400">
                                    <a href="#">
                                        <div class="w-5 h-5 rounded-full bg-yellow-400 inline-block my-1 align-middle"></div>
                                    </a>
                                </li>
                            </ul>
                            <form action=""
                                x-show="nForm"
                                @click.away="nForm = false"
                                x-transition:enter="transition transform origin-top ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-75"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition transform origin-top ease-out duration-200"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-75"
                                class="absolute w-full bg-white rounded-xl top-full p-4 shadow-md z-20">
                                <p class="font-bold text-center">Filter By</p>
                                <div class="flex items-center justify-around border-b border-gray-500 py-6">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="notefilter" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            Used
                                        </span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="notefilter" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            Unused
                                        </span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="notefilter" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            All
                                        </span>
                                    </label>
                                </div>
                                <div class="py-6 border-b border-gray-500">
                                    <p class="pb-3">Colors</p>
                                    <input type="checkbox" class="form-checkbox text-purple-900 border-purple-900 bg-purple-900 rounded-full focus:ring-0" />
                                    <input type="checkbox" class="form-checkbox text-yellow-400 border-yellow-400 bg-yellow-400 rounded-full focus:ring-0" />
                                    <input type="checkbox" class="form-checkbox text-indigo-700 border-indigo-700 bg-indigo-700 rounded-full focus:ring-0" />
                                    <input type="checkbox" class="form-checkbox text-green-550 border-green-550 bg-green-550 rounded-full focus:ring-0" />
                                </div>
                                <div class="py-6">
                                    <label class="flex items-center">
                                        <input type="checkbox" class="form-checkbox text-green-550 border-green-550 focus:ring-0" />
                                        <span class="block ml-2 cursor-pointer">Favourite Notes</span>
                                    </label>
                                </div>
                                <div class=" text-right">
                                    <button @click=" nForm = !nForm " class="bg-gray-400 text-white font-bold px-4 py-1 mx-2 rounded-xl focus:outline-none">Cancel</button>
                                    <button @click=" nForm = !nForm " type="submit" class="bg-green-550 text-white font-bold px-4 py-1 mx-2 rounded-xl focus:outline-none">Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap overflow-hidden lg:-mx-4 xl:-mx-4">

                <div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3">
                    <!-- Column Content -->
                    {{-- Short URLs Section --}}
                    <div class="bg-white pb-5 rounded-xl lg:h-full mt-4 lg:mt-0">
                        <div class="flex flex-wrap justify-between relative">
                            <div class="bg-green-550 text-white font-bold px-2 md:px-8 py-1 md:py-3 br-top-left"><label for="knowledge-assets">02 Notes</label></div>
                        </div>
                        <div class="w-full px-2 md:px-5 flex flex-wrap justify-between items-center relative mt-5" x-data="{ isOpen: false, fOpen: false }">
                            <div>
                                <a href="{{ route('add-note') }}" class="bg-green-550 text-white font-bold py-2 px-3 mx-2 rounded-xl border-2 border-green-550 hover:bg-white hover:text-green-550 focus:outline-none"><i class="fas fa-plus-circle"></i></a>
                            </div>
                            <div>
                                <button class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
                                    <i class="fas fa-list-ul text-xl align-middle"></i>
                                </button>
                                <button class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
                                    <i class="fas fa-th-large text-xl align-middle"></i>
                                </button>
                                <button @click=" fOpen = !fOpen " :class="{'text-green-550':fOpen}" class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
                                    <i class="fas fa-sliders-h text-xl align-middle"></i>
                                </button>
                                <button @click=" isOpen = !isOpen " :class="{'text-green-550':fOpen}" class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
                                    <i class="fas fa-ellipsis-h text-xl align-middle"></i>
                                </button>
                            </div>
                            <ul
                                x-show="isOpen"
                                @click.away="isOpen = false"
                                x-transition:enter="transition transform origin-top-right ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-75"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition transform origin-top-right ease-out duration-200"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-75"
                                class="absolute bg-white shadow-md overflow-hidden rounded-xl w-72 mt-2 py-1 right-0 top-full md:right-10 md:top-10 z-20"
                            >
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-plus-circle dropdown-item-icon"></i>
                                        <span class="ml-2">Add New Note Here</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-external-link-alt dropdown-item-icon"></i>
                                        <span class="ml-2">Open All Note</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-share-alt dropdown-item-icon"></i>
                                        <span class="ml-2">Share Notes</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-tags dropdown-item-icon"></i>
                                        <span class="ml-2">Tag Notes</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-tag dropdown-item-icon"></i>
                                        <span class="ml-2">Untag Notes</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-lock dropdown-item-icon"></i>
                                        <span class="ml-2">Make Notes Private</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-globe-americas dropdown-item-icon"></i>
                                        <span class="ml-2">Make Notes Public</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-users dropdown-item-icon"></i>
                                        <span class="ml-2">Make Notes Restricted</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-trash-alt dropdown-item-icon"></i>
                                        <span class="ml-2">Delete Notes</span>
                                    </a>
                                </li>
                            </ul>
                            <form action=""
                                x-show="fOpen"
                                @click.away="fOpen = false"
                                x-transition:enter="transition transform origin-top-right ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-75"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition transform origin-top-right ease-out duration-200"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-75"
                                class="absolute bg-white shadow-md overflow-hidden rounded-xl w-72 mt-2 p-5 right-0 top-full md:right-20 md:top-10 z-20">
                                <p class="font-bold text-center">Filter By</p>
                                <div class="flex flex-col border-b border-gray-500 py-6">
                                    <label class="items-center">
                                        <input type="radio" name="rate" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            High Rate
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="rate" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            Low Rate
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="rate" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            All
                                        </span>
                                    </label>
                                </div>
                                <div class="flex flex-col border-b border-gray-500 py-6">
                                    <label class="items-center">
                                        <input type="radio" name="clicks" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            High Number of Clicks
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="clicks" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            Low Number of Clicks
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="clicks" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            All
                                        </span>
                                    </label>
                                </div>
                                <div class="flex flex-col border-b border-gray-500 py-6">
                                    <label class="items-center">
                                        <input type="radio" name="shares" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            High Number of Shares
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="shares" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            Low Number of Shares
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="shares" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            All
                                        </span>
                                    </label>
                                </div>
                                <div class="flex flex-col py-6">
                                    <label class="items-center">
                                        <input type="radio" name="time" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            Newest
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="time" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            Oldest
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="time" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            All
                                        </span>
                                    </label>
                                </div>
                                <div class=" text-right">
                                    <button @click=" fOpen = !fOpen " class="bg-gray-400 text-white font-bold px-4 py-1 mx-2 rounded-xl focus:outline-none">Cancel</button>
                                    <button @click=" fOpen = !fOpen " type="submit" class="bg-green-550 text-white font-bold px-4 py-1 mx-2 rounded-xl focus:outline-none">Apply</button>
                                </div>
                            </form>
                        </div>
                        <div class="mt-4 md:mt-8 px-2">
                            <div class="w-full md:w-11/12 mx-auto rounded-lg shadow-md mb-4 md:mb-8">
                                <div class="flex flex-col-reverse sm:flex-row justify-between relative pt-2 px-2 md:px-4">
                                    <span class="text-lg font-bold pt-2 sm:pt-0"><div class="w-4 h-4 rounded-full bg-indigo-700 inline-block mr-1"></div> Note Title</span>
                                    <div x-data="{ bShow: false }">
                                        <span class="text-sm">Last Updated <span class="time text-green-550">15 Minutes Ago</span> </span>
                                        <button @click=" bShow = !bShow " class="text-green-550 sm:text-gray-400 sm:bg-green-150 sm:rounded-xl ml-2 px-2 sm:h-10 sm:w-10 float-right hover:text-green-550 focus:outline-none">
                                            <i class="fas fa-ellipsis-v text-lg align-middle"></i>
                                        </button>
                                        <ul
                                            x-show="bShow"
                                            @click.away="bShow = false"
                                            x-transition:enter="transition transform origin-top-right ease-out duration-200"
                                            x-transition:enter-start="opacity-0 scale-75"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave="transition transform origin-top-right ease-out duration-200"
                                            x-transition:leave-start="opacity-100 scale-100"
                                            x-transition:leave-end="opacity-0 scale-75"
                                            class="absolute bg-white shadow-md overflow-hidden rounded-xl w-48 mt-2 py-1 right-0 top-10 z-20"
                                        >
                                            <li>
                                                <a href="#" class="dropdown-item">
                                                    <i class="fas fa-edit dropdown-item-icon"></i>
                                                    <span class="ml-2">Edit Note</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown-item">
                                                    <i class="fas fa-share-alt dropdown-item-icon"></i>
                                                    <span class="ml-2">Share Note</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown-item">
                                                    <i class="fas fa-file-export dropdown-item-icon"></i>
                                                    <span class="ml-2">Export Note</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown-item">
                                                    <i class="fas fa-trash-alt dropdown-item-icon"></i>
                                                    <span class="ml-2">Delete Note</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="px-2 md:px-4 py-4">
                                    <p class="notes-detail">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ante risus, varius
                                        euismod efficitur eget, faucibus non velit. Suspendisse tristique, neque eget dignissim
                                        tristique, lorem mauris pellentesque arcu, sit amet iaculis justo diam ut nunc. Proin in
                                        neque risus. Duis interdum pretium faucibus. Praesent ultricies neque ac faucibus cursus.
                                        Cras dui ipsum, consequat vel suscipit quis, blandit eu nisl. Vivamus mollis malesuada mattis.
                                        Mauris ac velit non nibh tristique blandit vitae vitae nisl. Fusce a mi sed purus mattis
                                        tempor. Maecenas gravida laoreet justo, id ultrices ex volutpat ut. Nam euismod odio sapien,
                                        eu venenatis libero eleifend nec. Suspendisse potenti. Nulla urna nibh, varius ut tincidunt
                                        vel, hendrerit ac urna. Ut ultricies elit non risus ultricies faucibus. Nulla rhoncus, orci
                                        nec vestibulum mattis, arcu erat facilisis neque, vitae ullamcorper urna est vel nunc. Quisque
                                        vel enim a nulla rutrum maximus sed egestas mauris. Nulla facilisi. Maecenas scelerisque
                                        justo et turpis eleifend, sed malesuada justo rhoncus. Suspendisse at metus nisi. Vestibulum
                                        ut metus mauris. Phasellus ullamcorper efficitur ligula in tincidunt. Donec tellus ligula,
                                        elementum luctus dui id, scelerisque vehicula metus. Duis enim lorem, varius vitae diam a,
                                        blandit tempor nisl. Praesent ut tellus nulla. Nunc sagittis non lacus in accumsan. Pellentesque
                                         habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In leo sapien,
                                         suscipit sit amet leo nec, tincidunt luctus erat. Integer hendrerit mollis purus, eu finibus
                                         augue fringilla ac. Vivamus scelerisque lobortis magna. Ut tristique pretium elit, sit amet
                                         tincidunt est convallis ac. Quisque porta lacus in magna aliquet laoreet. Vivamus non erat
                                         semper lacus finibus elementum et a purus. Vestibulum fermentum sapien eget mauris ultrices
                                         commodo. Etiam iaculis tempus euismod. Cras congue, mauris in pretium gravida, ipsum lectus
                                         consequat felis, in sollicitudin urna dolor eu felis.
                                    </p>
                                    <p class="notes-source pt-3"><span class="font-bold mr-2">Source:</span>This is sourcle of note</p>
                                    <p class="source-url pt-3"><span class="font-bold mr-2">Source URL:</span>https://tailwindcss.com/docs/flex-grow</p>
                                </div>
                                <div class="w-full flex flex-wrap justify-between items-start px-2 md:px-4 py-2">
                                    <div class="flex flex-col">
                                        <div class="tags">
                                            <label for="tags" class="font-bold inline-block">Tags</label>
                                            <div class="sm:inline-block sm:ml-2 pt-1 sm:pt-0">
                                                <span class="tag-item">Demo</span>
                                                <span class="tag-item">Tag</span>
                                                <span class="tag-item">Another Tag</span>
                                            </div>
                                        </div>
                                        <div class="workspaces pt-2 sm:pt-6">
                                            <label for="workspaces" class="font-bold inline-block">Workspaces</label>
                                            <div class="sm:inline-block sm:ml-2 pt-1 sm:pt-0">
                                                <span class="tag-item">Root WS</span>
                                                <span class="tag-item">Demo WS</span>
                                                <span class="tag-item">Workspace</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap flex-row-reverse sm:flex-col items-center sm:items-end justify-between w-full sm:w-auto">
                                        <div class="rating mb-0">
                                            <input type="radio" name="rate" id="rate-5">
                                            <label for="rate-5" class="fas fa-star"></label>
                                            <input type="radio" name="rate" id="rate-4">
                                            <label for="rate-4" class="fas fa-star"></label>
                                            <input type="radio" name="rate" id="rate-3">
                                            <label for="rate-3" class="fas fa-star"></label>
                                            <input type="radio" name="rate" id="rate-2">
                                            <label for="rate-2" class="fas fa-star"></label>
                                            <input type="radio" name="rate" id="rate-1">
                                            <label for="rate-1" class="fas fa-star"></label>
                                        </div>
                                        <ul class="pt-2">
                                            <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-1 text-lg text-gray-400"><i class="fas fa-hand-point-up"></i></a><br><span class="count text-sm">12</span></li>
                                            <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-1 text-lg text-green-550"><i class="fas fa-thumbs-down"></i></a><br><span class="count text-sm">2</span></li>
                                            <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-1 text-lg text-green-550"><i class="fas fa-thumbs-up"></i></a><br><span class="count text-sm">20</span></li>
                                            <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-1 text-lg text-green-550"><i class="fas fa-copy"></i></a><br><span class="count text-sm">15</span></li>
                                            <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-1 text-lg text-green-550"><i class="fas fa-share-alt"></i></a><br><span class="count text-sm">2</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row justify-between items-center relative bg-green-150 px-2 md:px-4 py-2">
                                    <div class="flex flex-row justify-between items-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="#" class="block relative">
                                                <img alt="User Image" src="{{ asset('images/Ellipse 179.png') }}" class="mx-auto object-cover rounded-full h-8 w-8 "/>
                                            </a>
                                            <div class="flex flex-col">
                                                <a href="#" class="font-bold link-hover">
                                                    Robert Stewart
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="date">12 April, 2020</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full overflow-hidden lg:px-4 lg:w-1/3 xl:px-4 xl:w-1/3">
                    <!-- Column Content -->
                    {{-- Skillar Section --}}
                    <div class="bg-white p-2 md:px-6 md:py-5 rounded-xl mt-4 lg:mt-0">
                        <x-skillar-banner/>
                    </div>
                    {{-- Network Section --}}
                    <div class="bg-white p-2 md:px-6 md:py-5 rounded-xl mt-4 md:mt-8">
                        <x-follow-people/>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
