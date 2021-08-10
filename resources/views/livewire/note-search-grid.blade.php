<div class="relative mt-4">

   <div class="flex flex-wrap justify-between items-center px-4">
    <div class="mx-auto md:mx-0 mb-4">

        <span class="bg-green-550 font-bold py-2 px-3 mx-2 rounded-xl text-white focus:outline-none"><i class="fas fa-clipboard mr-2"></i><span class="hidden xl:inline-block">{{$noteHeading}}</span> <span class="counts md:ml-3">@if($notes) {{$notes->count()}} @endif</span></span>

    </div>
    <div>
        @if(count($select_note) > 0)
        <span class="text-green-550 font-bold py-2 px-3 mx-2 rounded-xl focus:outline-none"><span class="counts md:ml-3">{{count($select_note)}}</span> <span> Notes Selected</span></span>
        @endif
    </div>
    </div>


@if(isset($notes))
@if($noteStyle == 'list' && $notes->count() > 0)
<div class="mt-4 md:mt-8 px-2">
    @forelse($notes as $note)
        <div class="w-full md:w-11/12 mx-auto rounded-lg shadow-md mb-4 md:mb-8">
            <div class="flex flex-col-reverse sm:flex-row justify-between relative pt-2 px-2 md:px-4">

                <span class="text-lg font-bold pt-2 sm:pt-0">
                    <div class="w-4 h-4 rounded-full
                    @if($note->color == 'purple')
                        bg-purple-900
                    @elseif($note->color == 'yellow')
                        bg-yellow-400
                    @elseif($note->color == 'green')
                        bg-green-550
                    @elseif($note->color == 'blue')
                        bg-indigo-700
                    @else
                        bg-indigo-700
                    @endif
                        inline-block mr-1"></div><a href="{{route('view.note',$note->id)}}" class="hover:text-green-550">{{Str::limit($note->title,100)}}</a></span>
                <div x-data="{ bShow: false }">
                    <span class="text-sm">Last Updated <span class="time text-green-550">@if($note->updated_at == null) {{($note->created_at)->diffForHumans()}} @else {{($note->updated_at)->diffForHumans()}} @endif</span> </span>
                    <button @click=" bShow = !bShow " class="text-green-550 sm:text-gray-400 sm:bg-green-150 sm:rounded-xl ml-2 px-2 sm:h-10 sm:w-10 float-right hover:text-green-550 focus:outline-none">
                        <i class="fas fa-ellipsis-v text-lg align-middle"></i>
                    </button>
                    <ul
                        x-show="bShow"
                        @click.away="bShow = false"
                        x-transition:enter="transition transform origin-top-right ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition transform origin-top-right ease-out duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75"
                        class="absolute bg-white shadow-md overflow-hidden rounded-xl w-48 mt-2 py-1 right-0 top-10 z-20"
                    >
                    @if($note->owner->id == Auth::id())
                        <li>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-edit dropdown-item-icon"></i>
                                <span class="ml-2">Edit Note</span>
                            </a>
                        </li>
                    @endif
                        {{-- <li>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-share-alt dropdown-item-icon"></i>
                                <span class="ml-2">Share Note</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file-export dropdown-item-icon"></i>
                                <span class="ml-2">Export Note</span>
                            </a>
                        </li> --}}
                    @if($note->owner->id == Auth::id())
                        <li>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-trash-alt dropdown-item-icon"></i>
                                <span class="ml-2">Delete Note</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{route('view.note',$note->id)}}" target="_blank" class="dropdown-item">
                            <i class="fas fa-external-link-alt dropdown-item-icon"></i>
                            <span class="ml-2">View Note</span>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-between items-start px-2 md:px-4 py-2">
                <div class="flex flex-col">
                    <div class="tags">
                        <label for="tags" class="font-bold inline-block">Tags</label>
                        <div class="sm:inline-block sm:ml-2 pt-1 sm:pt-0">
                            @forelse($note->tags as $tag)
                                <span class="tag-item">{{$tag->taga->tag}}</span>
                            @empty
                                <span class="text-red-600">No tags.</span>
                            @endforelse
                        </div>
                    </div>
                    <div class="workspaces pt-2 sm:pt-6">
                        <label for="workspaces" class="font-bold inline-block">Workspaces</label>
                        <div class="sm:inline-block sm:ml-2 pt-1 sm:pt-0">
                            @forelse($note->workspace as $ws)
                                <span class="tag-item">{{$ws->workspacea->title}}</span>
                            @empty
                                <span class="text-red-600">No Workspaces.</span>
                            @endforelse
                        </div>
                    </div>
                </div>


                    <livewire:note-reactions :wire:key="'list-'.$note->id" :note="$note" :type="'list'"/>


            </div>
            <div class="flex flex-col sm:flex-row justify-between items-center relative bg-green-150 px-2 md:px-4 py-2">
                <div class="flex flex-row justify-between items-center">
                    <div class="flex items-center justify-center space-x-2">
                        <a href="#" class="block relative">
                            <img alt="User Image" src="
                            @if($note->owner->profile_img == null)
                                https://ui-avatars.com/api/?background=2FB268&bold=true&color=FFFFFF&name={{ str_replace(' ','+' ,$note->owner->name) }}
                                @else
                                {{asset('user_profile_images/'.$note->owner->profile_img)}}
                                @endif" class="mx-auto object-cover rounded-full h-8 w-8 "/>
                        </a>
                        <div class="flex flex-col">
                            <a href="{{route('u.profile',$note->owner)}}" class="font-bold link-hover">
                                {{$note->owner->name}}
                            </a>
                        </div>
                    </div>
                    <span class="date text-sm ml-3">{{$note->created_at->format('d M, Y')}}</span>
                </div>
                <div>
                    <a href="{{route('view.note',$note->id)}}" class="btn-read-more">View Details</a>
                <input type="checkbox" value="{{$note->id}}" name="select_note" id="note-{{$note->id}}" class="form-checkbox text-green-550 border-green-550 focus:ring-0" @if($note_selected) checked @endif>
                </div>
            </div>
        </div>
        @empty
            <div class="p-3 mx-auto">
                <span class="bg-red-600 font-bold py-2 px-3 mx-2 rounded-xl text-white focus:outline-none">Nothing found!</span>
            </div>
        @endforelse
    </div>
    {{$notes->links('vendor.livewire.tailwind')}}

    @endif

    {{-- grid starts from here --}}

