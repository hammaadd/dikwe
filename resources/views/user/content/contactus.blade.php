@extends('user.layout.userLayout')
@section('title','Dashboard')
@section('page-title','Dashboard')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('content')
    <div class="p-5">
        @foreach($errors->all() as $error)
            <div class="col-md-12">
                <div class=" text-red-500" >
                    {{$error}}
                </div>
            </div>
            @endforeach
        <form class="w-full max-w-lg" method="post" action="{{route('user.contactus')}}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                  Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="name" name="name">
               
              </div>
              
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                  Email
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  type="email" placeholder="user@gamial.com" name="email">
               
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
              
              <div class="w-full  px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                  Type
                </label>
                <div class="relative">
                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight mb-3 focus:outline-none focus:bg-white focus:border-gray-500" name="type">
                    <option value="issue">Issues</option>
                    <option value="inquiry">inquiry</option>
                    <option value="testimony">Testimony</option>
                    <option value="feature_recommendation">Feature Recommendation</option>
                  </select>
                 
                </div>
              </div>
              <div class="w-full  px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                  Message
                </label>
                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="message" name="message" rows="6"></textarea>
              </div>
            </div>
            <button class="shadow bg-green-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                Submit
              </button>
          </form>
    </div>
@endsection
