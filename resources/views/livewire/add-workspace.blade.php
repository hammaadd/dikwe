<div class="bg-white pb-5 rounded-xl lg:h-full mt-4 lg:mt-0">
@section('title','Add Workspace') 
    <div class="flex flex-wrap justify-between relative">
        <div class="bg-green-550 text-white font-bold px-2 md:px-8 py-1 md:py-3 br-top-left"><label for="knowledge-assets">Adding Workspace</label></div>
        <div class="py-3 px-2 md:px-8 lg:px-2 xl:px-8 hidden sm:block">
            <a href="javascript:void(0)" x-on:click="showAdd = false" class="link-hover text-green-550 font-bold">
                Back To The Knowledge Assets
            </a>
        </div>
    </div>
    <div class="p-2 md:p-8">
        <div>
            <form wire:submit.prevent="store">
                <input type="text" placeholder="Workspace Name" class="input--field" name="name" wire:model.defer="name">
                @error('name')
                                <small class="field-error-message">
                                    <span>{{$message}}</span>
                                </small>
                    @enderror
                <textarea rows="3" class="input--field" placeholder="Workspace Description" name="description" wire:model.defer="description"></textarea>
                @error('description')
                                <small class="field-error-message">
                                    <span>{{$message}}</span>
                                </small>
                    @enderror
                <div class="input--field" >
                    
                    <div wire:ignore>
                        <label for="workspace">Select Workspace</label>
                        <select class="multiple-select" id="selectWorkspace" multiple="multiple" name="workspace" placeholder="Select Parent Workspace">
                            <option value="0">None</option>
                            @forelse ($workspaces as $wrk)
                            <option value="{{$wrk->id}}">{{$wrk->title}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>
                    
                    @error('workspace')
                                <small class="field-error-message">
                                    <span>{{$message}}</span>
                                </small>
                    @enderror
                </div>
                
                <div class="flex flex-wrap overflow-hidden flex-row items-center justify-between">
                    <div class="input--f">
                        <div class=" mx-auto">
                            Color
                            <div class=" inline-block ml-4">
                                <input type="radio" wire:model.defer="color" checked name="color" class="form-checkbox text-purple-900 border-purple-900 bg-purple-900 rounded-full focus:ring-0" value="purple" />
                                <input type="radio" wire:model.defer="color" name="color" class="form-checkbox text-yellow-400 border-yellow-400 bg-yellow-400 rounded-full focus:ring-0" value="yellow"/>
                                <input type="radio" wire:model.defer="color" name="color" class="form-checkbox text-indigo-700 border-indigo-700 bg-indigo-700 rounded-full focus:ring-0" value="blue"/>
                                <input type="radio" wire:model.defer="color" name="color" class="form-checkbox text-green-550 border-green-550 bg-green-550 rounded-full focus:ring-0" value="green"/>
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
                    <div class="flex flex-row justify-around xl:justify-center">
                        <label class="items-center">
                            <input type="radio" wire:model.defer="visibility" name="visibility" checked class="h-4 w-4 text-green-550 focus:ring-0" value="P"/>
                            <span class="sm:ml-2">
                                Public
                            </span>
                        </label>
                        <label class="items-center ml-1 sm:ml-4">
                            <input type="radio" wire:model.defer="visibility" name="visibility" class="h-4 w-4 text-green-550 focus:ring-0" value="R"/>
                            <span class="sm:ml-2">
                                Restricted
                            </span>
                        </label>
                        <label class="items-center ml-1 sm:ml-4">
                            <input type="radio" wire:model.defer="visibility" name="visibility" class="h-4 w-4 text-green-550 focus:ring-0" value="PR"/>
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
                <div class="text-center md:text-right my-4">
                    <button type="button" class="btn-gray">Cancel</button>
                    <button type="submit" class="btn-green">Save</button>
                </div>
            </form>
            
        </div>
    </div>
    @include('user.sections.notification')
    
</div>

@push('script_s')
<script>
    $(document).ready(function() {
        $('.multiple-select').select2({
            maximumSelectionLength: 1,
        });
    });
        document.addEventListener('livewire:load', function () {
            $('.multiple-select').select2({
            maximumSelectionLength: 1,
        });
        $('.multiple-select').on('select2:select', (e) => {
            @this.emit('setWorkspace', $('.multiple-select').select2('val')[0]);
            // console.log($('.multiple-select').select2('val')[0]);
        });
        $('.multiple-select').on('select2:unselect', (e) => {
            // console.log($('.multiple-select').select2('val')[0]);
            @this.emit('setWorkspace',null);
        });

        $('.multiple-select').val(@this.get('workspace')).trigger('change');
        });
    </script>

@endpush