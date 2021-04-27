@extends('visitor.layout.visitorLayout')
@section('title','Search Result Page')
@section('headerExtra')
<link href="{{ asset('css/visitor.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection

@section('content')
    <div class="container mx-auto">
        <div class="w-full md:w-3/4 lg:w-1/2 mx-auto p-4 md:px-10 md:py-10">
            <form action="" class="flex flex-col mx-auto text-center">
                <div class="relative rounded-xl shadow-md">
                    <input type="text" name="name" class="input-search" placeholder="Dikwe.com/shorturl"/>
                    <button class="absolute inset-y-0 right-0 px-5 flex items-center bg-green-550 rounded-xl">
                        <span class="text-xl">
                            <i class="text-white fas fa-search"></i>
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <div class="w-full md:w-3/4 lg:w-1/2 mx-auto px-4 md:px-0">
            <div class="result w-full rounded-xl shadow-md p-4 md:p-8 mb-4 md:mb-10">
                <span class="date text-sm md:text-base">12 April 2020</span>
                <div class="flex items-center justify-between py-5 border-b-2 border-gray-300">
                    <div class="flex items-center">
                        <span class="rounded-xl relative bg-green-150">
                            <img src="{{ asset('images/microsoft-icon.png') }}" class=" w-16 h-16 min-w--16 rounded-xl" alt="Microsoft Logo">
                        </span>
                        <div class="flex flex-col">
                            <span class="text-xl ml-6">
                                Microsoft Age Extensions
                            </span>
                        </div>
                    </div>
                </div>
                <div class="py-3">
                    <label for="destination-url" class="font-bold inline-block">Destination URL <i class="copy-clipboard fas fa-copy"></i></label>
                    <div class="rating inline-block float-right">
                        <input type="radio" name="rate" id="rate-5">
                        <label for="rate-5" class="fas fa-star"></label>
                        <input type="radio" name="rate" id="rate-4">
                        <label for="rate-4" class="fas fa-star"></label>
                        <input type="radio" name="rate" id="rate-3">
                        <label for="rate-3" class="fas fa-star"></label>
                        <input type="radio" name="rate" id="rate-2">
                        <label for="rate-2" class="fas fa-star"></label>
                        <input type="radio" name="rate" id="rate-1">
                        <label for="rate-1" class="fas fa-star"></label>
                    </div>
                    <p class="py-2 break-words">https://docs.google.com/document/d/1CO0xI3sul8PU5kKQyx8nVpiVCAfsG9Q/edit#heading=h.32hioqz</p>
                    <label for="short-url" class="font-bold">Short URL <i class="copy-clipboard fas fa-copy"></i></label>
                    <p class="py-2 break-words">Dikwe.com/shorturl</p>
                    <label for="tags" class="font-bold">Tags</label>
                    <div class="tags-all">
                        <span class="tag">Demo</span>
                        <span class="tag">Another Tag</span>
                        <span class="tag">Another Tag</span>
                        <span class="tag">Tag</span>
                    </div>
                    <label for="workspaces" class="font-bold">Workspaces</label>
                    <div class="tags-all">
                        <span class="tag">Root WS</span>
                        <span class="tag">Demo WS</span>
                        <span class="tag">Workspace</span>
                    </div>
                    <div class="mt-4">
                        <div class="block sm:inline-block">
                            <div class="flex items-center justify-center space-x-2">
                                <a href="#" class="block relative">
                                    <img alt="User Image" src="{{ asset('images/Ellipse 179.png') }}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                </a>
                                <div class="flex flex-col">
                                    <a href="#" class="font-bold ml-1 link-hover">
                                        Robert Stewart
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="block sm:inline-block text-center mt-4 sm:mt-0 sm:float-right">
                            <ul class="">
                                <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-2 text-xl text-green-550"><i class="fas fa-hand-point-up"></i></a><br><span class="count">12</span></li>
                                <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-2 text-xl text-green-550"><i class="fas fa-copy"></i></a><br><span class="count">15</span></li>
                                <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-2 text-xl text-green-550"><i class="fas fa-share-alt"></i></a><br><span class="count">2</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mb-4 md:mb-10">
            <a href="#" class="font-bold text-green-550 border-b-2 border-green-550">
                Join Now & Browse Thousands Of Knowledge Assets
            </a>
        </div>
    </div>
@endsection
