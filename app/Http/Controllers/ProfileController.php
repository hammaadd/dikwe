<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index(Request $request){

        // $request->session()->flash('error', 'Feedback deleted successfully');
        return view('user.content.profile');
    }
}
