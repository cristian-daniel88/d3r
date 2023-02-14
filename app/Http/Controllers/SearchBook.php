<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchBook extends Controller
{
    public function index () 
    {
        session_start();
        $books = Books::
        join('genres', 'genres.id', '=', 'books.genre_id')
        ->join('instruments', 'instruments.id', '=', 'books.instrument_id')
        ->where('genres.name' , 'LIKE', '%'.'l'.'%')->get([
         
            'instruments.name AS instrument',
            'genres.name AS genre', 
            'books.image',
            'books.title',
            'books.musical_arrangements',
            'books.authors',
            'books.file',
            'books.id',
            
      ]);;

        dd($books);
        
        return view('search'); 
    }
}
