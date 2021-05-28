<div>
<div class="relative" x-data="{ wsOpen: false }">
    <button @click=" wsOpen = !wsOpen " class="w-full bg-green-150 px-5 py-2 rounded-xl font-bold text-left focus:outline-none hover:text-white hover:bg-green-550">
        Workspaces <i class="fas fa-angle-down float-right mt-1"></i>
    </button>
    <ul
    x-show="wsOpen"
    @click.away="wsOpen = false"
    x-transition:enter="transition transform origin-top ease-out duration-200"
    x-transition:enter-start="opacity-0 scale-75"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition transform origin-top ease-out duration-200"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-75"
    class="absolute bg-white shadow overflow-hidden rounded-xl mt-2 py-1 left-0 right-0 top-0 z-20"
    >
        <li class="border-b border-green-150">
            <a href="#" class="tag-filter-item">
                <span class="ml-2">My Workspaces</span>
            </a>
        </li>
        <li class="border-b border-green-150">
            <a href="#" class="tag-filter-item">
                <span class="ml-2">Subscribed Workspaces</span>
            </a>
        </li>
        <li class="border-b border-green-150">
            <a href="#" class="tag-filter-item">
                <span class="ml-2">Service Workspaces</span>
            </a>
        </li>
    </ul>
</div>
<div class="relative mt-3" x-data="{ wsVisible: false }">
    <button @click=" wsVisible = !wsVisible " class="w-full bg-green-150 px-5 py-2 rounded-xl font-bold text-left focus:outline-none hover:text-white hover:bg-green-550">
        @if($visi_type=='A')
                Visibility
            @elseif($visi_type=='P')
                Public
            @elseif($visi_type=='PR')
                Private
            @elseif($visi_type=='R')
                Restricted
            @else
                Visibility
            @endif
        <i class="fas fa-angle-down float-right mt-1"></i>
    </button>
    <ul
    x-show="wsVisible"
    @click.away="wsVisible = false"
    x-transition:enter="transition transform origin-top ease-out duration-200"
    x-transition:enter-start="opacity-0 scale-75"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition transform origin-top ease-out duration-200"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-75"
    class="absolute bg-white shadow overflow-hidden rounded-xl mt-2 py-1 left-0 right-0 top-0 z-20"
    >
    <li class="border-b border-green-150">
        <a href="javascript:void(0)" class="tag-filter-item @if($visi_type=='A') bg-green-550 text-white @endif" wire:click="updateVisib('A')" @click="wsVisible = false">
            <span class="ml-2">All</span>
        </a>
    </li>
    <li class="border-b border-green-150">
        <a href="javascript:void(0)" class="tag-filter-item @if($visi_type=='P') bg-green-550 text-white @endif" wire:click="updateVisib('P')" @click="wsVisible = false">
            <span class="ml-2">Public</span>
        </a>
    </li>
    <li class="border-b border-green-150">
        <a href="javascript:void(0)" class="tag-filter-item @if($visi_type=='PR') bg-green-550 text-white @endif" wire:click="updateVisib('PR')" @click="wsVisible = false">
            <span class="ml-2">Private</span>
        </a>
    </li>
    <li class="border-b border-green-150">
        <a href="javascript:void(0)" class="tag-filter-item @if($visi_type=='R') bg-green-550 text-white @endif" wire:click="updateVisib('R')" @click="wsVisible = false">
            <span class="ml-2">Restricted</span>
        </a>
    </li>
    </ul>
</div>
<div class="my-5 border-b-2 border-green-150"></div>
<div class="flex justify-between relative" x-data="{ wsColor: false }">
    <button @click=" wsColor = !wsColor " class="border border-gray-400 text-gray-500 focus:outline-none rounded-lg p-1 h-8 w-12 flex items-center hover:text-green-550">
        <div class="w-5 h-5 rounded-full @if($color=='purple') bg-indigo-700 @endif
            @if($color=='green') bg-green-550 @endif
            @if($color=='blue') bg-purple-900 @endif
            @if($color=='yellow') bg-yellow-400 @endif
            @if($color=='A') @endif inline-block">@if($color=='A') All @endif
        </div>
        <i class="fas fa-angle-down float-right ml-2 align-middle"></i>
    </button>
    <div>
        {{-- <button class="border border-gray-400 text-gray-500 focus:outline-none rounded-lg mx-2 px-2 h-8 w-10 hover:text-green-550">
            <i class="fas fa-caret-down text-xl align-middle"></i>
        </button> --}}
        <button class="border border-gray-400 text-gray-500 focus:outline-none rounded-lg mx-2 px-2 h-8 w-10 hover:text-green-550">
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
        x-show="wsColor"
        @click.away="wsColor = false"
        x-transition:enter="transition transform origin-top ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition transform origin-top ease-out duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-75"
        class="w-12 absolute text-center border border-gray-500 rounded-lg bg-white px-1 z-10">
        <li class="border-b border-gray-400 ">
            <a href="#" wire:click="updateColor('A')" @click="wsColor = false">
                <span class="my-1">All</span>
            </a>
        </li>
        <li class="border-b border-gray-400">
            <a href="javascript:void(0)" wire:click="updateColor('purple')" @if($color=='purple')  @endif  @click="wsColor = false">
                <div class="w-5 h-5 rounded-full bg-indigo-700 inline-block my-1 align-middle"></div>
            </a>
        </li>
        <li class="border-b border-gray-400">
            <a href="javascript:void(0)" wire:click="updateColor('green')" @if($color=='green')  @endif @click="wsColor = false">
                <div class="w-5 h-5 rounded-full bg-green-550 inline-block my-1 align-middle"></div>
              </a>
        </li>
        <li class="border-b border-gray-400">
            <a href="javascript:void(0)" wire:click="updateColor('blue')" @if($color=='blue')  @endif @click="wsColor = false">
                <div class="w-5 h-5 rounded-full bg-purple-900 inline-block my-1 align-middle"></div>
            </a>
        </li>
        <li class="border-b border-gray-400">
            <a href="javascript:void(0)" wire:click="updateColor('yellow')" @if($color=='yellow')  @endif @click="wsColor = false">
                <div class="w-5 h-5 rounded-full bg-yellow-400 inline-block my-1 align-middle"></div>
            </a>
        </li>
    </ul>
</div>
</div>