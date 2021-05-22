<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    //
    public function index(Request $request){

        // $request->session()->flash('error', 'Feedback deleted successfully');
        $countries = Country::select('id','country')->get();
        // dd($countries);
        return view('user.content.profile',compact('countries'));
    }

    public function updateprofile(Request $request)
    {

        $request->validate([
            'avatar_img'=>'image|max:2048|mimes:jpg,png,jpeg,gif,svg',
            'name'=>'required',
            'gender'=>'in:Male,Female'
        ]);
        $facebook = $twitter=$linkedin = $other = 0;
        $twitterlink = $request->twitterlink;
        $facebooklink = $request->facebooklink;
        $linkedinlink = $request->linkedinlink;
        $othersite = $request->othersite;
        $user = User::find(Auth::id());
        $user->name = $request->input('name');
        $user->phone_no=$request->input('phone_no');
        $user->about = $request->about;
        $user->country_id = $request->country;
        $user->gender = $request->gender;

        if($request->file('avatar_img')){
            $file = $request->file('avatar_img');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('/user_profile_images');
            $file->move($destinationPath, $imgname);
            if(null!=Auth::user()->profile_img){
                $image_path = "user_profile_images/".Auth::user()->profile_img;  // Value is not URL but directory file path
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $user->profile_img = $imgname; 
        }
        
        $res = $user->update();
        foreach($user->sociallinks as $userlink)
        {
            if($userlink->type=='F')
            {
                $facebook = $userlink->id;
            }
            if($userlink->type=='T')
            {
                $twitter = $userlink->id;;
            }
            if($userlink->type=='L')
            {
                $linkedin = $userlink->id;;
            }
            if($userlink->type=='O')
            {
                $other = $userlink->id;;
            }
            
            
        }
        if($facebook==0)
        {
            $sociallink  =  new SocialLink();
            $sociallink->url = $facebooklink;
            $sociallink->type = 'F';
            $sociallink->user_id = Auth::id();
            $sociallink->save();   
        }
        else{
           $udpateurl = array( 
                'url' => $facebooklink
           );
           SocialLink::where('id',$facebook)->update($udpateurl);
            
        }
        if($twitter==0)
        {
            $sociallink  =  new SocialLink();
            $sociallink->url = $twitterlink;
            $sociallink->type = 'T';
            $sociallink->user_id = Auth::id();
            $sociallink->save();   
        }
        else{
           $udpateurl = array( 
                'url' => $twitterlink
           );
           SocialLink::where('id',$twitter)->update($udpateurl);
            
        }
        if($linkedin==0)
        {
            $sociallink  =  new SocialLink;
            $sociallink->url = $linkedinlink;
            $sociallink->type = 'L';
            $sociallink->user_id = Auth::id();
            $sociallink->save();   
        }
        else{
           $udpateurl = array( 
                'url' => $linkedinlink
           );
           SocialLink::where('id',$linkedin)->update($udpateurl);
            
        }
        if($other==0)
        {
            $sociallink  =  new SocialLink;
            $sociallink->url = $othersite;
            $sociallink->type = 'O';
            $sociallink->user_id = Auth::id();
            $sociallink->save();   
        }
        else{
           $udpateurl = array( 
                'url' => $othersite
           );
           SocialLink::where('id',$other)->update($udpateurl);
            
        }
        
       

        if($res){
            session()->flash('success', 'Profile Updated Successfully.');
        }else{
            session()->flash('error', 'Unable To Update Profile');
        }

    return back();
    }
}
