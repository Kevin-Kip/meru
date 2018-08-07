<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    public function submitPayment(Request $request, $id){

        $project = Project::where('project_id',$id)->first();
        $paid = $request['price'];
        $currentBalance = $project->balance;
        $budget = $project->budget;

        if ($paid > $budget){
            return redirect()->back()->with('price_error',"Amount must be equal to or less than the budget.");
        }

        if ($paid < 100){
            return redirect()->back()->with('price_error',"Amount must be greater than KSh. 100");
        }

        if ($paid > $currentBalance){
            return redirect()->back()->with('price_error',"Amount must be equal to or less than the current balance.");
        }

        if ($currentBalance == 0) {
             $newBalance = $budget - $paid;
             $project->balance = $newBalance;
             $project->project_status = 1;
        } else if ($currentBalance > 0){
            $newBalance = $currentBalance - $paid;
            $project->balance = $newBalance;
            $project->project_status = 1;
        }

        return $project->update() ?
            redirect()->back()->with('message',"success") :
            redirect()->back()->with('message',"error");
    }
}
