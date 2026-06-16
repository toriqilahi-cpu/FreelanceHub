<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Models\FreelancerProfile;
use App\Models\Review;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $profile = FreelancerProfile::firstOrCreate(
            ['user_id' => auth()->id()],
            [
                'title' => 'Freelancer',
                'bio' => 'Belum ada deskripsi'
            ]
        );

        $averageRating = Review::where(
            'reviewee_id',
            auth()->id()
        )->avg('rating');

        $totalReviews = Review::where(
            'reviewee_id',
            auth()->id()
        )->count();

        $portfolios = Portfolio::where(
            'user_id',
            auth()->id()
        )
            ->latest()
            ->get();

        $totalPortfolio = $portfolios->count();

        $totalCompletedProject = \App\Models\Contract::where(
            'freelancer_id',
            auth()->id()
        )
            ->where('status', 'completed')
            ->count();

        return view(
            'freelancer.profile.show',
            compact(
                'profile',
                'averageRating',
                'totalReviews',
                'portfolios',
                'totalPortfolio',
                'totalCompletedProject'
            )
        );
    }

    public function edit()
    {
        $profile = FreelancerProfile::firstOrCreate(
            ['user_id' => auth()->id()],
            [
                'title' => 'Freelancer',
                'bio' => 'Belum ada deskripsi'
            ]
        );

        return view(
            'freelancer.profile.edit',
            compact('profile')
        );
    }

    public function update(Request $request)
    {
        $profile = FreelancerProfile::where(
            'user_id',
            auth()->id()
        )->first();

        $request->validate([
            'title' => 'required',
            'bio' => 'required',
        ]);

        if ($request->hasFile('photo')) {

            $photo = $request
                ->file('photo')
                ->store(
                    'profiles',
                    'public'
                );

            $profile->photo = $photo;
        }

        $profile->title = $request->title;
        $profile->bio = $request->bio;
        $profile->skills = $request->skills;
        $profile->hourly_rate = $request->hourly_rate;
        $profile->location = $request->location;
        $profile->experience_year = $request->experience_year;
        $profile->education = $request->education;
        $profile->portfolio_url = $request->portfolio_url;
        $profile->github_url = $request->github_url;
        $profile->linkedin_url = $request->linkedin_url;
        $profile->availability = $request->availability;

        $profile->save();

        return redirect()
            ->route('freelancer.profile')
            ->with(
                'success',
                'Profil berhasil diperbarui'
            );
    }
}
