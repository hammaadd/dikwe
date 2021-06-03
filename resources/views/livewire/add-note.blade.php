<div class=" mt-4 md:mt-8 px-2 md:px-0">
    <div class="bg-white rounded-xl shadow-md p-2 md:p-5 w-full md:w-10/12 mx-auto">
        <div class="flex flex-row items-center relative" x-data="{ nColor: false }">
            <button @click=" nColor = !nColor " class="flex-none focus:outline-none rounded-lg p-1 h-8 w-8">
                <div class="w-4 h-4 rounded-full bg-green-550 inline-block"></div>
            </button>
            <ul
                x-show="nColor"
                @click.away="nColor = false"
                x-transition:enter="transition transform origin-top ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-75"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition transform origin-top ease-out duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-75"
                class="w-12 absolute text-center border border-gray-400 rounded-lg bg-white px-1 top-10 z-50">
                <li class="my-1 border-b border-gray-400">
                    <input type="radio" name="notecolor" class="h-4 w-4 text-purple-800 bg-purple-800 focus:ring-0 border-0"/>
                </li>
                <li class="my-1 border-b border-gray-400">
                    <input type="radio" name="notecolor" class="h-4 w-4 text-yellow-500 bg-yellow-500 focus:ring-0 border-0"/>
                </li>
                <li class="my-1 border-b border-gray-400">
                    <input type="radio" name="notecolor" class="h-4 w-4 text-green-550 bg-green-550 focus:ring-0 border-0"/>
                </li>
                <li class="my-1">
                    <input type="radio" name="notecolor" class="h-4 w-4 text-indigo-900 bg-indigo-900 focus:ring-0 border-0"/>
                </li>
            </ul>
            <input type="text" class="border-0 border-b-2 mx-3 border-gray-400 font-bold flex-grow ring-0 focus:border-green-550 focus:ring-0" placeholder="Note Title">
            {{-- <button @click=" nAdd = false " class="flex-none focus:outline-none rounded-lg p-1 h-8 w-8">
                <i class="far fa-times-circle text-gray-400"></i>
            </button> --}}
        </div>
        <div class="md:p-5">
            <textarea name="" id="" rows="5" class="border-0 ring-0 focus:border-0 focus:ring-0 w-full" placeholder="Note Body ..."></textarea>
        </div>
        <div class=" text-center md:text-right pb-2 md:pb-0">
            <button type="submit" class="bg-green-550 text-white font-bold border-2 border-green-550 px-4 py-1 mx-2 rounded-xl focus:outline-none hover:bg-white hover:text-green-550">Save</button>
            <button class="bg-green-550 text-white font-bold border-2 border-green-550 px-4 py-1 mx-2 rounded-xl focus:outline-none hover:bg-white hover:text-green-550" @click="nshowAddMore = true , nshowAdd = false ">More Info</button>
        </div>
    </div>
</div>
