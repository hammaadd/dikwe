@extends('admin.layout.main')
@section('title','Slide Management')
@section('heading','Slide Management')
@section('desc','Manage slides showing on the home page slider.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start">
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
        <button class="btn btn-primary btn-sm" @click=" open= !open" data-bs-toggle="tooltip" title="Add new slide" >Add Slide <i class="bi bi-plus-circle"></i></button>
    </div>
</div>
<div class="row d-flex justify-content-center align-items-stretch" >
    <div class="col-md-4 col-12 " 
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
                    <form action="{{route('admin.add.slide')}}" method="POST">
                        @csrf
                        <div class="form-floating my-2">
                            <input type="number" class="form-control" min="0" required name="slide_no">
                            <label for="">Slide No.</label>
                        </div>
                        <div class="form-group my-2">
                            <label for="">Text Of Slide</label>
                            <textarea class="form-control" cols="30" rows="5" name="text" id="text" requried></textarea>            
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button class="btn btn-primary btn-sm" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @forelse($slides as $slide)
        <div class="col-md-4 col-sm-12 d-flex align-items-stretch">
            <div class="card shdaow-sm">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Slide # {{$slide->order}}</h4>
                        <p class="card-text">
                            {{$slide->text}}
                        </p>
                        <small class="text-muted">Last updated @if($slide->updated_at == null) {{($slide->created_at)->diffForHumans()}} @else {{($slide->updated_at)->diffForHumans()}} @endif</small>
                        <a class="btn btn-warning btn-sm" href="{{route('admin.edit.slide',$slide)}}" data-bs-toggle="tooltip" title="Edit new slide">Edit <i class="bi bi-pen"></i></a>
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
                    <h4 class="card-title">No slides to show. <a href="#" @click=" open= !open">Add new slide</a> </h4>
                </div>
            </div>
            
        </div>
    </div>
    @endforelse
</div>
</section>
@endsection