<div class="w-full  md:px-0 bg-white rounded-xl">
    <div class="flex flex-wrap justify-between relative">
        <div class="bg-green-550 text-white font-bold px-2 md:px-8 py-1 md:py-3 br-top-left"><label for="knowledge-assets">Adding Bookmark</label></div>

    </div>
    <div class="p-2 md:p-8">
        <div class="rounded-xl p-2 md:p-4 border-2 border-green-150">
            <p>
                You can also use <span class="font-bold text-green-550">"DIKWE IT"</span> button to quickly save a bookmark.
            </p>
            <div class=" text-center md:text-right pt-1">
                <a href="#" class="font-bold text-green-550 link-hover">Add Browser Extension</a>
            </div>
        </div>
        <div class="mt-4 md:mt-8">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <form action="{{route('create.bookmark')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="rounded-xl p-2 md:p-8 xl:px-5 bg-green-150 my-2 md:my-4 flex flex-wrap overflow-hidden flex-row justify-between lg:items-center">
                    <div class=" overflow-hidden flex-wrap w-full md:w-2/6 xl:w-1/4">
                        <div class="block relative w-20 h-20 mx-auto">
                            <img id="profileImage" alt="profil" src="{{ asset('images/Ellipse 1792x.png') }}" class="object-cover rounded-xl border border-gray-400 w-full h-full"/>
                        </div>
                    </div>
                     <div class=" overflow-hidden flex-wrap w-full md:w-4/6 xl:w-3/4 px-1 md:px-0 text-center md:text-left mt-2 md:mt-0">
                        <button class="bg-gray-400 px-2 py-1 text-white m-1 rounded-xl hover:bg-green-550 focus:outline-none" type="button" onclick="showimage()">Upload From Device</button>
                        {{-- <button class="bg-gray-400 px-2 py-1 text-white m-1 rounded-xl hover:bg-green-550 focus:outline-none">Upload From Dkiwe</button>
                        <button class="bg-gray-400 px-2 py-1 text-white m-1 rounded-xl hover:bg-green-550 focus:outline-none">Upload From Google Drive</button>
                        <button class="bg-gray-400 px-2 py-1 text-white m-1 rounded-xl hover:bg-green-550 focus:outline-none">Insert A URL</button> --}}
                        <input type="file" name="thumbnail" id="thumbnail" style="display:none;">
                    </div>
                </div>
                <input type="text" placeholder="URL" class="input--field" name="source">
                <input type="text" placeholder="Title" class="input--field" name="title">
                <textarea name="description" id="" rows="3" class="input--field" placeholder="Bookmark Note"></textarea>
                <label for="">Tags</label>
                <div class="input--field ">
                    <select class="multiple-select" name="tags[]" multiple="multiple">
                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}" >{{$tag->tag}}</option>
                        @endforeach
                    </select>
                </div>
                <label for="">Workspace</label>
                <div class="input--field">
                    <select class="multiple-select" name="workspace[]" multiple="multiple" idate>
                        @foreach ($workspaces as $workspace)
                            <option value="{{$workspace->id}}">{{$workspace->title}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="flex flex-wrap overflow-hidden flex-row items-center justify-between">
                    <div class="input--f">
                        <div class=" mx-auto">
                            Color
                            <div class=" inline-block ml-4">
                                <input type="radio" name="color" class="form-checkbox text-purple-900 border-purple-900 bg-purple-900 rounded-full focus:ring-0" value="purple"/>
                                <input type="radio" name="color" class="form-checkbox text-yellow-400 border-yellow-400 bg-yellow-400 rounded-full focus:ring-0" value="yellow"/>
                                <input type="radio" name="color" class="form-checkbox text-indigo-700 border-indigo-700 bg-indigo-700 rounded-full focus:ring-0" value="indigo"/>
                                <input type="radio" name="color" class="form-checkbox text-green-550 border-green-550 bg-green-550 rounded-full focus:ring-0"  value="green"/>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="input--f">
                        <i class="fas fa-thumbs-up text-green-550 text-2xl mx-2"></i>
                        <i class="fas fa-thumbs-down text-green-550 text-2xl mx-2"></i>
                    </div> --}}
                </div>
                <div class="input--field">
                    <div class="flex flex-row justify-center">
                        <label class="items-center">
                            <input type="radio" name="visibility" class="h-4 w-4 text-green-550 focus:ring-0" value="P"/>
                            <span class="ml-2">
                                Public
                            </span>
                        </label>

                        <label class="items-center ml-4">
                            <input type="radio" name="visibility" class="h-4 w-4 text-green-550 focus:ring-0" value="PR"/>
                            <span class="ml-2">
                                Private
                            </span>
                        </label>
                        <label class="items-center">
                            <input type="radio" name="visibility" class="h-4 w-4 text-green-550 focus:ring-0" value="R"/>
                            <span class="ml-2">
                                Restricted
                            </span>
                        </label>
                    </div>
                    <div class="input--field">
                        <select class="multiple-select" name="status" >

                            <option value="active">Active</option>
                            <option value="inactive"> In Active</option>

                        </select>
                    </div>
                </div>
                <div class="text-center md:text-right my-4">
                    <button class="btn-gray" >Cancel</button>
                    <button type="submit" class="btn-green" wire:click="">Save</button>

                </div>
            </form>

        </div>

    </div>

</div>
