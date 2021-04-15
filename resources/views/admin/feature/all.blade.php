@extends('admin.layout.main')
@section('title','Feature Management')
@section('heading','Feature Management')
@section('desc','Manage features showing on the home page and features tab.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Slides</li>
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
        <button class="btn btn-primary btn-sm" @click=" open= !open" data-bs-toggle="tooltip" title="Add new feature" >Add Fetaure <i class="bi bi-plus-circle"></i></button>
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
    @forelse($features as $feat)
        <div class="col-md-4 col-sm-12 d-flex align-items-stretch">
            <div class="card shdaow-sm">
                <div class="card-content">
                    <img src="{{asset('images/features/'.$feat->image)}}" class="card-img-top img-fluid" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Feature # {{$feat->order}}</h4>
                        <p class="card-text">
                            {{$feat->text}}
                        </p>
                        <small class="text-muted">Last updated @if($feat->updated_at == null) {{($feat->created_at)->diffForHumans()}} @else {{($feat->updated_at)->diffForHumans()}} @endif</small>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-warning btn-sm " href="{{route('admin.edit.feature',$feat)}}" data-bs-toggle="tooltip" title="Edit new feature">Edit <i class="bi bi-pen"></i></a>
                            <a class="btn btn-danger btn-sm mx-2" href="{{route('admin.delete.feature',$feat)}}" onclick="return confirm('Do you really want to delete the feature.');" data-bs-toggle="tooltip" title="Delete feature">Delete <i class="bi bi-trash"></i></a>
                        </div>
                    </div>
                    <div>

                    </div>
                
                </div>
            </div>
        </div>
    @empty
    <div class="col-md-12 col-sm-12">
        <div class="card shadow-sm">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">No features to show. <a href="#" @click=" open= !open">Add new feature</a> </h4>
                </div>
            </div>
            
        </div>
    </div>
    @endforelse
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