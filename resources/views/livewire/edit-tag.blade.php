<div class="relative">
<form wire:submit.prevent="update">
    <input type="text" placeholder="Tag Title" class="input---field" wire:model.defer="name" name="name">
    {{-- <div class="h-10 bg-green-150 rounded-xl w-full"></div> --}}
    @error('name')
    <small class="field-error-message">
        <span>{{$message}}</span>
    </small>
    @enderror
<textarea name="note" wire:model.defer="note" id="" rows="3" placeholder="Tag Description..." class="input---field"></textarea>
@error('note')
    <small class="field-error-message">
        <span>{{$message}}</span>
    </small>
    @enderror
<div class="input---field">
    <div class="flex flex-row justify-around">
        <label class="items-center">
            <input type="radio" name="visibility" wire:model.defer="visibility" @if($visibility=='P') checked @endif value="P" class="h-4 w-4 text-green-550 focus:ring-0"/>
            <span class="sm:ml-2">
                Public
            </span>
        </label>
        <label class="items-center ml-1 sm:ml-4">
            <input type="radio" name="visibility" wire:model.defer="visibility" @if($visibility=='R') checked @endif value="R" class="h-4 w-4 text-green-550 focus:ring-0"/>
            <span class="sm:ml-2">
                Restricted
            </span>
        </label>
        <label class="items-center ml-1 sm:ml-4">
            <input type="radio" name="visibility" wire:model.defer="visibility" @if($visibility=='PR') checked @endif value="PR" class="h-4 w-4 text-green-550 focus:ring-0"/>
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
<div class="flex flex-wrap overflow-hidden flex-row items-center justify-between">
    <div class="input--f">
        <div class=" mx-auto">
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
    <div class="input--f">
        <i class="fas fa-share-alt text-green-550 text-xl mx-1"></i>
        <i class="fas fa-heart text-green-550 text-xl mx-1"></i>
        <i class="fas fa-bell text-green-550 text-xl mx-1"></i>
    </div>
</div>
<div class="text-center my-4">
    <button class="btn-gray" type="button" wire:click="delete"><i class="far fa-trash-alt mr-2"></i>Delete</button>
    <button type="submit" class="btn-green"><i class="far fa-save mr-2"></i>Save</button>
</div>
</form>
<div wire:loading wire>
    <div class=" absolute w-full h-full bg-green-250 bg-opacity-90 top-0 grid place-items-center">
        <img src="{{ asset('assets/loader/three-dots.svg') }}" class="">
    </div>
</div>
@include('user.sections.notification')
</div>
