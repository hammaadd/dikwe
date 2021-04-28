@extends('visitor.layout.visitorLayout')
@section('title','Add New Password')
@section('headerExtra')
<link href="{{ asset('css/visitor.css') }}" rel="stylesheet">
<script src="{{ asset('js/alpine.min.js') }}" defer></script>
@endsection
@section('content')
    <div class="visitor container mx-auto p-4 md:py-10 md:h-screen">
        <div class="w-full md:w-3/4 lg:w-1/2 mx-auto bg-green-150 text-center rounded-xl shadow-md p-4 md:p-8">
            <h1 class="font-roboto font-bold text-gray-900 text-xl">Password Reset</h1>
            <div class="text-center my-5">
                    <p class="font-roboto text-base text-gray-900">Please enter your new password</p>
                </div>
            <form action="" class="mt-2 flex flex-col w-full md:w-9/12 max-w-md md:max-w-none mx-auto text-center">
                <div class="my-2 relative rounded-xl shadow-md" x-data="{ show: true}">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <input :type="show ? 'password' : 'text'" name="pass" class="block w-full font-roboto text-base text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Password"/>
                    <div class="absolute inset-y-0 right-0 pr-5 flex items-center">
                        <span class="text-xl">
                            <i class="text-green-550 fas fa-eye" @click="show = !show" :class="{'hidden-imp': !show, 'block':show }"></i>
                            <i class="text-green-550 fas fa-eye-slash" @click="show = !show" :class="{'block': !show, 'hidden-imp':show }"></i>
                        </span>
                    </div>
                </div>
                <div class="my-2 relative rounded-xl shadow-md" x-data="{ show: true}">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <input :type="show ? 'password' : 'text'" name="cpass" class="block w-full font-roboto text-base text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Confirm Password"/>
                    <div class="absolute inset-y-0 right-0 pr-5 flex items-center">
                        <span class="text-xl">
                            <i class="text-green-550 fas fa-eye" @click="show = !show" :class="{'hidden-imp': !show, 'block':show }"></i>
                            <i class="text-green-550 fas fa-eye-slash" @click="show = !show" :class="{'block': !show, 'hidden-imp':show }"></i>
                        </span>
                    </div>
                </div>
                <div class="text-center my-5">
                    <button type="submit" class="form-btn shadow-md">
                        CONFIRM
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
