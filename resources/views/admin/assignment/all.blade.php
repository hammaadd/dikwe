@extends('admin.layout.main')
@section('title','Assignment of Permission   ')
@section('heading','Assignment of Permission  ')
@section('desc','Permission that are assigned to the roles.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Assignment permission</li>
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
        <button class="btn btn-primary btn-sm" @click=" open= !open" data-bs-toggle="tooltip" title="Add New Permission" > Assign Permission <i class="bi bi-plus-circle"></i></button>
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
                    <form action="{{route('admin.assign.permission')}}" method="POST">
                        @csrf
                        
                        <div class="form-floating my-2">
                           <select name="role_id" id="" class="form-control">
                               @foreach ($roles as $role)
                                   <option value="{{$role->id}}">{{$role->display_name}}</option>
                               @endforeach
                           </select>
                            <label for="">Role</label>
                        </div>
                        <div class="form-group my-2">
                            <ul class = "list-inline">
                                @foreach ($permissions as $permission)
                                    <li class=""><input type="checkbox" name="permission[]" value="{{$permission->id}}"> {{$permission->display_name}} </li>
                                @endforeach
                            </ul>
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
                                <th>Permission</th>
                                <th class="d-flex justify-content-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$role->name}}</td>
                                <td >
                                 @foreach ($role->permissions as $permission)
                                
                                 <span class="btn btn-success btn-sm" >{{$permission->display_name}}</span>
                                 @endforeach
                                </td >
                                <td class="d-flex justify-content-center">
                                    <a class="btn btn-warning btn-sm m-1" href="{{route('admin.edit.assignment',$role)}}" title="Edit"><i class="bi bi-pen"></i></a>
                                   <a class="btn btn-danger btn-sm m-1" href="{{route('admin.delete.assignment',$role)}}" title="Delete" onclick="return confirm('Are You Sure ?')"><i class="bi bi-trash"></i></a>
                                  
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