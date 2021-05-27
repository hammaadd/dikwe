<div class="w-full pt-3" x-data="{ wsParent: false, wsChild: false, wsSubChild: false }">

<div class="my-2 rounded-xl border border-green-550" x-data="{ wsChild: false, wsSubChild: false }">
    @forelse($wrkspcs as $ws)
        <div class="w-full bg-white py-2 px-5 flex flex-wrap items-center justify-between rounded-xl">
            <div class="flex flex-wrap items-center">
                <span class=" w-3 h-3 rounded-full bg-green-550"></span>
                <label for="tag-name" class=" ml-2.5 font-bold" title="{{$ws->title}}">
                    {{Str::limit($ws->title,16,$end='...')}}
                </label>
            </div>
            <div class="flex flex-wrap items-center">
                <span class="count-number mx-3 text-gray-400 font-bold ">20</span>
                <button class=" bg-green-150 text-gray-400 text-sm rounded-full px-2 py-1 hover:bg-green-550 hover:text-white focus:outline-none" title="Edit">
                    <i class="fas fa-pen"></i>
                </button>
                @if($ws->children->count() > 0 )
                <span class="text-gray-400 mx-3 py-1 hover:text-green-550 focus:outline-none cursor-pointer">
                    <i class="fas fa-caret-right text-2xl align-middle" @click="wsChild = !wsChild" :class="{'block': !wsChild, 'hidden-imp':wsChild }"></i>
                    <i class="fas fa-caret-down text-2xl align-middle" @click="wsChild = !wsChild" :class="{'hidden-imp': !wsChild, 'block':wsChild }"></i>
                </span>
                @endif
            </div>
        </div>
    @empty

    @endforelse
    
    
    {{-- <livewire:child-workspaces/> --}}
</div>


</div>
