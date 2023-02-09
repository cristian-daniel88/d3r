<?php

namespace App\Http\Livewire;

use App\Http\Controllers\LoginController;
use App\Models\Books;
use App\Models\Genres;
use App\Models\Instruments;
use App\Models\Reviews;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReviewsForBook extends Component
{
    protected function bookFunction () {
        $current_page = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
        $bookFind = Books::find($current_page);
        
        if($bookFind == null) 
        {
          header("Location:" . env('app_url') . "home");
          exit;
        }
           
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

        return view('livewire.reviews-for-book', 
        ['book' => $book],
        ['otherTables'=> [$genre, $forInst, $reviewsArray, $avgRating]], 
        );
   
      }
   
    public function render()
    {
      
       
     
        
        session_start();
        if (empty($_SESSION["username"])) {
        return redirect()->action([LoginController::class, 'index']);
        }

       
        return $this->bookFunction();
    }
}
