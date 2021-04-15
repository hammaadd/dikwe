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
        $faqs = Faq::orderBy('order','ASC')->get();
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

    public function updateFaq(Request $request, Faq $faq){
        if($faq){
            $faq->order = $request->order;
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->created_by = Auth::id();
            $res = $faq->update();
            if($res){
                $request->session()->flash('success', 'FAQ Updated Successfully');
            }else{
                $request->session()->flash('error', 'Unable To Update FAQ');
            }
        }

        return back();
    }

    public function deleteFaq(Request $request , Faq $faq){
        if($faq){

            $res = $faq->delete();
            if($res){
                $request->session()->flash('success', 'FAQ Deleted Successfully');
            }else{
                $request->session()->flash('error', 'Unable To Delete FAQ');
            }
        }

        return back();
    }

    
}
