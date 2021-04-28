<div class="bg-white rounded-xl py-5" x-data="{ tab:'following' }">
    <ul class="w-full flex overflow-y-hidden mb-3">
        <li class="tab-item" :class="{'active-network':tab==='following'}" @click="tab='following'"><span class="total-count mr-2">20</span>Following</li>
        <li class="tab-item" :class="{'active-network':tab==='followers'}" @click="tab='followers'"><span class="total-count mr-2">10</span>Followers</li>
        <li class="tab-item" :class="{'active-network':tab==='service'}" @click="tab='service'"><span class="total-count mr-2">60</span>Service Users</li>
    </ul>
    <div class="w-full px-2 md:px-5" x-show="tab==='following'">
        @for($i=0;$i<5;$i++)
            <x-following-list followname="Casey Ford" followcount="80"/>
        @endfor
    </div>

    <div class="w-full px-2 md:px-5" x-show="tab==='followers'">
        @for($i=0;$i<5;$i++)
            <x-followers-list followname="Martin Wood" followcount="120"/>
        @endfor
    </div>

    <div class="w-full px-2 md:px-5" x-show="tab==='service'">
        @for($i=0;$i<5;$i++)
            <x-followers-list followname="Martin Wood" followcount="120"/>
        @endfor
    </div>

    <div class=" text-center md:text-right px-4 pt-4">
        <a href="#" class=" font-bold text-green-550 link-hover">Open Network</a>
    </div>
</div>
