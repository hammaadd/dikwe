<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //

    public function faqs(Request $request){
        
        return view('admin.faq.all',compact('faqs'));
    }
}
