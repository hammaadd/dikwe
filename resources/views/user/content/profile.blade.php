@extends('user.layout.userLayout')
@section('title','Tags')
@section('page-title','Tags')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
@section('content')
    <div class="p-5">
        <div class="bg-green-150 rounded-xl p-8">
            <div class="flex flex-wrap overflow-hidden lg:-mx-4 xl:-mx-4">

                <div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3">
                    <div class="user-profile bg-white px-6 py-5 rounded-xl h-full">
                        {{-- User Profile Section --}}
                        <x-user-profile />
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
                        <x-follow-people/>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
