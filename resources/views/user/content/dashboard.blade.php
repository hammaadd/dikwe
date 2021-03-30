@extends('user.layout.userLayout')
@section('title','Dashboard')
@section('page-title','Dashboard')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('content')
    <div class="p-5">
        <div class="bg-green-150 rounded-xl p-8">
            <div class="flex flex-wrap overflow-hidden lg:-mx-4 xl:-mx-4">

                <div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3">
                    <!-- Column Content -->
                    <div class="bg-white rounded-xl px-8 py-4">
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
                    <div class="bg-white px-6 py-5 rounded-xl">
                        <x-skillar-banner/>
                    </div>
                    {{-- Network Section --}}
                    <div class="bg-white px-6 py-5 rounded-xl mt-8">
                        <x-dashboard-network/>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
