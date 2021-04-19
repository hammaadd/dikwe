<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Subscriber;

class VisitorController extends Controller
{
    //

    public function homePage(Request $request){

        $features = Feature::orderBy('order','ASC')->get();
        return view('visitor.content.mainScreen',compact('features'));
    }
    public function subscribe(Request $request)
    {
        $request->validate([
            
            'email' => 'email|required|unique:subscribers'
        ]);
        $subscriber = new Subscriber;
        $subscriber->email = $request->input('email');
        $res = $subscriber->save();
        if($res){
            session()->flash('success', 'Thanks For subscribes.');
        }else{
            session()->flash('error', 'Unable to subscribe try Again');
        }
        return back();
    }
}
