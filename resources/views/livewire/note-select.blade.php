

                               <ul x-show="isOpen"
                               @click.away="isOpen = false"
                                x-transition:enter="transition transform origin-top-right ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-75"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition transform origin-top-right ease-out duration-200"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-75"
                                class="absolute bg-white shadow-md overflow-hidden rounded-xl w-72 mt-2 py-1 right-0 top-full md:right-10 md:top-10 z-20"
                            >
                                    {{-- <li>
                                        <a href="#" class="dropdown-item">
                                            <i class="fas fa-check-circle dropdown-item-icon" ></i>
                                            <span class="ml-2">Select All</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item">
                                            <i class="fas fa-times-circle dropdown-item-icon"></i>
                                            <span class="ml-2">Un-select Selected</span>
                                        </a>
                                    </li>    --}}
                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item"    wire:click="deleteNotes" >
                                            <i class="fas fa-trash dropdown-item-icon" ></i>
                                            <span class="ml-2">Delete Selected</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item" wire:click="makePrivate">
                                            <i class="fas fa-user-shield dropdown-item-icon"></i>
                                            <span class="ml-2">Make Selected Private</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item" wire:click="makePublic" >
                                            <i class="fas fa-globe-asia dropdown-item-icon"></i>
                                            <span class="ml-2">Make Selected Public</span>
                                        </a>
                                    </li>

                            </ul>
                            {{-- <form action=""
                                x-show="fOpen"
                                @click.away="fOpen = false"
                                x-transition:enter="transition transform origin-top-right ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-75"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition transform origin-top-right ease-out duration-200"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-75"
                                class="absolute bg-white shadow-md overflow-hidden rounded-xl w-72 mt-2 p-5 right-0 top-full md:right-20 md:top-10 z-20">
                                <p class="font-bold text-center">Filter By</p>
                                <div class="flex flex-col border-b border-gray-500 py-6">
                                    <label class="items-center">
                                        <input type="radio" name="rate" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            High Rate
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="rate" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            Low Rate
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="rate" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            All
                                        </span>
                                    </label>
                                </div>
                                <div class="flex flex-col border-b border-gray-500 py-6">
                                    <label class="items-center">
                                        <input type="radio" name="clicks" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            High Number of Clicks
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="clicks" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            Low Number of Clicks
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="clicks" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            All
                                        </span>
                                    </label>
                                </div>
                                <div class="flex flex-col border-b border-gray-500 py-6">
                                    <label class="items-center">
                                        <input type="radio" name="shares" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            High Number of Shares
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="shares" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            Low Number of Shares
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="shares" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            All
                                        </span>
                                    </label>
                                </div>
                                <div class="flex flex-col py-6">
                                    <label class="items-center">
                                        <input type="radio" name="time" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            Newest
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="time" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            Oldest
                                        </span>
                                    </label>
                                    <label class="items-center">
                                        <input type="radio" name="time" class="h-4 w-4 text-green-550 focus:ring-0"/>
                                        <span class="ml-2">
                                            All
                                        </span>
                                    </label>
                                </div>
                                <div class=" text-right">
                                    <button @click=" fOpen = !fOpen " class="bg-gray-400 text-white font-bold px-4 py-1 mx-2 rounded-xl focus:outline-none">Cancel</button>
                                    <button @click=" fOpen = !fOpen " type="submit" class="bg-green-550 text-white font-bold px-4 py-1 mx-2 rounded-xl focus:outline-none">Apply</button>
                                </div>
                            </form> --}}

