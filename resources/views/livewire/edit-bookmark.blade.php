
<div class="flex-wrap overflow-hidden w-full lg:w-1/2 px-2 md:px-5 lg:px-2 xl:px-5 lg:h-full">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    {{-- <x-bm-info-form /> --}}
    <form wire:submit.prevent="updateBookmark">
        {{-- @csrf --}}
        <input type="text" placeholder="Bookmark Title" class="input---field" name="title" value="{{$title}}" wire:model="title">
        <input type="text" placeholder="Bookmark URL" class="input---field" name="source" value="{{$source}}" wire:model="source">
        <textarea name="" id="" rows="3" placeholder="Bookmark Note" class="input---field" name="description" wire:model="description">{{$description}}</textarea>
        <div class="input--field">
            <label for="tags2">Tags</label>
            <div wire:ignore>
                <select class="multiple-select" id="tags1" multiple="multiple" name="tags" >
                    @forelse($tagsG as $tg)

                    <option value="{{$tg->id}}" @if(in_array($tg->id,$tags)) selected @endif>{{$tg->tag}}</option>
                    @empty
                    <option>No tag added</option>
                    @endforelse
                </select>
            </div>
        </div>
        @error('tags')
            <small class="field-error-message">
                <span>{{$message}}</span>
            </small>
        @enderror

        <div class="input--field">

            <label for="workspacesB">Workspaces</label>
            <div wire:ignore wire:key="workspaces-drop">
            <select class="multiple-select" id="workspaces1" multiple="multiple" name="workspaces">
                @forelse($wrkspcs as $ws)
                <option value="{{$ws->id}}" @if(in_array($ws->id,$workspaces)) selected @endif>{{$ws->title}}</option>
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
        {{-- <div class="input--field">

            <select class="multiple-select1" name="tags[]" multiple="multiple">
                @foreach ($tags as $tag)
                <option value="{{$tag->id}}"
                    @foreach ($tag->bookmark as $bookmarktag)
                        @if($bookmarktag->tag==$tag->id && $bookmarktag->bookmark==$bid)
                            selected
                        @endif
                    @endforeach
                    >{{$tag->tag}}</option>
                @endforeach
            </select>
        </div>
        <div class="input--field">
            <select class="multiple-select1" name="workspaces[]" multiple="multiple">
                @foreach ($workspaces as $workspace)
                <option value="{{$workspace->id}}"
                    @foreach($workspace->bookmark as $wsbmark)
                            @if($wsbmark->workspace==$workspace->id && $wsbmark->bookmark==$bid)
                                selected
                            @endif
                    @endforeach
                        >{{$workspace->title}}</option>
                    @endforeach
            </select>
        </div> --}}
        <div class="input---field">
            <div class="flex flex-row justify-around">
                <label class="items-center">
                    <input type="radio" name="visibility" value="P" @if ($visibility=='P')
                        checked
                    @endif class="h-4 w-4 text-green-550 focus:ring-0"/>
                    <span class="sm:ml-2">
                        Public
                    </span>
                </label>
                <label class="items-center ml-1 sm:ml-4">
                    <input type="radio" name="visibility" value="R"@if ($visibility=='R')
                    checked
                    @endif class="h-4 w-4 text-green-550 focus:ring-0"/>
                    <span class="sm:ml-2">
                        Restricted
                    </span>
                </label>
                <label class="items-center ml-1 sm:ml-4">
                    <input type="radio" name="visibility" value="PR" @if ($visibility=='PR')
                    checked
                    @endif class="h-4 w-4 text-green-550 focus:ring-0"/>
                    <span class="sm:ml-2">
                        Private
                    </span>
                </label>
            </div>
        </div>
        <div class="flex flex-wrap overflow-hidden flex-row items-center justify-between">
            <div class="input--f">
                <div class=" mx-auto">
                    Color
                    <div class=" inline-block ml-4">
                        <input type="radio" name="color" class="form-checkbox text-purple-900 border-purple-900 bg-purple-900 rounded-full focus:ring-0" value="purple" @if($color=='purple') checked @endif/>
                        <input type="radio" name="color" class="form-checkbox text-yellow-400 border-yellow-400 bg-yellow-400 rounded-full focus:ring-0" value="yellow" @if($color=='yellow') checked @endif/>
                        <input type="radio" name="color" class="form-checkbox text-indigo-700 border-indigo-700 bg-indigo-700 rounded-full focus:ring-0" value="indigo" @if($color=='indigo') checked @endif/>
                        <input type="radio" name="color" class="form-checkbox text-green-550 border-green-550 bg-green-550 rounded-full focus:ring-0" value="gereen" @if($color=='green') checked @endif/>
                    </div>
                </div>
            </div>

        </div>
        <div class="input--field" wire:ignore>
            <select class="multiple-select" id="status" name="status" >

                <option value="active" @if($status=='active') selected @endif class="w-full">Active</option>
                <option value="inactive" @if($status=='inactive') selected @endif> In Active</option>

            </select>
        </div>
        <div class="text-center my-4">
            <button class="btn-gray"><i class="far fa-trash-alt mr-2"></i>Delete</button>
            <button type="submit" class="btn-green"><i class="far fa-save mr-2"></i>Save</button>
        </div>

    </form>


</div>

@push('script_s')

<script>
    // window.onload = function() {
    //         @this.emit('getNoteDetails');
    // }

$(document).ready(function() {
        $('#status').select2({
            tags:true
        });

    });

    $(document).ready(function() {
        $('#tags1').select2({
            tags:true
        });
        $('#workspaces1').select2({
            tags:true
        });
    });





//     window.livewire.on('update-tags-ev', message => {
//         $('#tagsB').select2({
//             tags:true
//         });
//         $('#tagsB').val(@this.get('tags')).trigger('change');
//         $('#workspacesB').select2({
//             tags:true
//         });
//         $('#workspacesB').val(@this.get('workspaces')).trigger('change');

// })
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
        // document.addEventListener('livewire:load', function () {
        //     $('#tagsB').select2({
        //         tags:true
        //     });
        //     $('#workspacesB').select2({
        //         tags:true
        //     });
        //     // $('#tags2').val(@this.get('tags')).trigger('change');

        // $('#workspacesB').on('select2:select', (e) => {
        //     console.log($('#workspacesB').select2('val'));
        //     @this.emit('setBWorkspaces', $('#workspacesB').select2('val'));
        // });

        // $('#workspacesB').on('select2:unselect', (e) => {
        //     @this.emit('setBWorkspaces',$('#workspacesB').select2('val'));
        // });

        // $('#workspacesB').val(@this.get('workspaces')).trigger('change');

        // $('#tagsB').on('select2:select', (e) => {
        //     @this.emit('setBTags', $('#tagsB').select2('val'));
        // });

        // $('#tagsB').on('select2:unselect', (e) => {
        //     @this.emit('setBTags',$('#tagsB').select2('val'));
        // });

        // $('#tagsB').val(@this.get('tags')).trigger('change');

        // // @this.on('refreshDropdown', function () {
        // //       $('.multiple-select').select2();
        // //   });
        // });
    </script>


@endpush
