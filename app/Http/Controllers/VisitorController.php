<?php

namespace App\Http\Controllers;
use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Subscriber;
use App\Models\PaymentPlans;
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
    public function contactus(Request $request)
    {
      
        $request->validate([
            
            'email' => 'email|required',
            'message' => 'required'
        ]);
        $contactus = new Contacts;
        $contactus->name = $request->name;
        $contactus->email = $request->email;
        $contactus->inquiry_type = $request->type;
        $contactus->message = $request->message;
        $res = $contactus->save();
        if($res){
            session()->flash('success', 'Profile Updated Successfully.');
        }else{
            session()->flash('error', 'Unable To Update Profile');
        }

    return back();

    }
    public function pricing()
    {
        $plans = PaymentPlans::where('status','activate')->get();
        return view('visitor.content.pricing',compact('plans'));
    }
}
