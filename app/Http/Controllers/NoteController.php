<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    //

    public function index(Request $request){
        return view('user.content.notes');
    }
}
