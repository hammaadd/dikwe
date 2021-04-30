@extends('user.layout.userLayout')
@section('title','Short URL')
@section('page-title','Short URL')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('bodyExtra')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.multiple-select').select2();
        });
    </script>
@endsection
@section('content')
    <div class="p-2 md:p-5 lg:p-2 xl:p-5">
        <div class="bg-green-150 rounded-xl p-2 md:p-8 lg:p-2 xl:p-8">
            <div class="w-full lg:w-2/3 mx-auto md:px-0 bg-green-250 rounded-xl">
                <div class="flex flex-wrap justify-between relative">
                    <div class="bg-green-550 text-white font-bold px-2 md:px-8 lg:px-2 xl:px-8 py-3 br-top-left"><label for="workspace-info"><i class="fas fa-cog mr-2"></i>Short URL Info</label></div>
                    <div class="py-3 px-2 md:px-8 lg:px-2 xl:px-8 hidden sm:block">
                        <a href="#" class="link-hover text-green-550 font-bold">
                            Back To The Short URL
                        </a>
                    </div>
                </div>
                <div class="w-full flex flex-wrap overflow-hidden mt-4 md:mt-8">
                    <div class="flex-wrap overflow-hidden w-full lg:w-1/2 px-2 md:px-5 lg:px-2 xl:px-5 lg:h-full">
                        <x-su-info-form />
                    </div>
                    <div class="flex-wrap overflow-hidden w-full lg:w-1/2 px-2 md:px-5 lg:px-2 xl:px-5 lg:h-full">
                        <x-su-info-stat />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
