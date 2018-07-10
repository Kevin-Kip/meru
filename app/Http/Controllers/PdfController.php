<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\Project;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Excel::download(new ReportExport(),'report.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function count()
    {
        return DB::table('projects')->where("name",'=',"Dam")->pluck('id');
    }

    public function ongoing(){
        return response()->json(['ongoing'=>DB::table('projects')->where('completion','<',100)->count()]);
    }

    public function completed(){
        return response()->json(['completed'=>DB::table('projects')->where('completion','=',100)->count()]);
    }

    public function chartData(){
        $to20 = DB::table('projects')->where('completion','<=',20)->count();
        $to40 = DB::table('projects')->where('completion','>',20)->where('completion','<=',40)->count();
        $to60 = DB::table('projects')->where('completion','>',40)->where('completion','<=', 60)->count();
        $to80 = DB::table('projects')->where('completion','>',60)->where('completion','<=', 80)->count();
        $to100 = DB::table('projects')->where('completion','>',80)->count();

        $totalCount = Project::count();
        $completed = DB::table('projects')->where('completion','=',100)->count();
        $ongoing = DB::table('projects')->where('completion','<',100)->count();

        $constituencies = Constituency::all();

        $full = array();

        foreach ($constituencies as $constituency){
            $count = DB::table('projects')->where('constituency_id','=',$constituency->id)->count();
            $full[$constituency->constituency_name] = $count;
        }

        return response()->json([
            'to20' => $to20,
            'to40' => $to40,
            'to60' => $to60,
            'to80' => $to80,
            'to100' => $to100,
            'completed' => $completed,
            'ongoing' => $ongoing,
            'total' => $totalCount,
            'full' => $full
        ]);
    }
}
