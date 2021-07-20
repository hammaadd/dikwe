@extends('user.layout.userLayout')
@section('title','Network')
@section('page-title','Network')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @livewireStyles
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
                        <livewire:search-network/>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
@livewireScripts
@endsection
