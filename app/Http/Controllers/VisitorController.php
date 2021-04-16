<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    //

    public function homePage(Request $request){

        return view('visitor.content.mainScreen');
    }
}
