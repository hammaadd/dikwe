<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;

class VisitorController extends Controller
{
    //

    public function homePage(Request $request){

        $features = Feature::orderBy('order','ASC')->get();
        return view('visitor.content.mainScreen',compact('features'));
    }
}
