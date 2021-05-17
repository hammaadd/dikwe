@extends('user.layout.userLayout')
@section('title','Bookmarks')
@section('page-title','Bookmarks')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('content')
    <div class="p-2 md:p-5 lg:p-2 xl:p-5">
        <div class="bg-green-150 rounded-xl p-2 md:p-8 lg:p-2 xl:p-8">
            <div class="flex flex-wrap overflow-hidden lg:-mx-4 xl:-mx-4">

                <div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3">
                    <!-- Column Content -->
                    {{-- Bookmarks Section --}}
                    <div class="bg-white px-2 md:px-6 pt-4 lg:pt-10 rounded-xl h-full">
                        <div class=" text-right">
                            <a href="{{ route('add-bookmark') }}" class="btn-main">
                                <i class="fas fa-plus-circle mr-2"></i> New Bookmark
                            </a>
                        </div>
                        <div class="w-full flex flex-wrap justify-between relative mt-6 lg:mt-8" x-data="{ isOpen: false, fOpen: false }">
                            <div class="w-full md:w-1/2 px-2 md:px-0">
                                <form action="" class="flex flex-col text-center">
                                    <div class="relative rounded-xl">
                                        <input type="text" name="name" class="input-search" placeholder="Search Bookmark"/>
                                        <button class="absolute inset-y-0 right-0 px-5 flex items-center bg-green-550 rounded-xl">
                                            <span class="text-xl">
                                                <i class="text-white fas fa-search"></i>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="mt-4 sm:mt-0 mx-auto md:mx-0">
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
                                        <span class="ml-2">Add New Bookmark Here</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-external-link-alt dropdown-item-icon"></i>
                                        <span class="ml-2">Open All Bookmarks</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-share-alt dropdown-item-icon"></i>
                                        <span class="ml-2">Share Bookmarks</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-tags dropdown-item-icon"></i>
                                        <span class="ml-2">Tag Bookmarks</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-tag dropdown-item-icon"></i>
                                        <span class="ml-2">Untag Bookmarks</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-lock dropdown-item-icon"></i>
                                        <span class="ml-2">Make Bookmarks Private</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-globe-americas dropdown-item-icon"></i>
                                        <span class="ml-2">Make Bookmarks Public</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-users dropdown-item-icon"></i>
                                        <span class="ml-2">Make Bookmarks Restricted</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-trash-alt dropdown-item-icon"></i>
                                        <span class="ml-2">Delete Bookmarks</span>
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
                        <div class="mt-4 md:mt-8">
                            @for($i=0;$i<2;$i++)
                                <x-bookmarks-list />
                            @endfor
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
