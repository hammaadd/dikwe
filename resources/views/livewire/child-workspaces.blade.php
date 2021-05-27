<div x-show="wsChild"
        x-transition:enter="transition transform origin-top ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition transform origin-top ease-out duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-75">
        @forelse($childs as $ch)
        <div class="w-full bg-white py-2 px-5 flex flex-wrap items-center justify-between rounded-xl">
            <div class="flex flex-wrap items-center pl-2 md:pl-10">
                <label for="tag-name" title="{{$ch->title}}">
                    {{Str::limit($ch->title,13,$end = '..')}}
                </label>
            </div>
            <div class="flex flex-wrap items-center">
                <span class="count-number mx-3 text-gray-400 font-bold ">20</span>
                <button class=" bg-green-150 text-gray-400 text-sm rounded-full px-2 py-1 hover:bg-green-550 hover:text-white focus:outline-none">
                    <i class="fas fa-pen"></i>
                </button>
                <span class="text-gray-400 mx-3 py-1 hover:text-green-550 focus:outline-none cursor-pointer">
                @if($ch->children->count() > 0 )
                <i class="fas text-2xl align-middle" @click="wsChild = !wsChild" :class="{'fa-caret-right': !wsChild, 'fa-caret-down':wsChild }" wire:click="loadChilds({{$ch->id}})"></i>
                    {{-- <i class="fas fa-caret-down text-2xl align-middle" @click="wsChild = !wsChild" :class="{'hidden-imp': !wsChild, 'block':wsChild }"></i> --}}
                @endif
                </span>

            </div>
        </div>
        @if($parent == $ch->id)
        @if($ch->children->count() > 0)
            <livewire:child-workspaces :childs="$ch->children"/>
        @endif
        @endif
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