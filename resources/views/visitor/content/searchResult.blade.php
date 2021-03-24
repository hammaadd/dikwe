@extends('visitor.layout.visitorLayout')
@section('title','Search Result Page')
@section('headerExtra')
<link href="{{ asset('css/visitor.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container mx-auto py-10">
        <div class="w-full md:w-3/4 lg:w-1/2 mx-auto md:px-10 md:pb-10">
            <form action="" class="flex flex-col mx-auto text-center">
                <div class="relative rounded-xl shadow-md">
                    <input type="password" name="name" id="field-pass" class="block w-full bg-green-150 font-roboto text-base text-gray-900 rounded-xl border-0 py-3 px-8 focus:border-green-550 focus:ring-green-550" placeholder="Dikwe.com/shorturl"/>
                    <button class="absolute inset-y-0 right-0 px-5 flex items-center bg-green-550 rounded-xl">
                        <span class="text-xl">
                            <i class="text-white fas fa-search"></i>
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <div class="w-full md:w-3/4 lg:w-1/2 mx-auto rounded-xl shadow-md p-8">
            <span class="date">12 April 2020</span>
            <div class="flex items-center justify-between py-5 border-b-2 border-gray-300">
                <div class="flex items-center">
                    <span class="rounded-xl relative bg-green-150">
                        <img src="{{ asset('images/microsoft-icon.png') }}" class=" w-16 h-16 rounded-xl" alt="Microsoft Logo">
                    </span>
                    <div class="flex flex-col">
                        <span class="text-xl ml-6">
                            Microsoft Age Extensions
                        </span>
                    </div>
                </div>
            </div>
            <div>
                <label for=""></label>
            </div>
        </div>
    </div>
@endsection