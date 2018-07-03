<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\Photo;
use App\Project;
use App\Message;
use App\User;
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
        $projects = DB::table('projects')->take(3)->get();
        $constituencies = Constituency::all();
        $photos = Photo::all();
        $message = "";
        return view('index', compact('projects','constituencies','message','photos'));
    }

    public function fetchAll(){
        $projects = DB::table('projects')->get();
        $constituencies = Constituency::all();
        return view('projects',compact('constituencies','projects'));
    }


    public function showForAdmin(){
        $messagecount = Message::count();
        $projectcount = Project::count();
        $usercount = User::count();
        $constituencycount = Constituency::count();
        $projects = Project::all();
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
        return view('admin.create-project',compact('message'));
    }

    public function byConstituency($constituencyId){
//        TODO FIX
        $constituency = DB::table('constituencies')->where('id','=',$constituencyId)->get();
        $constituencyName =  $constituency[0]->name;
        $projects = DB::table('projects')->where('constituency','=',$constituencyName)->get();
        $constituencies = Constituency::all();
        return view('constituency',compact('constituencies','projects','constituencyName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ward = DB::table('wards')->where('constituency','=',$request['constituency']);
        $wardName = $ward[0]->name;
        $project = Project::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'category' => $request['category'],
            'constituency' => $request['constituency'],
            'ward' => $wardName,
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
                $path = $file->storeAs('storage/uploads/'.$request['name'],$filename);
                $photo = new Photo();
                $photo->name = $path;
                $photo->project_name = $request['name'];
                $photo->save();
            }
        }

        if ($project){
            return back()->with(['message'=>"success"]);
        } else {
            return back()->with(['message'=>"error"]);
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
        $project = Project::findOrFail($id);
        if ($project){
            return view('project')->with("project",$project);
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
        //
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
        //
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
        if ($project){
            $project->delete();
            $projects = Project::all();
            $message = "Deleted";
            return view('admin.dashboard',compact('projects','message'));
        }
    }
}
