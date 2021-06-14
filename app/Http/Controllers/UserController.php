<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\SocialLink;
use App\Models\Tshorurl;
use App\Models\WorkSpace;
use App\Mail\WelcomeMail;
use App\Models\BookMarks;
use App\Models\DKnowledgeAsset;
use App\Models\TTags;
use Illuminate\Support\Str;
use Mail;

class UserController extends Controller
{
    public function updateprofile(Request $request)
    {
        $facebook = $twitter=$linkedin = $other = 0;
        $twitterlink = $request->twitterlink;
        $facebooklink = $request->facebooklink;
        $linkedinlink = $request->linkedinlink;
        $othersite = $request->othersite;
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->phone_no=$request->input('phone_no');
        
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
            $sociallink  =  new SocialLink;
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
            $sociallink  =  new SocialLink;
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

    public function userverification()
    {
        Mail::to(Auth::user()->email)->send(new WelcomeMail());
        return redirect()->route('u.dashboard');
    }
    public function create_tag()
    {
        $users = User::all();
        return view('user.tags.create_tag',compact('users'));
    }
    public function storetag(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'tag' => 'required',
            'note' => 'required',
        ]);
        $t_tags = new TTags;
        $t_tags->user_id = $request->user_id;
        $t_tags->tag = $request->tag;
        $t_tags->note = $request->note;
        $t_tags->created_by = Auth::id();
        $res = $t_tags->save();
        if($res){
            session()->flash('success', 'Tag Created Successfully.');
        }else{
            session()->flash('error', 'Unable To Create Tag Please try Again');
        }
        return back();
    }
    public function addurl()
    {
        return view('user.content.addurl');
    }
    public function storeurl(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'url'=>'required'
        ]);
        
        
        $i=0;
        while($i!=1)
        {
            $code = Str::random(5);
            $rand = rand(100,999);
            $code = $code.$rand;
            $url = Tshorurl::where('short_url',$code)->first();
            if(empty($url))
            {
                $i=1;
                $testurl = new Tshorurl;
                $testurl->title = $request->title;
                $testurl->source_url = $request->url;
                $testurl->short_url = $code;
                $testurl->created_by = Auth::id();
                $res = $testurl->save();
                if($res){
                    session()->flash('success', 'Url  Created Successfully.');
                }else{
                    session()->flash('error', 'Unable To Create Url Please try Again');
                }
                return back();

            }
        }

    }
    public function addworkspace()
    {
        $workspaces = WorkSpace::where('parent',null)->get();
        return view('user.workspace.add',compact('workspaces'));
    }
    public function storeworspace(Request $request)
    {
        
        $request->validate([
            'title'=>'required'
        ]);
        $workspace = new WorkSpace;
        $workspace->title = $request->title;
        $workspace->status = $request->status;
        $workspace->parent = $request->parent;
        $workspace->visiability = $request->visiability;
        $workspace->created_by = Auth::id();
        if($request->file('thumbnail')){
            $file = $request->file('thumbnail');
            $filename = $file->getClientOriginalName();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('images/workspace/');
            $res = $file->move($destinationPath, $imgname);
            
            $workspace->thumbnail = $imgname;
        }
        $res = $workspace->save();
        if($res){
            session()->flash('success', 'Url  Created Successfully.');
        }else{
            session()->flash('error', 'Unable To Create Url Please try Again');
        }
        return back();
    }
    public function allbookmarks()
    {
        $bookmarks = BookMarks::where('created_by',Auth::id())->get();
        return view('user.bookmark.all',compact('bookmarks'));
    }
    public function addbookmark()
    {
        $dknowledges = DKnowledgeAsset::all();
        return view('user.bookmark.add',compact('dknowledges'));
    }
    public function storebookmark(Request $request)
    {
        $bookmark = new BookMarks;
        $bookmark->title = $request->title;
        $bookmark->url = $request->url;
        $bookmark->ka_id = $request->ka_id;
        $bookmark->note = $request->note;
        if($request->file('thumbnail')){
            $file = $request->file('thumbnail');
            $filename = $file->getClientOriginalName();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('images/bookmark/');
            $res = $file->move($destinationPath, $imgname);
            
            $bookmark->thumbnail = $imgname;
        }
        $bookmark->created_by = Auth::id();
        $res = $bookmark->save();
        if($res){
            session()->flash('success', 'Bookmark  Created Successfully.');
        }else{
            session()->flash('error', 'Unable To Create Bookmark Please try Again');
        }
        return redirect()->route('all.bookmarks');
        
    }
    public function editbookmark(BookMarks $bookmark)
    {
        $dknowledges = DKnowledgeAsset::all();
        return view('user.bookmark.edit',compact('dknowledges','bookmark'));
    }
    public function updatebookmark(Request $request, BookMarks $bookmark)
    {
      
        $bookmark->title = $request->title;
        $bookmark->url = $request->url;
        $bookmark->ka_id = $request->ka_id;
        $bookmark->note = $request->note;
        if($request->file('thumbnail')){
            $file = $request->file('thumbnail');
            $filename = $file->getClientOriginalName();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('images/bookmark/');
            $res = $file->move($destinationPath, $imgname);
            
            $bookmark->thumbnail = $imgname;
        }
        $bookmark->created_by = Auth::id();
        $res = $bookmark->update();
        if($res){
            session()->flash('success', 'Bookmark  Created Successfully.');
        }else{
            session()->flash('error', 'Unable To Create Bookmark Please try Again');
        }
        return redirect()->route('all.bookmarks');
    }
    public function deletebookmark(BookMarks $bookmark, Request $request)
    {
        $res = $bookmark->delete();
        if($res){
            session()->flash('success', 'Bookmark  deleted Successfully.');
        }else{
            session()->flash('error', 'Unable To delete Bookmark Please try Again');
        }
        return redirect()->route('all.bookmarks');
    }


    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
