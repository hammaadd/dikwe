<?php

namespace App\Http\Controllers;

use App\Models\Note;
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
            return view('user.note.show',['note'=>$note]);
        }else{
            return back();
        }
    }

    public function checkTest(){
        
    }
}
