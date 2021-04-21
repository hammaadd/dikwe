@extends('admin.layout.main')
@section('title','Subscribers')
@section('heading','Subscribers')
@section('desc','Manage Subscriber Who Subscribe us .')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Subscriber</li>
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
                                        <th>Email </th>
                                        <th>Subcribe/Unsubcribe</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if ($user->status=='1')
                                                <span class="text-success">Subscribe</span>
                                            @else
                                                <span class="text-danger">Un Subscribe</span>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <a class="btn btn-danger btn-sm" href="{{route('admin.delete.subscribe',$user)}}" title="Delete" onclick="return confirm('Are You Sure ?')"><i class="bi bi-trash"></i></a>
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

