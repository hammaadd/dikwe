<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    //

    public function faqs(Request $request){
        $faqs = Faq::all();
        return view('admin.faq.all',compact('faqs'));
    }

    public function addFaq(Request $request){
        
        $faq = new Faq;
        $faq->order = $request->order;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->created_by = Auth::id();
        $res = $faq->save();
        if($res){
            $request->session()->flash('success', 'FAQ Added Successfully');

        }else{
            $request->session()->flash('error', 'Unable To Add FAQ');
        }
        return back();

    }

    public function editFaq(Request $request , Faq $faq){

        

        return view('admin.faq.edit',compact('faq'));
    }

    
}
