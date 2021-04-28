@extends('visitor.layout.visitorLayout')
@section('title','Login To Your Account')
@section('headerExtra')
<link href="{{ asset('css/visitor.css') }}" rel="stylesheet">
<script src="{{ asset('js/alpine.min.js') }}" defer></script>
@endsection
@section('content')
    <div class="visitor container mx-auto p-4 md:py-10">
        <div class="w-full md:w-3/4 lg:w-1/2 mx-auto bg-green-150 text-center rounded-xl shadow-md p-4 md:p-8">
            <h1 class="font-roboto font-bold text-gray-900 text-xl">Login With</h1>
            <ul class="text-center mt-4">
                <li class="inline-block mx-1"><a href="{{route('google.login')}}" target="_blank" class="fab fa-google social-icons"></a></li>
                <li class="inline-block mx-1"><a href="#" target="_blank" class="fab fa-facebook-f social-icons"></a></li>
                <li class="inline-block mx-1"><a href="#" target="_blank" class="fab fa-twitter social-icons"></a></li>
            </ul>
            <div class="separator font-roboto text-base text-lightblue-650 my-4">OR</div>
            <form method="POST" action="{{ route('login') }}" class="mt-2 flex flex-col w-full max-w-md md:max-w-none md:w-9/12 mx-auto text-center">
                @csrf
                <div class="my-2 relative rounded-xl shadow-md">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <input type="email" name="email" id="email" class="block w-full font-roboto text-base text-gray-900 rounded-xl @error('email') field-error @enderror border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Email" required autocomplete="email" autofocus value="{{ old('email') }}"/>

                </div>
                @error('email')
                    <small class="field-error-message">
                        <span>{{$message}}</span>
                    </small>
                @enderror
                <div class="my-2 relative rounded-xl shadow-md" x-data="{ show: true}">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <input :type="show ? 'password' : 'text'" name="password" class="block w-full font-roboto text-base text-gray-900  @error('password') field-error @enderror rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Password" autocomplete="current-password"/>
                    <div class="absolute inset-y-0 right-0 pr-5 flex items-center">
                        <span class="text-xl">
                            <i class="text-green-550 fas fa-eye" @click="show = !show" :class="{'hidden-imp': !show, 'block':show }"></i>
                            <i class="text-green-550 fas fa-eye-slash" @click="show = !show" :class="{'block': !show, 'hidden-imp':show }"></i>
                        </span>
                    </div>
                </div>
                @error('password')
                    <small class="field-error-message">
                        <span>{{$message}}</span>
                    </small>
                @enderror
                <div class="text-center my-5">
                   
                
                
                        @if (Route::has('password.request'))
                        <a  href="{{ route('password.request') }}" class=" text-green-550 font-bold hover:border-b-2 hover:border-green-550">
                            {{ __('Forgot Password?') }}
                        </a>  @endif
                    </p>
              
                </div>
               
                <div class="text-center my-2">
                <div class="flex items-center justify-between">
                    <label class="flex items-center mx-auto">
                        <input type="checkbox" class="form-checkbox text-green-550 border-green-550 focus:ring-green-550" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                        <span class="block ml-2 font-roboto text-base text-gray-900 cursor-pointer">Remember me for 30 days</span>
                    </label>
                </div>
                </div>
                <div class="text-center my-5">
                    <button type="submit" class="form-btn shadow-md">
                        LOGIN
                    </button>
                </div>
                <div class="text-center my-5">
                    <p class="font-roboto text-base text-gray-900">Don't Have Account? <a href="{{ route('register.form') }}" class=" text-green-550 font-bold hover:border-b-2 hover:border-green-550">Create Account!</a></p>
                </div>
                <div class="text-center my-5">
                    <p class="font-roboto text-base text-gray-900">By creating an account, you are agreeing to our <a href="#" class=" text-green-550 hover:border-b-2 hover:border-green-550">Terms of Service</a> and <a href="#" class=" text-green-550 hover:border-b-2 hover:border-green-550">Privacy Policy</a>.</p>
                </div>
            </form>
        </div>
    </div>
@endsection

