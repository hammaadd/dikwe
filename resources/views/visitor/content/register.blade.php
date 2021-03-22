@extends('visitor.layout.visitorLayout')
@section('title','Create Your Account')
@section('content')
    <div class="container mx-auto py-10">
        <div class="w-full md:w-3/4 lg:w-1/2 mx-auto bg-green-150 text-center rounded-xl shadow-md p-8">
            <h1 class="font-roboto font-bold text-gray-900 text-xl">SIGNUP WITH</h1>
            <ul class="text-center mt-4">
                <li class="inline-block mx-1"><a href="#" target="_blank" class="fab fa-google social-icons"></a></li>
                <li class="inline-block mx-1"><a href="#" target="_blank" class="fab fa-facebook-f social-icons"></a></li>
                <li class="inline-block mx-1"><a href="#" target="_blank" class="fab fa-twitter social-icons"></a></li>
            </ul>
            <div class="separator font-roboto text-base text-lightblue-650 my-4">OR</div>
            <form action="" class="mt-2 flex flex-col w-9/12 mx-auto text-center">
                <div class="my-2 relative rounded-xl shadow-md">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <input type="text" name="name" id="name" class="block w-full font-roboto text-base text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Name"/>
                </div>
                <div class="my-2 relative rounded-xl shadow-md">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <input type="email" name="name" id="name" class="block w-full font-roboto text-base text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Email"/>
                </div>
                <div class="my-2 relative rounded-xl shadow-md">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <input type="password" name="name" id="name" class="block w-full font-roboto text-base text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Password"/>
                    <div class="absolute inset-y-0 right-0 pr-5 flex items-center">
                        <span class="text-green-550 text-xl">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                <div class="my-2 relative rounded-xl shadow-md">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <input type="password" name="name" id="name" class="block w-full font-roboto text-base text-gray-900 rounded-xl border-0 py-3 px-16 focus:border-green-550 focus:ring-green-550" placeholder="Confirm Password"/>
                    <div class="absolute inset-y-0 right-0 pr-5 flex items-center">
                        <span class="text-gray-400 text-xl">
                            <i class="fas fa-eye-slash"></i>
                        </span>
                    </div>
                </div>
                <div class="text-center my-5">
                    <button type="submit" class="form-btn shadow-md">
                        SIGN UP
                    </button>
                </div>
                <div class="text-center my-5">
                    <p class="font-roboto text-base text-gray-900">Already Have Account? <a href="#" class=" text-green-550 font-bold hover:border-b-2 hover:border-green-550">LOGIN!</a></p>
                </div>
                <div class="text-center my-5">
                    <p class="font-roboto text-base text-gray-900">By creating an account, you are agreeing to our <a href="#" class=" text-green-550 hover:border-b-2 hover:border-green-550">Terms of Service</a> and <a href="#" class=" text-green-550 hover:border-b-2 hover:border-green-550">Privacy Policy</a>.</p>
                </div>
            </form>
        </div>
    </div>
@endsection