<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;

class BackingTrack extends Controller
{
    public function formAudio () {
    session_start();
    return view("addAudio");

    }

    public function create (Request $request)  {
        session_start();
        //dd($request->input('title'));
        //dd($request->input('genre'));
        if(
       
            !$request->input('title') or
            !$request->input('genre') or
            !$request->file('audio') 
        ) 
        {
            return view('addAudio',  [
                      
                'failed' => 'Error, please complete the fields' 
            ]);  
        }
        $nameAudio = $request->file('audio')->getClientOriginalName();
        $extAudio =   $request->file('audio')->getClientOriginalExtension();
        $sizeAudio =  $request->file('audio')->getSize();
        
        if($extAudio != "wav") 
        {
         return view('addAudio',  [
                      
             'failed' => 'Error, please send .wav file' 
         ]);  
        }

        $request->file('audio')->storeAs('public/audios/',  $nameAudio);

        $audio = new Audio();
        $audio->title = $request->input('title');
        $audio->genre = $request->input('genre');
        $audio->audio = $nameAudio;
        $audio->save();

        return redirect()->action([HomeController::class, 'index']);
 
    }

    public function update () {}

    public function delete () {}

    public function index () {}

}
