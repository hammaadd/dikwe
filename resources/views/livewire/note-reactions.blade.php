<div @if($type=='list') class="flex flex-wrap flex-row-reverse sm:flex-col items-center sm:items-end justify-between w-full sm:w-auto" @endif  @if($type=='grid')  class="flex items-center md:items-start lg:items-center xl:items-start flex-col-reverse md:flex-row lg:flex-col-reverse xl:flex-row justify-between" @endif>
    @if($type=='list')
    <div class="rating mb-0">
        <input type="radio" name="rate" id="rate-5">
        <label for="rate-5" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-4">
        <label for="rate-4" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-3">
        <label for="rate-3" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-2">
        <label for="rate-2" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-1">
        <label for="rate-1" class="fas fa-star"></label>
    </div>
    @endif
    <ul>
    @if($note->upvotedBy(Auth::id()))
        <li class="inline-block text-center">
            <a href="javascript:void(0)" wire:click="downvote({{$note->id}})" class=" cursor-pointer px-1 text-lg text-green-550">
                <i class="fas fa-hand-point-up"></i>
            </a>
            <br>
            <span class="count text-sm">{{$note->upvotes()->count()}}</span>
        </li>
    @else
        <li class="inline-block text-center">
            <a href="javascript:void(0)" wire:click="upvote({{$note->id}})" class=" cursor-pointer px-1 text-lg text-gray-400">
                <i class="fas fa-hand-point-up"></i>
            </a>
            <br>
            <span class="count text-sm">{{$note->upvotes()->count()}}</span>
        </li>
    @endif

    @if($note->dislikedBy(Auth::id()))
        <li class="inline-block text-center">
            <a href="javascript:void(0)" class=" cursor-pointer px-1 text-lg text-green-550" wire:click="undislike({{$note->id}})">
                <i class="fas fa-thumbs-down"></i>
            </a>
            <br>
            <span class="count text-sm">{{$note->dislikes()->count()}}</span>
        </li>
    @else
        <li class="inline-block text-center">
            <a href="javascript:void(0)" class=" cursor-pointer px-1 text-lg text-gray-400" wire:click="dislike({{$note->id}})">
                <i class="fas fa-thumbs-down"></i>
            </a>
            <br>
            <span class="count text-sm">{{$note->dislikes()->count()}}</span>
        </li>
    @endif
    {{-- {{dd($note->likes())}} --}}
    @if($note->likedBy(Auth::id()))
        <li class="inline-block text-center">
            <a href="javascript:void(0)" wire:click="unlikeKa({{$note->id}})" class=" cursor-pointer px-1 text-lg text-green-550" title="Unlike">
                <i class="fas fa-thumbs-up"></i>
            </a>
            <br>
            <span class="count text-sm">{{$note->likes()->count()}}</span>
        </li>   
    @else
        <li class="inline-block text-center">
            <a href="javascript:void(0)" wire:click="likeKa({{$note->id}})" class=" cursor-pointer px-1 text-lg text-gray-400" title="Like">
                <i class="fas fa-thumbs-up"></i>
            </a>
            <br>
            <span class="count text-sm">{{$note->likes()->count()}}</span>
        </li>
    @endif

        <li class="inline-block text-center">
            <a href="#" class=" cursor-pointer px-1 text-lg text-gray-400">
                <i class="fas fa-copy"></i>
            </a>
            <br>
            <span class="count text-sm">15</span>
        </li>
    
        <li class="inline-block text-center">
            <a href="#" class=" cursor-pointer px-1 text-lg text-gray-400">
                <i class="fas fa-share-alt"></i>
            </a>
            <br>
            <span class="count text-sm">2</span>
        </li>
    </ul>


    @if($type=="grid")
    <div class="rating mb-4 md:mb-0 lg:mb-4 xl:mb-0">
        <input type="radio" name="rate" id="rate-5">
        <label for="rate-5" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-4">
        <label for="rate-4" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-3">
        <label for="rate-3" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-2">
        <label for="rate-2" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-1">
        <label for="rate-1" class="fas fa-star"></label>
    </div>

    @endif
    

</div>