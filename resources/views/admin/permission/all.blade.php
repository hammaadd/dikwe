@extends('admin.layout.main')
@section('title','All Permissions  ')
@section('heading','All Permissions ')
@section('desc','All the permission Admin can assign.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">All Permissions </li>
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
        <button class="btn btn-primary btn-sm" @click=" open= !open" data-bs-toggle="tooltip" title="Add New Permission" > Add Permission <i class="bi bi-plus-circle"></i></button>
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
                    <form action="{{route('admin.add.permission')}}" method="POST">
                        @csrf
                        
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" name="name" id="name" required  value="{{old('name')}}">
                            <label for="">Name</label>
                        </div>
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" name="display_name" id="display_name" required value="{{old('display_name')}}">
                            <label for="">Display Name </label>
                        </div>
                        <div class="form-floating my-2">
                           <textarea class="form-control" name="description" id="description" >{{old('description')}}</textarea>
                            <label for="">Description  </label>
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
<div class="row d-flex justify-content-center">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-content">
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="contentTable">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th>Description</th>
                                <th class="d-flex justify-content-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($permissions as $permission)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->display_name}}</td>
                                <td>{{$permission->description}}</td>
                                <td class="d-flex justify-content-center">
                                    <a class="btn btn-warning btn-sm m-1" href="{{route('admin.edit.permission',$permission)}}" title="Edit"><i class="bi bi-pen"></i></a>
                                  
                                   <a class="btn btn-danger btn-sm m-1" href="{{route('admin.delete.permission',$permission)}}" title="Delete" onclick="return confirm('Are You Sure ?')"><i class="bi bi-trash"></i></a>
                                  
                                </td>
                            </tr>
                        @empty
                            <p>No Data Available</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection