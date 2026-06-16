<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\Notification;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function create(Project $project)
    {
        return view(
            'freelancer.proposals.create',
            compact('project')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required',
            'cover_letter' => 'required',
            'bid_amount' => 'required|numeric'
        ]);

        Proposal::create([
            'project_id' => $request->project_id,
            'freelancer_id' => auth()->id(),
            'cover_letter' => $request->cover_letter,
            'bid_amount' => $request->bid_amount,
            'status' => 'pending'
        ]);
        $project = \App\Models\Project::find(
            $request->project_id
        );

        Notification::create([

            'user_id' => $project->client_id,

            'title' => 'Proposal Baru',

            'message' =>
                auth()->user()->name .
                ' mengirim proposal untuk project "' .
                $project->title . '"'

        ]);


        return redirect()
            ->route('my.proposals')
            ->with('success', 'Proposal berhasil dikirim');
    }

    public function myProposal()
    {
        $proposals = Proposal::where(
            'freelancer_id',
            auth()->id()
        )->latest()->get();

        return view(
            'freelancer.proposals.index',
            compact('proposals')
        );
    }

    public function hiredProjects()
    {
        $proposals = Proposal::with('project')
            ->where('freelancer_id', auth()->id())
            ->where('status', 'accepted')
            ->get();

        return view(
            'freelancer.projects.hired',
            compact('proposals')
        );
    }
}