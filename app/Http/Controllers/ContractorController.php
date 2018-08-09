<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectcount = Project::count();
        $completed = Project::where('completion','=',100)->count();
        $ongoing = Project::where('completion','<',100)->count();
        return view('contractor.dashboard', compact('projectcount','completed','ongoing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contractor = User::where('id','=',$id)->first();
        $name = $contractor->first_name ." ". $contractor->last_name;
        $projects = Project::where('contractor','=',$name)->get();
        return view('contractor.projects', compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reports()
    {
        return view('contractor.reports');
    }

    public function goToProgress($id){
        $project = Project::where('project_id',$id)->first();
        return view('contractor.update-progress', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::where('project_id',$id)->first();
        $oldProgress = $project->completion;
        $newProgress = $request['completion'];

        if ($newProgress <= $oldProgress) {
            return redirect()->back()->with('completion_error',"New Progress should be higher.");
        }

        $project->completion = $newProgress;

        return $project->update() ?
            redirect()->back()->with('message',"success") :
            redirect()->back()->with('message',"error");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
