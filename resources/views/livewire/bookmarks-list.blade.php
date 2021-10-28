
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
                <a href="#" class="dropdown-item">
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
                <a href="#" class="dropdown-item">
                    <i class="fas fa-trash-alt dropdown-item-icon"></i>
                    <span class="ml-2">Delete Bookmark</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="flex items-center justify-between py-5 border-b border-gray-300">
        <div class="flex items-center">
            <span class="w-2/5 sm:w-1/5 lg:w-2/6 xl:w-1/5">
                <img src="{{ asset('images/microsoft-icon.png') }}" class=" w-20 h-20 min-w--20 rounded-xl" alt="Microsoft Logo">
            </span>
            <div class="w-3/5 sm:w-4/5 lg:w-4/6 xl:w-4/5 flex flex-col">
                <span class="text-xl">
                    Microsoft Age Extensions
                </span>
                <p>
                    eget augue consequat occaecat sapien platea mauris. curabitur pretium elit nibh
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
