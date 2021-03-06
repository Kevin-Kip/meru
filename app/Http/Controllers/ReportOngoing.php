<?php
/**
 * Created by PhpStorm.
 * User: password
 * Date: 7/10/18
 * Time: 2:30 PM
 */

namespace App\Http\Controllers;


use App\Project;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportOngoing implements FromCollection, WithHeadings, ShouldAutoSize
{

    /**
     * @return Collection
     */
    public function collection()
    {
        return Project::where('completion','<',100)->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            "ID",
            "Project Name",
            "Project Description",
            "Project Category",
            "Project Constituency",
            "Project Ward",
            "Budget",
            "Completion",
            "Contractor",
            "Due Date",
            "Added By",
            "Created At",
            "Updated At"
        ];
    }
}