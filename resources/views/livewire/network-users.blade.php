<div class="w-full py-2 flex flex-wrap items-center justify-between rounded-xl">
    <div class="flex flex-wrap items-center">
        <div class="w-full flex items-center">
            <a href="{{route('u.profile.detail',$user)}}" class="block relative">
                <img alt="User Image" src="@if($user->profile_img == null) https://ui-avatars.com/api/?background=FFFFFF&name={{ str_replace(' ','+' ,$user->name) }} @else {{asset('user_profile_images/'.$user->profile_img)}} @endif"
                class="mx-auto object-cover rounded-full h-12 w-12 lg:h-10 xl:h-12 lg:w-10 xl:w-12 border-2 border-green-550">
            </a>
            <div class="flex flex-col items-start ml-2">
                <a href="{{route('u.profile.detail',$user)}}" class="hover:text-green-550">
                    {{$user->name}}
                </a>
                <span class="text-sm font-bold">
                    <i class="fas fa-map-marker-alt"></i>@isset($user->country->country) {{$user->country->country}} @endisset
                </span>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap items-center">
        <button class=" bg-green-150 text-gray-400 text-sm text-center rounded-full px-2 py-1 mx-3 lg:mx-0 xl:mx-3 hover:bg-green-550 hover:text-white">
            {{-- <livewire:follow-unfollow-user :user="$user" :wire:key="$user->id" /> --}}
        @if(Auth::user()->isFollowing($user->id))
            <button wire:click="unfollowUser({{$user->id}})" class=" bg-green-150 text-gray-500 text-center rounded-full px-2 py-1 mx-2 border-2 border-green-150 hover:bg-green-550 hover:border-green-150 hover:text-white">Unfollow</button>
        @else
            <button wire:click="followUser({{$user->id}})" class=" bg-green-550 text-white text-center rounded-full px-2 py-1 mx-2 border-2 border-green-550 hover:bg-white hover:text-green-550">Follow</button>
        @endif
        </button>
    </div>
</div>