@if($noteStyle =='grid' && $notes->count() > 0)
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 w-full md:w-10/12 mx-auto">

    @forelse($notes as $note)
        <div class="p-3 rounded-xl shadow-md flex flex-wrap overflow-hidden w-full">
            <div class="self-start w-full">
                <div class="flex flex-row justify-between relative" x-data="{ bShow: false }">
                    <span class="text-lg font-bold" title="{{$note->title}}">
                    <div class="w-4 h-4 rounded-full
                        @if($note->color == 'purple')
                            bg-purple-900
                        @elseif($note->color == 'yellow')
                            bg-yellow-400
                        @elseif($note->color == 'green')
                            bg-green-550
                        @elseif($note->color == 'blue')
                            bg-indigo-700
                        @else
                            bg-indigo-700
                        @endif
                            inline-block mr-1"></div><a href="{{route('view.note',$note->id)}}"  class="hover:text-green-550">{{Str::limit($note->title,30)}}</a></span>
                    <button x-on:click=" bShow = !bShow " class="text-gray-400 bg-green-150 rounded-xl mx-1 px-2 h-10 w-10 hover:text-green-550 focus:outline-none border">
                        <i class="fas fa-ellipsis-v text-lg align-middle"></i>
                    </button>
                    <ul
                        x-show="bShow"
                        x-on:click.away="bShow = false"
                        x-transition:enter="transition transform origin-top-right ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition transform origin-top-right ease-out duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75"
                        class="absolute bg-white shadow-md overflow-hidden rounded-xl w-48 mt-2 py-1 right-0 top-10 z-20"
                    >
                    @if($note->owner->id == Auth::id())
                        <li>
                            <a href="javascript:void(0)" wire:click="passNoteId({{$note->id}})" x-on:click=" $dispatch('shownoteedit') , @this.passNoteId({{$note->id}})" class="dropdown-item">
                                <i class="fas fa-edit dropdown-item-icon"></i>
                                <span class="ml-2">Edit Note</span>
                            </a>
                        </li>
                    @endif
                        {{-- <li>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-share-alt dropdown-item-icon"></i>
                                <span class="ml-2">Share Note</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file-export dropdown-item-icon"></i>
                                <span class="ml-2">Export Note</span>
                            </a>
                        </li> --}}
                    @if($note->owner->id == Auth::id())
                        <li>
                            <a href="javascript:void(0)" class="dropdown-item"  wire:click="delete({{$note->id}})" x-on:click="bShow = !bShow, @this.delete({{$note->id}})">
                                <i class="fas fa-trash-alt dropdown-item-icon"></i>
                                <span class="ml-2">Delete Note</span>
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="{{route('view.note',$note->id)}}" target="_blank" class="dropdown-item">
                            <i class="fas fa-external-link-alt dropdown-item-icon"></i>
                            <span class="ml-2">View Note</span>
                        </a>
                    </li>
                    </ul>
                </div>

                <div class="notes--description">
                    <p class="px-3 text-gray-600 list-inside list-disc">
                        {!!Str::limit($note->description,190)!!}
                    </p>
                </div>

            </div>

            <div class="self-end w-full pt-3">
                <div class="flex flex-wrap justify-between items-center">
                    <livewire:note-reactions :wire:key="'grid-'.$note->id" :note="$note" :type="'grid'"/>
                    <div title="Visibility">
                        <span class="text-green-550 text-sm" >@if($note->visibility =='P')
                            <span title="Public"><i class="fas fa-lock-open pr-1.5"></i></span> Public
                        @elseif($note->visibility =='PR')
                            <span title="Private"><i class="fas fa-lock pr-1.5"></i></span> Private
                        @elseif($note->visibility =='R')
                            <span title="Restricted"><i class="fas fa-user-lock pr-1.5"></i></span> Restricted
                        @else
                            <span title="Public"><i class="fas fa-lock-open pr-1.5"></i></span> Public
                        @endif</span>
                    </div>
                </div>
                <div class="flex flex-row justify-between items-center lg:flex-col xl:flex-row relative mt-2">
                    <span class="font-bold lg:mb-4 xl:mb-0"><i class="fas fa-users-cog mr-1 text-gray-400"></i><a href="{{route('u.profile',$note->owner)}}">{{$note->owner->name}}</a></span>
                    <span class="date text-sm" title="{{$note->created_at}}">@if($note->updated_at == null) {{($note->created_at)->diffForHumans()}} @else {{($note->updated_at)->diffForHumans()}} @endif
                        <input type="checkbox" name="select_none" value="{{$note->id}}" wire:model="select_note" id="note-{{$note->id}}" class="form-checkbox text-green-550 border-green-550 focus:ring-0 ml-2" @if($note_selected) checked @endif></span>
                </div>
            </div>
        </div>
    @empty
    <div class="p-3 mx-auto">
        <span class="bg-red-600 font-bold py-2 px-3 mx-2 rounded-xl text-white focus:outline-none">Nothing found!</span>
    </div>
    @endforelse

    </div>
    {{$notes->links('vendor.livewire.tailwind')}}
    @endif
@endif

    {{-- <div wire:loading>
        <div class=" absolute w-full h-full bg-white bg-opacity-90 -top-2 grid place-items-center">
            <img src="{{ asset('assets/loader/three-dots.svg') }}" class="">
        </div>
    </div> --}}
    {{-- @include('user.sections.notification') --}}
</div>
