<div class="my-2 rounded-xl border border-green-550" x-data="{ wsChild: false, wsSubChild: false }">
    <div class="w-full bg-white py-2 px-5 flex flex-wrap items-center justify-between rounded-xl">
        <div class="flex flex-wrap items-center">
            <span class=" w-3 h-3 rounded-full bg-green-550"></span>
            <label for="tag-name" class=" ml-2.5 font-bold">
                {{$wsparent}}
            </label>
        </div>
        <div class="flex flex-wrap items-center">
            <span class="count-number mx-3 text-gray-400 font-bold ">20</span>
            <button class=" bg-green-150 text-gray-400 text-sm rounded-full px-2 py-1 hover:bg-green-550 hover:text-white focus:outline-none">
                <i class="fas fa-pen"></i>
            </button>
            <span class="text-gray-400 mx-3 py-1 hover:text-green-550 focus:outline-none cursor-pointer">
                <i class="fas fa-caret-right text-2xl align-middle" @click="wsChild = !wsChild" :class="{'block': !wsChild, 'hidden-imp':wsChild }"></i>
                <i class="fas fa-caret-down text-2xl align-middle" @click="wsChild = !wsChild" :class="{'hidden-imp': !wsChild, 'block':wsChild }"></i>
            </span>
        </div>
    </div>
    <div x-show="wsChild"
        x-transition:enter="transition transform origin-top ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition transform origin-top ease-out duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-75">
        <div class="w-full bg-white py-2 px-5 flex flex-wrap items-center justify-between rounded-xl">
            <div class="flex flex-wrap items-center pl-10">
                <label for="tag-name">
                    {{$wschild}}
                </label>
            </div>
            <div class="flex flex-wrap items-center">
                <span class="count-number mx-3 text-gray-400 font-bold ">20</span>
                <button class=" bg-green-150 text-gray-400 text-sm rounded-full px-2 py-1 hover:bg-green-550 hover:text-white focus:outline-none">
                    <i class="fas fa-pen"></i>
                </button>
                <span class="text-gray-400 mx-3 py-1 hover:text-green-550 focus:outline-none cursor-pointer">
                    <i class="fas fa-caret-right text-2xl align-middle" @click="wsSubChild = !wsSubChild" :class="{'block': !wsSubChild, 'hidden-imp':wsSubChild }"></i>
                    <i class="fas fa-caret-down text-2xl align-middle" @click="wsSubChild = !wsSubChild" :class="{'hidden-imp': !wsSubChild, 'block':wsSubChild }"></i>
                </span>
            </div>
        </div>
        <div x-show="wsSubChild"
            x-transition:enter="transition transform origin-top ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-75"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition transform origin-top ease-out duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-75">
            <div class="w-full bg-white py-2 px-5 flex flex-wrap items-center justify-between rounded-xl">
                <div class="flex flex-wrap items-center pl-10">
                    <label for="tag-name">
                        {{$wssubchild}}
                    </label>
                </div>
                <div class="flex flex-wrap items-center pr-10">
                    <span class="count-number mx-3 text-gray-400 font-bold ">20</span>
                    <button class=" bg-green-150 text-gray-400 text-sm rounded-full px-2 py-1 hover:bg-green-550 hover:text-white focus:outline-none">
                        <i class="fas fa-pen"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
