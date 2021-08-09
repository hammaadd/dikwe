@extends('user.layout.userLayout')
@section('title','Note - '.Str::limit($note->title,20))
@section('page-title','Note View')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @livewireStyles
@endsection
@section('openGraph_fb')
@auth
@if($note->owner->profile_img == null)
@php
    $profile_image = asset('images/logo-dikwe.png');
@endphp
@else
@php
    $profile_image = asset('user_profile_images/'.$note->owner->profile_img);
@endphp
@endif
@endauth
@guest
@php
    $profile_image = asset('images/logo-dikwe.png');
@endphp
@endguest
<meta property="og:url" content="{{route('view.note',$note->id)}}"/>
<meta property="og:type" content="article"/>
<meta property="og:title" content="{{$note->title}}"/>
<meta property="og:description" content="{{Str::limit(strip_tags($note->description),80)}}"/>
<meta property="og:image" content="{{$profile_image}}"/>
<meta property="article:author" content="{{$note->owner->name}}"/>
<meta property="profile:username" content="{{$note->owner->name}}"/>
<meta property="fb:app_id" content="995443947955637"/>
@endsection
@section('modal')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="{{asset('assets/jquery/jquery.modal.min.css')}}" />
@endsection
@section('content')
    <div class="p-2 md:p-5 lg:p-2 xl:p-5">
        <div id="ex1" class="modal">
            <livewire:share-modal/>
        </div>
        <div class="bg-green-150 rounded-xl p-2 md:p-8 lg:p-2 xl:p-8">
           
            <div class="flex flex-wrap overflow-hidden lg:-mx-4 xl:-mx-4">

                <div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3">
                    <!-- Column Content -->
                    {{-- Short URLs Section --}}
                    <div class="bg-white pb-5 rounded-xl lg:h-full mt-4 lg:mt-0">
                        <div class="flex flex-wrap justify-between relative">
                            <div class="bg-green-550 text-white font-bold px-2 md:px-8 py-1 md:py-3 br-top-left"><label for="knowledge-assets">Note # {{$note->id}}</label></div>
                            <div class="py-3 px-2 md:px-8 lg:px-2 xl:px-8 hidden sm:block">
                                <a href="{{route('notes')}}" class="link-hover text-green-550 font-bold">
                                    Back To The Notes
                                </a>
                            </div>
                        </div>
                        
                        <div class="mt-4 md:mt-8 px-2">
                            <div class="w-full md:w-11/12 mx-auto rounded-lg shadow-md mb-4 md:mb-8">
                                <div class="flex flex-col-reverse sm:flex-row justify-between relative pt-2 px-2 md:px-4">
                                    <span class="text-lg font-bold pt-2 sm:pt-0">
                                        <div class="w-4 h-4 rounded-full 
                                        @if($note->color == 'purple')
                                         bg-purple-900
                                        @elseif($note->color == 'yellow')
                                            bg-yellow-400
                                        @elseif($note->color == 'green')
                                            bg-green-550
                                        @elseif($note->color == 'blue')
                                            bg-indigo-700
                                        @else
                                            bg-indigo-700
                                        @endif inline-block mr-1"></div>{{$note->title}}</span>
                                    <div x-data="{ bShow: false }">
                                        <span class="text-sm">Last Updated <span class="time text-green-550">@if($note->updated_at == null) {{($note->created_at)->diffForHumans()}} @else {{($note->updated_at)->diffForHumans()}} @endif</span> </span>
                                        <button @click=" bShow = !bShow " class="text-green-550 sm:text-gray-400 sm:bg-green-150 sm:rounded-xl ml-2 px-2 sm:h-10 sm:w-10 float-right hover:text-green-550 focus:outline-none">
                                            <i class="fas fa-ellipsis-v text-lg align-middle"></i>
                                        </button> 
                                        <ul
                                            x-show="bShow"
                                            @click.away="bShow = false"
                                            x-transition:enter="transition transform origin-top-right ease-out duration-200"
                                            x-transition:enter-start="opacity-0 scale-75"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave="transition transform origin-top-right ease-out duration-200"
                                            x-transition:leave-start="opacity-100 scale-100"
                                            x-transition:leave-end="opacity-0 scale-75"
                                            class="absolute bg-white shadow-md overflow-hidden rounded-xl w-48 mt-2 py-1 right-0 top-10 z-20"
                                        >
                                            <li>
                                                <a href="{{route('notes',['m'=>'edit','id'=>$note->id])}}" class="dropdown-item">
                                                    <i class="fas fa-edit dropdown-item-icon"></i>
                                                    <span class="ml-2">Edit Note</span>
                                                </a>
                                            </li>
                                            {{-- <li>
                                                <a href="#" class="dropdown-item">
                                                    <i class="fas fa-share-alt dropdown-item-icon"></i>
                                                    <span class="ml-2">Share Note</span>
                                                </a>
                                            </li> --}}
                                            {{-- <li>
                                                <a href="#" class="dropdown-item">
                                                    <i class="fas fa-file-export dropdown-item-icon"></i>
                                                    <span class="ml-2">Export Note</span>
                                                </a>
                                            </li> --}}
                                            {{-- <li>
                                                <a href="#" class="dropdown-item">
                                                    <i class="fas fa-trash-alt dropdown-item-icon"></i>
                                                    <span class="ml-2">Delete Note</span>
                                                </a>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="px-2 md:px-4 py-4">
                                    <p class="notes-detail text-gray-600">
                                        {!!$note->description!!}
                                    </p>
                                    <p class="notes-source pt-3"><span class="font-bold mr-2 ">Source:</span>{{$note->source}}</p>
                                    <p class="source-url pt-3"><span class="font-bold mr-2">Source URL:</span><a href="{{$note->source_url}}" class=" hover:text-green-550" target="_blank">{{$note->source_url}}</a></p>
                                </div>
                                <div class="w-full flex flex-wrap justify-between items-start px-2 md:px-4 py-2">
                                    <div class="flex flex-col">
                                        <div class="tags">
                                            <label for="tags" class="font-bold inline-block">Tags</label>
                                            <div class="sm:inline-block sm:ml-2 pt-1 sm:pt-0">
                                                @forelse($note->tags as $tag)
                                                    <span class="tag-item">{{$tag->taga->tag}}</span>
                                                @empty
                                                    <span class="text-red-600">No tags.</span>
                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="workspaces pt-2 sm:pt-6">
                                            <label for="workspaces" class="font-bold inline-block">Workspaces</label>
                                           
                                            <div class="sm:inline-block sm:ml-2 pt-1 sm:pt-0">
                                                @forelse($note->workspace as $ws)
                                                {{-- {{print_r($ws->workspacea)}} --}}
                                                    <span class="tag-item">{{$ws->workspacea->title}}</span>
                                                @empty
                                                    <span class="text-red-600">No Workspaces.</span>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                    <livewire:note-reactions :wire:key="'list-'.$note->id" :note="$note" :type="'list'"/>
                                </div>
                                <div class="flex flex-col sm:flex-row justify-between items-center relative bg-green-150 px-2 md:px-4 py-2">
                                    <div class="flex flex-row justify-between items-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="#" class="block relative">
                                                <img alt="Image of {{$note->owner->name}}" src="
                                                @if($note->owner->profile_img == null)
                                                    https://ui-avatars.com/api/?background=2FB268&bold=true&color=FFFFFF&name={{ str_replace(' ','+' ,$note->owner->name) }}
                                                @else
                                                {{asset('user_profile_images/'.$note->owner->profile_img)}}
                                                @endif
                                                " class="mx-auto object-cover rounded-full h-8 w-8 bg-white shadow-lg"/>
                                            </a>
                                            <div class="flex flex-col">
                                                <a href="{{route('u.profile.detail',$note->owner)}}" class="font-bold link-hover">
                                                    {{$note->owner->name}} 
                                                </a>
                                                
                                            </div>
                                            {{-- <small title="Visibility">(@if($note->visibility =='P')
                                                Public
                                            @elseif($note->visibility =='PR')
                                                Private
                                            @elseif($note->visibility =='R')
                                                Restricted
                                            @else
                                                Public
                                            @endif)</small> --}}
                                        </div>
                                    </div>
                                    <span>
                                        <span class="date" title="{{$note->created_at}}">{{$note->created_at->format('d M, Y')}}</span>
                                        @if($note->visibility =='P')
                                            <span title="Public"><i class="fas fa-lock-open"></i></span>
                                        @elseif($note->visibility =='PR')
                                            <span title="Private"><i class="fas fa-lock"></i></span>
                                        @elseif($note->visibility =='R')
                                            <span title="Restricted"><i class="fas fa-user-lock"></i></span>
                                        @else
                                            <span title="Public"><i class="fas fa-lock-open"></i></span>
                                        @endif
                                        
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full overflow-hidden lg:px-4 lg:w-1/3 xl:px-4 xl:w-1/3">
                    <!-- Column Content -->
                    {{-- Skillar Section --}}
                    <div class="bg-white p-2 md:px-6 md:py-5 rounded-xl mt-4 lg:mt-0">
                        <x-skillar-banner/>
                    </div>
                    {{-- Network Section --}}
                    <div class="bg-white p-2 md:px-6 md:py-5 rounded-xl mt-4 md:mt-8">
                        <x-follow-people/>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
@livewireScripts
@endsection
