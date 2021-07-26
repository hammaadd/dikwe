<div class="w-full lg:w-3/4 xl:w-3/4 mx-auto py-5">
    <form action="" class="flex flex-col text-center">
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
        <div class="pt-5">
            <div class="w-full flex flex-wrap items-center overflow-hidden ">
                <!-- Column Content -->
                @forelse($results as $user)
                    <div class=" w-full md:w-1/5 p-3 mt-2">
                        <img src="{{asset('images/Ellipse 1792x.png')}}" alt="" class="w-1/2 sm:w-1/4 md:w-full mx-auto">
                    </div>
                    <div class="w-full md:w-4/5 flex flex-col pl-2">
                        <div class="w-full">
                            <span class=" w-full font-bold text-lg">{{$user->name}}</span>
                            <div class="inline-block float-right">
                                <button class=" bg-green-550 text-white text-center rounded-full px-3 py-1 mx-3 border-2 border-green-550 font-bold hover:bg-white hover:text-green-550">Follow</button>
                            </div>
                        </div>
                        {{-- <span class=" w-full text-lg">IT Consultant</span> --}}
                        <div class=" w-full mt-2 md:mt-0">
                            <span><i class="fas fa-map-marker-alt"></i>@isset($user->country->country) {{$user->country->country}} @endisset</span>
                            {{-- <span class="ml-3"><a href="#" class="break-all"> </a></span> --}}
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