<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Practice;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    //

    public function index(Request $request){
        return view('user.content.notes');
    }

    public function show(Request $request, $id){
        if(isset($id)){
            $note = Note::find($id);
            if(!$note){
                return back();
            }
            return view('user.note.show',['note'=>$note]);
        }else{
            return back();
        }
    }

    public function checkTest(){
        
    }

    public function share(){
        
    }

    // public function practice(Request $request){
    //    if($request){

    //        $data = new Practice;
    //        $data->word1 = $request->word1;
    //        $data->word2 = $request->word2;
    //        $data->word3 = $request->word3;
    //        $data->word4 = $request->word4;
    //        $data->def1 = $request->def1;
    //        $data->def2 = $request->def2;
    //        $data->def3 = $request->def3;
    //        $data->def4 = $request->def4;
    //        $res = $data->save();

    //        if($res){
    //            $message['success'] = "Cards created Successfully";
               
    //        }else{
    //             $message['error'] = "Not able to create card try later!";
                
    //        }
    //        return $message;
    //    }
    // }

    // public function fetchData(){
    //      $data = Practice::latest()->first();

    //      return $data;
    // }
}
