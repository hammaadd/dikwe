<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeatureController extends Controller
{
    //

    public function features(){

        $features = Feature::all();
        return view('admin.feature.all',compact('features'));
    }

    public function addFeature(Request $request){
        $feature = new Feature;
        $feature->text = $request->text;
        $feature->order = $request->order;
        $feature->created_by = Auth::id();

        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('images/features/');
            $res = $file->move($destinationPath, $imgname);
            $feature->image = $imgname;
            $res = $feature->save();
            if($res){
                $request->session()->flash('success', 'Feature Added Successfully!');
            }else{
                $request->session()->flash('error', 'Unable To Add Feature Try Later!');
            }
        }else{
            $request->session()->flash('error', 'There Is No File To Upload.');
        }

        return back();


    }

    public function editFeature(Request $request,Feature $feature){
        
        return view('admin.feature.edit',compact('feature'));
    }

    public function deleteImage(Request $request, Feature $feature){

        if(null!=$feature->image){
            $image_path = "images/features/".$feature->image;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $feature->image = null;
        $res = $feature->save();

        if($res){
            $request->session()->flash('success', 'Image Removed Successfully!');
        }else{
            $request->session()->flash('error', 'Unable To Remove Image Try Later!');
        }

        return back();

    }

    public function updateFeature(Request $request, Feature $feature){

        $feature->text = $request->text;
        $feature->order = $request->order;
        $feature->created_by = Auth::id();

        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('images/features/');
            $res = $file->move($destinationPath, $imgname);
            $old_image = $feature->image;
            if(null!=$old_image){
                $image_path = "images/features/".$old_image;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $feature->image = $imgname;
        }


        $res = $feature->update();


        if($res){
            $request->session()->flash('success', 'Feature Updated Successfully!');
        }else{
            $request->session()->flash('error', 'Unable To Update Feature Try Later!');
        }
        return back();
    }

    public function deleteFeature(Request $request,Feature $feature){

        if($feature->created_by == Auth::id()){
            $res = $feature->delete();
            if($res){
                $request->session()->flash('success', 'Feature Deleted Successfully!');
            }else{
                $request->session()->flash('error', 'Unable To Delete Feature Try Later!');
            }
        }else{
            $request->session()->flash('error', 'Unable To Delete Feature Try Later!');
        }

        return back();
    }
}
