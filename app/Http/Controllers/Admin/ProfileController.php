<?php

namespace App\Http\Controllers\Admin;
use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //

    public function index(Request $request){

        return view('admin.profile.profile');
    }

    public function updateProfile(Request $request){
        $user = User::find(Auth::id());
        switch ($request->method()) {
            case 'PUT':
                    $request->validate([
                        'name' =>'required|max:191',
                        'email' => 'email|required|unique:users,email,'.Auth::id(),
                    ]);

                    $old_email = Auth::user()->email;
                    if($old_email != $request->email){
                        $user->email_verified_at = null;
                    }
                        $user->name = $request->name;
                        $user->email = $request->email;
                        $user->firstname = $request->firstname;
                        $user->lastname = $request->lastname;
                        $user->gender = $request->gender;
                        $user->country_id = $request->country;
                        $user->phone_no = $request->phone_no;
                        $res = $user->update();
                        if($res){
                            session()->flash('success', 'Profile Updated Successfully.');
                        }else{
                            session()->flash('error', 'Unable To Update Profile');
                        }

                    return back();
                break;

            case 'GET':
                    $countries = Country::all();
                    return view('admin.profile.update',compact('countries'));
                break;

            default:
                    return back();
                break;
        }
    }

    public function changePassword(Request $request){
        $user = User::find(Auth::id());
        switch ($request->method()) {
            case 'PUT':
                $request->validate([
                    'old_password' => ['required', new MatchOldPassword],
                    'new_password' => ['required','min:8'],
                    'new_confirm_password' => ['same:new_password'],
                ]);
                $user->password =  Hash::make($request->new_password);
                $res = $user->update();
                if($res){
                $request->session()->flash('success', 'Password changed successfully!');

                }
                return redirect()->route('admin.profile');
            break;
            case 'GET':
                return view('admin.profile.change-password');
            break;
            default:
                    return back();
            break;
    }
}

    public function changeAvatar(Request $request){
        $user = User::find(Auth::id());
        switch($request->method()){
            case 'POST':

                if($request->file('avatar')){
                    $file = $request->file('avatar');
                    $filename = $file->getClientOriginalName();
                    $imgname = uniqid() . $filename;
                    $destinationPath = public_path('/adminassets/images/avatar/');
                    $res = $file->move($destinationPath, $imgname);
                    $imag = User::find(Auth::id());
                    if(null!=$imag->profile_img){
                        $image_path = "adminassets/images/avatar/".$imag->profile_img;  // Value is not URL but directory file path
                        if(File::exists($image_path)) {
                            File::delete($image_path);
                        }
                    }
                    $user->profile_img = $imgname;
                    $res = $user->save();
                    if($res){
                        $request->session()->flash('success', 'Avatar Updated Successfully!');
                    }else{
                        $request->session()->flash('error', 'Unable To Update Avatar Try Later!');
                    }
                }else{
                    $request->session()->flash('error', 'There Is No File To Upload.');
                }

                
                return back();
            break;
            case 'GET':
                return view('admin.profile.change-avatar');
            break;

            default:
                    return back();
            break;
        }
    }

    public function deleteAvatar(Request $request){
        $imag = User::find(Auth::id());
                if($imag->profile_img!= null){
                    $image_path =  public_path()."/adminassets/images/avatar/".$imag->profile_img;
                    //dd($image_path);  // Value is not URL but directory file path
                    if(File::exists($image_path)) {
                       $del =  File::delete($image_path);
                    }
                }
            if(isset($del)){
                $imag->profile_img = null;
                $res = $imag->save();
                if($res){
                    $request->session()->flash('success', 'Avatar Deleted Successfully!');
                }else{
                    $request->session()->flash('error', 'Unable To Delete Avatar Try Later!');
                }
            }

            return back();
    }
}
