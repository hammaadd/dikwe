@extends('visitor.layout.visitorLayout')
@section('title','Email Confirmation Code')
@section('headerExtra')
<link href="{{ asset('css/visitor.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="visitor container mx-auto py-10 md:h-screen">
        <div class="w-full md:w-3/4 lg:w-1/2 mx-auto bg-green-150 text-center rounded-xl shadow-md p-8">
            {{-- <h1 class="font-roboto font-bold text-gray-900 text-xl">Confirm Your Email</h1>
            <div class="text-center my-5">
                    <p class="font-roboto text-base text-gray-900">Please enter the confirmation code you received in your email</p>
                </div> --}}
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-green-500">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            {{-- <form action="" class="mt-2 flex flex-col w-9/12 mx-auto text-center">
                <div class="my-2 relative rounded-xl shadow-md">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <input type="text" name="" id="" class="block w-full font-roboto text-base text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="6 Digits Code"/>
                </div>
                <div class="text-center my-5">
                    <p class="font-roboto text-base text-gray-900"><a href="#" class=" text-green-550 font-bold hover:border-b-2 hover:border-green-550">Resend Code</a></p>
                </div>
                <div class="text-center my-5">
                    <button type="submit" class="form-btn shadow-md">
                        CONTINUE
                    </button>
                </div>
            </form> --}}
        </div>
    </div>
@endsection
