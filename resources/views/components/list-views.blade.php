<div class="w-full md:w-11/12 mx-auto rounded-lg shadow-md mb-4 md:mb-8">
    <div class="flex flex-col-reverse sm:flex-row justify-between relative pt-2 px-2 md:px-4">
        <span class="text-lg font-bold pt-2 sm:pt-0"><div class="w-4 h-4 rounded-full bg-indigo-700 inline-block mr-1"></div> Note Title</span>
        <div x-data="{ bShow: false }">
            <span class="text-sm">Last Updated <span class="time text-green-550">15 Minutes Ago</span> </span>
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
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-edit dropdown-item-icon"></i>
                        <span class="ml-2">Edit Note</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-share-alt dropdown-item-icon"></i>
                        <span class="ml-2">Share Note</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file-export dropdown-item-icon"></i>
                        <span class="ml-2">Export Note</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-trash-alt dropdown-item-icon"></i>
                        <span class="ml-2">Delete Note</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="w-full flex flex-wrap justify-between items-start px-2 md:px-4 py-2">
        <div class="flex flex-col">
            <div class="tags">
                <label for="tags" class="font-bold inline-block">Tags</label>
                <div class="sm:inline-block sm:ml-2 pt-1 sm:pt-0">
                    <span class="tag-item">Demo</span>
                    <span class="tag-item">Tag</span>
                    <span class="tag-item">Another Tag</span>
                </div>
            </div>
            <div class="workspaces pt-2 sm:pt-6">
                <label for="workspaces" class="font-bold inline-block">Workspaces</label>
                <div class="sm:inline-block sm:ml-2 pt-1 sm:pt-0">
                    <span class="tag-item">Root WS</span>
                    <span class="tag-item">Demo WS</span>
                    <span class="tag-item">Workspace</span>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap flex-row-reverse sm:flex-col items-center sm:items-end justify-between w-full sm:w-auto">
            <div class="rating mb-0">
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
            <ul class="pt-2">
                <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-1 text-lg text-gray-400"><i class="fas fa-hand-point-up"></i></a><br><span class="count text-sm">12</span></li>
                <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-1 text-lg text-green-550"><i class="fas fa-thumbs-down"></i></a><br><span class="count text-sm">2</span></li>
                <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-1 text-lg text-green-550"><i class="fas fa-thumbs-up"></i></a><br><span class="count text-sm">20</span></li>
                <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-1 text-lg text-green-550"><i class="fas fa-copy"></i></a><br><span class="count text-sm">15</span></li>
                <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-1 text-lg text-green-550"><i class="fas fa-share-alt"></i></a><br><span class="count text-sm">2</span></li>
            </ul>
        </div>
    </div>
    <div class="flex flex-col sm:flex-row justify-between items-center relative bg-green-150 px-2 md:px-4 py-2">
        <div class="flex flex-row justify-between items-center">
            <div class="flex items-center justify-center space-x-2">
                <a href="#" class="block relative">
                    <img alt="User Image" src="{{ asset('images/Ellipse 179.png') }}" class="mx-auto object-cover rounded-full h-8 w-8 "/>
                </a>
                <div class="flex flex-col">
                    <a href="#" class="font-bold link-hover">
                        Robert Stewart
                    </a>
                </div>
            </div>
            <span class="date text-sm ml-3">12 April, 2020</span>
        </div>
        <a href="#" class="btn-read-more">Read More</a>
    </div>
</div>
