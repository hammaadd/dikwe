@extends('user.layout.userLayout')
@section('title','Tags')
@section('page-title','Tags')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @livewireStyles
@endsection
@section('content')
    <div class="p-2 md:p-5 lg:p-2 xl:p-5">
        <div class="bg-green-150 rounded-xl p-2 md:p-8 lg:p-2 xl:p-8" x-data="{showEdit:false,showMain:true,showAdd:false, tagId:0}">
            <div class="flex flex-wrap overflow-hidden lg:-mx-4 xl:-mx-4">

                <div class="w-full overflow-hidden lg:px-4 lg:w-1/3 xl:px-4 xl:w-1/3">
                    <div class="bg-white p-2 md:px-6 md:py-5 lg:p-2 xl:px-6 xl:py-5 rounded-xl lg:h-full">
                        <livewire:tag-filters />
                            <livewire:tags-list />
                        <div class="text-center pt-5">
                            <a href="#" class="link-hover text-green-550 font-bold">Open More</a>
                        </div>
                    </div>
                </div>

                <div class="w-full overflow-hidden lg:px-4 lg:w-1/3 xl:px-4 xl:w-1/3" x-show.transition.in.duration.200ms.out.duration.50ms="showMain">
                    <!-- Column Content -->
                    {{-- Tag Section --}}
                    <div class="bg-white p-2 md:px-6 md:py-5 lg:p-2 xl:px-6 xl:py-5 rounded-xl lg:h-full mt-4 lg:mt-0">
                        <livewire:tag-search/>
                        <div class="pt-16 pb-4 text-center">
                            <img src="{{ asset('images/Mask Group 45.svg') }}" alt="">
                            <p class="font-bold text-center pt-10">No tags is opened!<br>open a tag and start browsing<br>knowledge assets ..</p>
                            {{-- <button class="mt-10 btn-main" onclick="return location='{{ route('add-tag')}}';">Create New Tag</button> --}}
                            <button class="mt-10 btn-main" @click="showMain = false" >Create New Tag</button>
                        </div>
                    </div>
                </div>

                <div class="w-full overflow-hidden lg:px-4 lg:w-1/3 xl:px-4 xl:w-1/3" x-show.transition.in.duration.200ms.out.duration.50ms="showMain">
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

                <div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3"  x-show.transition.in.duration.200ms.out.duration.50ms="!showEdit && !showMain">
                    <livewire:add-tag />
                </div>
                <div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3" x-show.transition.in.duration.200ms.out.duration.50ms="showEdit">
                    <!-- Column Content -->
                    {{-- Tag Section --}}
                    <div class=" bg-green-250 pb-5 rounded-xl lg:h-full mt-4 lg:mt-0">
                        <div class="flex flex-wrap justify-between relative">
                            <div class="bg-green-550 text-white font-bold px-2 md:px-8 lg:px-2 xl:px-8 py-3 br-top-left"><label for="workspace-info"><i class="fas fa-cog mr-2"></i>Tag Info</label></div>
                            <div class="py-3 px-2 md:px-8 lg:px-2 xl:px-8 hidden sm:block">
                                <a href="javascript:void(0)" x-on:click="showEdit= false " class="link-hover text-green-550 font-bold">
                                    Back To The Add Tag
                                </a>
                            </div>
                        </div>
                        <div class="w-full flex flex-wrap overflow-hidden mt-4 md:mt-8">
                            <div class="flex-wrap overflow-hidden w-full lg:w-1/2 px-2 md:px-5 lg:px-2 xl:px-5 lg:h-full">
                                <livewire:edit-tag />
                            </div>
                            <div class="flex-wrap overflow-hidden w-full lg:w-1/2 px-2 md:px-5 lg:px-2 xl:px-5 lg:h-full">
                                <x-tag-info-stat />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
@livewireScripts
@endsection
