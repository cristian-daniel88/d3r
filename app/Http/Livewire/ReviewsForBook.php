<?php

namespace App\Http\Livewire;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Models\Books;
use App\Models\Genres;
use App\Models\Instruments;
use App\Models\Reviews;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReviewsForBook extends Component
{ 
    public $reviews;
    public $avg;

    public $review;
    public $rating;
    
    public function funcion () {
 
      
      $current_page = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
      $_SESSION['bookId'] = $current_page;
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
       

           $reviewsArray = array();

           foreach ($reviewsAll as $review) {
            if ($review->book_id == $current_page) {
             array_push($reviewsArray, $review );
            }
           }

           $ratingArray = array();
           foreach ( $reviewsAll as $rat) {
             if ($rat->book_id == $current_page) {
              array_push($ratingArray, $rat->rating);
             }
            }
            $avgRating = array_sum($ratingArray)/
            (count($ratingArray) == 0 ? 1 : count($ratingArray) );

           
            $this->avg = $avgRating;
            $this->reviews = $reviewsArray;
    }

    
    public function render()
    {
      $this->funcion();
        
       
        return view('livewire.reviews-for-book');
    }


    public function sentReview () 
    { 
      session_start();
      
      $newReview = new Reviews();
      $newReview->user_id = $_SESSION['id'];
      $newReview->book_id = $_SESSION['bookId'];
      $newReview->rating = $this->rating;
      $newReview->review = $this->review;
      $newReview->save();
      
      $this->success();
      
    }

    public function success() {
      $this->dispatchBrowserEvent('refresh', ['message' =>'Review sent...']);
    }
}
