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
        <form class="w-full max-w-lg" method="post" action="{{route('store.workspace')}}" enctype="multipart/form-data">
            @csrf
            <div class="w-full  px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                  Parent
                </label>
                <div class="relative">
                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight mb-3 focus:outline-none focus:bg-white focus:border-gray-500" name="parent">
                   <option value=""> Select Parent workspaces</option>
                    @foreach ($workspaces as $work)
                    <option value="{{$work->id}}">{{$work->title}}</option>  
                    @endforeach
                    
                </select>
                 
                </div>
              </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                  Title 
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Title Of the Workspace" name="title">
               
              </div>
              
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Thumbnail
                  </label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="file" name="thumbnail">
                 
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
              <div class="w-full  px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                  Visiability
                </label>
                <div class="relative">
                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight mb-3 focus:outline-none focus:bg-white focus:border-gray-500" name="visiability">
                    <option value="public">Public</option>  
                    <option value="private">Private</option>  
                    <option value="restricted">Restricted</option>  
                </select>
                </div>
              </div>
            
            <button class="shadow bg-green-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                Submit
              </button>
          </form>
    </div>
@endsection
