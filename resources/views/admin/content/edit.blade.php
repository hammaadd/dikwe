@extends('admin.layout.main')
@section('title','Edit Content')
@section('heading','Edit '.$content->heading)
@section('desc','Edit/Update the content of given sections.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.manage.content')}}">Content Management</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Content</li>
    </ol>
</nav>
@endsection
@section('summernotecss')
<link rel="stylesheet" href="{{asset('adminassets/vendors/summernote/summernote-lite.min.css')}}">
@endsection
@section('summernotejs')
<script src="{{asset('adminassets/vendors/summernote/summernote-lite.min.js')}}"></script>
@endsection
@section('content')
<section class="row">
    <section id="multiple-column-form">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-12">
                <div class="card shadow-sm">
                    <div class="card-content">
                        <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <form action="{{route('admin.update.content',$content)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="key" id="key" value="{{$content->key}}" disabled>
                                        <label>Key</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="heading" id="heading" value="{{$content->heading}}" required>
                                        <label for="heading">Heading</label>
                                    </div>
                                </div>
                                </div>
                                
                                
                                <div class="form-group mt-4">
                                    <label>Content</label>
                                    <textarea name="content" id="content-id" class="form-control" rows="5" cols="20">{!!$content->content!!}</textarea>
                                </div>
                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </form>
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
    $('#content-id').summernote({
        height:400,
        toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
       ['insert', ['link', 'picture', 'video']],
       ['view', ['fullscreen', 'codeview', 'help']],
  ],
  
    });
  });
  
</script>
@endsection
