@extends('admin.layout.main')
@section('title','Manage Users')
@section('heading','Manage User ')
@section('desc','Manage users Who use Application  .')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
</nav>
@endsection
@section('extraStyles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<section class="row">
    <section id="multiple-column-form">
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{route('admin.export.allusers')}}" class="btn btn-success btn-sm float-end mb-3" title="Export All the User "><i class="bi bi-download"></i> CSV Export</a>
                                </div>
                            </div>
                            <table class="table table-bordered table-striped" id="contentTable">
                                <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Name</th>
                                        <th>Email </th>
                                        
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                       
                                        <td class="d-flex justify-content-center">
                                           <div class="m-2">
                                                {{-- <a class="btn btn-warning btn-sm" href="{{route('admin.edit.user',$user)}}" title="Delete"><i class="bi bi-pencil"></i></a> --}}
                                                @if ($user->hasRole('user'))
                                                    <a class="btn btn-danger btn-sm" href="{{route('admin.delete.user',$user)}}" title="Delete"><i class="bi bi-trash"></i></a><br>
                                                @endif
                                                
                                                @if($user->email_verified_at==NULL)
                                                <a href="{{route('admin.user.verifyemail',$user)}}" class="btn btn-success mt-3 btn-sm" ><i class="bi bi-user-check"></i>Varify Email </a>
                                                @endif
                                           </div >
                                           @if ($user->hasRole('user'))
                                                   
                                                
                                            <div class="m-2">
                                                <form action="{{route('admin.change.status',$user)}}" method="post">
                                                    @csrf
                                                    <select name="status" class="form-control">
                                                        <option value="A" @if($user->status=='A') selected @endif>Activate</option>
                                                        <option value="D" @if($user->status=='D') selected @endif>Suspend</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-info btn-sm mt-2" title="Submit"><i class="bi bi-check"></i></button>
                                                </form>
                                               
                                           </div>
                                           @endif
                                            
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
</section>
@endsection
@section('scriptCode')
<script>
    $(document).ready(function() {
        $('#contentTable').dataTable();
    });
</script>
@endsection
@section('extraScripts')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
@endsection

