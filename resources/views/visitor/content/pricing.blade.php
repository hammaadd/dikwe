@extends('visitor.layout.visitorLayout')
@section('title','Pricing')
@section('headerExtra')
<link href="{{ asset('css/visitor.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="pricing container mx-auto p-4 md:p-10">
    <!-- Page Title Section -->
    <div class="text-center">
        <h2 class="page-title-primary">Pricing Plans</h2>
    </div>
    <div class="flex flex-wrap overflow-hidden md:-mx-4 lg:-mx-8">

       {{--<div class="w-full overflow-hidden md:h-full mt-4 md:my-4 md:px-4 md:w-1/3 lg:my-8 lg:px-8 lg:w-1/3">
            <!-- Free Plan Content -->
            <div class="border-2 border-green-550 rounded-xl max-w-sm lg:max-w-none mx-auto p-4 lg:py-6 lg:px-10">
                <h2 class="page-title-secondary text-center">
                    Free
                </h2>
                <h3 class="pricing-fee">
                    0$ Per Month
                </h3>
                <ul>
                    <li class="plan-feature"><i class="fas fa-check-double feature-icon"></i> Some Dikwe Feature</li>
                    <li class="plan-feature"><i class="fas fa-check-double feature-icon"></i> Some Dikwe Feature</li>
                    <li class="plan-feature"><i class="fas fa-check-double feature-icon"></i> Some Dikwe Feature</li>
                    <li class="plan-feature"><i class="fas fa-check-double feature-icon"></i> Some Dikwe Feature</li>
                    <li class="plan-feature"><i class="fas fa-check-double feature-icon"></i> Some Dikwe Feature</li>
                </ul>
                <div class="text-center py-5">
                    <button class="btn-main">Get Started</button>
                </div>
            </div>
        </div> 
        <div class="w-full overflow-hidden md:h-full mt-4 md:my-4 md:px-4 md:w-1/3 lg:my-8 lg:px-8 lg:w-1/3">
            <!-- Premium Plan Content -->
            <div class="border-2 border-green-550 rounded-xl max-w-sm lg:max-w-none mx-auto p-4 lg:py-6 lg:px-10">
                <h2 class="page-title-secondary text-center">
                    Premium
                </h2>
                <h3 class="pricing-fee">
                    5$ Per Month
                </h3>
                <ul>
                    <li class="plan-feature"><i class="fas fa-check-double feature-icon"></i> Some Dikwe Feature</li>
                    <li class="plan-feature"><i class="fas fa-check-double feature-icon"></i> Some Dikwe Feature</li>
                    <li class="plan-feature"><i class="fas fa-check-double feature-icon"></i> Some Dikwe Feature</li>
                    <li class="plan-feature"><i class="fas fa-check-double feature-icon"></i> Some Dikwe Feature</li>
                    <li class="plan-feature"><i class="fas fa-check-double feature-icon"></i> Some Dikwe Feature</li>
                </ul>
                <div class="text-center py-5">
                    <button class="btn-main">Try For Free</button>
                </div>
            </div>
        </div>--}}
        @foreach ($plans as $plan)
        <div class="w-full overflow-hidden md:h-full mt-4 md:my-4 md:px-4 md:w-1/3 lg:my-8 lg:px-8 lg:w-1/3">
            <!-- Business Plan Content -->
            <div class="border-2 border-green-550 rounded-xl max-w-sm lg:max-w-none mx-auto p-4 lg:py-6 lg:px-10">
                <h2 class="page-title-secondary text-center">
                   {{$plan->name}}
                </h2>
                <h3 class="pricing-fee">
                   {{$plan->amount}} Per {{$plan->type}}
                </h3>
                <ul>
                     @foreach (json_decode($plan->features) as $key=> $features)
                        <li class="plan-feature"><i class="fas fa-check-double feature-icon"></i> {{$features}}</li>
                        @endforeach
                </ul>
                <div class="text-center py-5">
                    @if($plan->amount==Null)
                        <button class="btn-main">Get Started</button>
                        @else
                        <button class="btn-main">Try For Free</button>
                        @endif
                </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
