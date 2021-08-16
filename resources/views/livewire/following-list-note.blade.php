<div class="relative">
@forelse($users as $user)
        {{-- Single view for listing users --}}
        <div class="w-full py-2 flex flex-wrap items-center justify-between rounded-xl">
            <div class="flex flex-wrap items-center">
                <div class="w-full flex items-center">
                    <a href="#" class="block relative">
                        <img alt="User Image" src="
                        @if($user->follow->profile_img == null)
                            https://ui-avatars.com/api/?background=EAF7F0&name={{ str_replace(' ','+' ,$user->follow->name) }}
                        @else
                            {{asset('user_profile_images/'.$user->follow->profile_img)}}
                        @endif
                    " class="mx-auto object-cover rounded-full h-12 w-12 lg:h-10 xl:h-12 lg:w-10 xl:w-12"/>
                    </a>
                    <div class="flex flex-col items-start ml-2">
                        <a href="{{route('u.profile.detail',$user->follow)}}" class="" target="_blank">
                            {{$user->follow->name}}
                        </a>
                        {{-- <span class="text-sm font-bold">
                            Following count Followers
                        </span> --}}
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap items-center">
                @if(in_array($user->follow->id,$addedUsers,true))
                    <button class=" bg-red-600 text-white text-sm text-center rounded-full px-2 py-1 mx-3 lg:mx-0 xl:mx-3 hover:bg-red-100 hover:text-gray-600" title="Add user to this notes restricted."
                    wire:click="removeUser({{$user->follow->id}})">
                        Remove User  <i class="fas fa-times-circle"></i>
                    </button>
                @else
                    <button class=" bg-green-550 text-white text-sm text-center rounded-full px-2 py-1 mx-3 lg:mx-0 xl:mx-3 hover:bg-green-150 hover:text-gray-600" title="Add user to this notes restricted."
                        wire:click="addUser({{$user->follow->id}})">
                        Add User  <i class="fas fa-check-circle"></i>
                    </button>
                @endif
            </div>
        </div>
        {{-- Single view ends here --}}
@empty

@endforelse
{{$users->links('vendor.livewire.tailwind')}}
<div wire:loading>
        <div class=" absolute w-full h-full bg-green-250 bg-opacity-90 top-0 grid place-items-center">
            <img src="{{ asset('assets/loader/three-dots.svg') }}" class="">
        </div>
    </div>
</div>