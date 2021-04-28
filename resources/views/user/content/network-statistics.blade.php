@extends('user.layout.userLayout')
@section('title','Network')
@section('page-title','Network')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('content')
    <div class="p-2 md:p-5 lg:p-2 xl:p-5">
        <div class="bg-green-150 rounded-xl p-2 md:p-8 lg:p-2 xl:p-8">
            <div class="flex flex-wrap overflow-hidden lg:-mx-4 xl:-mx-4">

                <div class="w-full overflow-hidden lg:px-4 lg:w-2/5 xl:px-4 xl:w-2/5">
                    <!-- Column Content -->
                    {{-- Network Section --}}
                    <div class="bg-white p-2 md:px-6 md:py-5 lg:p-2 xl:px-6 xl:py-5 rounded-xl h-full max-h-full overflow-y-scroll">
                        <x-network-group/>
                    </div>
                </div>

                <div class="w-full overflow-hidden lg:px-4 lg:w-3/5 xl:px-4 xl:w-3/5">
                    <!-- Column Content -->
                    <div class="bg-white p-2 md:px-6 md:py-5 lg:p-2 xl:px-6 xl:py-5 rounded-xl h-full mt-4 lg:mt-0">
                        <div class="w-full lg:w-3/4 xl:w-3/4 mx-auto py-5">
                            <form action="" class="flex flex-col text-center">
                                <div class="relative rounded-xl">
                                    <input type="text" name="name" class="input-search" placeholder="Search And Open People Profiles"/>
                                    <button class="absolute inset-y-0 right-0 px-4 flex items-center bg-green-550 rounded-xl">
                                        <span class="text-xl">
                                            <i class="text-white fas fa-search"></i>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="md:pt-5">
                            <div class="w-full flex flex-wrap items-center overflow-hidden ">
                                <!-- Column Content -->
                                <div class=" w-full md:w-1/5 p-3">
                                    <img src="{{asset('images/Ellipse 1792x.png')}}" alt="" class="w-1/2 sm:w-1/4 md:w-full mx-auto">
                                </div>
                                <div class="w-full md:w-4/5 flex flex-col pl-2">
                                    <div class="w-full">
                                        <span class=" w-full font-bold text-lg">Martin Wood</span>
                                        <div class="inline-block float-right">
                                            <button class=" bg-green-550 text-white text-center rounded-full px-3 py-1 mx-3 border-2 border-green-550 font-bold hover:bg-white hover:text-green-550">Follow</button>
                                            <button class=" bg-green-150 text-gray-500 text-center rounded-full px-3 py-1 mr-3 hover:bg-green-550 hover:text-white focus:outline-none"><i class="fas fa-ellipsis-v"></i></button>
                                        </div>
                                    </div>
                                    <span class=" w-full text-lg">IT Consultant</span>
                                    <div class=" w-full mt-2 md:mt-0">
                                        <span><i class="fas fa-map-marker-alt"></i> The User Location</span>
                                        <span class="ml-3"><a href="#" class="break-all"><i class="fas fa-link"></i> www.twitter.com</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right px-3">
                                <a href="#" class="text-green-550 font-bold link-hover">More Info</a>
                            </div>
                            <hr class="my-3 border-gray-400">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:px-10 gap-5 mt-5">
                                <div class="bg-green-150 px-6 py-3 rounded-xl">
                                    <ul>
                                        <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">30</span>Following</a></li>
                                        <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">10</span>Followers</a></li>
                                        <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">10</span>Service Users</a></li>
                                    </ul>
                                </div>
                                <div class="bg-green-150 px-6 py-3 rounded-xl">
                                    <ul>
                                        <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">30</span>Tags</a></li>
                                        <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">10</span>Workspaces</a></li>
                                        <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">30</span>Notes</a></li>
                                    </ul>
                                </div>
                                <div class="bg-green-150 px-6 py-3 rounded-xl sm:col-span-2 sm:mx-auto">
                                    <ul>
                                        <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">10</span>Bookmarks</a></li>
                                        <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">10</span>Short URLs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
