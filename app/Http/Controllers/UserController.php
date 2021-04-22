<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserController extends Controller
{
    public function updateprofile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->phone_no=$request->input('phone_no');
        $res = $user->update();
        if($res){
            session()->flash('success', 'Profile Updated Successfully.');
        }else{
            session()->flash('error', 'Unable To Update Profile');
        }

    return back();
    }
}
