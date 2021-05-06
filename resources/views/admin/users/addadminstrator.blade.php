@extends('admin.layout.main')
@section('title','Create Adminstrator')
@section('heading','Create Adminstrator')
@section('desc','Create the Adminstrator.')
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
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-content">
                <div class="card-body">
                    <form action="{{route('admin.createadminstator')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                
                                <label for="">First Name </label>
                                <input type="text" class="form-control" name="firstname" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last  Name </label>
                                <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                
                                <label for="">Address </label>
                               <select name="country_id" class="form-control">
                                   <option value="">Select Country </option>
                                   @foreach ($countries as $country)
                                       <option value="{{$country->id}}">{{$country->country}}</option>
                                   @endforeach
                               </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                
                                <label for="">Email </label>
                               <input type="email" name="email" class="form-control">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="">Profile Image</label>
                                <input type="file" class="form-control" name="profile_img" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="col-md-6">
                                <label for="">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-sm" > <i class="bi bi-plus"> </i> Create Adminstator</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection