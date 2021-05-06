<div class="my-5 border-b-2 border-green-150 lg:hidden"></div>
<div class="py-2" x-data="{ tab:'stat' }">
    <ul class="w-full flex overflow-y-hidden mb-3 justify-center">
        <li class="ws-tab-item bg-green-550 text-white" :class="{'ws-tab-active':tab==='stat'}" @click="tab='stat'"> <i class="far fa-chart-bar mr-2"></i> Statistics</li>
        <li class="ws-tab-item bg-lightblue-650" :class="{'ws-tab---active':tab==='subs'}" @click="tab='subs'"> <i class="fas fa-users mr-2"></i> Subscribers <span>16</span></li>
    </ul>
    <div class="w-full px-2" x-show="tab==='stat'">
        <x-nt-stats />
    </div>

    <div class="w-full px-2" x-show="tab==='subs'">
        <x-nt-subs />
    </div>
</div>
