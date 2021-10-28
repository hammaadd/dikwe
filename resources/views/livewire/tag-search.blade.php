<div>
    <form action="" class="flex flex-col mx-auto text-center">
        <div class="relative rounded-xl shadow-md">
            <input type="text"  class="input-search" wire:model="search" placeholder="Search Any Open Tags"  autocomplete="off"
            wire:model.debounce.200ms="search"
            wire:keydown.escape="resetSearch"
            wire:keydown.tab="resetSearch"
            wire:keydown.enter="search"/>
            <button class="absolute inset-y-0 right-0 px-5 flex items-center bg-green-550 rounded-xl">
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

                    @forelse($rTags as $note)
                        <div class=" text-left pl-3 pt-1 flex flex-wrap">
                            <span class="font-light text-gray-600"><a x-on:click="{showEdit=true,showMain=false}" wire:click="passTagId({{$note->id}})"class="hover:text-green-550">{{$note->tag}}</a></span>
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
    </form>

</div>
