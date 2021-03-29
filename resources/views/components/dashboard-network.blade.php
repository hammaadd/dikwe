<h3 class=" text-lg font-bold pl-2"><i class="fas fa-users text-green-550 pr-2"></i> YOUR NETWORK</h3>
<div class="bg-white rounded-xl p-5 height-28" x-data="{ tab:'following' }">
    <ul class="w-full flex">
        <li class="inline-block border-b pb-3 border-green-150 w-1/2 text-center cursor-pointer" :class="{'active-tab':tab==='following'}" @click="tab='following'"><span class="follow-count">120</span>Following</li>
        <li class="inline-block border-b pb-3 border-green-150 w-1/2 text-center cursor-pointer" :class="{'active-tab':tab==='followers'}" @click="tab='followers'"><span class="follow-count">60</span>Followers</li>
    </ul>
    <div class="w-full" x-show="tab==='following'">
        @for($i=0;$i<5;$i++)
            <x-following-list followname="Casey Ford" followcount="80"/>
        @endfor
    </div>

    <div class="w-full" x-show="tab==='followers'">
        @for($i=0;$i<3;$i++)
            <x-followers-list followname="Martin Wood" followcount="120"/>
        @endfor
    </div>
    <div class="text-right px-4 pt-4">
        <a href="#" class=" font-bold text-green-550 link-hover">Open Network</a>
    </div>
</div>
