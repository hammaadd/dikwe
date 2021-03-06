@extends('user.layout.userLayout')
@section('title','Dashboard')
@section('page-title','Dashboard')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('content')
    <div class="p-2 md:p-5 lg:p-2 xl:p-5">
        <div class="bg-green-150 rounded-xl p-2 md:p-8 lg:p-2 xl:p-8">
            <div class="flex flex-wrap overflow-hidden lg:-mx-4 xl:-mx-4">

                <div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3">
                    <!-- Column Content -->
                    <div class="md:bg-white rounded-xl px-2 md:px-8 lg:p-2 xl:p-8 py-2 md:py-4 h-full">
                        <div class="flex flex-wrap overflow-hidden lg:-mx-2 xl:-mx-2">

                            <div class="w-full overflow-hidden lg:my-4 lg:px-2 lg:w-1/2 xl:my-4 xl:px-2 xl:w-1/2">
                                <!-- Tags Column Content -->
                                <x-dashboard-tags />

                            </div>

                            <div class="w-full overflow-hidden lg:my-4 lg:px-2 lg:w-1/2 xl:my-4 xl:px-2 xl:w-1/2">
                                <!-- Workspaces Column Content -->
                                <x-dashboard-workspaces />
                            </div>

                        </div>
                        <x-dashboard-buttons/>
                    </div>
                </div>

                <div class="w-full overflow-hidden lg:px-4 lg:w-1/3 xl:px-4 xl:w-1/3">
                    <!-- Column Content -->
                    {{-- Skillar Section --}}
                    <div class="bg-white p-2 md:px-6 md:py-5 rounded-xl md:mt-4 lg:mt-0">
                        <x-skillar-banner/>
                    </div>
                    {{-- Network Section --}}
                    <div class="bg-white p-2 md:px-6 md:py-5 rounded-xl mt-4 md:mt-8">
                        <x-dashboard-network/>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
