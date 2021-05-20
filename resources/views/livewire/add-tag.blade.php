<div class="bg-white pb-5 rounded-xl lg:h-full mt-4 lg:mt-0">

    <div class="flex flex-wrap justify-between relative">
        <div class="bg-green-550 text-white font-bold px-2 md:px-8 py-1 md:py-3 br-top-left"><label for="tag">Adding Tag</label></div>
    </div>
    <div class="p-2 md:p-8">
        <div>
            <form wire:submit.prevent="store" >
                <input type="text" placeholder="Tag Name" class="input--field" wire:model="name" name="name">
                @error('name')
                    <small class="field-error-message">
                        <span>{{$message}}</span>
                    </small>
                @enderror
                <textarea wire:model="note" rows="3" class="input--field" placeholder="Tag Note" name="note"></textarea>
                @error('note')
                    <small class="field-error-message">
                        <span>{{$message}}</span>
                    </small>
                @enderror
                <div class="flex flex-wrap overflow-hidden flex-row items-center justify-between">
                    <div class="input--f">
                        <div class=" mx-auto">
                            Color
                            <div class=" inline-block ml-4">
                                <input type="radio" wire:model="color" checked name="color" class="form-checkbox text-purple-900 border-purple-900 bg-purple-900 rounded-full focus:ring-0" value="purple" />
                                <input type="radio" wire:model="color" name="color" class="form-checkbox text-yellow-400 border-yellow-400 bg-yellow-400 rounded-full focus:ring-0" value="yellow"/>
                                <input type="radio" wire:model="color" name="color" class="form-checkbox text-indigo-700 border-indigo-700 bg-indigo-700 rounded-full focus:ring-0" value="blue"/>
                                <input type="radio" wire:model="color" name="color" class="form-checkbox text-green-550 border-green-550 bg-green-550 rounded-full focus:ring-0" value="green"/>
                            </div>
                            
                        </div>
                        @error('color')
                                <small class="field-error-message">
                                    <span>{{$message}}</span>
                                </small>
                        @enderror
                    </div>
                    <div class="input--f">
                        <i class="fas fa-thumbs-up text-green-550 text-2xl mx-2"></i>
                        <i class="fas fa-thumbs-down text-green-550 text-2xl mx-2"></i>
                    </div>
                </div>
                <div class="input--field">
                    <div class="flex flex-row justify-around xl:justify-center">
                        <label class="items-center">
                            <input type="radio" wire:model="visibility" name="visibility" checked class="h-4 w-4 text-green-550 focus:ring-0" value="P"/>
                            <span class="sm:ml-2">
                                Public
                            </span>
                        </label>
                        <label class="items-center ml-1 sm:ml-4">
                            <input type="radio" wire:model="visibility" name="visibility" class="h-4 w-4 text-green-550 focus:ring-0" value="R"/>
                            <span class="sm:ml-2">
                                Restricted
                            </span>
                        </label>
                        <label class="items-center ml-1 sm:ml-4">
                            <input type="radio" wire:model="visibility" name="visibility" class="h-4 w-4 text-green-550 focus:ring-0" value="PR"/>
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
    {{-- Notification Components Start Here --}}
<div x-data="{ shownotification : true }" >
    @if(session()->has('success'))
    <div x-data="{ shownotification : true }" x-init="setTimeout(() => shownotification = false, 4000)">
        <x-success-notify :message="session()->get('success')"/>
    </div>
    @elseif(session()->has('error'))
        <x-error-notify :message="session()->get('error')"/>
    @endif
</div>
{{-- Notification component Ends Here --}}
</div>

