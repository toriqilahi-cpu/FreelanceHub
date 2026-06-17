<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjectsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Project::where(
            'client_id',
            auth()->id()
        )
        ->select(
            'title',
            'budget',
            'status',
            'deadline'
        )
        ->get();
    }

    public function headings(): array
    {
        return [
            'Judul',
            'Budget',
            'Status',
            'Deadline'
        ];
    }
}