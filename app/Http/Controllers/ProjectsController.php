<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function getProjects(){
        return Project::all();
    }

    public function getProjectById($id){
        return Project::findOrFail($id);
    }

    public function createProject(Request $request){
        $project = Project::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'category' => $request['category'],
            'constituency' => $request['constituency'],
            'ward' => $request['ward'],
            'budget' => $request['budget'],
            'contractor' => $request['contractor'],
            'due_date' => $request['due_date'],
            'added_by' => "Admin"
        ]);
    }

    public function updateProject(Request $request, Project $project){
        $project->update($request->all());
    }

    public function deleteProject($id){
        $project = Project::findOrFail($id);;
        if ($project->delete()){
            return "Deleted";
        } else {
            return "Hard";
        }
        //TODO fix this
    }
}
