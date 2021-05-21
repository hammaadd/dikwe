@extends('admin.layout.main')
@section('title','FAQ Management')
@section('heading','FAQ Management')
@section('desc','Manage frequently asked questions.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">FAQ's</li>
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
        <button class="btn btn-primary btn-sm" @click=" open= !open" data-bs-toggle="tooltip" title="Add new faq" >Add FAQ <i class="bi bi-plus-circle"></i></button>
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
                    <form action="{{route('admin.add.faq')}}" method="POST">
                        @csrf
                        <div class="form-floating my-2">
                            <input type="number" class="form-control" min="0" required name="order">
                            <label for="">FAQ Order</label>
                        </div>
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" name="question" id="question">
                            <label for="">Question ?</label>
                        </div>
                        <div class="form-floating my-2">
                            <textarea class="form-control" rows="10" name="answer" id="answer" requried></textarea>
                            <label for="">Answer</label>
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
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Frequently Asked Questions</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="list-group">
                        @forelse($faqs as $faq)
                            <div class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{$faq->question}}</h5>
                                    <small>Last updated @if($faq->updated_at == null) {{($faq->created_at)->diffForHumans()}} @else {{($faq->updated_at)->diffForHumans()}} @endif</small>
                                </div>
                                <p class="mb-1">
                                    {{$faq->answer}}
                                </p>
                                <small>Order # {{$faq->order}}</small>
                                <div class="d-flex justify-content-end">
                                    <a href="{{route('admin.edit.faq',$faq)}}" class="btn btn-warning btn-sm m-2">Edit</a>
                                    <a href="{{route('admin.delete.faq',$faq)}}" onclick="return confirm('Do you really want to delete FAQ');" class="btn btn-danger btn-sm m-2">Delete</a>
                                </div>
                            </div>
                        @empty
                            <p>No Faq's to show.</p>

                        @endforelse
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection