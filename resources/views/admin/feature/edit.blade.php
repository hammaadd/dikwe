@extends('admin.layout.main')
@section('title','Update Feature')
@section('heading','Update Feature')
@section('desc','Update features to show on homepage and features tab.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{route('admin.features')}}">Features</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Feature # {{$feature->order}}</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="row d-flex justify-content-center align-items-stretch" >
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form action="{{route('admin.update.feature',$feature)}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-8 col-12">
                                <div class="form-floating my-2">
                                    <input type="number" class="form-control" min="0" required name="order" value="{{$feature->order}}">
                                    <label for="">Feature No.</label>
                                </div>
                                <div class="form-group my-2">
                                    <label for="">Text Of Feature</label>
                                    <textarea class="form-control" cols="30" rows="5" name="text" id="text" requried>{{$feature->text}}</textarea>            
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">     
                                </div>
                                
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <img id="showImage" src="" alt="" style="width:100%; height:auto;">
                                </div>
                               @isset($feature->image)
                               <div class="form-group position-relative">
                                    <h3>Old Image</h3>
                                    <img src="{{asset('images/features/'.$feature->image)}}" alt="" style="width: 100%; height:auto;">
                                    <a class="delete-cross" href="{{route('admin.delete.feature.image', $feature)}}" onclick="return confirm('Are you sure you want to delete');" data-bs-toggle="tooltip" title="Delete Image" >X</a>
                                </div>

                               @endisset
                                
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group d-flex justify-content-end col-12">
                                <button class="btn btn-primary btn-sm" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptCode')
<script>
    function fasterPreview( uploader ) {
        if ( uploader.files && uploader.files[0] ){
              $('#showImage').attr('src',
                 window.URL.createObjectURL(uploader.files[0]) );
        }
    }

    $("#image").change(function(){
        fasterPreview( this );
    });

</script>
@endsection