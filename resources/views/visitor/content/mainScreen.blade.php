@extends('visitor.layout.visitorLayout')
@section('title','Homepage')
@section('content')
@include('visitor.inc.homeBanner')
<div class="container mx-auto p-4 md:py-10">
    <!-- Page Title Section -->
    <div class="text-center">
        <h2 class="page-title-primary">DIKWE FEATURES</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-4">
    @forelse($features as $feat)
        <div class="w-full flex flex-col justify-between">
            <!-- 1st Column Content -->
            <img src="{{asset('images/features/'.$feat->image)}}" alt="" class=" max-h-96 mx-auto">
            <p class="font-normal font-roboto text-base 2xl:text-xl md:px-16 text-gray-900 text-center">
                Keep all your knowledge assets in the most organized way
            </p>
        </div>
        <div class="w-full flex flex-col justify-between">
            <!-- 2nd Column Content -->
            <img src="{{asset('images/Group 513.png')}}" alt="" class=" max-h-96 mx-auto">
            <p class="font-normal font-roboto text-base 2xl:text-xl md:px-16 text-gray-900 text-center">
                Save different kinds of knowledge assets, notes, files, tags, bookmarks..etc
            </p>
        </div>
        <div class="w-full flex flex-col justify-between">
            <!-- 3rd Column Content -->
            <img src="{{asset('images/Group 514.png')}}" alt="" class=" max-h-96 mx-auto">
            <p class="font-normal font-roboto text-base 2xl:text-xl md:px-16 text-gray-900 text-center">
                See other user profiles and use their knowledge
            </p>
        </div>
        <div class="w-full flex flex-col justify-between">
            <!-- 1st Column Content -->
            <img src="{{asset('images/Group 516.png')}}" alt="" class=" max-h-96 mx-auto">
            <p class="font-normal font-roboto text-base 2xl:text-xl md:px-16 text-gray-900 text-center">
                Share your knowledge assets on other platforms with everyone
            </p>
        </div>
        <div class="w-full flex flex-col justify-between">
            <!-- 2nd Column Content -->
            <img src="{{asset('images/Group 517.png')}}" alt="" class=" max-h-96 mx-auto">
            <p class="font-normal font-roboto text-base 2xl:text-xl md:px-16 text-gray-900 text-center">
                Organize your workspaces and make others contribute
            </p>
        </div>
        <div class="w-full flex flex-col justify-between">
            <!-- 3rd Column Content -->
            <img src="{{asset('images/Group 515.png')}}" alt="" class=" max-h-96 mx-auto">
            <p class="font-normal font-roboto text-base 2xl:text-xl md:px-16 text-gray-900 text-center">
                Browse assets knowledge and get thousands of tags right here
            </p>
        </div>
        <div class="w-full flex flex-col justify-between">
            <!-- 1st Column Content -->
            <img src="{{asset('images/Group 518.png')}}" alt="" class=" max-h-96 mx-auto">
            <p class="font-normal font-roboto text-base 2xl:text-xl md:px-16 text-gray-900 text-center">
                Search for any thing, and start gaining much knowledge
            </p>
        </div>
        <div class="w-full flex flex-col justify-between">
            <!-- 2nd Column Content -->
            <img src="{{asset('images/Group 519.png')}}" alt="" class=" max-h-96 mx-auto">
            <p class="font-normal font-roboto text-base 2xl:text-xl md:px-16 text-gray-900 text-center">
                Keep track of every knowledge asset statistics
            </p>
        </div>
        <div class="w-full flex flex-col justify-between">
            <!-- 3rd Column Content -->
            <img src="{{asset('images/Group 520.png')}}" alt="" class=" max-h-96 mx-auto">
            <p class="font-normal font-roboto text-base 2xl:text-xl md:px-16 text-gray-900 text-center">
                Save any knowledge assets<br>you want
                {!!$feat->text!!}
            </p>
        </div>
    @empty
        <p>No feature to show.</p>
    @endforelse
    </div>
    <!-- Bottome Button Section -->
    <div class="text-center pt-10 pb-4">
        <a href="{{ route('register') }}" class="w-max mx-auto btn-main-large">
            SIGN UP  <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
</div>
@endsection
