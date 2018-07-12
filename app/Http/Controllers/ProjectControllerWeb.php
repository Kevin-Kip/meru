<?php

namespace App\Http\Controllers;

use App\Department;
use App\Constituency;
use App\Photo;
use App\Project;
use App\Message;
use App\User;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectControllerWeb extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::table('projects')->take(3)->join('constituencies','projects.constituency_id','=','constituencies.id')->get();
        $constituencies = Constituency::all();
        $photos = DB::table('photos')->take(10)->get();
        $message = "";
        $departments  = Department::all();
        return view('index', compact('projects','constituencies','message','photos','departments'));
    }

    public function fetchAll(){
        $projects = DB::table('projects')->join('constituencies','projects.constituency_id','=','constituencies.id')->join('photos','projects.id','=','photos.project_id')->get();
        $constituencies = Constituency::all();
        $photos = Photo::all();
        $departments = Department::all();
        return view('projects',compact('constituencies','projects','photos','departments'));
    }


    public function showForAdmin(){
        $messagecount = Message::count();
        $projectcount = Project::count();
        $usercount = User::count();
        $constituencycount = Constituency::count();
        $projects = DB::table('projects')->join('constituencies','projects.constituency_id','=','constituencies.id')->get();
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
        $contractors = DB::table('users')->where('role','=',"Contractor")->get();
        return view('admin.create-project',compact('departments','message','constituencies','contractors','wards'));
    }

    public function byConstituency($constituencyId){
        $constituency = DB::table('constituencies')->where('id','=',$constituencyId)->get();
        $constituencyName =  $constituency[0]->constituency_name;
        $projects = DB::table('projects')->where('constituency_id','=',$constituencyId)->join('constituencies','projects.constituency_id','=','constituencies.id')->join('photos','projects.id','=','photos.project_id')->get();
        $constituencies = Constituency::all();
        $departments = Department::all();
        return view('constituency',compact('constituencies','projects','constituencyName','departments'));
    }

    public function byCategory($departmentId){
        $department = DB::table('departments')->where('id','=',$departmentId)->get();
        $categoryName = $department[0]->name;
        $constituencies = Constituency::all();
        $departments = Department::all();
        $projects = DB::table('projects')->where('category','=',$categoryName)->join('constituencies','projects.constituency_id','=','constituencies.id')->join('photos','projects.id','=','photos.project_id')->get();
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
        $project = Project::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'category' => $request['category'],
            'constituency_id' => $request['constituency'],
            'ward' => $request['ward'],
            'budget' => $request['budget'],
            'completion' => $request['completion'],
            'contractor' => $request['contractor'],
            'due_date' => $request['due_date'],
            'added_by' => "Admin"
        ]);

        $files = $request['file'];

        if ($request->hasFile('file')){
            foreach ($files as $file){
                $filename = $file->getClientOriginalName();
//                $path = $file->storeAs('public/uploads/'.$request['name'],$filename);
                $path = $file->storePublicly('/uploads/'.$request['name'],'public');
                $photo = new Photo();
                $photo->path = $path;
                $photo->project_id = $project->id;
                $photo->save();
            }
        }

        if ($project){
            return redirect()->back()->with('message',"success");
        } else {
            return back()->with('message',"error");
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
        $project = Project::findOrFail($id);
        $photos = DB::table('photos')->where('project_id','=',$id)->get();
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
        $project = DB::table('projects')->where('id','=',$id)->get();
        $constituencies = Constituency::all();
        $wards = Ward::all();
        $contractors = DB::table('users')->where('role','=',"Contractor")->get();
        return view('admin.edit-project',compact('project','message','constituencies','contractors','wards'));
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
        if (Project::find($id)->update($request->all())){
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
        $project = Project::findOrFail($id);
        if ($project->delete()){
            return redirect()->back()->with('message',"success");
        } else {
            return redirect()->back()->with('message',"error");
        }
    }
}
