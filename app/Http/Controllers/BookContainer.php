<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use App\Models\Instruments;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookContainer extends Controller
{
    // public function index () {
    //     $current_page = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
             
    //     $bookId = DB::select('select * from books where id = ?', [$current_page]);


    //     if ($bookId[0]->id != $current_page) {
            
    //         return redirect()->action([HomeController::class, 'index']);
    //     }
    //     return view('book');
    // }

    protected function bookFunction () {
        $current_page = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
       
           
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


      public function index() {

          session_start();
          if (empty($_SESSION["username"])) {
          return redirect()->action([LoginController::class, 'index']);
          }
           
          return $this->bookFunction();
         
      }


      

}
