<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
{
    $totalUsers = \App\Models\User::count();

    $totalClients = \App\Models\User::where(
        'role',
        'client'
    )->count();

    $totalFreelancers = \App\Models\User::where(
        'role',
        'freelancer'
    )->count();

    $totalProjects = \App\Models\Project::count();

    $totalProposals = \App\Models\Proposal::count();

    $totalContracts = \App\Models\Contract::count();

    $totalReviews = \App\Models\Review::count();

    return view(
        'admin.dashboard',
        compact(
            'totalUsers',
            'totalClients',
            'totalFreelancers',
            'totalProjects',
            'totalProposals',
            'totalContracts',
            'totalReviews'
        )
    );
}
}
