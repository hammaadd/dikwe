<div class="lg:px-4 lg:mb-8">
    <div class="flex flex-wrap lg:-mx-4 xl:-mx-4 bg-white rounded-xl py-2 md:py-4">
        <div class="w-full md:px-4 lg:px-4 lg:w-1/3 xl:px-4 xl:w-4/12">
            <div class="w-full px-2 md:px-0 ">

                    <div class="relative rounded-xl" >
                        <input type="text" name="search" class="input-search z-50" placeholder="Search Notes"
                        autocomplete="off"
                        wire:model.debounce.200ms="search"
                        wire:keydown.escape="resetSearch"
                        wire:keydown.tab="resetSearch"
                        wire:keydown.enter="search"
                        />
                        <button class="absolute inset-y-0 right-0 px-5 flex items-center bg-green-550 rounded-xl z-50" wire:click="search">
                            <span class="text-xl">
                                <i class="text-white fas fa-search"></i>
                            </span>
                        </button>

                        @if(!empty($search))
                        <div class="fixed top-0 bottom-0 left-0 right-0 z-10" wire:click="resetSearch"></div>
                        {{-- Search droplist starts here --}}
                            <div class="absolute bg-green-150 w-full h-100 z-50 top-full mt-2 rounded-xl shadow-md"  >
                                {{-- Check if Tags existed based on the query --}}
                                {{-- @isset($rTags) --}}
                                {{-- if the returned tags are more than 0 --}}
                                    {{-- @if($rTags->count() > 0) --}}
                                    {{-- Heading for tags in the search results --}}
                                        {{-- <h3 class="text-left pl-3 pt-3">Tags</h3>
                                        <div class=" text-left p-3 flex flex-wrap">
                                            @forelse($rTags as $rt)
                                                    <span class="font-light text-green-550 bg-white p-1 m-0.5 rounded-lg shadow-md hover:bg-green-550 hover:text-white cursor-pointer"><a href="#">{{$rt->tag}}</a></span>
                                            @empty
                                                <div class=" text-left p-3"><span class="font-light text-red-600">No tag found!</span></div>

                                            @endforelse
                                        </div>
                                    @endif
                                @endisset --}}

                                @forelse($results as $note)
                                    <div class=" text-left pl-3 pt-1 flex flex-wrap">
                                        <span class="font-light text-gray-600"><a href="{{route('view.note',$note->id)}}" class="hover:text-green-550">{{$note->title}}</a></span>
                                        @if($loop->index == count($results)-1)

                                        @else
                                        <hr class="text-white">
                                        @endif
                                    </div>
                                @empty
                                    <div class=" text-left p-3"><span class="font-light text-red-600">No result found!</span></div>
                                @endforelse
                                
                                <div class="p-3 text-right"><span class="font-light text-gray-500"><small>Press <kbd class="p-1 text-gray-600 bg-white rounded">ESC</kbd> or <kbd class="p-1 text-gray-600 bg-white rounded">TAB</kbd> to reset.</small></span></div>

                            </div>
                        {{-- Search droplist ends here --}}
                        @endif


                    </div>

            </div>
        </div>
        <div class="w-full md:w-1/2 px-2 md:pl-4 md:pr-0 pt-2 md:pt-4 lg:pt-0 lg:px-0 xl:px-4 lg:w-1/3 xl:w-5/12 flex flex-wrap">
            <div class="w-1/3 pr-2">
                <div class="relative h-full" x-data="{ nOpen: false }">
                    <button @click=" nOpen = !nOpen " class="w-full h-full bg-green-150 px-5 py-2 rounded-xl font-bold text-left focus:outline-none hover:text-white hover:bg-green-550" title="Filter By Note Type">
                        {{-- Show heading of the note type based on the condition --}}
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
                        @endif <i class="fas fa-angle-down float-right mt-1"></i>
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
                    <li class="border-b border-green-150 @if($notes_set=='SR') bg-green-550 text-white @endif" @click="nOpen = !nOpen" wire:click="notesSet('SR')">
                        <a href="javascript:void(0)" class="tag-filter-item">
                            <span class="ml-2">Service Notes</span>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
            <div class="w-1/3 px-2">
                <div class="relative h-full" x-data="{ nVisible: false }">
                    <button @click=" nVisible = !nVisible " class=" w-full h-full bg-green-150 px-5 py-2 rounded-xl font-bold text-left focus:outline-none hover:text-white hover:bg-green-550" title="Filter By Visibility">
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
                    {{-- visibility selection dropdown list --}}
                    <ul x-show="nVisible"
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
                    {{-- visibility selection dropdown list ends here --}}
                </div>
            </div>
            <div class="w-1/3 pl-2">
                <div class="relative h-full" x-data="{ nOpen: false }">
                    <button @click=" nOpen = !nOpen " class="w-full h-full bg-green-150 px-5 py-2 rounded-xl font-bold text-left focus:outline-none hover:text-white hover:bg-green-550" title="Filter By Note Type">
                        {{-- Show heading of the note type based on the condition --}}
                        @if($notes_set2=='N')
                            Notes
                        @elseif($notes_set2=='LN')
                            Liked Notes
                        @elseif($notes_set2=='DN')
                            Disliked Notes
                        @elseif($notes_set2=='FN')
                            Favorite Notes
                        @else
                            Notes
                        @endif <i class="fas fa-angle-down float-right mt-1"></i>
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
                    <li class="border-b border-green-150 @if($notes_set2=='N') bg-green-550 text-white @endif" @click="nOpen = !nOpen" wire:click="notesSet2('N')">
                        <a href="javascript:void(0)" class="tag-filter-item">
                            <span class="ml-2">Notes</span>
                        </a>
                    </li>
                    <li class="border-b border-green-150 @if($notes_set2=='LN') bg-green-550 text-white @endif" @click="nOpen = !nOpen" wire:click="notesSet2('LN')">
                        <a href="javascript:void(0)" class="tag-filter-item">
                            <span class="ml-2">Liked Notes</span>
                        </a>
                    </li>
                    <li class="border-b border-green-150 @if($notes_set2=='DN') bg-green-550 text-white @endif" @click="nOpen = !nOpen" wire:click="notesSet2('DN')">
                        <a href="javascript:void(0)" class="tag-filter-item">
                            <span class="ml-2">Disliked Notes</span>
                        </a>
                    </li>
                    <li class="border-b border-green-150 @if($notes_set2=='FN') bg-green-550 text-white @endif" @click="nOpen = !nOpen" wire:click="notesSet2('FN')">
                        <a href="javascript:void(0)" class="tag-filter-item">
                            <span class="ml-2">Favorite Notes</span>
                        </a>
                    </li>
                    {{-- <li class="border-b border-green-150 @if($notes_set=='') bg-green-550 text-white @endif" @click="nOpen = !nOpen" wire:click="notesSet('SR')">
                        <a href="javascript:void(0)" class="tag-filter-item">
                            <span class="ml-2">Rated Notes</span>
                        </a>
                    </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 md:pr-4 pt-2 md:pt-4 lg:pt-0 lg:px-4 lg:w-1/3 xl:px-4 xl:w-3/12">
            <div class="flex justify-center md:justify-end lg:justify-between xl:justify-end relative h-full" x-data="{ nColor: false, nForm: false }">
                <div class=" relative" x-data="{ nColor: false }">
                    <button @click=" nColor = !nColor " class=" bg-green-150 focus:outline-none rounded-lg p-1 mx-2 h-12 w-12 flex items-center" title="Filter By Color">
                        {{-- to display which color is selected --}}
                        <div class="w-5 h-5 rounded-full @if($color=='purple') bg-indigo-700 @endif
                        @if($color=='green') bg-green-550 @endif
                        @if($color=='blue') bg-purple-900 @endif
                        @if($color=='yellow') bg-yellow-400 @endif
                        @if($color=='A') @endif inline-block mx-auto">@if($color=='A') All @endif</div>
                    </button>

                    {{-- dropdown list of the color selection in the filters --}}
                    <ul
                        x-show="nColor"
                        @click.away="nColor = false"
                        x-transition:enter="transition transform origin-top ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition transform origin-top ease-out duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75"
                        class="w-12 absolute text-center border border-gray-500 rounded-lg left-2 top-full bg-white px-1 z-20">
                        <li class="border-b border-gray-400">
                            <a href="javascript:void(0)" wire:click="updateColor('A')" @click="nColor = false">
                                <span class="my-1">All</span>
                            </a>
                        </li>
                        <li class="border-b border-gray-400">
                            <a href="javascript:void(0)" wire:click="updateColor('purple')" @click="nColor = false">
                                <div class="w-5 h-5 rounded-full bg-indigo-700 inline-block my-1 align-middle"></div>
                            </a>
                        </li>
                        <li class="border-b border-gray-400">
                            <a href="javascript:void(0)" wire:click="updateColor('green')" @click="nColor = false">
                                <div class="w-5 h-5 rounded-full bg-green-550 inline-block my-1 align-middle"></div>
                            </a>
                        </li>
                        <li class="border-b border-gray-400">
                            <a href="javascript:void(0)" wire:click="updateColor('blue')" @click="nColor = false">
                                <div class="w-5 h-5 rounded-full bg-purple-900 inline-block my-1 align-middle"></div>
                            </a>
                        </li>
                        <li class="border-b border-gray-400">
                            <a href="javascript:void(0)" wire:click="updateColor('yellow')" @click="nColor = false">
                                <div class="w-5 h-5 rounded-full bg-yellow-400 inline-block my-1 align-middle"></div>
                            </a>
                        </li>
                    </ul>
                    {{-- color dropdown ends here --}}

                </div>
                <button @click=" nForm = !nForm " class="bg-green-150 text-green-550 focus:outline-none rounded-lg mx-2 px-2 h-12 w-12 hover:bg-green-550 hover:text-white">
                    <i class="fas fa-sliders-h text-xl align-middle"></i>
                </button>
                @if($order == false)
                    <button class="bg-green-150 text-green-550 focus:outline-none rounded-lg mx-2 px-2 h-12 w-12 hover:bg-green-550 hover:text-white" wire:click="updateOrder('f')">
                        <i class="fas fa-sort-alpha-down text-xl align-middle"></i>
                    </button>
                @elseif($order == 'DESC')
                    <button class="bg-green-550 text-white focus:outline-none rounded-lg mx-2 px-2 h-12 w-12 hover:bg-green-150 hover:text-green-550" wire:click="updateOrder('DESC')">
                        <i class="fas fa-sort-alpha-up text-xl align-middle"></i>
                    </button>
                @elseif($order == 'ASC')
                    <button class="bg-green-550 text-white focus:outline-none rounded-lg mx-2 px-2 h-12 w-12 hover:bg-green-150 hover:text-green-550" wire:click="updateOrder('ASC')">
                        <i class="fas fa-sort-alpha-down text-xl align-middle"></i>
                    </button>
                @else
                    <button class="bg-green-150 text-green-550 focus:outline-none rounded-lg mx-2 px-2 h-12 w-12 hover:bg-green-550 hover:text-white" wire:click="updateOrder('f')">
                        <i class="fas fa-sort-alpha-down text-xl align-middle"></i>
                    </button>
                @endif
                
                <button class="bg-green-150 text-green-550 focus:outline-none rounded-lg mx-2 md:ml-2 md:mr-0 lg:mx-2 px-2 h-12 w-12 hover:bg-green-550 hover:text-white">
                    <i class="fas fa-sort-numeric-down text-xl align-middle"></i>
                </button>

                {{-- <form action=""
                    x-show="nForm"
                    @click.away="nForm = false"
                    x-transition:enter="transition transform origin-top ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-75"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition transform origin-top ease-out duration-200"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-75"
                    class="absolute w-full bg-white rounded-xl top-full p-4 shadow-md z-20">
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
                        <button @click=" nForm = !nForm " class="bg-gray-400 text-white font-bold px-4 py-1 mx-2 rounded-xl focus:outline-none">Cancel</button>
                        <button @click=" nForm = !nForm " type="submit" class="bg-green-550 text-white font-bold px-4 py-1 mx-2 rounded-xl focus:outline-none">Apply</button>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
</div>
