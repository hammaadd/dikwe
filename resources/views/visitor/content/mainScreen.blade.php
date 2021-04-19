@extends('visitor.layout.visitorLayout')
@section('title','Homepage')
@section('content')
@include('visitor.inc.homeBanner')
<div class="container mx-auto py-12">
    <!-- Page Title Section -->
    <div class="text-center">
        <h2 class="page-title-primary">DIKWE FEATURES</h2>
    </div>
    <!-- 1st Row Content-->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-4">
    @forelse($features as $feat)
        <div class="w-full">
            <!-- 1st Column Content -->
            <img src="{{asset('images/features/'.$feat->image)}}" alt="">
            <p class="font-normal font-roboto text-base 2xl:text-xl text-gray-900 text-center">
                {!!$feat->text!!}
            </p>
        </div>
    @empty
        <p>No feature to show.</p>
    @endforelse
    </div>
    <!-- Bottome Button Section -->
    <div class="text-center pt-10">
    <a href="{{ route('register') }}" class="w-max mx-auto btn-main-large">
        SIGN UP  <i class="fas fa-arrow-right ml-2"></i>
    </a>
    </div>
</div>
@endsection
