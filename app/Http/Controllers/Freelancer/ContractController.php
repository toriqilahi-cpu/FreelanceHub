<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Review;
use App\Models\Notification;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::with('project')
            ->where(
                'freelancer_id',
                auth()->id()
            )
            ->get();

        return view(
            'freelancer.contracts.index',
            compact('contracts')
        );
    }

    public function reviews()
    {
        $reviews = Review::where(
            'reviewee_id',
            auth()->id()
        )
        ->latest()
        ->get();

        return view(
            'freelancer.reviews.index',
            compact('reviews')
        );
    }

    public function complete(
        Contract $contract
    )
    {
        $contract->update([
            'status' => 'completed'
        ]);

        $contract->project->update([
            'status' => 'completed'
        ]);

        Notification::create([

            'user_id' =>
                $contract->client_id,

            'title' =>
                'Project Selesai',

            'message' =>
                'Freelancer telah menyelesaikan project "' .
                $contract->project->title . '"'

        ]);

        return back()->with(
            'success',
            'Project berhasil diselesaikan'
        );
    }
}
