<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}

