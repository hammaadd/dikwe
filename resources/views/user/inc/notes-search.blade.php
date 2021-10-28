<div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3"
            x-transition:enter="transition transform origin-top-right ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-75"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition transform origin-top-right ease-out duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-75"
            x-show="noteSearch"
            >
                    <!-- Column Content -->
                    {{-- Tag Section --}}
            <div class="bg-white pb-5 rounded-xl h-full mt-4 lg:mt-0">
                <div class="flex flex-wrap justify-between relative" >
                    <div class="flex flex-wrap items-center">
                        <div class="bg-green-550 text-white font-bold px-2 md:px-8 lg:px-2 xl:px-8 py-3 br-top-left"><label for="knowledge-assets">Notes</label></div>
                            <button x-on:click="$dispatch('showaddform')" wire:click="moreInfo" title="Add Note" class="text-green-550 bg-green-150 rounded-xl mx-2 px-2 h-10 w-10 hover:text-green-150 hover:bg-green-550 focus:outline-none">
                                <i class="fas fa-plus-circle text-xl align-middle"></i>
                            </button>
                        </div>
                            <livewire:note-search-grid-buttons/>
                            <livewire:note-select/>
                    </div>
                {{-- <div class="w-full px-2 md:px-5 flex flex-wrap justify-between items-center relative mt-5">




                </div> --}}

                <livewire:note-search-grid :key="rand()"/>
            </div>
</div>



