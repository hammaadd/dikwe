<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Session;
class ServiceController extends Controller
{
    public function all()
    {
        $services = Services::all();
        return view('admin.services.all',compact('services'));
    }
    public function edit(Request $request,Services $service)
    {
        return view('admin.services.edit',compact('service'));
    }
    public function update(Request $request,Services $service)
    {
        $service->status = $request->status;
        $res = $service->update();
        Session::put('services',Services::all());
        if($res){
            $request->session()->flash('success', 'Service Updated Successfully ');
        }else{
            $request->session()->flash('error', 'Unable To Services Please Try Again');
        }
        return redirect()->route('admin.services.all');
    }
}