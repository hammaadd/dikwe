@extends('admin.layout.main')
@section('title','Update FAQ')
@section('heading','Update FAQ')
@section('desc','Update faqs to show on frequently asked questions page.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{route('admin.faqs')}}">FAQ'S</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update FAQ # {{$faq->order}}</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="row d-flex justify-content-center align-items-stretch" >
    <div class="col-md-8 col-8">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form action="{{route('admin.update.faq',$faq)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-floating my-2">
                            <input type="number" class="form-control" min="0" required name="order" value="{{$faq->order}}">
                            <label for="">FAQ Order</label>
                        </div>
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" name="question" id="question" value="{{$faq->question}}" required>
                            <label for="">Question ?</label>
                        </div>
                        <div class="form-floating my-2">
                            <textarea class="form-control" rows="10" name="answer" id="answer">{{$faq->answer}}</textarea>
                            <label for="">Answer</label>
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
@endsection
