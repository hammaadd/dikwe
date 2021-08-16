<div>
    <!-- Title / Close-->
<div class="flex items-center justify-between p-2 md:px-4 md:mt-2">
    <h3 class="mr-3 font-bold text-gray-900 text-xl max-w-none">Add restricted users.</h3>
   
</div>
{{-- <div class="w-full px-2 md:px-5">
    @foreach($users as $user)
    <livewire:network-users :user="$user->follow" :wire:key="$user->follow->id"/>
    @endforeach
</div> --}}
<div class="bg-white rounded-xl py-5" x-data="{ tab:'following' }">
    <ul class="w-full flex overflow-y-hidden mb-3">
        <li class="tab-item" :class="{'active-network':tab==='following'}" @click="tab='following'" wire:click="refereshFollowing"><span class="total-count mr-2">{{Auth::user()->totalFollowing()}}</span>Following</li>
        <li class="tab-item" :class="{'active-network':tab==='followers'}" @click="tab='followers'"><span class="total-count mr-2">{{Auth::user()->totalFollower()}}</span>Followers</li>
        <li class="tab-item" :class="{'active-network':tab==='service'}" @click="tab='service'"><span class="total-count mr-2">{{\App\Models\User::count()}}</span>Service Users</li>
    </ul>

    {{-- This is the list of the users who is following the logged in user
        LiveWire Component
        Related to Note --}}
    <div class="w-full px-2 md:px-5" x-show="tab==='following'">
        <livewire:following-list-note :wire:key="'user-followinglist-2x4fred'"/>
    </div>

    <div class="w-full px-2 md:px-5" x-show="tab==='followers'">
        <livewire:follower-list-note :wire:key="'user-followerlist-2x4fred'"/>
    </div>

    <div class="w-full px-2 md:px-5" x-show="tab==='service'">
        <livewire:service-list-note :wire:key="'user-servicelist-2x6fred'"/>
    </div>

    <div class=" text-center md:text-right px-4 pt-4">
        <a href="{{route('network')}}" class=" font-bold text-green-550 link-hover" target="_blank">Open Network</a>
    </div>
</div>

{{-- Footer --}}
{{-- <div class="flex flex-wrap justify-between items-center">
    <a href="#" class="px-4 py-2 font-bold text-lg text-white bg-red-600 rounded-bl-xl"><i class="fas fa-arrow-left mr-2"></i>Cancel</a>
    <a href="#" class="px-4 py-2 font-bold text-lg text-white bg-green-550 rounded-br-xl">Continue<i class="fas fa-arrow-right ml-2"></i></a>
</div> --}}

{{-- <a href="#" rel="modal:close">Close</a> --}}
</div>