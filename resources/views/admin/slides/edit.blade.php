@extends('admin.layout.main')
@section('title','Update Slide')
@section('heading','Update Slide')
@section('desc','Update slides content for the homepage slider.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{route('admin.slides')}}">Slides</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Slide # {{$slide->order}}</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="row d-flex justify-content-center align-items-stretch" >
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form action="{{route('admin.update.slide',$slide)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-floating my-2">
                            <input type="number" class="form-control" min="0" required name="slide_no" value="{{$slide->order}}">
                            <label for="">Slide No.</label>
                        </div>
                        <div class="form-group my-2">
                            <label for="">Text Of Slide</label>
                            <textarea class="form-control" cols="30" rows="5" name="text" id="text" requried>{{$slide->text}}</textarea>            
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

