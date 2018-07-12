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

class ReportExport implements FromCollection
{

    /**
     * @return Collection
     */
    public function collection()
    {
        return Project::all();
    }
}