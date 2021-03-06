<div class="w-full py-2 flex flex-wrap items-center justify-between rounded-xl">
    <div class="flex flex-wrap items-center">
        <div class="w-full flex items-center">
            <a href="#" class="block relative">
                <img alt="User Image" src="{{asset("images/Ellipse 179.png")}}" class="mx-auto object-cover rounded-full h-12 w-12 lg:h-10 xl:h-12 lg:w-10 xl:w-12"/>
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
        <button class=" bg-green-150 text-green-550 text-sm rounded-full px-2.5 py-2 text-center hover:bg-green-550 hover:text-white">
            <i class="fas fa-user-plus"></i>
        </button>
    </div>
</div>
