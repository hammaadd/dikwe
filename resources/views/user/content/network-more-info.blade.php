@extends('user.layout.userLayout')
@section('title','Network More info')
@section('page-title','Network')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
@section('content')
    <div class="p-2 md:p-5 lg:p-2 xl:p-5">
        <div class="bg-green-150 rounded-xl p-2 md:p-8 lg:p-2 xl:p-8">
            <div class="flex flex-wrap overflow-hidden lg:-mx-4 xl:-mx-4">

                <div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3">
                    <div class="user-profile bg-white p-2 md:px-6 md:py-5 lg:p-2 xl:px-6 xl:py-5 rounded-xl h-full">
                        {{-- User Profile Section --}}
                        <x-more-info :user="$user"/>
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
