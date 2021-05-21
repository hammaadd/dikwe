@extends('admin.layout.main')
@section('title','Change Avatar')
@section('heading','Change Avatar')
@section('desc','Change the Avatar of your profile.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.profile')}}">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Change Avatar</li>
    </ol>
</nav>
@endsection
@section('content')
<section class="row">
    <section id="multiple-column-form">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center my-2 ">
                                <p>Old Avatar</p>
                                <div class="col-md-6 col-12 position-relative">
                                    <img  src="@if(Auth::user()->profile_img != null) {{asset('user_profile_images/'.Auth::user()->profile_img)}} @else {{asset('adminassets/images/faces/2.jpg')}} @endif"
                                    class="rounded avatar-img">
                                    <a class="delete-cross" href="{{route('admin.delete.avatar')}}" onclick="return confirm('Are you sure you want to delete');" title="Delete Avatar" >X</a>
                                </div>
                            </div>
                            <form method="POST" action="{{route('admin.update.avatar')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Select New Avatar</label>
                                    <input class="form-control" type="file" id="avatarImg" name="avatar">
                                </div>
                                <div class="row d-flex justify-content-center my-2 ">

                                    <div class="col-md-6 col-12 position-relative">
                                        <img id="showAvatar"
                                        class="rounded avatar-img">

                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" id="submit" class=" btn btn-sm btn-primary">Update Avatar <i class="bi bi-image"></i></button>
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
    function fasterPreview( uploader ) {
        if ( uploader.files && uploader.files[0] ){
              $('#showAvatar').attr('src',
                 window.URL.createObjectURL(uploader.files[0]) );
        }
    }

    $("#avatarImg").change(function(){
        fasterPreview( this );
    });

</script>
@endsection
