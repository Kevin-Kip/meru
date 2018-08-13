<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\Message;
use App\Project;
use App\User;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messagecount = Message::count();
        $projectcount = Project::count();
        $usercount = User::count();
        $constituencycount = Constituency::count();
        $projects = Project::all();
        $completed = DB::table('projects')->where('completion','=',100)->count();
        $ongoing = DB::table('projects')->where('completion','<',100)->count();
        return view('admin.admin', compact('messagecount','ongoing','completed','projectcount','usercount','constituencycount','projects'));
    }

    public function showConstituencies(){
        $messagecount = Message::count();
        $projectcount = Project::count();
        $usercount = User::count();
        $constituencycount = Constituency::count();
        $constituencies = Constituency::all();
        return view('admin.constituencies', compact('messagecount','projectcount','usercount','constituencycount','constituencies'));
    }

    public function userDashboard(){
        $messagecount = Message::count();
        $projectcount = Project::count();
        $usercount = User::count();
        $constituencycount = Constituency::count();
        $projects = DB::table('projects')->join('constituencies','projects.project_constituency','=','constituencies.constituency_id')->get();
        $completed = DB::table('projects')->where('completion','=',100)->count();
        $ongoing = DB::table('projects')->where('completion','<',100)->count();
        return view('users.dashboard', compact('messagecount','ongoing','completed','projectcount','usercount','constituencycount','projects'));
    }

    public function userProjects(){
        $messagecount = Message::count();
        $projectcount = Project::count();
        $usercount = User::count();
        $constituencycount = Constituency::count();
        $projects = DB::table('projects')->join('constituencies','projects.project_constituency','=','constituencies.constituency_id')->get();
        return view('users.projects', compact('messagecount','projectcount','usercount','constituencycount','projects'));
    }

    public function userConstituencies(){
        $messagecount = Message::count();
        $projectcount = Project::count();
        $usercount = User::count();
        $constituencycount = Constituency::count();
        $constituencies = Constituency::all();
        return view('users.constituencies', compact('messagecount','projectcount','usercount','constituencycount','constituencies'));
    }

    public function userContractors(){
        $messagecount = Message::count();
        $projectcount = Project::count();
        $usercount = User::count();
        $constituencycount = Constituency::count();
        $contractors = User::where('user_role',"Contractor")->get();
        foreach ($contractors as $contractor) {
            $contractor->assigned_projects = Project::where('contractor',$contractor->first_name." ".$contractor->last_name)->count();
        }
        return view('users.contractors', compact('messagecount','projectcount','usercount','constituencycount','contractors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-constituency');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:35|unique:constituencies'
        ]);
        $constituency = Constituency::create([
           'name' => $request['name']
        ]);
        $ward = Ward::create([
           'name' => $request['ward'],
           'constituency' => $request['name']
        ]);
        if ($constituency && $ward){
            return back()->with('message',"success");
        } else {
            return back()->with('message',"error");
        }
    }
}
