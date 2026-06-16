<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProjectsExport;
use Maatwebsite\Excel\Facades\Excel;
class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::where(
            'client_id',
            auth()->id()
        );

        if ($request->search) {

            $query->where(
                'title',
                'like',
                '%' . $request->search . '%'
            );
        }

        if ($request->status) {

            $query->where(
                'status',
                $request->status
            );
        }

        $projects = $query
            ->latest()
            ->get();

        return view(
            'client.projects.index',
            compact('projects')
        );
    }

    public function create()
    {
        return view(
            'client.projects.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',

            'description' => 'required',

            'budget' => 'required',

            'deadline' => 'required'

        ]);

        Project::create([

            'client_id' => auth()->id(),

            'title' => $request->title,

            'description' => $request->description,

            'budget' => $request->budget,

            'deadline' => $request->deadline

        ]);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project berhasil dibuat');
    }

    public function show(Project $project)
    {
        $project->load([
            'client',
            'proposals'
        ]);

        return view(
            'client.projects.show',
            compact('project')
        );
    }

    public function exportPdf()
    {
        $projects = \App\Models\Project::where(
            'client_id',
            auth()->id()
        )
            ->latest()
            ->get();

        $pdf = Pdf::loadView(
            'client.projects.pdf',
            compact('projects')
        );

        return $pdf->download(
            'data-project.pdf'
        );
    }

    public function exportExcel()
    {
        return Excel::download(
            new ProjectsExport,
            'data-project.xlsx'
        );
    }

    public function edit(Project $project)
    {
        return view(
            'client.projects.edit',
            compact('project')
        );
    }

    public function update(
        Request $request,
        Project $project
    ) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'budget' => 'required',
            'deadline' => 'required'
        ]);

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'budget' => $request->budget,
            'deadline' => $request->deadline
        ]);

        return redirect()
            ->route('projects.index')
            ->with(
                'success',
                'Project berhasil diperbarui'
            );
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with(
                'success',
                'Project berhasil dihapus'
            );
    }
}