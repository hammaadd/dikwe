@extends('user.layout.userLayout')
@section('title','Bookmarks')
@section('page-title','Bookmarks')
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

@php
    if(isset($_GET['m'])):
        if($_GET['m']=='add'):
            $xData = "{bshow: false , bshowAdd: true, bshowSidebar: false, bshowEdit:true}";
        elseif($_GET['m']=='add-info'):
            $xData = "{bshow: false , bshowAdd: true, bshowSidebar: false, bshowEdit:true}";
        else:
            $xData = "{bshow: false , bshowAdd: true, bshowSidebar: false, bshowEdit:true}";
        endif;
    else:
        $xData = "{bshow: false ,bshowAdd: false, bshowSidebar: false, bshowEdit:false, bshowAll:true, bshowSkill:true}";
    endif;

@endphp

    <div class="p-2 md:p-5 lg:p-2 xl:p-5" "

   >

        <div class="bg-green-150 rounded-xl p-2 md:p-8 lg:p-2 xl:p-8" x-data="{{$xData}}"
         @showbookedit.window="bshowAll=false , bshowAdd=false, bshowSkill=false, bshowEdit=true"
         @showaddbookmark.window="bshowAll=false , bshowAdd=true, bshowSkill=true"
         @showbookmark.window="bshowAll=true , bshowAdd=false, bshowSkill=true ,bshowEdit=false"
         >

            <div class="flex flex-wrap overflow-hidden lg:-mx-4 xl:-mx-4" >
                <div class="w-full lg:w-2/3 mx-auto md:px-0 bg-green-250 rounded-xl" x-show="bshowEdit">
    <div class="flex flex-wrap justify-between relative">
        <div class="bg-green-550 text-white font-bold px-2 md:px-8 lg:px-2 xl:px-8 py-3 br-top-left"><label for="workspace-info"><i class="fas fa-cog mr-2"></i>Bookmark Info</label></div>
        <div class="py-3 px-2 md:px-8 lg:px-2 xl:px-8 hidden sm:block">
            <a href="javascript:void(0)" x-on:click="$dispatch('showbookmark')" class="link-hover text-green-550 font-bold">
                Back To The Bookmark
            </a>
        </div>
        <div class="w-full flex flex-wrap overflow-hidden mt-4 md:mt-8">
            <livewire:edit-bookmark/>
            <div class="flex-wrap overflow-hidden w-full lg:w-1/2 px-2 md:px-5 lg:px-2 xl:px-5 lg:h-full">
                <x-bm-info-stat />
            </div>
        </div>


    </div>

</div>

               <div x-show="bshowAdd" class="px-8 w-2/3"> <livewire:add-bookmark/></div>
                <div x-show='bshowAll' class="w-2/4 overflow-hidden lg:px-4 lg:w-2/3 xl:px-4 xl:w-2/3 p-2"><livewire:show-bookmark-list/></div>

                <div class="w-full overflow-hidden lg:px-4 lg:w-1/3 xl:px-4 xl:w-1/3" x-show="bshowSkill">
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


