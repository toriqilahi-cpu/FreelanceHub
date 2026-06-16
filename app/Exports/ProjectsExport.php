<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProjectsExport implements FromCollection
{
    public function collection()
    {
        return Project::where(
            'client_id',
            auth()->id()
        )->get();
    }
}