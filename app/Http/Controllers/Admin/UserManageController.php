<?php

namespace App\Http\Controllers\Admin;
use App\Models\Contacts;
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
    public function contactus(Request $reqest)
    {
        $contacts = Contacts::all();
        return view('admin.contactus.all',compact('contacts'));
    }
    public function deletecontact(Request $request,Contacts $contact)
    {
        if($contact){
            $res = $contact->delete();
            //echo $res;
            if($res){
                $request->session()->flash('success', 'Contact Us Deleted Successfully!');
            }else{
                $request->session()->flash('error', 'Unable To Delete Contact Us Try Later!');
            }
        }
        return back();
    }
}
