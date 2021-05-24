<div class="w-full pt-3 relative">
@forelse($tags as $tag)
<div class="w-full bg-white py-2 px-5 flex flex-wrap items-center justify-between my-2 rounded-xl shadow-md">
    <div class="flex flex-wrap items-center">
        @php
            $clr = $tag->color;
        @endphp
        @include('user.sections.color-dots')
        <label for="tag-name" class=" ml-2.5">
           {{$tag->tag}}
        </label>
    </div>
    <div class="flex flex-wrap items-center">
        <span class="count-number mx-3 text-gray-400 font-bold ">20</span>
        <button class=" bg-green-150 text-gray-400 text-sm rounded-full px-2 py-1 hover:bg-green-550 hover:text-white focus:outline-none" x-on:click="{showEdit=true,showMain=false}" wire:click="passTagId({{$tag->id}})">
            <i class="fas fa-pen"></i>
        </button>
    </div>
    
</div>

@empty

<div class="w-full bg-white py-2 px-5 flex flex-wrap items-center justify-between my-2 rounded-xl shadow-md">
    <label for="tag-name" class=" ml-2.5">
           No Data to Show
    </label>  
</div>
@endforelse
<div wire:loading>
    <div class=" absolute w-full h-full bg-white bg-opacity-90 top-0 grid place-items-center">
        <img src="{{ asset('assets/loader/three-dots.svg') }}" class="">
    </div>
</div>
</div>
