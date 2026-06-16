<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Models\Project;

class WorkController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();

        return view(
            'freelancer.work.index',
            compact('projects')
        );
    }
}