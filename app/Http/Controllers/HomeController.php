<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Genres;
use App\Models\Instruments;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
 public function index () 
 {
    
    session_start();
    

    if (empty($_SESSION["username"])) {
      return redirect()->action([LoginController::class, 'index']);
    }

     $reviews = Reviews::all();
     $books = Books::
       join('genres', 'genres.id', '=', 'books.genre_id')
     ->join('instruments', 'instruments.id', '=', 'books.instrument_id')
     ->orderby('genres.name', 'ASC')
     
     ->get([
         
           'instruments.name AS instrument',
           'genres.name AS genre', 
           'books.image',
           'books.title',
           'books.musical_arrangements',
           'books.authors',
           'books.file',
           'books.id',
           
     ]);

    
     

     return view('books', 
     ['books' => $books,
      'reviews' => $reviews
     ]) ;
  }

  protected function bookFunction () {
   
       
    $book =  DB::table('books')
    ->select('*')
    
    ->whereRaw('id =' . $current_page)->first();

    

    if ($book == null) {
     return view('book', ['book' => 'null']);
    }


    $genre = Genres::select('*')
    ->whereRaw('id =' . $book->genre_id)->first();

    $forInst = Instruments::select('*')
    ->whereRaw('id =' . $book->instrument_id)->first();

    $reviews = Reviews::all();
    
    $reviewsArray = array();
    

    $reviewsAll = Reviews::
    join('users', 'users.id', '=', 'reviews.user_id')
    ->orderby('reviews.created_at', 'DESC')
    ->get([
         'reviews.id',
         'reviews.review',
         'reviews.rating',
         'reviews.user_id',
         'reviews.book_id',
         'users.username AS user',
         'users.id AS userId'
       ]);

       foreach ($reviewsAll as $review) {
         if ($review->book_id == $book->id) {
          array_push($reviewsArray, $review );
         }
       }

   
    $ratingArray = array();
    foreach ( $reviewsAll as $rat) {
      if ($rat->book_id == $book->id) {
       array_push($ratingArray, $rat->rating);
      }
     }
     $avgRating = array_sum($ratingArray)/
     (count($ratingArray) == 0 ? 1 : count($ratingArray) );

    
   $_SESSION['bookId'] = $book->id;

    return view('book', 
    ['book' => $book],
    ['otherTables'=> [$genre, $forInst, $reviewsArray, $avgRating]], 
    );

 }
}
