<div class="flex flex-row flex-wrap overflow-hidden items-center">
    <a href="#" class="font-bold text-xl mx-2"><i class="fas fa-arrow-left"></i></a>
    <a href="#">
        <img src="{{ asset('images/Ellipse 179.png') }}" alt="" class=" w-12 h-12 rounded-full object-cover inline-block">
        <span class="font-bold text-lg ml-1">Martin</span>
    </a>
    <span class="font-bold text-lg text-green-550 ml-1">Tags</span>
</div>
<div class="mb-5 mt-2 border-b-2 border-green-150"></div>
<div class="flex justify-between relative" x-data="{ tagColor: false, tagForm: false }">
    <button @click=" tagColor = !tagColor " class="border border-gray-400 text-gray-500 focus:outline-none rounded-lg p-1 h-8 w-12 flex items-center hover:text-green-550">
        <div class="w-5 h-5 rounded-full bg-indigo-700 inline-block"></div>
        <i class="fas fa-angle-down float-right ml-2 align-middle"></i>
    </button>
    <div>
        <button @click=" tagForm = !tagForm " class="border border-gray-400 text-gray-500 focus:outline-none rounded-lg mx-2 px-2 h-8 w-10 hover:text-green-550">
            <i class="fas fa-sliders-h text-xl align-middle"></i>
        </button>
        <button class="border border-gray-400 text-gray-500 focus:outline-none rounded-lg mx-2 px-2 h-8 w-10 hover:text-green-550">
            <i class="fas fa-sort-alpha-down text-xl align-middle"></i>
        </button>
        <button class="border border-gray-400 text-gray-500 focus:outline-none rounded-lg mx-2 px-2 h-8 w-10 hover:text-green-550">
            <i class="fas fa-sort-numeric-down text-xl align-middle"></i>
        </button>
    </div>
    <ul
        x-show="tagColor"
        @click.away="tagColor = false"
        x-transition:enter="transition transform origin-top ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition transform origin-top ease-out duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-75"
        class="w-12 absolute text-center border border-gray-500 rounded-lg bg-white px-1">
        <li class="border-b border-gray-400">
            <a href="#">
                <span class="my-1">All</span>
            </a>
        </li>
        <li class="border-b border-gray-400">
            <a href="#">
                <div class="w-5 h-5 rounded-full bg-indigo-700 inline-block my-1 align-middle"></div>
            </a>
        </li>
        <li class="border-b border-gray-400">
            <a href="#">
                <div class="w-5 h-5 rounded-full bg-green-550 inline-block my-1 align-middle"></div>
            </a>
        </li>
        <li class="border-b border-gray-400">
            <a href="#">
                <div class="w-5 h-5 rounded-full bg-purple-900 inline-block my-1 align-middle"></div>
            </a>
        </li>
        <li class="border-b border-gray-400">
            <a href="#">
                <div class="w-5 h-5 rounded-full bg-yellow-400 inline-block my-1 align-middle"></div>
            </a>
        </li>
    </ul>
    <form action=""
        x-show="tagForm"
        @click.away="tagForm = false"
        x-transition:enter="transition transform origin-top ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition transform origin-top ease-out duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-75"
        class="absolute w-full bg-white rounded-xl p-4 shadow-md">
        <p class="font-bold text-center">Filter By</p>
        <div class="flex items-center justify-around border-b border-gray-500 py-6">
            <label class="inline-flex items-center">
                <input type="radio" name="tagfilter" class="h-4 w-4 text-green-550 focus:ring-0"/>
                <span class="ml-2">
                    Used
                </span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" name="tagfilter" class="h-4 w-4 text-green-550 focus:ring-0"/>
                <span class="ml-2">
                    Unused
                </span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" name="tagfilter" class="h-4 w-4 text-green-550 focus:ring-0"/>
                <span class="ml-2">
                    All
                </span>
            </label>
        </div>
        <div class="py-6 border-b border-gray-500">
            <p class="pb-3">Colors</p>
            <input type="checkbox" class="form-checkbox text-purple-900 border-purple-900 bg-purple-900 rounded-full focus:ring-0" />
            <input type="checkbox" class="form-checkbox text-yellow-400 border-yellow-400 bg-yellow-400 rounded-full focus:ring-0" />
            <input type="checkbox" class="form-checkbox text-indigo-700 border-indigo-700 bg-indigo-700 rounded-full focus:ring-0" />
            <input type="checkbox" class="form-checkbox text-green-550 border-green-550 bg-green-550 rounded-full focus:ring-0" />
        </div>
        <div class="py-6">
            <label class="flex items-center">
                <input type="checkbox" class="form-checkbox text-green-550 border-green-550 focus:ring-0" />
                <span class="block ml-2 cursor-pointer">Favourite Tags</span>
            </label>
        </div>
        <div class=" text-right">
            <button @click=" tagForm = !tagForm " class="bg-gray-400 text-white font-bold px-4 py-1 mx-2 rounded-xl focus:outline-none">Cancel</button>
            <button @click=" tagForm = !tagForm " type="submit" class="bg-green-550 text-white font-bold px-4 py-1 mx-2 rounded-xl focus:outline-none">Apply</button>
        </div>
    </form>
</div>
