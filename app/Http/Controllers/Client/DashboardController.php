<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Project::where(
            'client_id',
            auth()->id()
        )->count();

        $activeProjects = Project::where(
            'client_id',
            auth()->id()
        )
            ->where('status', 'in_progress')
            ->count();

        $completedProjects = Project::where(
            'client_id',
            auth()->id()
        )
            ->where('status', 'completed')
            ->count();

        $openProjects = Project::where(
            'client_id',
            auth()->id()
        )
            ->where('status', 'open')
            ->count();

        $recentProjects = \App\Models\Project::where(
            'client_id',
            auth()->id()
        )
            ->latest()
            ->take(5)
            ->get();

        return view(
            'client.dashboard',
            compact(
                'totalProjects',
                'activeProjects',
                'completedProjects',
                'openProjects',
                'recentProjects'
            )
        );
    }
}