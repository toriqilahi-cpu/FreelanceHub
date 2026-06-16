<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('client')
            ->latest()
            ->get();

        return view(
            'admin.projects.index',
            compact('projects')
        );
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return back()->with(
            'success',
            'Project berhasil dihapus'
        );
    }
}