<div class="w-full pt-3" x-data="{ wsParent: false, wsChild: false, wsSubChild: false }">

<div class="my-2 rounded-xl border border-green-550" x-data="{ wsChild: false, wsSubChild: false }">
    @forelse($wrkspcs as $ws)
        <div class="w-full bg-white py-2 px-5 flex flex-wrap items-center justify-between rounded-xl">
            <div class="flex flex-wrap items-center">
                <span class=" w-3 h-3 rounded-full bg-green-550"></span>
                <label for="tag-name" class=" ml-2.5 font-bold" title="{{$ws->title}}">
                    {{Str::limit($ws->title,15,$end='...')}}
                </label>
            </div>
            <div class="flex flex-wrap items-center">
                <span class="count-number mx-3 text-gray-400 font-bold ">20</span>
                <button class=" bg-green-150 text-gray-400 text-sm rounded-full px-2 py-1 hover:bg-green-550 hover:text-white focus:outline-none" title="Edit">
                    <i class="fas fa-pen"></i>
                </button>
                <span class="text-gray-400 mx-2 py-1 hover:text-green-550 focus:outline-none cursor-pointer">
                @if($ws->children->count() > 0 )
                
                    <i class="fas text-2xl align-middle" @click="wsChild = !wsChild" :class="{'fa-caret-right': !wsChild, 'fa-caret-down':wsChild }" wire:click="loadChilds({{$ws->id}})"></i>
                    {{-- <i class="fas fa-caret-down text-2xl align-middle" @click="wsChild = !wsChild" :class="{'hidden-imp': !wsChild, 'block':wsChild }"></i> --}}
                
                @endif
            </span>
            </div>
        </div>
        @if($parent == $ws->id)
        @if($ws->children->count() > 0)
            <livewire:child-workspaces :childs="$childs"/>
        @endif
        @endif
    @empty

    @endforelse
    

</div>


</div>
