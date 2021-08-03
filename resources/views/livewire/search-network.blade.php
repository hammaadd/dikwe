<div class="w-full lg:w-3/4 xl:w-3/4 mx-auto py-5">
    <form action=""  class="flex flex-col text-center">
        <div class="relative rounded-xl">
            <input type="text" name="search" class="input-search" placeholder="Search And Open People Profiles"
                autocomplete="off"
                wire:model.debounce.200ms="search"
            />
            <button class="absolute inset-y-0 right-0 px-5 flex items-center bg-green-550 rounded-xl" type="button">
                <span class="text-xl">
                    <i class="text-white fas fa-search"></i>
                </span>
            </button>

        </div>
    </form>


    {{-- Network user results will display here --}}
    @if(!empty($search))
        <div class="mt-2 bg-green-150 rounded-xl px-3">
            <div class="w-full flex flex-wrap items-center overflow-hidden">
                <!-- Column Content -->
                @forelse($results as $user)
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
                                <livewire:follow-unfollow-user :user="$user" :key="$user->id" />
                            </button>
                        </div>
                    </div>
                    <hr class="text-gray-500">
                @empty
                    <div class=" text-left p-3"><span class="font-light text-red-600">No result found!</span></div>
                @endforelse
            </div>
        </div>
    @else
        <div class="pt-5 text-center">
            <img class=" w-80 mx-auto" src="{{ asset('images/Group 511.png') }}" alt="">
            <p class="font-bold text-center pt-5">Feel Free To browse People's<br>Profiles And Their Knowledge<br>Assets</p>
        </div>
    @endif
</div>
