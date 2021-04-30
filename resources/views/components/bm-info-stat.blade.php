<div class="my-5 border-b-2 border-green-150 lg:hidden"></div>
<div class="py-2" x-data="{ tab:'stat' }">
    <ul class="w-full flex overflow-y-hidden mb-3 justify-center">
        <li class="ws-tab-item bg-green-550 text-white" :class="{'ws-tab-active':tab==='stat'}" @click="tab='stat'"> <i class="far fa-chart-bar mr-2"></i> Statistics</li>
        <li class="ws-tab-item bg-lightblue-650" :class="{'ws-tab---active':tab==='access'}" @click="tab='access'"> <i class="fas fa-users mr-2"></i> Accessibility <span>16</span></li>
    </ul>
    <div class="w-full px-2" x-show="tab==='stat'">
        <x-bm-stat />
    </div>

    <div class="w-full px-2" x-show="tab==='access'">
        <x-bm-subs />
    </div>
</div>
