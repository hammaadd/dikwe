@extends('visitor.layout.visitorLayout')
@section('title','Dashboard')
@section('content')
@include('visitor.inc.homeBanner')
<div class="container mx-auto py-12">
    <!-- Page Title Section -->
    <div class="text-center">
        <h2 class="page-title-primary">DIKWE FEATURES</h2>
    </div>
    <!-- 1st Row Content-->
    <div class="flex flex-wrap overflow-hidden">
        <div class="w-full overflow-hidden lg:w-1/3 xl:w-1/3">
            <!-- 1st Column Content -->
            <img src="{{asset('images/Group 512.png')}}" alt="">
            <p class="font-normal font-roboto text-base 2xl:text-xl text-gray-900 text-center">
                Keep all your knowledge<br>assets in the most<br>organized way
            </p>
        </div>
        <div class="w-full overflow-hidden lg:w-1/3 xl:w-1/3">
            <!-- 2nd Column Content -->
            <img src="{{asset('images/Group 513.png')}}" alt="">
            <p class="font-normal font-roboto text-base 2xl:text-xl text-gray-900 text-center">
                Save different kinds of<br>knowledge assets, notes, files,<br>tags, bookmarks..etc
            </p>
        </div>
        <div class="w-full overflow-hidden lg:w-1/3 xl:w-1/3">
            <!-- 3rd Column Content -->
            <img src="{{asset('images/Group 514.png')}}" alt="">
            <p class="font-normal font-roboto text-base 2xl:text-xl text-gray-900 text-center">
                See other user profiles<br>and use their<br>knowledge
            </p>
        </div>
    </div>
    <!-- 2nd Row Content -->
    <div class="flex flex-wrap overflow-hidden">
        <div class="w-full overflow-hidden lg:w-1/3 xl:w-1/3">
            <!-- 1st Column Content -->
            <img src="{{asset('images/Group 516.png')}}" alt="">
            <p class="font-normal font-roboto text-base 2xl:text-xl text-gray-900 text-center">
                Share your knowledge<br>assets on other platforms<br>with everyone
            </p>
        </div>
        <div class="w-full overflow-hidden lg:w-1/3 xl:w-1/3">
            <!-- 2nd Column Content -->
            <img src="{{asset('images/Group 517.png')}}" alt="">
            <p class="font-normal font-roboto text-base 2xl:text-xl text-gray-900 text-center">
                Organize your<br>workspaces and make<br>others contribute
            </p>
        </div>
        <div class="w-full overflow-hidden lg:w-1/3 xl:w-1/3">
            <!-- 3rd Column Content -->
            <img src="{{asset('images/Group 515.png')}}" alt="">
            <p class="font-normal font-roboto text-base 2xl:text-xl text-gray-900 text-center">
                Browse assets knowledge<br>and get thousands of tags<br>right here
            </p>
        </div>
    </div>
    <!-- 3rd Row Content -->
    <div class="flex flex-wrap overflow-hidden">
        <div class="w-full overflow-hidden lg:w-1/3 xl:w-1/3">
            <!-- 1st Column Content -->
            <img src="{{asset('images/Group 518.png')}}" alt="">
            <p class="font-normal font-roboto text-base 2xl:text-xl text-gray-900 text-center">
                Search for any thing,<br>and start gaining much<br>knowledge
            </p>
        </div>
        <div class="w-full overflow-hidden lg:w-1/3 xl:w-1/3">
            <!-- 2nd Column Content -->
            <img src="{{asset('images/Group 519.png')}}" alt="">
            <p class="font-normal font-roboto text-base 2xl:text-xl text-gray-900 text-center">
                Keep track of every<br>knowledge asset<br>statistics
            </p>
        </div>
        <div class="w-full overflow-hidden lg:w-1/3 xl:w-1/3">
            <!-- 3rd Column Content -->
            <img src="{{asset('images/Group 520.png')}}" alt="">
            <p class="font-normal font-roboto text-base 2xl:text-xl text-gray-900 text-center">
                Save any knowledge<br>assets you want
            </p>
        </div>
    </div>
    <!-- Bottome Button Section -->
    <div class="text-center pt-10">
    <a href="#" class="w-max mx-auto btn-main">
        SIGN UP  <i class="fas fa-arrow-right ml-2"></i>
    </a>
    </div>
</div>
@endsection
