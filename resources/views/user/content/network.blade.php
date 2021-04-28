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
                    <div class="bg-white p-2 md:px-6 md:py-5 lg:p-2 xl:px-6 xl:py-5 rounded-xl h-full">
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
                                    <button class="absolute inset-y-0 right-0 px-5 flex items-center bg-green-550 rounded-xl">
                                        <span class="text-xl">
                                            <i class="text-white fas fa-search"></i>
                                        </span>
                                    </button>
                                </div>
                            </form>
                            <div class="pt-5 text-center">
                                <img class=" w-80 mx-auto" src="{{ asset('images/Group 511.png') }}" alt="">
                                <p class="font-bold text-center pt-5">Feel Free To browse People's<br>Profiles And Their Knowledge<br>Assets</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
