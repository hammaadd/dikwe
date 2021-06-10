<div>
   
    <div class="w-full pt-3 relative">
    @forelse($notes as $note)
        <div class="w-full bg-white py-2 px-5 flex flex-wrap items-center justify-between my-2 rounded-xl shadow-md">
            <div class="flex flex-wrap items-center">
            @php
                $clr = $note->color;
            @endphp
            @include('user.sections.color-dots')
                <label for="note-name" class=" ml-2.5" title="{{$note->title}}">
                    {{Str::limit($note->title,17)}}
                </label>
            </div>
            <div class="flex flex-wrap items-center">
                <span class="count-number mx-3 text-gray-400 font-bold ">20</span>
                <button class=" bg-green-150 text-gray-400 text-sm rounded-full px-2 py-1 hover:bg-green-550 hover:text-white focus:outline-none  @if($noteId == $note->id) bg-green-550 text-white @endif" wire:click="passNoteId({{$note->id}})" @click=" $dispatch('shownoteedit')">
                    <i class="fas fa-pen @if($noteId == $note->id) text-white @endif"></i>
                </button>
            </div>
        </div>
    @empty

    @endforelse

    </div>
    
    <div class="text-center pt-5">
        <a href="#" class="link-hover text-green-550 font-bold">Open More</a>
    </div>
</div>
