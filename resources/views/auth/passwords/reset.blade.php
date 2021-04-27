{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm"  class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}



@extends('visitor.layout.visitorLayout')
@section('title','Add New Password')
@section('headerExtra')
<link href="{{ asset('css/visitor.css') }}" rel="stylesheet">
<script src="{{ asset('js/alpine.min.js') }}" defer></script>
@endsection
@section('content')
    <div class="visitor container mx-auto py-10 md:h-screen">
        <div class="w-full md:w-3/4 lg:w-1/2 mx-auto bg-green-150 text-center rounded-xl shadow-md p-8">
            <h1 class="font-roboto font-bold text-gray-900 text-xl">Password Reset</h1>
            <div class="text-center my-5">
                    <p class="font-roboto text-base text-gray-900">Please enter your new password</p>
            </div>
            <form method="POST" action="{{ route('password.update') }}" class="mt-2 flex flex-col w-9/12 mx-auto text-center">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm"  class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
            {{-- <form method="POST" action="{{ route('password.update') }}" class="mt-2 flex flex-col w-9/12 mx-auto text-center">
                @csrf
                <div class="my-2 relative rounded-xl shadow-md" >
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <input type="email"  class="block w-full font-roboto text-base text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" value="{{ $email ?? old('email') }}" placeholder="Password" disabled/>
                    <div class="absolute inset-y-0 right-0 pr-5 flex items-center">
                       
                    </div>
                </div>


                <div class="my-2 relative rounded-xl shadow-md" x-data="{ show: true}">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <input :type="show ? 'password' : 'text'" name="password" class="block w-full font-roboto text-base text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Password"/>
                    <div class="absolute inset-y-0 right-0 pr-5 flex items-center">
                        <span class="text-xl">
                            <i class="text-green-550 fas fa-eye" @click="show = !show" :class="{'hidden-imp': !show, 'block':show }"></i>
                            <i class="text-green-550 fas fa-eye-slash" @click="show = !show" :class="{'block': !show, 'hidden-imp':show }"></i>
                        </span>
                    </div>
                </div>
                
                <div class="my-2 relative rounded-xl shadow-md" x-data="{ show: true}">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <input :type="show ? 'password' : 'text'"  required autocomplete="new-password" class="block w-full font-roboto text-base text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Confirm Password" type="password" name="password_confirmation" required autocomplete="new-password"/>
                    <div class="absolute inset-y-0 right-0 pr-5 flex items-center">
                        <span class="text-xl">
                            <i class="text-green-550 fas fa-eye" @click="show = !show" :class="{'hidden-imp': !show, 'block':show }"></i>
                            <i class="text-green-550 fas fa-eye-slash" @click="show = !show" :class="{'block': !show, 'hidden-imp':show }"></i>
                        </span>
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="text-center my-5">
                    <button type="submit" class="form-btn shadow-md">
                        CONFIRM
                    </button>
                </div>
            </form>
        </div> --}}
    </div>
@endsection --}}
