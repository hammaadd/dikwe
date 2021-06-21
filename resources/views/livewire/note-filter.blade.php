<div>
    <div class="relative" x-data="{ nOpen: false }">
        <button @click=" nOpen = !nOpen " class="w-full bg-green-150 px-5 py-2 rounded-xl font-bold text-left focus:outline-none hover:text-white hover:bg-green-550">
            @if($notes_set=='M')
                My Notes
            @elseif($notes_set=='S')
                Subscribed Notes
            @elseif($notes_set=='SR')
                Service Notes
            @elseif($notes_set=='N')
                Notes
            @else
                Notes
            @endif
            <i class="fas fa-angle-down float-right mt-1"></i>
        </button>
        <ul
        x-show="nOpen"
        @click.away="nOpen = false"
        x-transition:enter="transition transform origin-top ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition transform origin-top ease-out duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-75"
        class="absolute bg-white shadow overflow-hidden rounded-xl mt-2 py-1 left-0 right-0 top-0 z-20"
        >
            <li class="border-b border-green-150 @if($notes_set=='M') bg-green-550 text-white @endif" @click="nOpen = !nOpen" wire:click="notesSet('M')">
                <a href="javascript:void(0)" class="tag-filter-item">
                    <span class="ml-2">My Notes</span>
                </a>
            </li>
            <li class="border-b border-green-150 @if($notes_set=='S') bg-green-550 text-white @endif" @click="nOpen = !nOpen" wire:click="notesSet('S')">
                <a href="javascript:void(0)" class="tag-filter-item">
                    <span class="ml-2">Subscribed Notes</span>
                </a>
            </li>
            <li class="border-b border-green-150 @if($notes_set=='SR') bg-green-550 text-white @endif" @click="nOpen = !nOpen" wire:click="notesSet('SR')">
                <a href="javascript:void(0)" class="tag-filter-item">
                    <span class="ml-2">Service Notes</span>
                </a>
            </li>
            <li class="border-b border-green-150 @if($notes_set=='SR') bg-green-550 text-white @endif" @click="nOpen = !nOpen" wire:click="notesSet('SR')">
                <a href="javascript:void(0)" class="tag-filter-item">
                    <span class="ml-2">Liked Notes</span>
                </a>
            </li>
            <li class="border-b border-green-150 @if($notes_set=='SR') bg-green-550 text-white @endif" @click="nOpen = !nOpen" wire:click="notesSet('SR')">
                <a href="javascript:void(0)" class="tag-filter-item">
                    <span class="ml-2">Disliked Notes</span>
                </a>
            </li>
            <li class="border-b border-green-150 @if($notes_set=='SR') bg-green-550 text-white @endif" @click="nOpen = !nOpen" wire:click="notesSet('SR')">
                <a href="javascript:void(0)" class="tag-filter-item">
                    <span class="ml-2">Rated Notes</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="relative mt-3" x-data="{ nVisible: false }">
        <button @click=" nVisible = !nVisible " class="w-full bg-green-150 px-5 py-2 rounded-xl font-bold text-left focus:outline-none hover:text-white hover:bg-green-550">
            @if($visi_type=='A')
                All
            @elseif($visi_type=='P')
                Public
            @elseif($visi_type=='PR')
                Private
            @elseif($visi_type=='R')
                Restricted
            @else
                Visibility
            @endif <i class="fas fa-angle-down float-right mt-1"></i>
        </button>
        <ul
        x-show="nVisible"
        @click.away="nVisible = false"
        x-transition:enter="transition transform origin-top ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition transform origin-top ease-out duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-75"
        class="absolute bg-white shadow overflow-hidden rounded-xl mt-2 py-1 left-0 right-0 top-0 z-20"
        >
        <li class="border-b border-green-150">
            <a href="javascript:void(0)" class="tag-filter-item @if($visi_type=='A') bg-green-550 text-white @endif" wire:click="updateVisib('A')" @click="nVisible = false">
                <span class="ml-2">All</span>
            </a>
        </li>
        <li class="border-b border-green-150">
            <a href="javascript:void(0)" class="tag-filter-item @if($visi_type=='P') bg-green-550 text-white @endif" wire:click="updateVisib('P')" @click="nVisible = false">
                <span class="ml-2">Public</span>
            </a>
        </li>
        <li class="border-b border-green-150">
            <a href="javascript:void(0)" class="tag-filter-item @if($visi_type=='PR') bg-green-550 text-white @endif" wire:click="updateVisib('PR')" @click="nVisible = false">
                <span class="ml-2">Private</span>
            </a>
        </li>
        <li class="border-b border-green-150">
            <a href="javascript:void(0)" class="tag-filter-item @if($visi_type=='R') bg-green-550 text-white @endif" wire:click="updateVisib('R')" @click="nVisible = false">
                <span class="ml-2">Restricted</span>
            </a>
        </li>
        </ul>
    </div>
    <div class="my-5 border-b-2 border-green-150"></div>
    <div class="flex justify-between relative" x-data="{ nColor: false, nForm: false }">
        <button @click=" nColor = !nColor " class="border border-gray-400 text-gray-500 focus:outline-none rounded-lg p-1 h-8 w-12 flex items-center hover:text-green-550">
            <div class="w-5 h-5 rounded-full @if($color=='purple') bg-indigo-700 @endif
            @if($color=='green') bg-green-550 @endif
            @if($color=='blue') bg-purple-900 @endif
            @if($color=='yellow') bg-yellow-400 @endif
            @if($color=='A') @endif inline-block">@if($color=='A') All @endif</div>
            <i class="fas fa-angle-down float-right ml-2 align-middle"></i>
        </button>
        <div>
            <button @click=" nForm = !nForm " class="border border-gray-400 text-gray-500 focus:outline-none rounded-lg mx-2 px-2 h-8 w-10 hover:text-green-550">
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
            x-show="nColor"
            @click.away="nColor = false"
            x-transition:enter="transition transform origin-top ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-75"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition transform origin-top ease-out duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-75"
            class="w-12 absolute text-center border border-gray-500 rounded-lg bg-white px-1 z-10">
            <li class="border-b border-gray-400">
                <a href="javascript:void(0)" wire:click="updateColor('A')" @click="nColor = false">
                    <span class="my-1">All</span>
                </a>
            </li>
            <li class="border-b border-gray-400">
                <a href="javascript:void(0)" wire:click="updateColor('purple')" @if($color=='purple')  @endif  @click="nColor = false">
                    <div class="w-5 h-5 rounded-full bg-indigo-700 inline-block my-1 align-middle"></div>
                </a>
            </li>
            <li class="border-b border-gray-400">
                <a href="javascript:void(0)" wire:click="updateColor('green')" @if($color=='green')  @endif @click="nColor = false">
                    <div class="w-5 h-5 rounded-full bg-green-550 inline-block my-1 align-middle"></div>
                  </a>
            </li>
            <li class="border-b border-gray-400">
                <a href="javascript:void(0)" wire:click="updateColor('blue')" @if($color=='blue')  @endif @click="nColor = false">
                    <div class="w-5 h-5 rounded-full bg-purple-900 inline-block my-1 align-middle"></div>
                </a>
            </li>
            <li class="border-b border-gray-400">
                <a href="javascript:void(0)" wire:click="updateColor('yellow')" @if($color=='yellow')  @endif @click="nColor = false">
                    <div class="w-5 h-5 rounded-full bg-yellow-400 inline-block my-1 align-middle"></div>
                </a>
            </li>
        </ul>
        <form action=""
            x-show="nForm"
            @click.away="nForm = false"
            x-transition:enter="transition transform origin-top ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-75"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition transform origin-top ease-out duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-75"
            class="absolute w-full bg-white rounded-xl p-4 shadow-md z-10">
            <p class="font-bold text-center">Filter By</p>
            <div class="flex items-center justify-around border-b border-gray-500 py-6">
                <label class="inline-flex items-center">
                    <input type="radio" name="notefilter" class="h-4 w-4 text-green-550 focus:ring-0"/>
                    <span class="ml-2">
                        Used
                    </span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="notefilter" class="h-4 w-4 text-green-550 focus:ring-0"/>
                    <span class="ml-2">
                        Unused
                    </span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="notefilter" class="h-4 w-4 text-green-550 focus:ring-0"/>
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
                    <span class="block ml-2 cursor-pointer">Favourite Notes</span>
                </label>
            </div>
            <div class=" text-right">
                <button @click=" nForm = !nForm " type="button" class="bg-gray-400 text-white font-bold px-4 py-1 mx-2 rounded-xl focus:outline-none">Cancel</button>
                <button @click=" nForm = !nForm " type="submit" class="bg-green-550 text-white font-bold px-4 py-1 mx-2 rounded-xl focus:outline-none">Apply</button>
            </div>
        </form>
    </div> 
</div>