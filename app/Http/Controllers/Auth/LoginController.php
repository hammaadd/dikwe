<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Services;
use Session;
use Socialite;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function authenticated(Request $request, $user)
    {
        Session::put('services',Services::all());
        if($user->hasRole('superadministrator')){
            session()->flash('success', 'Welcome Back '.Auth::user()->name);
            return redirect()->route('admin.dashboard');
        }

        if($user->hasRole('user')){
            session()->flash('success', 'Welcome Back '.Auth::user()->name);

            return redirect()->route('dashboard');
        }

        return redirect()->route('dashboard');
    }

    public function showLoginForm()
    {
        if(Auth::user()){
            $user = User::find(Auth::id());
            if($user->hasRole('superadministrator')){
                return redirect()->route('admin.dashboard');
            }elseif($user->hasRole('user')){
                return redirect()->route('u.dashboard');
            }
        }
        return view('visitor.content.login');
    }
    public function redirectToProvoider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googlelogin()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $found_user = User::where('email',$user->getEmail())->first();
        
        if ($found_user) {
            Auth::login($found_user);

            session()->flash('success', 'Welcome Back '.Auth::user()->name);
            if($found_user->hasRole('superadministrator')){
                return redirect()->route('admin.dashboard');
            }elseif($found_user->hasRole('user')){
                return redirect()->route('dashboard');
            }
        }else{
            // $url = preg_replace('/\?sz=[\d]*$/', '', $user->getAvatar());
            // $info = pathinfo($url);
            // $contents = file_get_contents($url);
            // // $file = 'public/user_avatar/' . $info['basename'].'.jpg';
            // // file_put_contents($file, $contents);
            // // $uploaded_file = new UploadedFile($file, $info['basename']);


            $new_user = new User;
            $new_user->name  = $user->getName();
            // $new_user->profile_img = $info['basename'].'.jpg';
            $new_user->email = $user->getEmail();
            $password = rand(1000,1000000);
            $new_user->password = $password = Hash::make($password);
            $new_user->firstname = $user->user['given_name'];
            $new_user->lastname = $user->user['family_name'];
            $new_user->email_verified_at = now();
            if ($new_user->save()) {
            session()->flash('success', 'Profile Created successfully!');
               $new_user->attachRole('user');
               $new_user->attachRole('free');
        
                 Auth::login($new_user);
                 return redirect()->route('dashboard');
            } 
        }

    }





}
