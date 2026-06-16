<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::where(
            'freelancer_id',
            auth()->id()
        )
        ->with('project')
        ->latest()
        ->get();

        return view(
            'freelancer.reviews.index',
            compact('reviews')
        );
    }
}