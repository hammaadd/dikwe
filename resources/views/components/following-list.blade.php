<div class="w-full py-2 flex flex-wrap items-center justify-between rounded-xl">
    <div class="flex flex-wrap items-center">
        <div class="w-full flex items-center">
            <a href="#" class="block relative">
                <img alt="User Image" src="{{asset("images/Ellipse 179.png")}}" class="mx-auto object-cover rounded-full h-12 w-12 "/>
            </a>
            <div class="flex flex-col items-start ml-2">
                <a href="#" class="">
                    {{$followname}}
                </a>
                <span class="text-sm font-bold">
                    {{$followcount}} Followers
                </span>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap items-center">
        <button class=" bg-green-150 text-gray-400 text-sm text-center rounded-full px-2 py-1 mx-3 hover:bg-green-550 hover:text-white">
            Unfollow
        </button>
    </div>
</div>
