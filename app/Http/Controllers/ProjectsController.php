<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\Department;
use App\Message;
use App\Photo;
use App\Project;
use App\User;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    public function getProjects(){
        $projects = DB::table('projects')
            ->leftJoin('photos','photos.photo_id','=','projects.project_id')
            ->get();
        return $projects;
    }
    public function getConstituencies(){
        return Constituency::all();
    }
    public function getWards(){
        return Ward::all();
    }
    public function getDepartments(){
        return Department::all();
    }
    public function getPhotos(){
        return Photo::all();
    }
    public function getProjectById($id){
        $project = Project::where('project_id',$id)->get();
        $photos = Photo::where('photo_project',$id)->get();
        $project[0]["photos"] = $photos;
        return $project;
    }
    public function getProjectsByDepartment($id){
        $department = Department::where('department_id', $id)->get();
        $departmentName = $department[0]->department_name;
        $projects = Project::where('project_category',$departmentName)->get();
        foreach ($projects as $project){
            $projectPhotos = Photo::where('photo_project',$project->project_id)->get();
            $project['photos'] = $projectPhotos;
        }
        return $projects;
    }
    public function getProjectsByConstituency($id){
        return Project::where('project_constituency', $id)->get();
    }
    public function sendFeedback(Request $request){
        $message = Message::create([
            'sender_first_name' => $request['sender_first_name'],
            'sender_last_name' => $request['sender_last_name'],
            'sender_email' => $request['sender_email'],
            'sender_constituency' => $request['sender_constituency'],
            'message' => $request['message']
        ]);

        if ($message){
            return response()->json("success");
        } else {
            return response()->json("error");
        }
    }
}
