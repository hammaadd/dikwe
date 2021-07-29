@extends('user.layout.userLayout')
@section('title','Notes')
@section('page-title','Notes')
@section('headerExtra')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('trix/dist/trix.css')}}">
    <script type="text/javascript" src="{{ asset('trix/dist/trix.js')}}"></script>
    {{-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> --}}
    @livewireStyles
@endsection
@section('bodyExtra')
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
@section('content')
@php
    if(isset($_GET['m'])):
        if($_GET['m']=='add'):
            $xData = "{nshowEdit:false, nshowAdd:true, nshowAddMore: false, showAddForm: true , noteStyle:'grid', isOpen: false, fOpen: false, noteSearch: false , showViewNote:false}";
        elseif($_GET['m']=='add-info'):
            $xData = "{nshowEdit:false, nshowAdd:false, nshowAddMore: true, showAddForm: true,noteStyle:'grid',isOpen: false, fOpen: false ,noteSearch: false ,showViewNote:false}";
        elseif($_GET['m']=='search-notes'):
            $xData = "{nshowEdit:false, nshowAdd:false, nshowAddMore: false, showAddForm: true,noteStyle:'grid',isOpen: false, fOpen: false ,noteSearch: true ,showViewNote:false}";
        elseif($_GET['m']=='view'):
            $xData = "{nshowEdit:false, nshowAdd:false, nshowAddMore: false, showAddForm: false,noteStyle:'grid',isOpen: false, fOpen: false ,noteSearch: false ,showViewNote:true}";
        else:
            $xData = "{nshowEdit:false, nshowAdd:false, nshowAddMore: false, showAddForm: true,noteStyle:'grid',isOpen: false, fOpen: false, noteSearch: true ,showViewNote:false}";
        endif;
    else:
        $xData = "{nshowEdit:false, nshowAdd:false, nshowAddMore: false,showAddForm:false,noteStyle:'grid',isOpen: false, fOpen: false, noteSearch: true ,showViewNote:false}";
    endif;

@endphp
    <div class="p-2 md:p-5 lg:p-2 xl:p-5">
        <div class="bg-green-150 rounded-xl p-2 md:p-8 lg:p-2 xl:p-8">
            <livewire:note-filter/>
            <div class="flex flex-wrap overflow-hidden lg:-mx-4 xl:-mx-4" x-data="{{$xData}}"
            @shownoteedit.window="nshowEdit=true , nshowAdd=false, nshowAddMore=false, noteSearch=false"
            @showsearchnote.window="nshowEdit=false , nshowAdd=false, nshowAddMore=false, noteSearch=true"
            @shownoteadd.window="nshowAddMore = true , nshowAdd = false , nShowEdit = false"
            @showaddform.window="showAddForm  = true, nshowAdd = true, noteSearch = false " @showViewNote.window="noteSearch = false , showViewNote = true" >
                
            
                

                {{-- Add Section --}}
                <div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3" x-show="nshowAdd">
                    <!-- Column Content -->
                    {{-- Tag Section --}}
                    <div class="bg-white pb-5 rounded-xl lg:h-full mt-4 lg:mt-0"">
                        <div class="flex flex-wrap justify-between relative">
                            <div class="bg-green-550 text-white font-bold px-2 md:px-8 py-1 md:py-3 br-top-left" >
                                <label for="knowledge-assets">Notes</label>
                                <a  href="javascript:void(0)" x-on:click="$dispatch('showaddform')" wire:click="moreInfo" title="Add Note" class="bg-green-550 text-white font-bold py-2 px-3 mx-2 rounded-xl border-2 border-green-550 hover:bg-white hover:text-green-550 focus:outline-none">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </div>
                            <div class="py-3 px-2 md:px-8 lg:px-2 xl:px-8 hidden sm:block">
                                <a href="javascript:void(0)" x-on:click="$dispatch('showsearchnote')" class="link-hover text-green-550 font-bold">
                                    Back To The Notes
                                </a>
                            </div>
                        </div>
                        {{-- <div class="w-full px-2 md:px-5 flex flex-wrap justify-between items-center relative mt-5">
                            
                        </div> --}}
                        
                        
                        <livewire:add-note/>

                        {{-- Notes Grid View --}}

                        {{-- <div class="mt-4 md:mt-8 md:pb-5 px-2 md:px-0">
                           <livewire:note-grid/>
                        </div> --}}
                    </div>
                </div>

                
                
            

            @include('user.inc.notes-search')
            

            {{-- Note More Info --}}
            <div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3" x-show="nshowAddMore">
                <!-- Column Content -->
                {{-- Tag Section --}}
                <livewire:add-note-info/>
            </div>

            <div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3" x-show="nshowEdit">
                <!-- Column Content -->
                {{-- Tag Section --}}
                <livewire:edit-note/>
            </div>

            <div class="w-full overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3" x-show="showViewNote">
                <livewire:note-view />
            </div>

                <div class="w-full overflow-hidden lg:px-4 lg:w-1/3 xl:px-4 xl:w-1/3">
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


               

                

            </div>
        </div>
    </div>
@endsection
@section('scripts')
{{-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> --}}
<script>

function copyToClipBoard(text) {
  /* Get the text field */
  var copyText = document.createElement("textarea");
  document.body.appendChild(copyText);
  copyText.textContent  = text;

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
  document.body.removeChild(copyText);
}
    $(document).ready(function() {

        $('#tags1').select2();
        $('#workspaces1').select2();
        
//         var quill = new Quill('#editor', {
//     theme: 'snow',
//     placeholder: 'Note Body ...'
//   });
    });
    

</script>
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/vue@v0.3.x/dist/livewire-vue.js"></script>
@endsection
