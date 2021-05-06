@extends('user.layout.userLayout')
@section('title','Create Short Tag')
@section('page-title','Create Short Url ')
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
        <form class="w-full max-w-lg" method="post" action="{{route('store.url')}}">
            @csrf
            
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                  Title
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="title" type="text" placeholder="Title" name="title" required>
               
              </div>
              
            
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                     Source  Url 
                </label>
                <div class="relative">
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="url" type="url" placeholder=" url" required>
                </div>
              </div>
            </div>
            <button class="shadow bg-green-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                Submit
              </button>
          </form>
    </div>
@endsection
