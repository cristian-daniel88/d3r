<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Genres;
use App\Models\Instruments;
use Illuminate\Http\Request;

class AddBook extends Controller
{
    public function index () {
        session_start(); 
        if (empty($_SESSION["username"])) {
            return redirect()->action([LoginController::class, 'index']);
        }
        return view('addbook' , 
        [
            'genres' => Genres::all(),
            'instruments' => Instruments::all()
        ]);
    }

    public function store (Request $request) {
        session_start();
      //  dd($request->input('arrangements'));
        if(
       
           !$request->input('title') or
           !$request->input('genre') or
           !$request->input('instrument') or
           !$request->input('authors') or
           !$request->input('arrangements') or
           !$request->file('image') or
           !$request->file('file') 

        ) 
       {
              return view('addbook',  [
                     
                     'genres' => Genres::all(),
                     'instruments' => Instruments::all(),
                     'failed' => 'Boock sent failed, please check the fields' 
              ]);  
              
       }



      
       $nameImg = $request->file('image')->getClientOriginalName();
       $extImg =   $request->file('image')->getClientOriginalExtension();
       $sizeImg =  $request->file('image')->getSize();

       $extImgPass = ($extImg == "png" || $extImg == "jpg");

       if(!$extImgPass) 
       {
        return view('addbook',  [
                     
            'genres' => Genres::all(),
            'instruments' => Instruments::all(),
            'failed' => 'Error, please send .jpg or .png file' 
        ]);  
       }
     

       $request->file('image')->storeAs('public/images/',  $nameImg);
       

       $nameFile = $request->file('file')->getClientOriginalName();
       $extIFile =   $request->file('file')->getClientOriginalExtension();
       $sizeFile =  $request->file('file')->getSize();
       
       $extIFilePass = ($extIFile == "pdf");

       if(!$extIFilePass) 
       {
        return view('addbook',  [
                     
            'genres' => Genres::all(),
            'instruments' => Instruments::all(),
            'failed' => 'Error, please send .pdf file' 
        ]);  
       }

       $request->file('file')->storeAs('public/files/',  $nameFile);
      

       $book = new Books();
       $book->title = $request->input('title');
       $book->genre_id = $request->input('genre');
       $book->instrument_id = $request->input('instrument');
       $book->authors = $request->input('authors');
       $book->musical_arrangements = $request->input('arrangements');
       $book->image = $nameImg;
       $book->file = $nameFile;
       $book->save(); 

       redirect()->back() ;


       //  return view('form-create-book',  [
       //         'instruments'=> Instruments::all(),
       //         'genres' => Genres::all(),
       //         'succesfull' => 'Book sent' 
       
       //  ]);  
      
       return redirect()->action([HomeController::class, 'index']);
    }
}
