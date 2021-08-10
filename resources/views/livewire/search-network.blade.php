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
                    <livewire:network-users :user="$user" :wire:key="$user->id"/>
                    {{-- <hr class="text-gray-500"> --}}
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
