@extends('admin.layout.main')
@section('title','Update FAQ')
@section('heading','Update FAQ')
@section('desc','Update faqs to show on frequently asked questions page.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{route('admin.faqs')}}">FAQ'S</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update FAQ # {{$faq->order}}</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="row d-flex justify-content-center align-items-stretch" >
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
