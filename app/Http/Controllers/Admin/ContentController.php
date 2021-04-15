<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    //
    public function manageContent(Request $request){
        $contents = Content::all();
        return view('admin.content.all',compact('contents'));
    }

    public function editContent(Request $request,Content $content){
        switch($request->method()){
            case ('PUT'):
                $request->validate([
                    'heading' => 'required',
                ]);
        
        
                
                $detail=$request->content;
                $dom = new \DomDocument();
                @$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
                $images = $dom->getElementsByTagName('img');
                
                foreach($images as $k => $img){
                    if($img->hasAttribute('data-filename') && !($img->hasAttribute('upload'))):
                        $data = $img->getAttribute('src');

                        
                        $base64 = $data;

                        $image_info = explode('/',$data);
                        $image_info = explode(';',$image_info[1]);
                        if(strpos($image_info[0], 'svg') !== false){
                        $extension = 'svg';
                        }elseif(strpos($image_info[0], 'jpeg') !== false){
                            $extension = 'jpeg';
                        }else{
                            $extension = 'png';
                        }
                       

                        
                        list($type, $data) = explode(';', $data);
                        list(, $data)      = explode(',', $data);
                        $data = base64_decode($data);
                        
                        $image_name= "uploads/content/images/" . time().$k.'.'.$extension;
                        $path = public_path().'/'. $image_name;
                        file_put_contents($path, $data);
                        $img->removeAttribute('src');
                        $img->setAttribute('upload','1');
                        $img->setAttribute('src', asset($image_name));
                    endif;
               }
        
                $detail = $dom->saveHTML();
                $request->merge(['content' => $detail]);
        
                $content->heading = $request->heading;
                $content->content = $request->content;
                $res = $content->save();
        
                
                if($res){
                    $request->session()->flash('success', 'Content Updated Successfully');
        
                }else{
                    $request->session()->flash('error', 'Unable To Update Content');
                }

                return back();
                break;
            case('GET'):
                return view('admin.content.edit',compact('content'));
                break;
            default:
                return back();
        }
        
    }

    public function slider(Request $request){
        
        return view('admin.content.all',compact('contents'));
    }
}
