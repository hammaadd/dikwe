@extends('admin.layout.main')
@section('title','Payment Plans')
@section('heading','Payment Plans')
@section('desc','Manage payment plan .')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Payment Plans</li>
    </ol>
</nav>
@endsection
@section('extraStyles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<div class="row my-2">
    <div class="col-12 d-flex justify-content-end">
        {{-- <a class="btn btn-primary btn-sm" href="{{route('admin.create.plan')}}" title="Add Payment Plan">Add Payment Plan <i class="bi bi-plus-circle"></i></a> --}}
    </div>
</div>
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
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Features</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($plans as $plan)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$plan->name}}</td>
                                        <td>{{$plan->type}}</td>
                                        <td>$ {{$plan->amount}}</td>
                                        <td>{{$plan->status}}</td>
                                        <td>
                                           @php
                                               $abc = json_decode($plan->features);
                                              
                                           @endphp
                                            <ul style="list-style-type: none">
                                          @foreach ($abc as $features)
                                             <li >{{$features}}</li>
                                          @endforeach 
                                            </ul>
                                        </td>
                                        <td class="">
                                            <a class="btn btn-warning btn-sm" href="{{route('admin.edit.plan',$plan)}}" title="Edit"><i class="bi bi-pen"></i></a>
                                            {{-- <a class="btn btn-danger btn-sm" href="{{route('admin.delete.plan',$plan)}}" title="Delete"><i class="bi bi-trash"></i></a> --}}
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

