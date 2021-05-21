@extends('admin.layout.main')
@section('title',' Services ')
@section('heading','Serivce  Management')
@section('desc','Manage Services.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Short Codes</li>
    </ol>
</nav>
@endsection
@section('alpineJs')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection
@section('content')
<section x-data="{open: false}">


    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-content">
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="contentTable">
                            <thead>
                                <tr>
                                    
                                    <th>Sr#</th>
                                    <th>Module </th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$service->module}}</td>
                                        <td>
                                            @if($service->status=='A')
                                                <span>Activate</span>
                                            @endif
                                            @if($service->status=='D')
                                                <span>Deactivate</span>
                                            @endif
                                            @if($service->status=='S')
                                                <span>Suspend</span>
                                            @endif
                                        </td>
                                        <td> 
                                            <a href="{{ route('admin.edit.service',$service) }}" class="btn btn-info btn-sm" > <i class="bi bi-pen"></i> Edit </a>
                                        </td>
                                    </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection