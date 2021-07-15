<?php

namespace App\Http\Controllers;
use App\Models\Practice;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    //

   

    public function checkTest(){
        
    }

    public function practice(Request $request){
       if($request){

           $data = new Practice;
           $data->word1 = $request->word1;
           $data->word2 = $request->word2;
           $data->word3 = $request->word3;
           $data->word4 = $request->word4;
           $data->def1 = $request->def1;
           $data->def2 = $request->def2;
           $data->def3 = $request->def3;
           $data->def4 = $request->def4;
           $res = $data->save();

           if($res){
               $message['success'] = "Cards created Successfully";
               
           }else{
                $message['error'] = "Not able to create card try later!";
                
           }
           return $message;
       }
    }

    public function fetchData(){
         $data = Practice::latest()->first();

         return $data;
    }
}
