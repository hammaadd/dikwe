<?php

namespace App\Http\Controllers\Admin;
use App\Models\Scode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScodeController extends Controller
{
    public function codes()
    {
        $codes = Scode::all();
        return view('admin.scodes.all',compact('codes'));
    }
    public function addCode(Request $request)
    {
        $code =new Scode;
        $code->key=$request->input('key');
        $code->value=$request->input('value');
        $code->created_by = Auth::id();
        $res = $code->save();
            if($res){
                $request->session()->flash('success', 'Short Code Added Successfully!');
            }else{
                $request->session()->flash('error', 'Unable To Add Short Code Try Later!');
            }
        return back();
    }
    public function editscode(Request $request,Scode $scode)
    {
        return view('admin.scodes.edit',compact('scode'));
    }
    public function updatecode(Request $request,Scode $scode)
    {
        if($scode)
        {
          
           if($scode->status=='1')
           {
            $scode->key = $request->key;
            
           }
           $scode->value = $request->value;
            $scode->created_by = Auth::id();
            $res = $scode->update();
            if($res){
                $request->session()->flash('success', 'Short Code Updated Successfully');
            }else{
                $request->session()->flash('error', 'Unable To Update Short Code');
            }
            return back();
        }
    }
        public function deletecode(Request $request,Scode $scode)
        {
            if($scode)
            {
               
               if($scode->status=='0')
               {
                $request->session()->flash('error', 'Can not delete this Short Code'); 
                return back();
               }else{
                   $res = $scode->delete();
               }

                if($res){
                    $request->session()->flash('success', 'Short Code Deleted Successfully');
                }else{
                    $request->session()->flash('error', 'Unable To deleted Short Code');
                }
                return back();
            }  
        }
    
}
