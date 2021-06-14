@extends('visitor.layout.visitorLayout')
@section('title','Create Your Account')
@section('headerExtra')
<link href="{{ asset('css/visitor.css') }}" rel="stylesheet">
<script src="{{ asset('js/alpine.min.js') }}" defer></script>
@endsection
@section('content')
    <div class="visitor container mx-auto p-4 md:py-10">
        <div class="w-full md:w-3/4 lg:w-1/2 mx-auto bg-green-150 text-center rounded-xl shadow-md p-4 md:p-8">
            <h1 class="font-roboto font-bold text-gray-900 text-xl">Signup With</h1>
            <ul class="text-center mt-4">
                <li class="inline-block mx-1"><a href="#" target="_blank" class="fab fa-google social-icons"></a></li>
                <li class="inline-block mx-1"><a href="#" target="_blank" class="fab fa-facebook-f social-icons"></a></li>
                <li class="inline-block mx-1"><a href="#" target="_blank" class="fab fa-twitter social-icons"></a></li>
            </ul>
            <div class="separator font-roboto text-base text-lightblue-650 my-4">OR</div>
            <form method="POST" action="{{ route('register') }}" class="mt-2 flex flex-col w-full max-w-md md:max-w-none md:w-9/12 mx-auto text-center">
                @csrf
                <div class="my-2 relative rounded-xl shadow-md">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <input type="text" name="name" id="name" class="block w-full font-roboto text-base @error('name') field-error @enderror text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Name" value="{{ old('name') }}"/>
                </div>
                @error('name') 
                    <small class="field-error-message">
                        <span>{{$message}}</span>
                    </small>
                @enderror
                <div class="my-2 relative rounded-xl shadow-md">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <input type="email" name="email" id="email" class="@error('email') field-error @enderror block w-full font-roboto text-base text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Email" value="{{ old('email') }}" required autocomplete="email"/>
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
                    <input :type="show ? 'password' : 'text'" name="password" class="@error('password') field-error @enderror block w-full font-roboto text-base text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Password" required autocomplete="new-password"/>
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
                <div class="my-2 relative rounded-xl shadow-md" x-data="{ show: true}">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <input :type="show ? 'password' : 'text'" class="block w-full font-roboto text-base text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password" id="password-confirm"/>
                    <div class="absolute inset-y-0 right-0 pr-5 flex items-center">
                        <span class="text-xl">
                            <i class="text-green-550 fas fa-eye" @click="show = !show" :class="{'hidden-imp': !show, 'block':show }"></i>
                            <i class="text-green-550 fas fa-eye-slash" @click="show = !show" :class="{'block': !show, 'hidden-imp':show }"></i>
                        </span>
                    </div>
                </div>
                <div class="inline-flex captcha">
                    <span class="captcha-code h-20">{!! captcha_img() !!}</span>
                    <button type="button" class="align-baseline captcha-refresh reload h-auto px-4 text-sm text-white bg-green-500 rounded-lg focus:shadow-outline hover:bg-green-200" id="reload">&#x21bb;</button>
                </div>
                <div class="my-2 relative rounded-xl shadow-md">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-sync-alt"></i>
                        </span>
                    </div>
                    <input type="text" name="captcha" id="captcha" class="block w-full font-roboto text-base @error('captcha') field-error @enderror text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Captcha"/>
                </div>
                @error('captcha')
                    <small class="field-error-message">
                        <span>{{$message}}</span>
                    </small>
                @enderror

               
                <div class="text-center my-5">
                    <button type="submit" class="form-btn shadow-md">
                        SIGN UP
                    </button>
                </div>
                <div class="text-center my-5">
                    <p class="font-roboto text-base text-gray-900">Already Have Account? <a href="{{ route('login.form') }}" class=" text-green-550 font-bold hover:border-b-2 hover:border-green-550">LOGIN!</a></p>
                </div>
                <div class="text-center my-5">
                    <p class="font-roboto text-base text-gray-900">By creating an account, you are agreeing to our <a href="#" class=" text-green-550 hover:border-b-2 hover:border-green-550">Terms of Service</a> and <a href="#" class=" text-green-550 hover:border-b-2 hover:border-green-550">Privacy Policy</a>.</p>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('bodyExtra')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

</script>
@endsection