@extends('admin.layout.main')
@section('title','Manage Administrator')
@section('heading','Manage Adminstrator ')
@section('desc','Manage Administrator of the Application .')
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
                                    <a href="{{route('admin.add.adminstrator')}}" class="btn btn-success btn-sm float-end mb-3" title="Create Administrator"><i class="bi bi-download"></i> Create Adminstator</a>
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
                                @foreach($users as $user)
                                   
                                @if ($user->hasrole('administrator'))
                                           
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                       
                                        <td>
                                       
                                         <a href="{{route('admin.deleteadminstator',$user)}}" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure to delete ?')"> <i class="bi bi-trash"></i></a>  
                                            
                                            
                                          
                                            
                                        </td>
                                    </tr>
                                    @endif 
                                 
                                
                                @endforeach
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

