<div class="w-full bg-white py-2 px-3 md:px-5 flex flex-wrap items-center justify-between my-2 rounded-xl">
    <div class="flex flex-wrap items-center">
        <span class=" w-3 h-3 rounded-full bg-green-550"></span>
        <label for="tag-name" class=" ml-2.5">
            {{$subtagname}}
        </label>
    </div>
    <div class="flex flex-wrap items-center">
        <button class=" bg-green-150 text-gray-400 text-sm rounded-full px-2 py-1 mx-3 hover:bg-green-550 hover:text-white focus:outline-none">
            Undo
        </button>
        <button class=" bg-green-150 text-gray-400 text-sm rounded-full px-3 py-1 hover:bg-green-550 hover:text-white focus:outline-none">
            <i class="fas fa-info"></i>
        </button>
    </div>
</div>
