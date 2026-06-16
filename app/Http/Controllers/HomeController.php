<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $topFreelancers = User::where('role', 'freelancer')
            ->with('freelancerProfile')
            ->withAvg(
                'reviewsReceived',
                'rating'
            )
            ->orderByDesc('reviews_received_avg_rating')
            ->take(3)
            ->get();

        $latestProjects = Project::latest()
            ->take(6)
            ->get();

        return view(
            'home',
            compact(
                'topFreelancers',
                'latestProjects'
            )
        );
    }
}