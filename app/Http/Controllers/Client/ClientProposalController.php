<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\Payment;
use App\Models\Contract;
use App\Models\Notification;


class ClientProposalController extends Controller
{
    public function index(Project $project)
    {
        $proposals = $project->proposals()
            ->with('freelancer')
            ->latest()
            ->get();

        return view(
            'client.proposals.index',
            compact('project', 'proposals')
        );
    }

    public function accept(Proposal $proposal)
    {
        $proposal->update([
            'status' => 'accepted'
        ]);

        Notification::create([

            'user_id' => $proposal->freelancer_id,

            'title' => 'Proposal Diterima',

            'message' =>
                'Proposal Anda diterima untuk project "' .
                $proposal->project->title . '"'

        ]);

        $proposal->project->update([
            'status' => 'in_progress'
        ]);

        $contract = Contract::create([
            'project_id' => $proposal->project_id,
            'client_id' => $proposal->project->client_id,
            'freelancer_id' => $proposal->freelancer_id,
            'status' => 'active'
        ]);
        Payment::create([

            'contract_id' => $contract->id,

            'midtrans_order_id' =>
                'INV-' . time(),

            'amount' =>
                $proposal->bid_amount,

            'status' => 'pending'

        ]);

        Proposal::where(
            'project_id',
            $proposal->project_id
        )
            ->where(
                'id',
                '!=',
                $proposal->id
            )
            ->update([
                'status' => 'rejected'
            ]);

        return back()->with(
            'success',
            'Freelancer berhasil dipilih'
        );
    }
}