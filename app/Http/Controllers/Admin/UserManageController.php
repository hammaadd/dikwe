<?php

namespace App\Http\Controllers\Admin;
use App\Models\Contacts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SubscribersExport;
use App\Mail\SubscribeMail;
use Mail;
class UserManageController extends Controller
{
    public function index()
    {
        $users = Subscriber::where('status','1')->get();

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
    public function sendmail(Request $request)
    {
        $subscribers = Subscriber::where('status','1')->get();
        return view('admin.subscriber.sendmail',compact('subscribers'));
    }
    public function send_mail(Request $request)
    {
        $subscribers = $request->subscribers;
        foreach($subscribers as $subscriber){
            $details = array(
                'head'=>$request->head,
                'body'=>$request->body
            );
        Mail::to($subscriber)->send(new SubscribeMail($details));
        }
        // if($res){
            $request->session()->flash('success', 'Mail Sent  Successfully!');
        // }else{
        //     $request->session()->flash('error', 'Unable To send Mail Us Try Later!');
        // }
        return back();
    }
    public function exportsubscriber(Request $request)
    {
        return Excel::download(new SubscribersExport, 'subscribers.csv');
    }
}
