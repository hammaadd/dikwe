<div x-show="wsChild{{$prnt}}"
        x-transition:enter="transition transform origin-top ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition transform origin-top ease-out duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-75">
        @forelse($childs as $ch)
        <div class="w-full bg-white py-2 px-5 flex flex-wrap items-center justify-between rounded-xl" x-data="{ wsChild{{$ch->id}}: false}">
            <div class="flex flex-wrap items-center pl-2 md:pl-10">
                <label for="tag-name" title="{{$ch->title}}">
                    {{Str::limit($ch->title,13,$end = '..')}}
                </label>
            </div>
            <div class="flex flex-wrap items-center">
                <span class="count-number mx-3 text-gray-400 font-bold ">20</span>
                <button class=" bg-green-150 text-gray-400 text-sm rounded-full px-2 py-1 hover:bg-green-550 hover:text-white focus:outline-none" @click=" $dispatch('showedit') " title="Edit" wire:click="passWsId({{$ch->id}})">
                    <i class="fas fa-pen"></i>
                </button>
                <span class="text-gray-400 mx-3 py-1 hover:text-green-550 focus:outline-none cursor-pointer">
                @if($ch->children->count() > 0 )
                <i class="fas text-2xl align-middle" @click="wsChild{{$ch->id}} = !wsChild{{$ch->id}}" :class="{'fa-caret-right': !wsChild{{$ch->id}}, 'fa-caret-down':wsChild{{$ch->id}} }" wire:click="loadChilds({{$ch->id}})"></i>
                {{-- <i class="fas fa-caret-right text-2xl align-middle" @click="wsChild = {{$ch->id}}" :class="{'block': wsChild != {{$ch->id}}, 'hidden-imp':wsChild == {{$ch->id}} }" wire:click="loadChilds({{$ch->id}})"></i>
                <i class="fas fa-caret-down text-2xl align-middle" @click="wsChild = 0" :class="{'hidden-imp': wsChild != {{$ch->id}}, 'block':wsChild == {{$ch->id}} }" wire:click="loadChilds({{$ch->id}})"></i> --}}
                @endif
                </span>

            </div>
            @if($parent == $ch->id)
            @if($ch->children->count() > 0)
                <livewire:child-workspaces :childs="$ch->children" :prnt="$ch->id"/>
            @endif
            @endif
        </div>
       
        @empty

        @endforelse
        {{-- <div x-show="wsSubChild"
            x-transition:enter="transition transform origin-top ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-75"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition transform origin-top ease-out duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-75">
            <div class="w-full bg-white py-2 px-5 flex flex-wrap items-center justify-between rounded-xl">
                <div class="flex flex-wrap items-center pl-2 md:pl-10">
                    <label for="tag-name">
                        Subchild
                    </label>
                </div>
                <div class="flex flex-wrap items-center pr-2 md:pr-10">
                    <span class="count-number mx-3 text-gray-400 font-bold ">20</span>
                    <button class=" bg-green-150 text-gray-400 text-sm rounded-full px-2 py-1 hover:bg-green-550 hover:text-white focus:outline-none">
                        <i class="fas fa-pen"></i>
                    </button>
                </div>
            </div>
        </div> --}}
    </div>