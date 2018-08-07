<?php

namespace App\Http\Controllers;

use App\Department;
use App\Constituency;
use App\Photo;
use App\Project;
use App\Message;
use App\Summary;
use App\User;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\File;

class ProjectControllerWeb extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::table('projects')->take(3)
            ->join('constituencies','projects.project_constituency','=','constituencies.constituency_id')->get();
        $constituencies = Constituency::all();
        $photos = DB::table('photos')->orderBy('photo_id','desc')->take(10)->get();
        $message = "";
        $departments  = Department::all();
        return view('index', compact('projects','constituencies','message','photos','departments'));
    }

    public function fetchAll(){
        $projects =  Project::with('photos')->get();
        $constituencies = Constituency::all();
        $departments = Department::all();
        return view('projects',compact('photos','constituencies','projects','departments'));
    }


    public function showForAdmin(){
        $messagecount = Message::count();
        $projectcount = Project::count();
        $usercount = User::count();
        $constituencycount = Constituency::count();
        $projects = DB::table('projects')->join('constituencies','projects.project_constituency','=','constituencies.constituency_id')->paginate(10);
        return view('admin.projects',compact('messagecount','projectcount','usercount','constituencycount','projects'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = "";
        $constituencies = Constituency::all();
        $wards = Ward::all();
        $departments = Department::all();
        $contractors = DB::table('users')->where('user_role','=',"Contractor")->get();
        return view('admin.create-project',compact('departments','message','constituencies','contractors','wards'));
    }

    public function byConstituency($constituencyId){
        $constituency = DB::table('constituencies')->where('constituency_id','=',$constituencyId)->first();
        $constituencyName =  $constituency->constituency_name;
        $projects =  Project::with('photos')->get();
        $constituencies = Constituency::all();
        $departments = Department::all();
        return view('constituency',compact('constituencies','projects','constituencyName','departments'));
    }

    public function byCategory($departmentId){
        $department = DB::table('departments')->where('department_id','=',$departmentId)->first();
        $categoryName = $department->department_name;
        $constituencies = Constituency::all();
        $departments = Department::all();
        $projects =  Project::where('project_category',$categoryName)->get();
        return view('category',compact('projects','constituencies','categoryName','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->all();
        $this->validate($request, [
            'name'=>'required|max:35',
            'description'=>'required|max:400',
            'budget'=>'required|max:20',
            'completion'=>'required|max:3'
        ]);
        $project = Project::create([
            'project_name' => $request['name'],
            'project_description' => $request['description'],
            'project_category' => $request['category'],
            'project_constituency' => $request['constituency'],
            'project_ward' => $request['ward'],
            'budget' => $request['budget'],
            'completion' => $request['completion'],
            'contractor' => $request['contractor'],
            'due_date' => $request['due_date'],
            'added_by' => "Admin"
        ]);

        $files = $request['file'];

        if ($request->hasFile('file')){
            foreach ($files as $file){
                $path = $file->storePublicly('/uploads/'.$request['name'],'public');
                $photo = new Photo();
                $photo->photo_path = $path;
                $photo->photo_project = $project->id;
                $photo->save();
            }
        }

        if ($project){
            return redirect()->back()->with('message',"success");
        } else {
            return redirect()->back()->with('message',"error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departments = Department::all();
        $constituencies = Constituency::all();
        $project = DB::table('projects')->where('project_id','=',$id)
            ->leftJoin('constituencies','constituencies.constituency_id','=','projects.project_constituency')
            ->get();
        $photos = DB::table('photos')->where('photo_project','=',$id)->get();
        if ($project){
            return view('project', compact('departments','constituencies','project','photos'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = "";
        $project = DB::table('projects')->where('project_id','=',$id)->get();
        $constituencies = Constituency::all();
        $wards = Ward::all();
        $contractors = DB::table('users')->where('user_role','=',"Contractor")->get();
        $departments = Department::all();
        return view('admin.edit-project',compact('project','departments','message','constituencies','contractors','wards'));
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
//        return $request->all();
        $this->validate($request, [
            'project_name'=>'required|max:35',
            'project_description'=>'required|max:400',
            'budget'=>'required|max:20',
            'completion'=>'required|max:3'
        ]);
        if (Project::where('project_id',$id)->update($request->except('_token','submit'))){
            return redirect()->back()->with('message',"success");
        } else {
            return redirect()->back()->with('message',"error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::where('project_id',$id);
        if ($project->delete()){
            return redirect()->back()->with('message',"success");
        } else {
            return redirect()->back()->with('message',"error");
        }
    }
}
