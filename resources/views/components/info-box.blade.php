<div x-data="{tab:'subs'}">
    <div class=" bg-green-100 flex flex-wrap  overflow-hidden w-1/4 mx-auto rounded-l">

            <div class=" w-1/2  px-2 py-2 cursor-pointer" :class="{'active--tab':tab==='subs'}" @click="tab='subs'"><span class="bg-white rounded-full px-1 py-1">100</span>Subscribed</div>
            <div class=" w-1/2 px-2 py-2 cursor-pointer" :class="{'active--tab':tab==='followers'}" @click="tab='followers'">Followers</div>
            <div class="w-full" x-show="tab==='subs'">
            @for($i=0;$i<5;$i++)
                <x-info-box-list listName="Tag Name"/>
            @endfor
            </div>

            <div class="w-full" x-show="tab==='followers'">
                @for($i=0;$i<5;$i++)
                    <x-info-box-list listName="Follower name"/>
                @endfor
            </div>

    </div>
</div>
