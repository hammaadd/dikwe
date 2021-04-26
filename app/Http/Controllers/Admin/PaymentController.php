<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaymentPlans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function all()
    {
        $plans = PaymentPlans::all();
        return view('admin.payment.all',compact('plans'));
    }
    public function create()
    {
        return view('admin.payment.add');
    
    }
    public function store(Request $request)
    {
        $amount = $request->input('amount');
        $name = $request->input('name');
        $type = $request->input('type');
        
        $features = $request->input('features');
        $features =  json_encode($features);
        $plans = new PaymentPlans;
        $plans->name = $name ;
        $plans->type = $type ;
        $plans->amount = $amount;
        $plans->status = $request->status;
        $plans->features = $features ;
        $plans->created_by = Auth::id();
        $res = $plans->save();
        if($res){
            $request->session()->flash('success', 'Payment Plan Added Successfully!');
        }else{
            $request->session()->flash('error', 'Unable To Add Payment Plan Try Later!');
        }
        return back();
        
    }
    public function edit(PaymentPlans $plan)
    {
        return view('admin.payment.edit',compact('plan'));
    }
    public function update(PaymentPlans $plan ,Request $request)
    {
        $amount = $request->input('amount');
        $name = $request->input('name');
        $type = $request->input('type');
        $features = $request->input('features');
        $features =  json_encode($features);
        
        $plan->name = $name ;
        $plan->type = $type ;
        $plan->amount = $amount ;
        $plan->features = $features ;
        $res=$plan->update();
        if($res){
            $request->session()->flash('success', 'Payment Plan Updated Successfully!');
        }else{
            $request->session()->flash('error', 'Unable To Update Payment Plan Try Later!');
        }
        return back();
    }
    public function delete(PaymentPlans $plan ,Request $request)
    {
        if($plan)
        {
            $res=$plan->delete();
            if($res){
                $request->session()->flash('success', 'Payment Plan Deleted Successfully!');
            }else{
                $request->session()->flash('error', 'Unable To Deleted Payment Plan Try Later!');
            }
            
        }
        return back();
    }
}
