<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function login(){
        if(Auth::user()){
            $user = User::find(Auth::id());
            if($user->hasRole('superadministrator')){
                return redirect()->route('admin.dashboard');
            }elseif($user->hasRole('user')){
                return redirect()->route('home');
            }
        }
        return view('admin/auth/login');
    }
}
