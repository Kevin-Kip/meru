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
}
