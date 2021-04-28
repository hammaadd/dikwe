@extends('admin.layout.main')
@section('title','Edit Permission')
@section('heading','Edit Permission')
@section('desc','Edit Permission.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Edit Permission </li>
    </ol>
</nav>
@endsection
@section('alpineJs')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection
@section('content')
<section x-data="{open: false}">
<div class="row my-2" >
    
</div>

<div class="row d-flex justify-content-center">
    <div class="col-6">
        <div class="card shadow-sm">
            <div class="card-content">
                <div class="card-body">
                    <form action="{{route('admin.update.permission',$permission)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" name="name" id="name" required value="{{$permission->name}}" >
                            <label for="">Name</label>
                        </div>
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" name="display_name" id="display_name" required value="{{$permission->display_name}}">
                            <label for="">Display Name </label>
                        </div>
                        <div class="form-floating my-2">
                            <textarea class="form-control" name="description" rows="6" id="description" >{{$permission->description}}</textarea>
                            <label for="">Description</label>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button class="btn btn-primary btn-sm" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection