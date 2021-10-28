<div class="bg-white pb-5 rounded-xl lg:h-full mt-4 lg:mt-0">

    <div class="flex flex-wrap justify-between relative">
        <div class="bg-green-550 text-white font-bold px-2 md:px-8 py-1 md:py-3 br-top-left"><label for="note"> <i class="fas fa-clipboard mr-2"></i> Note Info</label></div>
        <div class="py-3 px-2 md:px-8 lg:px-2 xl:px-8 hidden sm:block">
            <a href="javascript:void(0)" wire:click="moreAddInfo" x-on:click="nshowAdd = true, nshowAddMore = false" class="link-hover text-green-550 font-bold">
                Back To The Notes
            </a>
        </div>
    </div>
    <div class="p-2 md:p-8">
        <div class="relative">

            <form wire:submit.prevent="store" x-data="{visibility: ' '}">
                <input type="text" placeholder="Title" class="input--field" name="title" wire:model.lazy="title">
                @error('title')
                    <small class="field-error-message">
                        <span>{{$message}}</span>
                    </small>
                @enderror

                {{-- <textarea rows="5" class="input--field" placeholder="Note body" name="description" wire:model.defer="description"></textarea> --}}
                <div x-data="{textEditor:@entangle('description').defer}"
                wire:ignore
                class="border-0 ring-0 focus:border-0 focus:ring-0 w-full my-2 ">
            <style>
                ol{
                    list-style-type: decimal;
                    margin: inherit;
                    padding: inherit;
                }
                /* ul {
                    list-style: circle;
                    margin: inherit;
                    padding: inherit;
                } */
                .trix-button-group--file-tools {
                        display: none !important;
                    }
            </style>


           <input x-ref="editor2"
                  id="editor-x2"
                  type="hidden"
                  name="description">

           <trix-editor  input="editor-x2"
                        x-on:trix-change="textEditor=$refs.editor2.value;"></trix-editor>
           </div>
                @error('description')
                    <small class="field-error-message">
                        <span>{{$message}}</span>
                    </small>
                @enderror
                <input type="text" placeholder="Source" class="input--field" name="source" wire:model.defer="source">
                @error('source')
                    <small class="field-error-message">
                        <span>{{$message}}</span>
                    </small>
                @enderror
                <input type="url" placeholder="Source URL" class="input--field" name="url" wire:model.defer="url">
                @error('url')
                    <small class="field-error-message">
                        <span>{{$message}}</span>
                    </small>
                @enderror
                 {{-- @php print_r($tags); @endphp --}}
                <div class="input--field">
                    <label for="tags1">Tags</label>
                    <div wire:ignore wire:key="tags-drop">
                        <select class="multiple-select" id="tags1" multiple="multiple" name="tags">
                            @forelse($tagsG as $tg)
                            <option value="{{$tg->id}}">{{$tg->tag}}</option>
                            @empty
                            No tag added
                            @endforelse
                        </select>
                    </div>
                </div>
                @error('tags')
                    <small class="field-error-message">
                        <span>{{$message}}</span>
                    </small>
                @enderror
                {{-- @php print_r($workspaces); @endphp --}}
                <div class="input--field">

                    <label for="workspaces1">Workspaces</label>
                    <div wire:ignore wire:key="workspaces-drop">
                    <select class="multiple-select" id="workspaces1" multiple="multiple" name="workspaces">
                        @forelse($wrkspcs as $ws)
                        <option value="{{$ws->id}}">{{$ws->title}}</option>
                        @empty
                        <option>No workspace added</option>
                        @endforelse
                    </select>
                    </div>
                </div>
                @error('workspaces')
                    <small class="field-error-message">
                        <span>{{$message}}</span>
                    </small>
                @enderror
                <div class="flex flex-wrap overflow-hidden flex-row items-center justify-between">
                    <div class="input--f">
                        <div class=" mx-auto" >
                            Color
                            <div class=" inline-block ml-4">
                                <input type="radio" name="color" wire:model.defer="color" @if($color=='purple') checked @endif value="purple" class="form-checkbox text-purple-900 border-purple-900 bg-purple-900 rounded-full focus:ring-0"/>
                                <input type="radio" name="color" wire:model.defer="color" @if($color=='yellow') checked @endif value="yellow" class="form-checkbox text-yellow-400 border-yellow-400 bg-yellow-400 rounded-full focus:ring-0" />
                                <input type="radio" name="color" wire:model.defer="color" @if($color=='blue') checked @endif value="blue" class="form-checkbox text-indigo-700 border-indigo-700 bg-indigo-700 rounded-full focus:ring-0" />
                                <input type="radio" name="color" wire:model.defer="color" @if($color=='green') checked @endif value="green" class="form-checkbox text-green-550 border-green-550 bg-green-550 rounded-full focus:ring-0" />
                            </div>
                        </div>
                        @error('color')
                        <small class="field-error-message">
                            <span>{{$message}}</span>
                        </small>
                        @enderror
                    </div>
                    {{-- <div class="input--f">
                        <i class="fas fa-thumbs-up text-green-550 text-2xl mx-2"></i>
                        <i class="fas fa-thumbs-down text-green-550 text-2xl mx-2"></i>
                    </div> --}}
                </div>
                <div class="input--field">
                    <div class="flex flex-row justify-around">
                        <label class="items-center">
                            <input type="radio" name="visibility" wire:model.defer="visibility" @if($visibility=='P') checked @endif value="P" class="h-4 w-4 text-green-550 focus:ring-0" @click="visibility = 'P'"/>
                            <span class="sm:ml-2">
                                Public
                            </span>
                        </label>
                        <label class="items-center ml-1 sm:ml-4">
                            <input type="radio" name="visibility" wire:model.defer="visibility" @if($visibility=='R') checked @endif value="R" class="h-4 w-4 text-green-550 focus:ring-0" @click="visibility = 'R'"/>
                            <span class="sm:ml-2">
                                Restricted
                            </span>
                        </label>
                        <label class="items-center ml-1 sm:ml-4">
                            <input type="radio" name="visibility" wire:model.defer="visibility" @if($visibility=='PR') checked @endif value="PR" class="h-4 w-4 text-green-550 focus:ring-0" @click="visibility = 'PR'"/>
                            <span class="sm:ml-2">
                                Private
                            </span>
                        </label>
                    </div>
                    @error('visibility')
                        <small class="field-error-message">
                            <span>{{$message}}</span>
                        </small>
                    @enderror
                </div>
                <div class="workspaces pt-2 sm:pt-6" x-show="visibility === 'R'">
                            <label for="users-selected" class="font-bold inline-block">Restricted Users</label>
                            <div class="sm:inline-block sm:ml-2 pt-1 sm:pt-0">
                            @forelse($users as $user)
                                <a class="tag-item" href="{{route('u.profile',$user->id)}}" target="_blank">{{$user->name}}</a>
                            @empty

                            @endforelse
                            </div>
                        </div>
                <div class="text-center md:text-right my-4">
                    <button class="btn-gray" type="button" @click="nshowAddMore = false , nshowAdd = true ,nShowEdit = false"  wire:click="moreAddInfo"><i class="fas fa-arrow-left"></i> Back</button>
                    <button type="button" class="bg-red-500 text-white font-bold border-2 border-red-500 px-4 py-1 mx-2 rounded-xl focus:outline-none hover:bg-white hover:text-red-500">Cancel</button>
                    <button type="submit" class="btn-green">Save</button>
                </div>
            </form>
            <div wire:loading>
                <div class="absolute w-full grid place-items-center -top-5">
                    <img src="{{ asset('assets/loader/three-dots.svg') }}" class="">
                </div>
            </div>
        </div>
    </div>
    {{-- @include('user.sections.notification') --}}
