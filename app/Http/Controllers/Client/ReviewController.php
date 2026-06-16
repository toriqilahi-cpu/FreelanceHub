<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Review;
use App\Models\Contract;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Project $project)
    {
        return view(
            'client.reviews.create',
            compact('project')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'project_id' => 'required',

            'freelancer_id' => 'required',

            'rating' => 'required',

            'review' => 'required'

        ]);

        $contract = Contract::where(
            'project_id',
            $request->project_id
        )->first();

        if (!$contract) {

            return back()->with(
                'error',
                'Kontrak tidak ditemukan'
            );
        }

        Review::create([

            'project_id' => $request->project_id,

            'client_id' => auth()->id(),

            'freelancer_id' => $request->freelancer_id,

            'rating' => $request->rating,

            'review' => $request->review

        ]);


        return redirect()
            ->route('projects.index')
            ->with(
                'success',
                'Review berhasil diberikan'
            );
    }
}