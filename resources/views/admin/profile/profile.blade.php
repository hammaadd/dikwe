@extends('admin.layout.main')
@section('title','Profile')
@section('heading','Profile')
@section('desc','User admin profile.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Profile</li>
    </ol>
</nav>
<style>
    .card-80{
        width:75%;
    }
    .skeleton{
        background: #F2F7FF;
        border-radius: 10px;
        margin: 0 2%;
        padding: 1%;
    }


    .border-box{
        box-sizing: border-box;
    }

</style>
@endsection
@section('content')
<section class="row">
    <div class="container d-flex justify-content-center">
        <div class="card p-3 card-80">
            <div class="row">
                <div class="image col-md-4 border-box col-12 d-flex justify-content-center align-items-center flex-column">
                    <img src="@if(Auth::user()->profile_img != null) {{asset('adminassets/images/avatar/'.Auth::user()->profile_img)}} @else {{asset('adminassets/images/faces/2.jpg')}} @endif"
                        class="rounded" style="background-color: rgb(209, 209, 209);" id="toggleImg" width="200">

                    <a class="btn btn-secondary btn-sm d-block mt-3" href="{{route('admin.change.avatar')}}">Update Avatar <i class="bi bi-image"></i></a>
                </div>
                <div class="col-md-8 border-box col-12">
                    <ul class="list-group w-100">
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center">
                            <span> <strong>Name:</strong> <h5 class="d-inline">{{Auth::user()->name}}</h5></span>
                            <span class="badge bg-secondary badge-pill badge-round ml-1"><a class="text-light" href="{{route('admin.update.profile')}}">Edit Profile</a></span>
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center">
                            <span> <strong>Firstname:</strong> <h5 class="d-inline">{{Auth::user()->firstname}}</h5></span>

                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center">
                            <span> <strong>Lastname:</strong> <h5 class="d-inline">{{Auth::user()->lastname}}</h5></span>

                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center">
                            <span> <strong>Gender:</strong> <h5 class="d-inline">{{Auth::user()->gender}}</h5></span>
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center">
                            <span> <strong>Contact #:</strong> <h5 class="d-inline">{{Auth::user()->phone_no}}</h5></span>
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center">
                            <span><strong>Email:</strong> <h5 class="d-inline">{{Auth::user()->email}}</h5></span>
                            {{-- <span class="badge bg-secondary badge-pill badge-round ml-1"><a href="#" class="text-light">Change Email</a></span> --}}
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center">
                            <span><strong>Password:</strong> <a href="{{route('admin.change.password')}}">Change Password</a></span>
                            <span class="badge bg-secondary badge-pill badge-round ml-1"><a href="{{route('admin.change.password')}}" class="text-light">Change Password</a></span>

                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center">
                            <span><strong><i class="bi bi-geo"></i>: </strong>@isset(Auth::user()->country->country){{Auth::user()->country->country}}@endisset</span>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scriptCode')


@endsection

