<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductReview;

class ProductReviewController extends Controller
{
    public function store(Request $request, $slug)
    {
        $this->validate($request, [
            'rate' => 'required|numeric|min:1|max:5',
            'review' => 'required|string|max:1000',
        ]);

        $review = ProductReview::create([
            'user_id' => auth()->id(),
            'course_id' => $request->course_id,
            'rate' => $request->rate,
            'review' => $request->review,
        ]);

        if ($review) {
            request()->session()->flash('success', 'Review submitted successfully!');
        } else {
            request()->session()->flash('error', 'Failed to submit review. Please try again.');
        }

        return redirect()->back();
    }
} 