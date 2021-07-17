<div class="flex flex-wrap overflow-hidden items-center">
    <div class="w-full overflow-hidden pl-5">
        <div class="block relative h-24 w-24 mx-auto">
            <img id="profileImage" alt="profile" src="
            @if($user->profile_img == null)
            https://ui-avatars.com/api/?background=EAF7F0&name={{ str_replace(' ','+' ,$user->name) }}
            @else
            {{asset('user_profile_images/'.$user->profile_img)}}
            @endif
            " class="object-cover rounded-full w-full h-full"/>
        </div>
    </div>
    <div class="w-full overflow-hidden text-center lg:text-left mt-2 md:mt-0 lg:pl-2 xl:pl-0">
        <span class="block font-bold text-2xl text-center">{{$user->name}}</span>
    </div>
</div>
<div class="mt-4 md:mt-8">
    <label for="social-links" class="md:pl-5">About</label>
    <div class="md:px-5 mt-1 mb-2 md:mb-5 user-social-links">
        <div class=" bg-green-150 rounded-xl p-2 md:p-5">
            <div class=" w-full">
                <p class="">{{$user->about}}</p>
            </div>
        </div>
    </div>
    @isset($user->country)
    <label for="social-links" class="md:pl-5">Location</label>
    <div class="md:px-5 mt-1 mb-2 md:mb-5 user-social-links">
        <div class=" bg-green-150 rounded-xl p-2 md:p-5">
            <div class=" w-full">
                <p class="">{{$user->country->country}}</p>
            </div>
        </div>
    </div>
    @endisset
    <label for="social-links" class="md:pl-5">Social Links</label>
    <div class="md:px-5 mt-1 mb-2 md:mb-5 user-social-links">
        <div class=" bg-green-150 rounded-xl p-2 md:p-5">
            @forelse($user->sociallinks as $sl)
                <div class=" w-full">
                    <p class="info-link"><i class="fab @if($sl->type == 'F') fa-facebook-f @elseif($sl->type == 'T') fa-twitter @elseif($sl->type == 'L') fa-linkedin-in @elseif($sl->type == 'O') fa-globe @endif text-green-550"></i><a href="http://{{$sl->url}}" class="pl-2 md:pl-5" target="_blank">{{$sl->url}}</a></p>
                </div>
            @empty
                <div class=" w-full">
                    <p class="info-link text-red-600">No Links Added.</p>
                </div>
            @endforelse
        </div>
    </div>
    {{-- <div class=" text-center md:text-right pb-2 md:pb-0">
        <button type="submit" class="bg-green-550 text-white border-2 border-green-550 px-4 py-1 mx-2 rounded-xl focus:outline-none hover:bg-white hover:text-green-550">Save</button>
        <button type="button" class="bg-green-550 text-white border-2 border-green-550 px-4 py-1 mx-2 rounded-xl focus:outline-none hover:bg-white hover:text-green-550">View Detailed Profile <i class="fas fa-user"></i></button>
    </div> --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:px-5 gap-5 mt-5">
        <div class="bg-green-150 px-6 py-3 rounded-xl">
            <ul>
                <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">30</span>Following</a></li>
                <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">10</span>Followers</a></li>
                <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">10</span>Service Users</a></li>
            </ul>
        </div>
        <div class="bg-green-150 px-6 py-3 rounded-xl">
            <ul>
                <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">12</span>Tags</a></li>
                <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">10</span>Workspaces</a></li>
                <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">{{$user->total_notes()}}</span>Notes</a></li>
            </ul>
        </div>
        {{-- <div class="bg-green-150 px-6 py-3 rounded-xl sm:col-span-2 sm:mx-auto">
            <ul>
                <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">10</span>Bookmarks</a></li>
                <li class="font-bold md:text-lg my-4 md:my-3 hover:text-green-550"><a href="#"><span class="stat-count">10</span>Short URLs</a></li>
            </ul>
        </div> --}}
    </div>
</div>
