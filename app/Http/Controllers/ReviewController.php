<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function show($book_id, $review)
    {

    }

    public function delete($review_id)
    {
        
        if (\Gate::allows('delete_reviews')) {
        // delete review

        $review = Review::findOrFail($review_id);

        $review->delete();

        session()->flash('success_message', 'Review has been deleted.');

        }

        return redirect()->action('BookController@show', [ $review->book_id ]);
    }
}
