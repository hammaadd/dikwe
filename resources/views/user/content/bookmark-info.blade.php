@extends('user.layout.userLayout')
@section('title','Bookmark')
@section('page-title','Bookmark')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('bodyExtra')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.multiple-select').select2(
                {
                    tags:true
                }
            );
        });
    </script>
@endsection
@section('content')
    <div class="p-2 md:p-5 lg:p-2 xl:p-5">
        <div class="bg-green-150 rounded-xl p-2 md:p-8 lg:p-2 xl:p-8">
            <div class="w-full lg:w-2/3 mx-auto md:px-0 bg-green-250 rounded-xl">
                <div class="flex flex-wrap justify-between relative">
                    <div class="bg-green-550 text-white font-bold px-2 md:px-8 lg:px-2 xl:px-8 py-3 br-top-left"><label for="workspace-info"><i class="fas fa-cog mr-2"></i>Bookmark Info</label></div>
                    <div class="py-3 px-2 md:px-8 lg:px-2 xl:px-8 hidden sm:block">
                        <a href="#" class="link-hover text-green-550 font-bold">
                            Back To The Bookmark
                        </a>
                    </div>
                </div>
                <div class="w-full flex flex-wrap overflow-hidden mt-4 md:mt-8">
                    <div class="flex-wrap overflow-hidden w-full lg:w-1/2 px-2 md:px-5 lg:px-2 xl:px-5 lg:h-full">
                        @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                        {{-- <x-bm-info-form /> --}}
                        <form method="post" action="{{route('update.bookmark',$bookmark)}}">
                            @csrf 
                            <input type="text" placeholder="Bookmark Title" class="input---field" name="title" value="{{$bookmark->title}}">
                            <input type="text" placeholder="Bookmark URL" class="input---field" name="source" value="{{$bookmark->source}}">
                            <textarea name="" id="" rows="3" placeholder="Bookmark Note" class="input---field" name="description">{{$bookmark->description}}</textarea>
                            <div class="input--field">
                                
                                <select class="multiple-select" name="tags[]" multiple="multiple">
                                    @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}" 
                                        @foreach ($tag->bookmark as $bookmarktag)
                                            @if($bookmarktag->tag==$tag->id && $bookmarktag->bookmark==$bookmark->id)
                                                selected
                                            @endif
                                        @endforeach
                                        >{{$tag->tag}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input--field">
                                <select class="multiple-select" name="workspaces[]" multiple="multiple">
                                    @foreach ($workspaces as $workspace)
                                    <option value="{{$workspace->id}}"
                                        @foreach($workspace->bookmark as $wsbmark)
                                                @if($wsbmark->workspace==$workspace->id && $wsbmark->bookmark==$bookmark->id)
                                                    selected
                                                @endif
                                        @endforeach
                                            >{{$workspace->title}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="input---field">
                                <div class="flex flex-row justify-around">
                                    <label class="items-center">
                                        <input type="radio" name="visibility" value="P" @if ($bookmark->visibility=='P')
                                            checked
                                        @endif class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="sm:ml-2">
                                            Public
                                        </span>
                                    </label>
                                    <label class="items-center ml-1 sm:ml-4">
                                        <input type="radio" name="visibility" value="R"@if ($bookmark->visibility=='R')
                                        checked
                                        @endif class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="sm:ml-2">
                                            Restricted
                                        </span>
                                    </label>
                                    <label class="items-center ml-1 sm:ml-4">
                                        <input type="radio" name="visibility" value="PR" @if ($bookmark->visibility=='PR')
                                        checked
                                        @endif class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="sm:ml-2">
                                            Private
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="flex flex-wrap overflow-hidden flex-row items-center justify-between">
                                <div class="input--f">
                                    <div class=" mx-auto">
                                        Color
                                        <div class=" inline-block ml-4">
                                            <input type="radio" name="color" class="form-checkbox text-purple-900 border-purple-900 bg-purple-900 rounded-full focus:ring-0" value="purple" @if($bookmark->color=='purple') checked @endif/>
                                            <input type="radio" name="color" class="form-checkbox text-yellow-400 border-yellow-400 bg-yellow-400 rounded-full focus:ring-0" value="yellow" @if($bookmark->color=='yellow') checked @endif/>
                                            <input type="radio" name="color" class="form-checkbox text-indigo-700 border-indigo-700 bg-indigo-700 rounded-full focus:ring-0" value="indigo" @if($bookmark->color=='indigo') checked @endif/>
                                            <input type="radio" name="color" class="form-checkbox text-green-550 border-green-550 bg-green-550 rounded-full focus:ring-0" value="gereen" @if($bookmark->color=='green') checked @endif/>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="input--field">
                                <select class="multiple-select" name="status" >
                                    
                                    <option value="active" @if($bookmark->status=='active') selected @endif>Active</option>
                                    <option value="inactive" @if($bookmark->status=='inactive') selected @endif> In Active</option>
                                   
                                </select>
                            </div>
                            <div class="text-center my-4">
                                <button class="btn-gray"><i class="far fa-trash-alt mr-2"></i>Delete</button>
                                <button type="submit" class="btn-green"><i class="far fa-save mr-2"></i>Save</button>
                            </div>

                        </form>   
                    </div>
                    <div class="flex-wrap overflow-hidden w-full lg:w-1/2 px-2 md:px-5 lg:px-2 xl:px-5 lg:h-full">
                        <x-bm-info-stat />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
