<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class EditReview extends Controller
{
    public function editReview (Request $request) 
    {
        $review = Reviews::find($request->input('id'));
        $review->review = $request->input('textarea');
        $review->rating = $request->input('rating');
        $review->save();
        return redirect()->back();
    }

    public function deleteReview (Request $request) 
    {
        
        $review = Reviews::find($request->input('reviewId'));
        $review->delete();
        
        return redirect()->back();

    }
}
