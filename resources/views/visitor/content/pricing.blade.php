@extends('visitor.layout.visitorLayout')
@section('title','Pricing')
@section('headerExtra')
<link href="{{ asset('css/visitor.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="pricing container mx-auto p-12">
    <!-- Page Title Section -->
    <div class="text-center">
        <h2 class="page-title-primary">Pricing Plans</h2>
    </div>
    <div class="flex flex-wrap overflow-hidden lg:-mx-8 xl:-mx-8">

        <div class="w-full overflow-hidden lg:my-8 lg:px-8 lg:w-1/3 xl:my-8 xl:px-8 xl:w-1/3">
            <!-- Free Plan Content -->
            <div class="border-2 border-green-550 rounded-xl py-6 px-10">
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
<<<<<<< Updated upstream

        <div class="w-full overflow-hidden lg:my-8 lg:px-8 lg:w-1/3 xl:my-8 xl:px-8 xl:w-1/3">
=======
        <div class="w-full overflow-hidden md:h-full mt-4 md:my-4 md:px-4 md:w-1/3 lg:my-8 lg:px-8 lg:w-1/3">
>>>>>>> Stashed changes
            <!-- Premium Plan Content -->
            <div class="border-2 border-green-550 rounded-xl py-6 px-10">
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
        </div>

        <div class="w-full overflow-hidden lg:my-8 lg:px-8 lg:w-1/3 xl:my-8 xl:px-8 xl:w-1/3">
            <!-- Business Plan Content -->
            <div class="border-2 border-green-550 rounded-xl py-6 px-10">
                <h2 class="page-title-secondary text-center">
                    Business
                </h2>
                <h3 class="pricing-fee">
                    10$ Per Month
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
        </div>

    </div>
</div>
@endsection
