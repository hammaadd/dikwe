<div class=" mt-4 md:mt-8 px-2 md:px-0 relative" x-show.transition.origin.top.left="showAddForm">
    <form wire:submit.prevent="store">
    <div class="bg-white rounded-xl shadow-md p-2 md:p-5 w-full md:w-10/12 mx-auto">
        <div class="flex flex-row items-center relative" x-data="{ nColor: false , trix: @entangle('description').defer}">
            <button @click=" nColor = !nColor "  type="button" class="flex-none focus:outline-none rounded-lg p-1 h-8 w-8">
                <div class="w-4 h-4 rounded-full
                 @if($color=='purple') bg-purple-900
                @elseif($color=='green') bg-green-550
                @elseif($color=='blue') bg-indigo-700
                @elseif($color=='yellow') bg-yellow-400
                @else bg-indigo-700 @endif
                 inline-block"></div>
            </button>
            <ul
                x-show="nColor"
                @click.away="nColor = false"
                x-transition:enter="transition transform origin-top ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-75"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition transform origin-top ease-out duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-75"
                class="w-12 absolute text-center border border-gray-400 rounded-lg bg-white px-1 top-10 z-50">
                <li class="my-1 border-b border-gray-400">
                    <input type="radio" wire:model="color" value="purple" name="color" class="h-4 w-4 text-purple-900 bg-purple-900 focus:ring-0 border-0"/>
                </li>
                <li class="my-1 border-b border-gray-400">
                    <input type="radio" wire:model="color" value="yellow" name="color" class="h-4 w-4 text-yellow-500 bg-yellow-500 focus:ring-0 border-0"/>
                </li>
                <li class="my-1 border-b border-gray-400">
                    <input type="radio" wire:model="color" value="green" name="color" class="h-4 w-4 text-green-550 bg-green-550 focus:ring-0 border-0"/>
                </li>
                <li class="my-1">
                    <input type="radio" wire:model="color" value="blue" name="color" class="h-4 w-4 text-indigo-700 bg-indigo-700 focus:ring-0 border-0"/>
                </li>
            </ul>
            <input type="text" name="title" wire:model.defer="title" class="border-0 border-b-2 mx-3 border-gray-400 font-bold flex-grow ring-0 focus:border-green-550 focus:ring-0" placeholder="Note Title">
            {{-- <button @click=" nAdd = false " class="flex-none focus:outline-none rounded-lg p-1 h-8 w-8">
                <i class="far fa-times-circle text-gray-400"></i>
            </button> --}}
        </div>
        @error('title')
                    <small class="field-error-message">
                        <span>{{$message}}</span>
                    </small>
        @enderror

            {{-- <textarea name="description" rows="5" wire:model.defer="description" class="border-0 ring-0 focus:border-0 focus:ring-0 w-full" placeholder="Note Body ..."></textarea> --}}
            <div x-data="{textEditor:@entangle('description').defer}"
                x-init="()=>{var element = document.querySelector('trix-editor');
                           element.editor.insertHTML(textEditor);}"
                wire:ignore
                class="border-0 ring-0 focus:border-0 focus:ring-0 w-full my-2 ">
            <style>
                /* ol{
                    list-style-type: decimal;
                    margin: inherit;
                    padding: inherit;
                }
                ul {
                    list-style: circle;
                    margin: inherit;
                    padding: inherit;
                } */

                .trix-button-group--file-tools {
                        display: none !important;
                    }
            </style>


           <input x-ref="editor"
                  id="editor-x"
                  type="hidden"
                  name="description">

           <trix-editor  input="editor-x"
                        x-on:trix-change="textEditor=$refs.editor.value;" class="h-50"></trix-editor>
           </div>
        @error('description')
                    <small class="field-error-message">
                        <span>{{$message}}</span>
                    </small>
        @enderror
        {{-- <div id="editor"></div> --}}
        <div class=" text-center md:text-right pb-2 md:pb-0">
            <button type="button" class="bg-red-500 text-white font-bold border-2 border-red-500 px-4 py-1 mx-2 rounded-xl focus:outline-none hover:bg-white hover:text-red-500" wire:click="cancelForm">Cancel</button>
            <button type="submit" class="bg-green-550 text-white font-bold border-2 border-green-550 px-4 py-1 mx-2 rounded-xl focus:outline-none hover:bg-white hover:text-green-550">Save</button>
            <button type="button" class="bg-green-550 text-white font-bold border-2 border-green-550 px-4 py-1 mx-2 rounded-xl focus:outline-none hover:bg-white hover:text-green-550" @click="nshowAddMore = true , nshowAdd = false , nShowEdit = false " wire:click="moreInfo">More Info</button>
        </div>
    </div>
    </form>
    <div wire:loading>
        <div class=" absolute w-full h-full bg-green-250 bg-opacity-90 top-0 grid place-items-center">
            <img src="{{ asset('assets/loader/three-dots.svg') }}" class="">
        </div>
    </div>

    {{-- @include('user.sections.notification') --}}
</div>
@push('script_s')
<script>
window.addEventListener('addDescription', event => {
    var element = document.querySelectorAll("trix-editor");
        element = element[0];
        length = element.editor.getDocument().toString().length;
        element.editor.setSelectedRange([0, length + 1]);
        element.editor.insertHTML(event.detail.description);


        console.log(event.detail.description);
})
</script>
@endpush
