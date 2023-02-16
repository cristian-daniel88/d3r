<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchBook extends Controller
{
    private function getBook ($filter, $value) {

        if ($filter == 'genre' ) {
            $books = Books::
            join('genres', 'genres.id', '=', 'books.genre_id')
            ->join('instruments', 'instruments.id', '=', 'books.instrument_id')
            ->where('genres.name' , 'LIKE', '%'. $value .'%')->get([
             
                'instruments.name AS instrument',
                'genres.name AS genre', 
                'books.image',
                'books.title',
                'books.musical_arrangements',
                'books.authors',
                'books.file',
                'books.id',
                
          ]);;

          return $books;
        }

        
        if ($filter == 'author' ) {
            $books = Books::
            join('genres', 'genres.id', '=', 'books.genre_id')
            ->join('instruments', 'instruments.id', '=', 'books.instrument_id')
            ->where('books.authors' , 'LIKE', '%'. $value .'%')->get([
             
                'instruments.name AS instrument',
                'genres.name AS genre', 
                'books.image',
                'books.title',
                'books.musical_arrangements',
                'books.authors',
                'books.file',
                'books.id',
                
          ]);;

          return $books;
        }

        if ($filter == 'instrument' ) {
            $books = Books::
            join('genres', 'genres.id', '=', 'books.genre_id')
            ->join('instruments', 'instruments.id', '=', 'books.instrument_id')
            ->where('instruments.name' , 'LIKE', '%'. $value .'%')->get([
             
                'instruments.name AS instrument',
                'genres.name AS genre', 
                'books.image',
                'books.title',
                'books.musical_arrangements',
                'books.authors',
                'books.file',
                'books.id',
                
          ]);;

          return $books;
        }

        if ($filter == 'title' ) {
            $books = Books::
            join('genres', 'genres.id', '=', 'books.genre_id')
            ->join('instruments', 'instruments.id', '=', 'books.instrument_id')
            ->where('books.title' , 'LIKE', '%'. $value .'%')->get([
             
                'instruments.name AS instrument',
                'genres.name AS genre', 
                'books.image',
                'books.title',
                'books.musical_arrangements',
                'books.authors',
                'books.file',
                'books.id',
                
          ]);;

          return $books;
        }



    } 

    public function index () 
    {

        session_start(); 
        if (isset($_GET['filter'])) { $filter = filter_input(INPUT_GET, 'filter', FILTER_SANITIZE_STRING);}
        if (isset($_GET['value'])) { $value = filter_input(INPUT_GET, 'value', FILTER_SANITIZE_STRING);}

        
         
       if (empty($_SESSION["username"])) {
        return redirect()->action([LoginController::class, 'index']);
      }

      $books = $this->getBook($filter, $value);
     

      $reviews = Reviews::all();


      
        return view('search',  
        ['books' => $books,
        'reviews' => $reviews
        ]
        ); 
    }
}
