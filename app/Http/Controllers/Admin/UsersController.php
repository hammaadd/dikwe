<?php
namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Models\Country;

class UsersController extends Controller
{
    public function users()
    {
        $users=User::all();
        return view('admin.users.all',compact('users'));
    }
    public function changestatus(Request $request ,User $user)
    {
        if($user)
        {
           if($user->hasRole('superadministrator'))
           {
            session()->flash('error', 'Unable to Change the status of Superadministator');
            return redirect()->route('admin.users.all');
           }
           else{
               $user->status = $request->status;
               $res = $user->update();
               if($res){
                   $request->session()->flash('success', 'Status updated successfully');
               }else{
                   $request->session()->flash('error', 'Unable To Update status');
               }
               return redirect()->route('admin.users.all');
           }
        }
    } 
    public function deleteuser(Request $request ,User $user)
    {
        if($user->hasRole('superadministrator'))
        {
         session()->flash('error', 'Unable to delte the Superadministator');
         return redirect()->route('admin.users.all');
        }
        else{
            $user->status = 'S';
            $res = $user->update();
            $res = $user->delete();
            if($res){
                $request->session()->flash('success', 'Status updated successfully');
            }else{
                $request->session()->flash('error', 'Unable To Update status');
            }
            return redirect()->route('admin.users.all');
        }
    }
    public function deleteduser()
    {
        $users = User::onlyTrashed()->get();
        return view('admin.users.deleteduser',compact('users'));
    }
    public function activateuser(Request $request,$id)
    {
        $user = User::withTrashed()->find($id);
        print_r($user);
     
        if($user)
        {
            $user->status = 'S';
            $user->deleted_at =NULL;
            $res = $user->update();
            if($res){
                $request->session()->flash('success', 'User Activated successfully');
            }else{
                $request->session()->flash('error', 'Unable To Update status');
            }
        }
        return redirect()->route('admin.deleted.user');
        
    }
    public function verifyemail(Request $request, User $user)
    {
        if($user)
        {
            $user->email_verified_at = now();
            $res = $user->update();
            if($res){
                $request->session()->flash('success', 'Email verified  successfully');
            }else{
                $request->session()->flash('error', 'Unable To verify the email ');
            }
            
        }
        return redirect()->route('admin.users.all');
    }
    public function exportusers()
    {
        return Excel::download(new UsersExport, 'Users.csv');
    }

    public function notification()
    {
        return view ('admin.notification.all');
    }
    public function readnotify(Request $request)
    {
       foreach(Auth::user()->notifications as $notification)
       {
           $notification->markAsRead();
       }
       $request->session()->flash('success', 'Notification Marked As Read Successfully');
       return back();
    }
    // create Administator 
    Public function adminstators()
    {
        $users= User::all();
        return view('admin.users.alladministator',compact('users'));
    }
    public function addadministrator()
    {
        $countries = Country::all();
        return view('admin.users.addadminstrator',compact('countries'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'firstname' =>'required|max:191',
            'lastname' =>'required|max:191',
            'email' => 'email|required|unique:users,email',
            'password'=>'required|confirmed|min:6',
        ]);
        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->status = 'A';
        $user->name = $request->firstname." ".$request->lastname;
        $user->country_id = $request->country_id;
        $user->gender = $request->gender;
        $user->password = Hash::make($request->password);
        if($request->file('profile_img')){
            $file = $request->file('profile_img');
            $filename = $file->getClientOriginalName();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('images/avatar/');
            $res = $file->move($destinationPath, $imgname);
            $user->profile_img = $imgname;
        }
        $res = $user->save();

        $user->attachRole('administrator');
        if($res){
            $request->session()->flash('success', 'Administrator created Successfully');
        }else{
            $request->session()->flash('error', 'Un Able to create the administrator');
        }
        return redirect()->route('admin.all.administators');
    }
    public function delete(User $user,Request $request)
    {
        $res = $user->delete();
        if($res){
            $request->session()->flash('success', 'Adminstrator Deleted Successfully ');
        }else{
            $request->session()->flash('error', 'Unable To delete the adminstrator');
        }
        return redirect()->route('admin.all.administators');
    }


}

