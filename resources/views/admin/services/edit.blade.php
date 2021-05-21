@extends('admin.layout.main')
@section('title','Services')
@section('heading','Services')
@section('desc','Service.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start">
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
                    <form action="{{route('admin.update.service',$service)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" disabled value="{{$service->module}}" >
                            <label for="">Module </label>
                        </div>
                        <div class="my-2">
                           <label>Status</label>
                           <select name="status" class="form-control">
                               <option value="A" 
                               @if($service->status=='A')
                                    selected
                               @endif
                               >Activate</option>
                               <option value="D"
                               @if($service->status=='D')
                                    selected
                               @endif
                               >De Activate</option>
                               <option value="S"
                               @if($service->status=='S')
                                    selected
                               @endif
                               >Suspend </option>
                               
                           </select>
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