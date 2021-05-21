@extends('admin.layout.main')
@section('title','Update Profile')
@section('heading','Update Profile')
@section('desc','Update the information of your profile here.')
@section('breadcrumbs')
<nav aria-label="breadcrumb" class="breadcrumb-header float-start">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.profile')}}">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
    </ol>
</nav>
@endsection
@section('content')
<section class="row">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('admin.put.profile')}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-12 my-2">
                                        <div class="form-floating">
                                            
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Username" name="name" value="{{Auth::user()->name}}">
                                            <label for="name">Username</label>
                                            <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    @error('name')
                                                        {{$message}}
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 my-2">
                                        <div class="form-floating">
                                            
                                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" placeholder="Email" value="{{Auth::user()->email}}" required>
                                            <label for="email">Email</label>
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    @error('email')
                                                        {{$message}}
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 my-2">
                                        <div class="form-floating">
                                            
                                            <input type="text" id="firstname" class="form-control"
                                                placeholder="First Name" name="firstname" value="{{Auth::user()->firstname}}">
                                            <label for="firstname">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 my-2">
                                        <div class="form-floating">
                                            
                                            <input type="text" id="lastname" class="form-control"
                                                placeholder="Last Name" name="lastname" value="{{Auth::user()->lastname}}">
                                            <label for="lastname">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 my-2">
                                        <div class="form-floating">
                                            
                                            <select class="form-control" name="gender" id="gender">
                                                <option>Select Gender</opton>
                                                <option value="Male" @if(Auth::user()->gender == "Male") selected @endif>Male</option>
                                                <option value="Female" @if(Auth::user()->gender == "Female") selected @endif>Female</option>
                                            </select>
                                            <label for="city-column">Gender</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 my-2">
                                        <div class="form-floating">
                                            
                                            <select name="country" id="country" class="form-control">
                                                <option>Select Country</option>
                                                @isset($countries)
                                                    @foreach ( $countries as $con )
                                                        <option value="{{$con->id}}" @if($con->id == Auth::user()->country_id) selected @endif>{{$con->country}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                            <label for="country-floating">Country</label>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 my-2">
                                        <div class="form-floating">
                                            
                                            <input type="text" id="phone_no" class="form-control"
                                                name="phone_no" placeholder="Phone no" value="{{ Auth::user()->phone_no }}">
                                            <label for="phone_no">Phone no</label>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end my-2" >
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1 btn-sm">Update Profile <i class="bi bi-person"></i></button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1 btn-sm">Reset</button>
                                    </div>
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
