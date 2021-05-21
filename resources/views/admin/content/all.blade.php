@extends('admin.layout.main')
@section('title','Content Management')
@section('heading','Content Management')
@section('desc','Manage dynamic page content here or sections content.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Content</li>
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
                                        <th>Key</th>
                                        <th>Heading</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($contents as $con)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$con->key}}</td>
                                        <td>{{$con->heading}}</td>
                                        <td class="d-flex justify-content-center">
                                            <a class="btn btn-warning btn-sm" href="{{route('admin.edit.content',$con)}}" title="Edit"><i class="bi bi-pen"></i></a>
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

