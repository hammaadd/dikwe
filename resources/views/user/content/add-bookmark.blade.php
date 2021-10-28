@extends('user.layout.userLayout')
@section('title','Add Bookmark')
@section('page-title','Add Bookmark')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('bodyExtra')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.multiple-select').select2({
                tags: true,

            });
        });
    </script>
@endsection
@section('content')
    <div class="p-2 md:p-5 lg:p-2 xl:p-5">
        <div class="bg-green-150 rounded-xl p-2 md:p-8 lg:p-2 xl:p-8">
            <div class="w-full lg:w-2/3 xl:w-1/2 mx-auto md:px-0 bg-white rounded-xl">
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
                            <div class="input--field">
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
                                <button class="btn-gray">Cancel</button>
                                <button type="submit" class="btn-green">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
{{-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> --}}
<script>
    $(document).ready(function() {
        $('#tags1').select2();
        $('#workspaces1').select2();

//         var quill = new Quill('#editor', {
//     theme: 'snow',
//     placeholder: 'Note Body ...'
//   });
    });
    function fasterPreview( uploader ) {
        if ( uploader.files && uploader.files[0] ){
            //console.log(window.URL.createObjectURL(uploader.files[0]));
              $('#profileImage').attr('src',
                 window.URL.createObjectURL(uploader.files[0]) );
        }
    }
    $("#thumbnail").change(function(){
        fasterPreview( this );
    });
    function showimage()
    {
        $("#thumbnail").click();
    }

</script>
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/vue@v0.3.x/dist/livewire-vue.js"></script>
@endsection
