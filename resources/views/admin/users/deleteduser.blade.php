@extends('admin.layout.main')
@section('title','Manage Users')
@section('heading','Manage User ')
@section('desc','Manage users Who use Application  .')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
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
                                           <a href="{{route('admin.activate.user',$user)}}" class="btn btn-warning"> <i class="bi bi-upload"></i></a>
                                          
                                            
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