</div>

@push('script_s')
<script>
//     Livewire.on('showMoreInfo', () => {
//         var element = document.querySelectorAll("trix-editor");
//         element = element[1];
//         element.editor.insertHTML(@this.get('description'));
//         console.log(@this.get('description'));
// })

window.addEventListener('updateTrixDesc', event => {
    var element = document.querySelectorAll("trix-editor");
        element = element[1];
        length = element.editor.getDocument().toString().length;
        element.editor.setSelectedRange([0, length + 1]);
        element.editor.insertHTML(event.detail.description);


        console.log(event.detail.description);
})

    $(document).ready(function() {
        $('#tags1').select2({
            tags:true
        });
        $('#workspaces1').select2({
            tags:true
        });
    });
        document.addEventListener('livewire:load', function () {
            $('#tags1').select2({
                tags:true
            });
            $('#workspaces1').select2({
                tags:true
            });
        $('#workspaces1').on('select2:select', (e) => {
            console.log($('#workspaces1').select2('val'));
            @this.emit('setWorkspaces', $('#workspaces1').select2('val'));
        });

        $('#workspaces1').on('select2:unselect', (e) => {
            @this.emit('setWorkspaces',$('#workspaces1').select2('val'));
        });

        $('#workspaces1').val(@this.get('workspaces')).trigger('change');

        $('#tags1').on('select2:select', (e) => {
            @this.emit('setTags', $('#tags1').select2('val'));
        });

        $('#tags1').on('select2:unselect', (e) => {
            @this.emit('setTags',$('#tags1').select2('val'));
        });

        $('#tags1').val(@this.get('tags')).trigger('change');

        // @this.on('refreshDropdown', function () {
        //       $('.multiple-select').select2();
        //   });
        });
    </script>


@endpush
