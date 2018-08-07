<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    public function goHome(){
        $projects = DB::table('projects')->paginate(10);
        return view('finance.dashboard', compact('projects'));
    }

    public function makePayment($id){
        $project = Project::where('project_id',$id)->first();
        return view('finance.make-payment', compact('project'));
    }
}
