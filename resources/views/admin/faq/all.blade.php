@extends('admin.layout.main')
@section('title','FAQ Management')
@section('heading','FAQ Management')
@section('desc','Manage frequently asked questions.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">FAQ's</li>
    </ol>
</nav>
@endsection
@section('alpineJs')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection
@section('content')
<section x-data="{open: false}">
<div class="row my-2" >
    <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-primary btn-sm" @click=" open= !open" data-bs-toggle="tooltip" title="Add new faq" >Add FAQ <i class="bi bi-plus-circle"></i></button>
    </div>
</div>
<div class="row d-flex justify-content-center align-items-stretch" >
    <div class="col-md-6 col-12 " 
        x-show.transition="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
    >
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form action="{{route('admin.add.feature')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating my-2">
                            <input type="number" class="form-control" min="0" required name="order">
                            <label for="">Feature Order</label>
                        </div>
                        <div class="form-floating my-2">
                            <textarea class="form-control" rows="10" name="text" id="text" requried></textarea>
                            <label for="">Text</label>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" class="form-control" required id="image" name="image">     
                        </div>
                        <div class="form-group">
                            <img id="showImage" src="" alt="" style="width:100%; height:auto;">
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button class="btn btn-primary btn-sm" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection


@section('scriptCode')
<script>
    function fasterPreview( uploader ) {
        if ( uploader.files && uploader.files[0] ){
              $('#showImage').attr('src',
                 window.URL.createObjectURL(uploader.files[0]) );
        }
    }

    $("#image").change(function(){
        fasterPreview( this );
    });

</script>
@endsection