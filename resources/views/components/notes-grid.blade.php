<div class="p-3 rounded-xl shadow-md">
    <div class="flex flex-row justify-between relative" x-data="{ bShow: false }">
        <span class="text-lg font-bold"><i class="fas fa-clipboard text-gray-400 mr-1"></i> Note Title</span>
        <button @click=" bShow = !bShow " class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
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
    <p class="px-2 py-5">
        note text note text note text note text note text note text note text note text note text
    </p>
    <div class="flex items-center md:items-start lg:items-center xl:items-start flex-col-reverse md:flex-row lg:flex-col-reverse xl:flex-row justify-between">
        <ul class="">
            <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-1 text-lg text-gray-400"><i class="fas fa-hand-point-up"></i></a><br><span class="count text-sm">12</span></li>
            <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-1 text-lg text-green-550"><i class="fas fa-thumbs-down"></i></a><br><span class="count text-sm">2</span></li>
            <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-1 text-lg text-green-550"><i class="fas fa-thumbs-up"></i></a><br><span class="count text-sm">20</span></li>
            <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-1 text-lg text-green-550"><i class="fas fa-copy"></i></a><br><span class="count text-sm">15</span></li>
            <li class="inline-block text-center"><a href="#" class=" cursor-pointer px-1 text-lg text-green-550"><i class="fas fa-share-alt"></i></a><br><span class="count text-sm">2</span></li>
        </ul>
        <div class="rating mb-4 md:mb-0 lg:mb-4 xl:mb-0">
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
    </div>
    <div class="flex flex-row justify-between items-center lg:flex-col xl:flex-row relative mt-5">
        <span class="font-bold lg:mb-4 xl:mb-0"><i class="fas fa-users-cog mr-1 text-gray-400"></i>Owned By You</span>
        <span class="date text-sm">12 April 2020</span>
    </div>
</div>
