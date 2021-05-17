@extends('user.layout.userLayout')
@section('title','Tags')
@section('page-title','Tags')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('content')
    <div class="p-2 md:p-5 lg:p-2 xl:p-5">
        <div class="bg-green-150 rounded-xl p-2 md:p-8 lg:p-2 xl:p-8">
            <div class="flex flex-wrap overflow-hidden lg:-mx-4 xl:-mx-4">

                <div class="w-full overflow-hidden lg:px-4 lg:w-1/3 xl:px-4 xl:w-1/3">
                    <!-- Column Content -->
                    {{-- Filter Section --}}
                    <div class="bg-white p-2 md:px-6 md:py-5 lg:p-2 xl:px-6 xl:py-5 rounded-xl lg:h-full">
                        <x-tag-filters />
                        <div class="w-full pt-3">
                            @for($i=0;$i<5;$i++)
                                <x-tags-list tagname="Tag Name"/>
                            @endfor
                        </div>
                        <div class="text-center pt-5">
                            <a href="#" class="link-hover text-green-550 font-bold">Open More</a>
                        </div>
                    </div>
                </div>

                <div class="w-full overflow-hidden lg:px-4 lg:w-1/3 xl:px-4 xl:w-1/3">
                    <!-- Column Content -->
                    {{-- Tag Section --}}
                    <div class="bg-white p-2 md:px-6 md:py-5 lg:p-2 xl:px-6 xl:py-5 rounded-xl lg:h-full mt-4 lg:mt-0">
                        <form action="" class="flex flex-col mx-auto text-center">
                            <div class="relative rounded-xl shadow-md">
                                <input type="text" name="name" class="input-search" placeholder="Search Any Open Tags"/>
                                <button class="absolute inset-y-0 right-0 px-5 flex items-center bg-green-550 rounded-xl">
                                    <span class="text-xl">
                                        <i class="text-white fas fa-search"></i>
                                    </span>
                                </button>
                            </div>
                        </form>
                        <div class="pt-16 pb-4 text-center">
                            <img src="{{ asset('images/Mask Group 45.svg') }}" alt="">
                            <p class="font-bold text-center pt-10">No tags is opened!<br>open a tag and start browsing<br>knowledge assets ..</p>
                            <button class="mt-10 btn-main" onclick="return location='{{ route('add-tag')}}';">Create New Tag</button>
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
