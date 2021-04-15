<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DIKWE</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('adminassets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('adminassets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('adminassets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('adminassets/css/pages/auth.css')}}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-6 col-12">
                <div id="auth-left">
                    <div class="d-flex justify-content-center mb-2">
                        <a href="#"><img src="{{asset('adminassets/images/logo/dikwe-logo.png')}}" alt="Logo" style="width:200px; height:auto;"></a>
                    </div>
                   <!--  <h1 class="auth-title">Log in.</h1> -->

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in for 30 days.
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block shadow mt-5" type="submit" style="background-color:#207946 !important; border:none !important;">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        @if (Route::has('password.request'))
                        <p><a class="font-bold"  style="color:#207946 !important;" href="{{ route('password.request') }}">Forgot password?</a>.</p>
                    @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>
