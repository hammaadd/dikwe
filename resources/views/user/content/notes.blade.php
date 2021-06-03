@extends('user.layout.userLayout')
@section('title','Notes')
@section('page-title','Notes')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('content')
    <div class="p-2 md:p-5 lg:p-2 xl:p-5">
        <div class="bg-green-150 rounded-xl p-2 md:p-8 lg:p-2 xl:p-8">
            <div class="flex flex-wrap overflow-hidden lg:-mx-4 xl:-mx-4" @if(isset($_GET['type'])) @if($_GET['type']=='add') x-data="{nshowEdit:false, nshowAdd:true, nshowAddMore: false}" @else x-data="{nshowEdit:false, nshowAdd:false, nshowAddMore: false}"  @endif @else x-data="{nshowEdit:false, nshowAdd:false, nshowAddMore: false}" @endif
             >

                <div class="w-full overflow-hidden lg:px-4 lg:w-1/3 xl:px-4 xl:w-1/3">
                    <!-- Column Content -->
                    {{-- Filter Section --}}
                    <div class="bg-white p-2 md:px-6 md:py-5 lg:p-2 xl:px-6 xl:py-5 rounded-xl h-full">
                        <x-note-filters /> 
                        <div class="w-full pt-3">
                            @for($i=0;$i<5;$i++)
                                <x-notes-list notename="Note Name"/>
                            @endfor
                        </div>
                        <div class="text-center pt-5">
                            <a href="#" class="link-hover text-green-550 font-bold">Open More</a>
                        </div>
                    </div>
                </div>

                <div class="w-full overflow-hidden lg:px-4 lg:w-1/3 xl:px-4 xl:w-1/3" x-show="!nshowAdd && !nshowEdit && !nshowAddMore">
                    <!-- Column Content -->
                    {{-- Tag Section --}}
                    <div class="bg-white p-2 md:px-6 md:py-5 lg:p-2 xl:px-6 xl:py-5 rounded-xl lg:h-full mt-4 lg:mt-0">
                        <div class="pt-6 text-center">
                            <img src="{{ asset('images/Mask Group 61.svg') }}" alt="">
                            <p class="font-bold text-center pt-10">Notebooks are Knowledge<br>Assets used to collate other<br>Assets: Notes, To<br>Do Lists ..etc</p>
                            <button class="mt-10 btn-main" @click="nshowAdd = true">Create New Note</button>
                        </div>
                    </div>
                </div>

                {{-- Add Section --}}
                <div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3" x-show="nshowAdd">
                    <!-- Column Content -->
                    {{-- Tag Section --}}
                    <div class="bg-white pb-5 rounded-xl lg:h-full mt-4 lg:mt-0"">
                        <div class="flex flex-wrap justify-between relative">
                            <div class="bg-green-550 text-white font-bold px-2 md:px-8 py-1 md:py-3 br-top-left"><label for="knowledge-assets">02 Notes</label></div>
                            <div class="py-3 px-2 md:px-8 lg:px-2 xl:px-8 hidden sm:block">
                                <a href="javascript:void(0)" x-on:click="showAdd = false" class="link-hover text-green-550 font-bold">
                                    Back To The Notes
                                </a>
                            </div>
                        </div>
                        <div class="w-full px-2 md:px-5 flex flex-wrap justify-between items-center relative mt-5" x-data="{ isOpen: false, fOpen: false }">
                            <a href="{{ route('add-note') }}" class="bg-green-550 text-white font-bold py-2 px-3 mx-2 rounded-xl border-2 border-green-550 hover:bg-white hover:text-green-550 focus:outline-none">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                            <div>
                                <button class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
                                    <i class="fas fa-list-ul text-xl align-middle"></i>
                                </button>
                                <button class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
                                    <i class="fas fa-th-large text-xl align-middle"></i>
                                </button>
                                <button @click=" fOpen = !fOpen " :class="{'text-green-550':fOpen}" class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
                                    <i class="fas fa-sliders-h text-xl align-middle"></i>
                                </button>
                                <button @click=" isOpen = !isOpen " :class="{'text-green-550':fOpen}" class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none">
                                    <i class="fas fa-ellipsis-h text-xl align-middle"></i>
                                </button>
                            </div>
                            <ul
                                x-show="isOpen"
                                @click.away="isOpen = false"
                                x-transition:enter="transition transform origin-top-right ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-75"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition transform origin-top-right ease-out duration-200"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-75"
                                class="absolute bg-white shadow-md overflow-hidden rounded-xl w-72 mt-2 py-1 right-0 top-full md:right-10 md:top-10 z-20"
                            >
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-plus-circle dropdown-item-icon"></i>
                                        <span class="ml-2">Add New Note Here</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-external-link-alt dropdown-item-icon"></i>
                                        <span class="ml-2">Open All Note</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-share-alt dropdown-item-icon"></i>
                                        <span class="ml-2">Share Notes</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-tags dropdown-item-icon"></i>
                                        <span class="ml-2">Tag Notes</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-tag dropdown-item-icon"></i>
                                        <span class="ml-2">Untag Notes</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-lock dropdown-item-icon"></i>
                                        <span class="ml-2">Make Notes Private</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-globe-americas dropdown-item-icon"></i>
                                        <span class="ml-2">Make Notes Public</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-users dropdown-item-icon"></i>
                                        <span class="ml-2">Make Notes Restricted</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-trash-alt dropdown-item-icon"></i>
                                        <span class="ml-2">Delete Notes</span>
                                    </a>
                                </li>
                            </ul>
                            <form action=""
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
                            </form>
                            
                        </div>
                        <livewire:add-note/>
                        <div class="mt-4 md:mt-8 md:pb-5 px-2 md:px-0">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 w-full md:w-10/12 mx-auto">
                                @for($i=0;$i<2;$i++)
                                    <x-notes-grid />
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full overflow-hidden lg:px-4 lg:w-1/3 xl:px-4 xl:w-1/3" x-show="!nshowAdd && !nshowEdit && !nshowAddMore">
                    <!-- Column Content -->
                    {{-- Skillar Section --}}
                    <div class="bg-white p-2 md:px-6 md:py-5 rounded-xl mt-4 lg:mt-0">
                        <x-skillar-banner/>
                    </div>
                    {{-- Network Section --}}
                    <div class="bg-white p-2 md:px-6 md:py-5 rounded-xl mt-4 md:mt-8">
                        <x-follow-people/>
                    </div>
                </div>


                {{-- Note More Info --}}
                <div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3" x-show="nshowAddMore">
                    <!-- Column Content -->
                    {{-- Tag Section --}}
                    <div class="bg-white pb-5 rounded-xl lg:h-full mt-4 lg:mt-0">

                            <div class="flex flex-wrap justify-between relative">
                                <div class="bg-green-550 text-white font-bold px-2 md:px-8 py-1 md:py-3 br-top-left"><label for="note"> <i class="fas fa-cog mr-2"></i> Note Info</label></div>
                            </div>
                            <div class="p-2 md:p-8">
                                <div>
                                    <form action="">
                                        <input type="text" placeholder="Title" class="input--field">
                                        <input type="text" placeholder="Source" class="input--field">
                                        <input type="text" placeholder="Source URL" class="input--field">
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
                </div>

            </div>
        </div>
    </div>
@endsection
