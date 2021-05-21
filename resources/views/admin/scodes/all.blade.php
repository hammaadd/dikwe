@extends('admin.layout.main')
@section('title','Short Code Management ')
@section('heading','Short Code Management')
@section('desc','Manage Short Codes.')
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
<div class="row my-2" >
    <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-primary btn-sm" @click=" open= !open" data-bs-toggle="tooltip" title="Add new Short Code" >Add Short Code <i class="bi bi-plus-circle"></i></button>
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
                    <form action="{{route('admin.add.code')}}" method="POST">
                        @csrf
                        
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" name="key" id="key" required>
                            <label for="">Key</label>
                        </div>
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" name="value" id="value" required>
                            <label for="">Value</label>
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
                                <th>Key</th>
                                <th>Heading</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($codes as $code)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$code->key}}</td>
                                <td>{{$code->value}}</td>
                                <td class="d-flex justify-content-center">
                                    <a class="btn btn-warning btn-sm m-1" href="{{route('admin.edit.code',$code)}}" title="Edit"><i class="bi bi-pen"></i></a>
                                   @if ($code->status=='1')
                                   <a class="btn btn-danger btn-sm m-1" href="{{route('admin.delete.code',$code)}}" title="Delete" onclick="return confirm('Are You Sure ?')"><i class="bi bi-trash"></i></a>
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
@endsection