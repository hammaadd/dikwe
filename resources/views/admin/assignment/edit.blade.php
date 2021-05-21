@extends('admin.layout.main')
@section('title','Edit Permission Assignment')
@section('heading','Edit Permission Assignment')
@section('desc','Update the permission of the roles .')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{route('admin.assignment.list')}}"></a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Roles Permission</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="row d-flex justify-content-center align-items-stretch" >
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <form  method="post" action="{{route('admin.update.assignment',$role)}}">
                            @csrf
                            <div class="form-floating my-2">
                                <input type="text" class="form-control" value="{{$role->display_name}}" disabled>
                                 <label for="">Role</label>
                             </div>
                             <div class="form-group">
                                 <ul class="list-inline">
                                 @foreach ($permissions as $permission)
                                    <li> <input type="checkbox" name="permission[]" 
                                        @foreach ($role->permissions as $role_permission)
                                            @if($role_permission->id==$permission->id)
                                                checked
                                            @endif
                                        @endforeach
                                         value="{{$permission->id}}"> {{$permission->display_name}}</li>
                                 @endforeach
                                </ul>
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
</div>
@endsection

