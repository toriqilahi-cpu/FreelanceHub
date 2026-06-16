<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Review;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Daftar Freelancer + Search
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = User::with('freelancerProfile')
            ->where('role', 'freelancer');

        if ($request->search) {

            $query->where(function ($q) use ($request) {

                $q->where(
                    'name',
                    'like',
                    '%' . $request->search . '%'
                )

                    ->orWhereHas(
                        'freelancerProfile',
                        function ($profile) use ($request) {

                            $profile->where(
                                'skills',
                                'like',
                                '%' . $request->search . '%'
                            );
                        }
                    );
            });
        }

        $freelancers = $query
            ->latest()
            ->paginate(9);

        $topFreelancers = User::with('freelancerProfile')
            ->where('role', 'freelancer')
            ->take(3)
            ->get();

        return view(
            'client.freelancer.index',
            compact(
                'freelancers',
                'topFreelancers'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Profil Freelancer
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $user = User::with('freelancerProfile')
            ->findOrFail($id);

        $profile = $user->freelancerProfile;

        $reviews = Review::where(
            'reviewee_id',
            $user->id
        )
        ->latest()
        ->get();

        $avgRating = Review::where(
            'reviewee_id',
            $user->id
        )
        ->avg('rating');

        $portfolios = Portfolio::where(
            'user_id',
            $user->id
        )
        ->latest()
        ->get();

        $totalPortfolio = $portfolios->count();

        $totalReview = $reviews->count();

        $totalCompletedProject = \App\Models\Contract::where(
            'freelancer_id',
            $user->id
        )
            ->where(
                'status',
                'completed'
            )
            ->count();

        return view(
            'client.freelancer.show',
            compact(
                'user',
                'profile',
                'reviews',
                'avgRating',
                'portfolios',
                'totalPortfolio',
                'totalReview',
                'totalCompletedProject'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Detail Portfolio Freelancer
    |--------------------------------------------------------------------------
    */

    public function portfolio(Portfolio $portfolio)
    {
        $portfolio->load('user');

        return view(
            'client.freelancer.portfolio',
            compact('portfolio')
        );
    }

    
}