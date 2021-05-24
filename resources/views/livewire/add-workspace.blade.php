<div class="bg-white pb-5 rounded-xl lg:h-full mt-4 lg:mt-0">

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
            <form action="">
                <input type="text" placeholder="Workspace Name" class="input--field" name="name">
                <textarea rows="3" class="input--field" placeholder="Workspace Description" name="description"></textarea>
                <div class="input--field">
                    <select class="multiple-select" id="SelectTag" multiple="multiple" name="workspace" placeholder="Select Parent Workspace">
                        <option value="0" selected>None</option>
                        <option value="">Child Child Workspace</option>
                    </select>
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
                        <i class="fas fa-thumbs-up text-green-550 text-2xl mx-2"></i>
                        <i class="fas fa-thumbs-down text-green-550 text-2xl mx-2"></i>
                    </div>
                </div>
                <div class="input--field">
                    <div class="flex flex-row justify-around xl:justify-center">
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
                <div class="text-center md:text-right my-4">
                    <button class="btn-gray">Cancel</button>
                    <button type="submit" class="btn-green">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>