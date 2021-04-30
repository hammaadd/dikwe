<div class="bg-yellow-350 p-2 sm:p-4 lg:h-full rounded-xl">
    <div class="py-2" x-data="{ tab:'viewer' }">
        <ul class="w-full flex overflow-y-hidden justify-center mb-3">
            <li class="auth-item" :class="{'auth-active':tab==='viewer'}" @click="tab='viewer'"><span class="total--count">30</span>Viewers</li>
            <li class="auth-item" :class="{'auth-active':tab==='contributor'}" @click="tab='contributor'"><span class="total--count">20</span>Contributors</li>
        </ul>
        <div class="w-full px-2" x-show="tab==='viewer'">
            <div class="w-full mx-auto">
                <form action="" class="flex flex-col text-center">
                    <div class="relative rounded-xl">
                        <input type="text" name="name" class="input-search" placeholder="Search..."/>
                        <button class="absolute inset-y-0 right-0 px-4 flex items-center bg-green-550 rounded-xl">
                            <span class="text-xl">
                                <i class="text-white fas fa-search"></i>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            @for($i=0;$i<4;$i++)
                <x-viewers-list followname="Casey Ford" followcount="120"/>
            @endfor
        </div>

        <div class="w-full px-2" x-show="tab==='contributor'">
            <div class="w-full mx-auto">
                <form action="" class="flex flex-col text-center">
                    <div class="relative rounded-xl">
                        <input type="text" name="name" class="input-search" placeholder="Search..."/>
                        <button class="absolute inset-y-0 right-0 px-4 flex items-center bg-green-550 rounded-xl">
                            <span class="text-xl">
                                <i class="text-white fas fa-search"></i>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            @for($i=0;$i<4;$i++)
                <x-viewers-list followname="Casey Ford" followcount="120"/>
            @endfor
        </div>
    </div>
</div>
