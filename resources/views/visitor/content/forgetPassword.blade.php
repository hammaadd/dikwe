@extends('visitor.layout.visitorLayout')
@section('title','Reset Your Password')
@section('headerExtra')
<link href="{{ asset('css/visitor.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="visitor container mx-auto p-4 md:py-10 md:h-screen">
        <div class="w-full md:w-3/4 lg:w-1/2 mx-auto bg-green-150 text-center rounded-xl shadow-md p-4 md:p-8">
            <h1 class="font-roboto font-bold text-gray-900 text-xl">Forgot Password</h1>
            <div class="text-center my-5">
                    <p class="font-roboto text-base text-gray-900">Please enter your email to receive the confirmation code</p>
                </div>
            <form action="" class="mt-2 flex flex-col w-full md:w-9/12 max-w-md md:max-w-none mx-auto text-center">
                <div class="my-2 relative rounded-xl shadow-md">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <input type="email" name="name" id="name" class="block w-full font-roboto text-base text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Email"/>
                </div>
                <div class="text-center my-5">
                    <button type="submit" class="form-btn shadow-md">
                        CONTINUE
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
