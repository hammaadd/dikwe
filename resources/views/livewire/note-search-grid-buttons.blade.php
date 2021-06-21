<div class="mt-2 sm:mt-0 mx-auto md:mx-0">                     
    <button class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none @if($noteStyle=='list') text-green-550 @endif" 
    
    wire:click="updateNoteStyle('list')"
    >
        <i class="fas fa-list-ul text-xl align-middle"></i>
    </button>
    <button class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none @if($noteStyle=='grid') text-green-550 @endif" 
    
    wire:click="updateNoteStyle('grid')"
    >
        <i class="fas fa-th-large text-xl align-middle"></i>
    </button>
    <button x-on:click=" fOpen = !fOpen " :class="{'text-green-550':fOpen}" class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
        <i class="fas fa-sliders-h text-xl align-middle"></i>
    </button>
    <button x-on:click=" isOpen = !isOpen " :class="{'text-green-550':fOpen}" class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
        <i class="fas fa-ellipsis-h text-xl align-middle"></i>
    </button>
</div>