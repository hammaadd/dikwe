<h3 class=" text-lg font-bold pl-2"><i class="fas fa-folder text-green-550 pr-2"></i> WORKSPACES</h3>
<div class="bg-green-150 rounded-xl p-5 height-28" x-data="{ tab:'subscribed' }">
    <ul class="w-full flex">
        <li class="inline-block border-b pb-3 border-white w-1/2 text-center cursor-pointer" :class="{'active-tab':tab==='myws'}" @click="tab='myws'"><span class="tags-count">02</span>Your WS</li>
        <li class="inline-block border-b pb-3 border-white w-1/2 text-center cursor-pointer" :class="{'active-tab':tab==='subscribed'}" @click="tab='subscribed'"><span class="tags-count">15</span>Subscribed</li>
    </ul>
    <div class="w-full" x-show="tab==='myws'">
        @for($i=0;$i<5;$i++)
            <x-my-tags-list tagname="Root WS"/>
        @endfor
    </div>

    <div class="w-full" x-show="tab==='subscribed'">
        @for($i=0;$i<3;$i++)
            <x-sub-tags-list subtagname="WS Name"/>
        @endfor
    </div>
    <div class="text-right px-4 pt-4">
        <a href="#" class=" font-bold text-green-550 link-hover">Open All Workspaces</a>
    </div>
</div>
