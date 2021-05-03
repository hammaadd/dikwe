@extends('user.layout.userLayout')
@section('title','Create Tag')
@section('page-title','Create Tag')
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
        <form class="w-full max-w-lg" method="post" action="{{route('store.tags')}}">
            @csrf
            <div class="w-full  px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                  Type
                </label>
                <div class="relative">
                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight mb-3 focus:outline-none focus:bg-white focus:border-gray-500" name="user_id">
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>  
                    @endforeach
                    
                </select>
                 
                </div>
              </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                  Tag
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Tag Name" name="tag">
               
              </div>
              
            </div>
            <div class="w-full  px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                  Status
                </label>
                <div class="relative">
                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight mb-3 focus:outline-none focus:bg-white focus:border-gray-500" name="status">
                    <option value="active">Active</option>  
                    <option value="inactive">In Active</option>  
                </select>
                </div>
              </div>
            <div class="flex flex-wrap -mx-3 mb-2">
              
              
              <div class="w-full  px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                  Note
                </label>
                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Note" name="note" rows="6"></textarea>
              </div>
            </div>
            <button class="shadow bg-green-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                Submit
              </button>
          </form>
    </div>
@endsection
