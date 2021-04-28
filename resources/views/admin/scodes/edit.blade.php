@extends('admin.layout.main')
@section('title','Short Codes')
@section('heading','Short Codes')
@section('desc','Manage Short Codes.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Short Code</li>
    </ol>
</nav>
@endsection
@section('alpineJs')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection
@section('content')
<section x-data="{open: false}">
<div class="row my-2" >
    
</div>

<div class="row d-flex justify-content-center">
    <div class="col-6">
        <div class="card shadow-sm">
            <div class="card-content">
                <div class="card-body">
                    <form action="{{route('admin.update.code',$scode)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" name="key" id="key" required value="{{$scode->key}}" @if ($scode->status=='0')
                                disabled
                            @endif>
                            <label for="">Key</label>
                        </div>
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" name="value" id="value" required value="{{$scode->value}}">
                            <label for="">Value</label>
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
</section>
@endsection