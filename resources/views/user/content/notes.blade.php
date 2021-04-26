@extends('user.layout.userLayout')
@section('title','Notes')
@section('page-title','Notes')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('content')
    <div class="p-5">
        <div class="bg-green-150 rounded-xl p-8">
            <div class="flex flex-wrap overflow-hidden lg:-mx-4 xl:-mx-4">

                <div class="w-full overflow-hidden lg:px-4 lg:w-1/3 xl:px-4 xl:w-1/3">
                    <!-- Column Content -->
                    {{-- Filter Section --}}
                    <div class="bg-white px-6 py-5 rounded-xl h-full">
                        <x-note-filters />
                        <div class="w-full pt-3">
                            @for($i=0;$i<5;$i++)
                                <x-notes-list notename="Note Name"/>
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
                    <div class="bg-white px-6 py-5 rounded-xl h-full">
                        <div class="pt-6 text-center">
                            <img src="{{ asset('images/Mask Group 61.svg') }}" alt="">
                            <p class="font-bold text-center pt-10">Notebooks are Knowledge<br>Assets used to collate other<br>Assets: Notes, To<br>Do Lists ..etc</p>
                            <button class="mt-10 btn-main">Create New Note</button>
                        </div>
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
