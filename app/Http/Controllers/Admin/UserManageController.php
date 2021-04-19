<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
class UserManageController extends Controller
{
    public function index()
    {
        $users = Subscriber::all();
        return view('admin.subscriber.index',compact('users'));
    }
    public function delete(Request $request , Subscriber $subcriber)
    {
        if($subcriber){
            $res = $subcriber->delete();
            //echo $res;
            if($res){
                $request->session()->flash('success', 'Subscriber Deleted Successfully!');
            }else{
                $request->session()->flash('error', 'Unable To Delete Subscriber Try Later!');
            }
        }
        return back();
    }
}
