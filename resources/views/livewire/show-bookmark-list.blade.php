
    <!-- Column Content -->
    {{-- Bookmarks Section --}}

    <div class="bg-white px-2 md:px-6 pt-4 lg:pt-10 rounded-xl h-full">
        <div class=" text-right">
            {{-- <a href="{{ route('add-bookmark') }}" class="btn-main">
                <i class="fas fa-plus-circle mr-2"></i> New Bookmark
            </a> --}}
            <a href="javascript:void(0)" class="btn-main link-hover" x-on:click="$dispatch('showaddbookmark')">
                <i class="fas fa-plus-circle mr-2"></i> New Bookmark
            </a>
        </div>
        <div class="w-full flex flex-wrap justify-between relative mt-6 lg:mt-8" x-data="{ isOpen: false, fOpen: false }">
            <div class="w-full md:w-1/2 px-2 md:px-0">
                <form action="" class="flex flex-col text-center">
                    <div class="relative rounded-xl">
                        <input type="text" name="name" class="input-search" placeholder="Search Bookmark"/>
                        <button class="absolute inset-y-0 right-0 px-5 flex items-center bg-green-550 rounded-xl">
                            <span class="text-xl">
                                <i class="text-white fas fa-search"></i>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="mt-4 sm:mt-0 mx-auto md:mx-0">
                <button class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
                    <i class="fas fa-list-ul text-xl align-middle"></i>
                </button>
                <button class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
                    <i class="fas fa-th-large text-xl align-middle"></i>
                </button>
                <button @click=" fOpen = !fOpen " :class="{'text-green-550':fOpen}" class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
                    <i class="fas fa-sliders-h text-xl align-middle"></i>
                </button>
                <button @click=" isOpen = !isOpen " :class="{'text-green-550':fOpen}" class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
                    <i class="fas fa-ellipsis-h text-xl align-middle"></i>
                </button>
            </div>
            <ul
                x-show="isOpen"
                @click.away="isOpen = false"
                x-transition:enter="transition transform origin-top-right ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-75"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition transform origin-top-right ease-out duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-75"
                class="absolute bg-white shadow-md overflow-hidden rounded-xl w-72 mt-2 py-1 right-0 top-full md:right-10 md:top-10 z-20"
            >
                <li>
                    <a  class="dropdown-item link-hover" x-on:click=" isOpen = !isOpen , bshowAdd = !bshowAdd">
                        <i class="fas fa-plus-circle dropdown-item-icon"></i>
                        <span class="ml-2">Add New Bookmark Here</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-external-link-alt dropdown-item-icon"></i>
                        <span class="ml-2">Open All Bookmarks</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-share-alt dropdown-item-icon"></i>
                        <span class="ml-2">Share Bookmarks</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-tags dropdown-item-icon"></i>
                        <span class="ml-2">Tag Bookmarks</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-tag dropdown-item-icon"></i>
                        <span class="ml-2">Untag Bookmarks</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-lock dropdown-item-icon"></i>
                        <span class="ml-2">Make Bookmarks Private</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-globe-americas dropdown-item-icon"></i>
                        <span class="ml-2">Make Bookmarks Public</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users dropdown-item-icon"></i>
                        <span class="ml-2">Make Bookmarks Restricted</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-trash-alt dropdown-item-icon"></i>
                        <span class="ml-2">Delete Bookmarks</span>
                    </a>
                </li>
            </ul>
            <form action=""
                x-show="fOpen"
                @click.away="fOpen = false"
                x-transition:enter="transition transform origin-top-right ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-75"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition transform origin-top-right ease-out duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-75"
                class="absolute bg-white shadow-md overflow-hidden rounded-xl w-72 mt-2 p-5 right-0 top-full md:right-20 md:top-10 z-20">
                <p class="font-bold text-center">Filter By</p>
                <div class="flex flex-col border-b border-gray-500 py-6">
                    <label class="items-center">
                        <input type="radio" name="rate" class="h-4 w-4 text-green-550 focus:ring-0"/>
                        <span class="ml-2">
                            High Rate
                        </span>
                    </label>
                    <label class="items-center">
                        <input type="radio" name="rate" class="h-4 w-4 text-green-550 focus:ring-0"/>
                        <span class="ml-2">
                            Low Rate
                        </span>
                    </label>
                    <label class="items-center">
                        <input type="radio" name="rate" class="h-4 w-4 text-green-550 focus:ring-0"/>
                        <span class="ml-2">
                            All
                        </span>
                    </label>
                </div>
                <div class="flex flex-col border-b border-gray-500 py-6">
                    <label class="items-center">
                        <input type="radio" name="clicks" class="h-4 w-4 text-green-550 focus:ring-0"/>
                        <span class="ml-2">
                            High Number of Clicks
                        </span>
                    </label>
                    <label class="items-center">
                        <input type="radio" name="clicks" class="h-4 w-4 text-green-550 focus:ring-0"/>
                        <span class="ml-2">
                            Low Number of Clicks
                        </span>
                    </label>
                    <label class="items-center">
                        <input type="radio" name="clicks" class="h-4 w-4 text-green-550 focus:ring-0"/>
                        <span class="ml-2">
                            All
                        </span>
                    </label>
                </div>
                <div class="flex flex-col border-b border-gray-500 py-6">
                    <label class="items-center">
                        <input type="radio" name="shares" class="h-4 w-4 text-green-550 focus:ring-0"/>
                        <span class="ml-2">
                            High Number of Shares
                        </span>
                    </label>
                    <label class="items-center">
                        <input type="radio" name="shares" class="h-4 w-4 text-green-550 focus:ring-0"/>
                        <span class="ml-2">
                            Low Number of Shares
                        </span>
                    </label>
                    <label class="items-center">
                        <input type="radio" name="shares" class="h-4 w-4 text-green-550 focus:ring-0"/>
                        <span class="ml-2">
                            All
                        </span>
                    </label>
                </div>
                <div class="flex flex-col py-6">
                    <label class="items-center">
                        <input type="radio" name="time" class="h-4 w-4 text-green-550 focus:ring-0"/>
                        <span class="ml-2">
                            Newest
                        </span>
                    </label>
                    <label class="items-center">
                        <input type="radio" name="time" class="h-4 w-4 text-green-550 focus:ring-0"/>
                        <span class="ml-2">
                            Oldest
                        </span>
                    </label>
                    <label class="items-center">
                        <input type="radio" name="time" class="h-4 w-4 text-green-550 focus:ring-0"/>
                        <span class="ml-2">
                            All
                        </span>
                    </label>
                </div>
                <div class=" text-right">
                    <button @click=" fOpen = !fOpen " class="bg-gray-400 text-white font-bold px-4 py-1 mx-2 rounded-xl focus:outline-none">Cancel</button>
                    <button @click=" fOpen = !fOpen " type="submit" class="bg-green-550 text-white font-bold px-4 py-1 mx-2 rounded-xl focus:outline-none">Apply</button>
                </div>
            </form>
        </div>
        <div class="mt-4 md:mt-8">
           @foreach ($bookmarks as $bookmark)
           <div class="w-full md:w-4/5 mx-auto rounded-xl shadow-md p-2 md:p-8 mb-4 md:mb-10">
            <div class="flex flex-row justify-between relative" x-data="{ bShow: false }">
                <span class="date text-sm md:text-base">12 April 2020</span>
                <button @click=" bShow = !bShow " class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
                    <i class="fas fa-ellipsis-v text-xl align-middle"></i>
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
                        {{-- <a href="{{route('edit.bookmark',$bookmark)}}" class="dropdown-item">
                            <i class="fas fa-edit dropdown-item-icon"></i>
                            <span class="ml-2">Edit Bookmark</span>
                        </a> --}}
                        <a href="javascript:void(0)" class="dropdown-item " x-on:click="bShow = !bShow , $dispatch('showbookedit')" wire:click="editBookmark({{$bookmark->id}})">
                            <i class="fas fa-edit dropdown-item-icon"></i>
                            <span class="ml-2">Edit Bookmark</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-external-link-alt dropdown-item-icon"></i>
                            <span class="ml-2">Open Bookmark</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-share-alt dropdown-item-icon"></i>
                            <span class="ml-2">Share Bookmark</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file-export dropdown-item-icon"></i>
                            <span class="ml-2">Export Bookmark</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('delete.bookmark',$bookmark)}}" class="dropdown-item">
                            <i class="fas fa-trash-alt dropdown-item-icon"></i>
                            <span class="ml-2">Delete Bookmark</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="flex items-center justify-between py-5 border-b border-gray-300">
                <div class="flex items-center">
                    <span class="w-2/5 sm:w-1/5 lg:w-2/6 xl:w-1/5">
                        <img @if($bookmark->thumbnail) src="{{asset('book_mark_thumbnail/'.$bookmark->thumbnail)}}" @else src="{{ asset('images/Ellipse 179.png') }} @endif" class=" w-20 h-20 min-w--20 rounded-xl" alt="Microsoft Logo">
                    </span>
                    <div class="w-3/5 sm:w-4/5 lg:w-4/6 xl:w-4/5 flex pl-16 flex-col">
                        <span class="text-xl">
                            {{$bookmark->title}}
                        </span>
                        <p>
                            {{$bookmark->description}}
                            {{-- eget augue consequat occaecat sapien platea mauris. curabitur pretium elit nibh --}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="py-3">
                <label for="tage" class="font-bold inline-block">Tags</label>
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
                <div class="tags-all">
                    {{-- {{$bookmarks}} --}}
                    @foreach ($bookmark->tags as $tg)
                    {{-- <p>{{$tg->tag_name->tag}}</p> --}}
                    <span class="tag">{{$tg->tag_name->tag}}</span>
                    @endforeach
                </div>
                <label for="workspaces" class="font-bold">Workspaces</label>
                <div class="tags-all">
                    @foreach($bookmark->workspace as $ws)
                    <span class="tag">{{$ws->workspace_name->title}}</span>
                    @endforeach
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
                            <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-2 text-xl text-gray-400"><i class="fas fa-hand-point-up"></i></a><br><span class="count">12</span></li>
                            <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-2 text-xl text-green-550"><i class="fas fa-thumbs-down"></i></a><br><span class="count">2</span></li>
                            <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-2 text-xl text-green-550"><i class="fas fa-thumbs-up"></i></a><br><span class="count">20</span></li>
                            <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-2 text-xl text-green-550"><i class="fas fa-copy"></i></a><br><span class="count">15</span></li>
                            <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-2 text-xl text-green-550"><i class="fas fa-share-alt"></i></a><br><span class="count">2</span></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
           @endforeach

        </div>
    </div>

