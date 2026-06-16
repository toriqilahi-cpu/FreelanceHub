<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use App\Models\Contract;
use App\Models\Review;
use App\Models\FreelancerProfile;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $totalProposals = Proposal::where(
            'freelancer_id',
            $userId
        )->count();

        $hiredProjects = Contract::where(
            'freelancer_id',
            $userId
        )->count();

        $totalReviews = Review::where(
            'freelancer_id',
            $userId
        )->count();

        $profile = FreelancerProfile::where(
            'user_id',
            $userId
        )->first();

        return view(
            'freelancer.dashboard',
            compact(
                'totalProposals',
                'hiredProjects',
                'totalReviews',
                'profile'
            )
        );
    }
}