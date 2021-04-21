<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Slide;
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

    public function slides(Request $request){
        $slides = Slide::all();
        return view('admin.slides.all',compact('slides'));
    }

    public function addSlide(Request $request){
        $slide = new Slide;
        $slide->order = $request->slide_no;
        $slide->text = $request->text;
        $res = $slide->save();
        if($res){
            $request->session()->flash('success', 'Slide Added Successfully');

        }else{
            $request->session()->flash('error', 'Unable To Add Slide');
        }
        return back();
    }

    public function editSlide(Request $request,Slide $slide){
        switch($request->method()){
            case ('PUT'):
                $slide->order = $request->slide_no;
                $slide->text = $request->text;
                $res = $slide->update();
                if($res){
                    $request->session()->flash('success', 'Slide Updated Successfully');
        
                }else{
                    $request->session()->flash('error', 'Unable To Update Slide');
                }
                return back();
                break;
            case ('GET'):
                return view('admin.slides.edit',compact('slide'));
                break;

            default :
                return back();
        }
    }
}
