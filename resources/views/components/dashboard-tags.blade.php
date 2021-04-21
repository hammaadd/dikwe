<h3 class=" text-lg font-bold pl-2"><i class="fas fa-tags fa-flip-horizontal text-green-550 pl-2"></i> TAGS</h3>
<div class="bg-green-150 rounded-xl p-5 height-28" x-data="{ tab:'mytags' }">
    <ul class="w-full flex">
        <li class="inline-block border-b pb-3 border-white w-1/2 text-center cursor-pointer" :class="{'active-tab':tab==='mytags'}" @click="tab='mytags'"><span class="tags-count">120</span>Your Tags</li>
        <li class="inline-block border-b pb-3 border-white w-1/2 text-center cursor-pointer" :class="{'active-tab':tab==='subscribed'}" @click="tab='subscribed'"><span class="tags-count">60</span>Subscribed</li>
    </ul>
    <div class="w-full" x-show="tab==='mytags'">
        @for($i=0;$i<5;$i++)
            <x-my-tags-list tagname="Tag Name"/>
        @endfor
    </div>

    <div class="w-full" x-show="tab==='subscribed'">
        @for($i=0;$i<3;$i++)
            <x-sub-tags-list subtagname="Tag Name"/>
        @endfor
    </div>
    <div class="text-right px-4 pt-4">
        <a href="#" class=" font-bold text-green-550 link-hover">Open All Tags</a>
    </div>
</div>

