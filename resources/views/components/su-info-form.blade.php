<input type="text" placeholder="Short URL Title" class="input---field">
<input type="text" placeholder="Short URL Description..." class="input---field">
<input type="text" placeholder="Short URL" class="input---field">
<div class="input--field">
    <select class="multiple-select" name="" multiple="multiple">
        <option value="">Tag</option>
        <option value="">Tag</option>
        <option value="">Tag</option>
        <option value="">Tag</option>
    </select>
</div>
<div class="input--field">
    <select class="multiple-select" name="" multiple="multiple">
        <option value="">Workspace</option>
        <option value="">Workspace</option>
        <option value="">Workspace</option>
        <option value="">Workspace</option>
    </select>
</div>
<div class="input---field">
    <div class="flex flex-row justify-around">
        <label class="items-center">
            <input type="radio" name="rate" class="h-4 w-4 text-green-550 focus:ring-0"/>
            <span class="sm:ml-2">
                Public
            </span>
        </label>
        <label class="items-center ml-1 sm:ml-4">
            <input type="radio" name="rate" class="h-4 w-4 text-green-550 focus:ring-0"/>
            <span class="sm:ml-2">
                Restricted
            </span>
        </label>
        <label class="items-center ml-1 sm:ml-4">
            <input type="radio" name="rate" class="h-4 w-4 text-green-550 focus:ring-0"/>
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
                <input type="radio" name="color" class="form-checkbox text-purple-900 border-purple-900 bg-purple-900 rounded-full focus:ring-0" />
                <input type="radio" name="color" class="form-checkbox text-yellow-400 border-yellow-400 bg-yellow-400 rounded-full focus:ring-0" />
                <input type="radio" name="color" class="form-checkbox text-indigo-700 border-indigo-700 bg-indigo-700 rounded-full focus:ring-0" />
                <input type="radio" name="color" class="form-checkbox text-green-550 border-green-550 bg-green-550 rounded-full focus:ring-0" />
            </div>
        </div>
    </div>
    <div class="input--f">
        <i class="fas fa-share-alt text-green-550 text-xl mx-1"></i>
        <i class="fas fa-heart text-green-550 text-xl mx-1"></i>
        <i class="fas fa-bell text-green-550 text-xl mx-1"></i>
    </div>
</div>
<div class="text-center my-4">
    <button class="btn-gray"><i class="far fa-trash-alt mr-2"></i>Delete</button>
    <button type="submit" class="btn-green"><i class="far fa-save mr-2"></i>Save</button>
</div>
